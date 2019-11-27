<?php

namespace Modules\Sayari\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Validator;
use App\Sayari;
use App\Admin;
use File;
use Session;
use Auth;
use DB;
class SayariController extends Controller
{
    public function create(Request $request)
    {
     if(Auth::guard('web')->check()){
        if($request->isMethod('get')){
          $data=[];
          $data['breadcrumbs']='<li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.route('sayari.create').'">Sayari Create</a></li>';
          $data['menu_active']='sayari';
          $data['submenu_active']='sayariadd';
          return view('sayari::index',$data);
     }
     if($request->isMethod('post')){
            $rules=[
            'title'          => 'required',
            'type'        =>'required',
            'images.*'       => 'required|mimes:jpeg,png,bmp,gif,jpg|max:800',
            'is_approved'         =>'required'
             ];
        $messages =[
            'title.required' =>'Title  is required',
            'type.required' =>'Sayari Type is required',
            'images.*.mimes'    => 'Image format may be jpeg,bmp,png,jpg,gif or svg',
            'images.size'     =>'Image size not exceed to be 200kb', 
            'is_approved.required' =>'Approval is required'
        ];
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('sayari/create')
                        ->withErrors($validator)
                        ->withInput();               
        }
         $sayari['title']       =$request->get('title');
         $sayari['type']        =$request->get('type');
         $sayari['is_approved'] =$request->get('is_approved');
        
         if($request->hasFile('images')){
              $image=$request->file('images');
              $image_upload_path=public_path('/images/');
              $image_file_extension=$image->getClientOriginalExtension();
              $image_filename  = time() . '-' .rand(111111,999999).'.'.$image->getClientOriginalExtension();
              $image->move($image_upload_path,$image_filename);
              $sayari['simage']=$image_filename;
              }
         $sayari['created_by']=Auth::guard('web')->user()->id;
        if(Sayari::create($sayari)){
              if($request->input('submit&create')){
               return redirect('sayari/create')->with('success_msg','Sayari Created Successfully!!');
        }   
     }else{
        return redirect('Sayari/create')->with('error_msg','Sayari Not Created');
     }
   }
 }else{
        return redirect('admin');
     }
}

 public function list(){
    if(Auth::guard('web')->check()){
          $data=[];
          $data['breadcrumbs']='<li><i class="fa fa-home"></i><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.route('sayari.list').'">Pictures List</a></li>';
          $data['sayari']=Sayari::where('del_flag', '0')
                               ->paginate(20);       
          $data['menu_active']='sayari';
          $data['submenu_active']='sayarilist';
          return view('sayari::sayarilist',$data);
     
   }else{
    return redirect('admin');
   }
 }
 
public function edit(Request $request ,$id){
if(Auth::guard('web')->check()){
    if($request->isMethod('get')){
          $data=[];
          $data['breadcrumbs']='<li><i class="fa fa-home"></i><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.route('sayari.create').'">Sayari Create</a></li>';
          $data['breadcrumbs'].='<li><a href="'.route('sayari.list').'">Sayari List</a></li>';
          $data['sayari']=Sayari::find($id);
          $data['menu_active']='sayari';
          $data['submenu_active']='sayariedit';
          return view('sayari::sayariedit',$data);
     }
     if($request->isMethod('post')){
     $rules=[
           'title'          => 'required',
            'type'        =>'required',
            'images.*'       => 'required|mimes:jpeg,png,bmp,gif,jpg|max:800',
            'is_approved'         =>'required'
             ];
        $messages =[
            'title.required' =>'Title  is required',
            'type.required' =>'Sayari Type is required',
            'images.*.mimes'    => 'Image format may be jpeg,bmp,png,jpg,gif or svg',
            'images.size'     =>'Image size not exceed to be 200kb', 
            'is_approved.required' =>'Approval is required'
        ];
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('sayari/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();               
        }
         $sayari['title']       =$request->get('title');
         $sayari['type']       =$request->get('type');
         $sayari['is_approved'] =$request->get('is_approved');
        if($request->hasFile('images')){
            File::delete(public_path('/images/'.$request->input('old_sayari_image')));
              $image=$request->file('images');
              $image_upload_path=public_path('/images/');
              $image_file_extension=$image->getClientOriginalExtension();
              $image_filename  = time() . '-' .rand(111111,999999).'.'.$image->getClientOriginalExtension();
              $image->move($image_upload_path,$image_filename);
              $sayari['simage']=$image_filename;
          }else{
            $sayari['simage']=$request->input('old_sayari_image');
          }
         $pictures['updated_by']=Auth::guard('web')->user()->id;
        if(Sayari::find($request->get('sayari_id'))->update($sayari)){
              if($request->input('submit&edit')){
               return redirect('sayari/list')->with('success_msg',' Edited Successfully!!');
              }
          }
      return back()->with('error_msg','Something is wrong!!');
   

   }
 }else{
        return redirect('admin');
     } 
}

 public function remove($id){
      if(Auth::guard('web')->check()){
        $data=[];
        $data['deleted_by']=Auth::guard('web')->user()->id;
        $data['deleted_at']=date('Y-m-d h:i:s');
        $data['del_flag']='1';
               if(Sayari::find($id)->update($data)){
            return redirect('sayari/list')->with('success_msg','Deleted Successfully!!');
        }
      }else{
        return redirect('admin');
        
  }
} 
 
}
