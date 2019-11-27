<?php

namespace Modules\Videos\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Validator;
use App\Videos;
use App\Admin;
use File;
use Session;
use Auth;
use DB;
class VideosController extends Controller
{
     public function create(Request $request)
    {
     if(Auth::guard('web')->check()){
        if($request->isMethod('get')){
          $data=[];
          $data['breadcrumbs']='<li><span class="glyphicon glyphicon-film" aria-hidden="true"></span><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.route('videos.create').'">Videos Create</a></li>';
          $data['menu_active']='videos';
          $data['submenu_active']='videosadd';
          return view('videos::index',$data);
     }
     if($request->isMethod('post')){
            $rules=[
            'vname'          => 'required',
            'url'          =>'required',
            'type'        =>'required',
            'genre'          =>'required',
            'images.*'       => 'required|mimes:jpeg,png,bmp,gif,jpg|max:800',
            'is_approved'         =>'required'
             ];
        $messages =[
            'vname.required' =>'Video Name is required',
            'url.required' =>'Video Url is required',
            'type.required' =>'Video Type is required',
            'genre.required' =>'Video Genre is required',
            'images.*.mimes'    => 'Image format may be jpeg,bmp,png,jpg,gif or svg',
            'images.size'     =>'Image size not exceed to be 200kb', 
            'is_approved.required' =>'Video Approval is required'
        ];
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('videos/create')
                        ->withErrors($validator)
                        ->withInput();               
        }
         $videos['vname']       =$request->get('vname');
         $videos['url']         =$request->get('url');
         $videos['type']        =$request->get('type');
         $videos['genre']       =$request->get('genre');
         $videos['is_approved'] =$request->get('is_approved');
        
        if($request->hasFile('images')){
              $image=$request->file('images');
              $image_upload_path=public_path('/images/');
              $image_file_extension=$image->getClientOriginalExtension();
              $image_filename  = time() . '-' .rand(111111,999999).'.'.$image->getClientOriginalExtension();
              $image->move($image_upload_path,$image_filename);
              $videos['image']=$image_filename;
              }
         $videos['created_by']=Auth::guard('web')->user()->id;
        if(Videos::create($videos)){
              if($request->input('submit&create')){
               return redirect('videos/create')->with('success_msg','Videos Created Successfully!!');
        }   
     }else{
        return redirect('videos/create')->with('error_msg','Videos Not Created');
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
          $data['breadcrumbs'].='<li><a href="'.route('videos.list').'">Videos List</a></li>';
          $data['videos']=Videos::where('del_flag', '0')
                                ->where('is_approved','=','y')
                               ->paginate(20);
          $data['menu_active']='videos';
          $data['submenu_active']='videoslist';
          return view('videos::videoslist',$data);
     
   }else{
    return redirect('admin');
   }
 }
 
public function edit(Request $request ,$id){
if(Auth::guard('web')->check()){
    if($request->isMethod('get')){
          $data=[];
          $data['breadcrumbs']='<li><i class="fa fa-home"></i><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.route('videos.create').'">Videos Create</a></li>';
          $data['breadcrumbs'].='<li><a href="'.route('videos.list').'">Videos List</a></li>';
          $data['videos']=Videos::find($id);
          $data['menu_active']='videos';
          $data['submenu_active']='videosedit';
          return view('videos::videosedit',$data);
     }
     if($request->isMethod('post')){
     $rules=[
          'vname'          => 'required',
            'url'          =>'required',
            'type'        =>'required',
            'genre'          =>'required',
            'images.*'       => 'required|mimes:jpeg,png,bmp,gif,jpg|max:800',
            'is_approved'         =>'required'
             ];
        $messages =[
           'vname.required' =>'Video Name is required',
            'url.required' =>'Video Url is required',
            'type.required' =>'Video Type is required',
            'genre.required' =>'Video Genre is required',
            'images.*.mimes'    => 'Image format may be jpeg,bmp,png,jpg,gif or svg',
            'images.size'     =>'Image size not exceed to be 200kb', 
            'is_approved.required' =>'Video Approval is required'
        ];
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('videos/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();               
        }
         $videos['vname']       =$request->get('vname');
         $videos['url']         =$request->get('url');
         $videos['type']        =$request->get('type');
         $videos['genre']       =$request->get('genre');
         $videos['is_approved'] =$request->get('is_approved');
       if($request->hasFile('images')){
            File::delete(public_path('/images/'.$request->input('old_video_image')));
              $image=$request->file('images');
              $image_upload_path=public_path('/images/');
              $image_file_extension=$image->getClientOriginalExtension();
              $image_filename  = time() . '-' .rand(111111,999999).'.'.$image->getClientOriginalExtension();
              $image->move($image_upload_path,$image_filename);
              $videos['image']=$image_filename;
          }else{
            $videos['image']=$request->input('old_video_image');
          }
         $videos['updated_by']=Auth::guard('web')->user()->id;
        if(Videos::find($request->get('video_id'))->update($videos)){
              if($request->input('submit&edit')){
               return redirect('videos/list')->with('success_msg',' Edited Successfully!!');
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
               if(Videos::find($id)->update($data)){
            return redirect('videos/list')->with('success_msg','Deleted Successfully!!');
        }
      }else{
        return redirect('admin');
        
  }
}







}



