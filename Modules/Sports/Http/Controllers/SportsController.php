<?php

namespace Modules\Sports\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Validator;
use App\Sports;
use App\Admin;
use File;
use Session;
use Auth;
use DB;
class SportsController extends Controller
{
   public function create(Request $request)
    {
     if(Auth::guard('web')->check()){
        if($request->isMethod('get')){
          $data=[];
          $data['breadcrumbs']='<li><span class="glyphicon glyphicon-film glyphicon-king" aria-hidden="true"></span><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.route('sports.create').'">Sports Create</a></li>';
          $data['menu_active']='sports';
          $data['submenu_active']='sportsadd';
          return view('sports::index',$data);
     }
     if($request->isMethod('post')){

            $rules=[
            'sname'          => 'required',
            'description'    => 'required',
            'stype'          =>'required', 
            'images.*'       => 'required|mimes:jpeg,png,bmp,gif,jpg|max:800',
            'is_approved'         =>'required'
             ];
        $messages =[
            'sname.required' =>'Sports Name is required',
            'description'    => 'Sports Description is required',
            'stype'          =>'Sports type is required', 
            'images.*.mimes'    => 'Image format may be jpeg,bmp,png,jpg,gif or svg',
            'images.size'     =>'Image size not exceed to be 200kb', 
            'is_approved.required' =>'Sports Approval is required'
        ];
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('sports/create')
                        ->withErrors($validator)
                        ->withInput();               
        }
         $sports['sname']       =$request->get('sname');
         $sports['description'] =$request->get('description');
         $sports['stype']        =$request->get('stype');
         $sports['is_approved'] =$request->get('is_approved');
        
         if($request->hasFile('images')){
              $image=$request->file('images');
              $image_upload_path=public_path('/images/');
              $image_file_extension=$image->getClientOriginalExtension();
              $image_filename  = time() . '-' .rand(111111,999999).'.'.$image->getClientOriginalExtension();
              $image->move($image_upload_path,$image_filename);
              $sports['image']=$image_filename;
              }
         $sports['created_by']=Auth::guard('web')->user()->id;
        if(Sports::create($sports)){
              if($request->input('submit&create')){
               return redirect('sports/create')->with('success_msg','Sports Created Successfully!!');
        }   
     }else{
        return redirect('sports/create')->with('error_msg','Gossips Not Created');
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
          $data['breadcrumbs'].='<li><a href="'.route('sports.list').'">Sports List</a></li>';
          $data['sports']=Sports::where('del_flag', '0')
                                ->where('is_approved','=','y')
                               ->paginate(20);       
          $data['menu_active']='sports';
          $data['submenu_active']='sportslist';
          return view('sports::sportslist',$data);
     
   }else{
    return redirect('admin');
   }
 }
 
public function edit(Request $request ,$id){
if(Auth::guard('web')->check()){
    if($request->isMethod('get')){
          $data=[];
          $data['breadcrumbs']='<li><i class="fa fa-home"></i><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.route('sports.create').'">Sports Create</a></li>';
          $data['breadcrumbs'].='<li><a href="'.route('gossips.list').'">Sports List</a></li>';
          $data['sports']=Sports::find($id);
          $data['menu_active']='sports';
          $data['submenu_active']='sportsedit';
          return view('sports::sportsedit',$data);
     }
     if($request->isMethod('post')){
     $rules=[
          'sname'          => 'required',
            'description'    => 'required',
            'stype'          =>'required', 
            'images.*'       => 'required|mimes:jpeg,png,bmp,gif,jpg|max:800',
            'is_approved'         =>'required'
             ];
        $messages =[
           'sname.required' =>'Sports Name is required',
            'description'    => 'Sports Description is required',
            'stype'          =>'Sports type is required', 
            'images.*.mimes'    => 'Image format may be jpeg,bmp,png,jpg,gif or svg',
            'images.size'     =>'Image size not exceed to be 200kb', 
            'is_approved.required' =>'Sports Approval is required'
        ];
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('gossips/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();               
        }
         $sports['sname']       =$request->get('sname');
         $sports['description'] =$request->get('description');
         $sports['stype']        =$request->get('stype');
         $sports['is_approved'] =$request->get('is_approved');
        
       if($request->hasFile('images')){
            File::delete(public_path('/images/'.$request->input('old_sports_image')));
              $image=$request->file('images');
              $image_upload_path=public_path('/images/');
              $image_file_extension=$image->getClientOriginalExtension();
              $image_filename  = time() . '-' .rand(111111,999999).'.'.$image->getClientOriginalExtension();
              $image->move($image_upload_path,$image_filename);
              $sports['image']=$image_filename;
          }else{
            $sports['image']=$request->input('old_sports_image');
          }
         $sports['updated_by']=Auth::guard('web')->user()->id;
            if(Sports::find($request->input('sports_id'))->update($sports)){
              if($request->input('submit&edit')){
               return redirect('sports/list')->with('success_msg',' Edited Successfully!!');
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
               if(Sports::find($id)->update($data)){
            return redirect('sports/list')->with('success_msg','Deleted Successfully!!');
        }
      }else{
        return redirect('admin');
        
  }
} 

}
