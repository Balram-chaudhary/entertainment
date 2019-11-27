<?php
namespace Modules\Pictures\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Validator;
use App\Pictures;
use App\Admin;
use File;
use Session;
use Auth;
use DB;
class PicturesController extends Controller
{
  public function create(Request $request)
    {
     if(Auth::guard('web')->check()){
        if($request->isMethod('get')){
          $data=[];
          $data['breadcrumbs']='<li><span class="glyphicon glyphicon-film" aria-hidden="true"></span><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.route('pictures.create').'">Pictures Create</a></li>';
          $data['menu_active']='pictures';
          $data['submenu_active']='picturesadd';
          return view('pictures::index',$data);
     }
     if($request->isMethod('post')){
            $rules=[
            'pname'          => 'required',
            'type'        =>'required',
            'images.*'       => 'required|mimes:jpeg,png,bmp,gif,jpg|max:800',
            'is_approved'         =>'required'
             ];
        $messages =[
            'pname.required' =>'Picture Name is required',
            'type.required' =>'Video Type is required',
            'images.*.mimes'    => 'Image format may be jpeg,bmp,png,jpg,gif or svg',
            'images.size'     =>'Image size not exceed to be 200kb', 
            'is_approved.required' =>'Picture Approval is required'
        ];
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('pictures/create')
                        ->withErrors($validator)
                        ->withInput();               
        }
         $pictures['pname']       =$request->get('pname');
         $pictures['ptype']        =$request->get('type');
         $pictures['is_approved'] =$request->get('is_approved');
        
         if($request->hasFile('images')){
              $image=$request->file('images');
              $image_upload_path=public_path('/images/');
              $image_file_extension=$image->getClientOriginalExtension();
              $image_filename  = time() . '-' .rand(111111,999999).'.'.$image->getClientOriginalExtension();
              $image->move($image_upload_path,$image_filename);
              $pictures['pimage']=$image_filename;
              }
         $pictures['created_by']=Auth::guard('web')->user()->id;
        if(Pictures::create($pictures)){
              if($request->input('submit&create')){
               return redirect('pictures/create')->with('success_msg','Pictures Created Successfully!!');
        }   
     }else{
        return redirect('Pictures/create')->with('error_msg','Pictures Not Created');
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
          $data['breadcrumbs'].='<li><a href="'.route('pictures.list').'">Pictures List</a></li>';
          $data['pictures']=Pictures::where('del_flag', '0')
                               ->paginate(20);       
          $data['menu_active']='pictures';
          $data['submenu_active']='pictureslist';
          return view('pictures::pictureslist',$data);
     
   }else{
    return redirect('admin');
   }
 }
 
public function edit(Request $request ,$id){
if(Auth::guard('web')->check()){
    if($request->isMethod('get')){
          $data=[];
          $data['breadcrumbs']='<li><i class="fa fa-home"></i><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.route('pictures.create').'">Pictures Create</a></li>';
          $data['breadcrumbs'].='<li><a href="'.route('pictures.list').'">Pictures List</a></li>';
          $data['pictures']=Pictures::find($id);
          $data['menu_active']='pictures';
          $data['submenu_active']='picturesedit';
          return view('pictures::picturesedit',$data);
     }
     if($request->isMethod('post')){
     $rules=[
           'pname'          => 'required',
            'type'        =>'required',
            'images.*'       => 'required|mimes:jpeg,png,bmp,gif,jpg|max:800',
            'is_approved'         =>'required'
             ];
        $messages =[
           'pname.required' =>'Picture Name is required',
            'type.required' =>'Video Type is required',
            'images.*.mimes'    => 'Image format may be jpeg,bmp,png,jpg,gif or svg',
            'images.size'     =>'Image size not exceed to be 200kb', 
            'is_approved.required' =>'Picture Approval is required'
        ];
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('pictures/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();               
        }
         $pictures['pname']       =$request->get('pname');
         $pictures['ptype']        =$request->get('type');
         $pictures['is_approved'] =$request->get('is_approved');
        if($request->hasFile('images')){
            File::delete(public_path('/images/'.$request->input('old_picture_image')));
              $image=$request->file('images');
              $image_upload_path=public_path('/images/');
              $image_file_extension=$image->getClientOriginalExtension();
              $image_filename  = time() . '-' .rand(111111,999999).'.'.$image->getClientOriginalExtension();
              $image->move($image_upload_path,$image_filename);
              $pictures['pimage']=$image_filename;
          }else{
            $pictures['pimage']=$request->input('old_picture_image');
          }
         $pictures['updated_by']=Auth::guard('web')->user()->id;
        if(Pictures::find($request->get('picture_id'))->update($pictures)){
              if($request->input('submit&edit')){
               return redirect('pictures/list')->with('success_msg',' Edited Successfully!!');
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
               if(Pictures::find($id)->update($data)){
            return redirect('pictures/list')->with('success_msg','Deleted Successfully!!');
        }
      }else{
        return redirect('admin');
        
  }
} 
 



}
