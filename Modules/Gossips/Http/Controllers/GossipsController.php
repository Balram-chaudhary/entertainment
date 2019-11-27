<?php

namespace Modules\Gossips\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Validator;
use App\Gossip;
use App\Admin;
use File;
use Session;
use Auth;
use DB;
class GossipsController extends Controller
{
    public function create(Request $request)
    {
     if(Auth::guard('web')->check()){
        if($request->isMethod('get')){
          $data=[];
          $data['breadcrumbs']='<li><span class="glyphicon glyphicon-heart" aria-hidden="true"></span><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.route('gossips.create').'">Gossips Create</a></li>';
          $data['menu_active']='gossips';
          $data['submenu_active']='gossipsadd';
          return view('gossips::index',$data);
     }
     if($request->isMethod('post')){
            $rules=[
            'title'          => 'required',
            'description'    => 'required',
            'gtype'          =>'required', 
            'images.*'       => 'required|mimes:jpeg,png,bmp,gif,jpg|max:800',
            'is_approved'         =>'required'
             ];
        $messages =[
            'title.required' =>'Gossip Title is required',
            'description'    => 'Gossip Description is required',
            'gtype'          =>'Gossip type is required', 
            'images.*.mimes'    => 'Image format may be jpeg,bmp,png,jpg,gif or svg',
            'images.size'     =>'Image size not exceed to be 200kb', 
            'is_approved.required' =>'Gossip Approval is required'
        ];
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('gossips/create')
                        ->withErrors($validator)
                        ->withInput();               
        }
         $gossips['title']       =$request->get('title');
         $gossips['description'] =$request->get('description');
         $gossips['type']        =$request->get('gtype');
         $gossips['is_approved'] =$request->get('is_approved');
        
         if($request->hasFile('images')){
              $image=$request->file('images');
              $image_upload_path=public_path('/images/');
              $image_file_extension=$image->getClientOriginalExtension();
              $image_filename  = time() . '-' .rand(111111,999999).'.'.$image->getClientOriginalExtension();
              $image->move($image_upload_path,$image_filename);
              $gossips['gimage']=$image_filename;
              }
         $gossips['created_by']=Auth::guard('web')->user()->id;
        if(Gossip::create($gossips)){
              if($request->input('submit&create')){
               return redirect('gossips/create')->with('success_msg','Gossips Created Successfully!!');
        }   
     }else{
        return redirect('gossips/create')->with('error_msg','Gossips Not Created');
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
          $data['breadcrumbs'].='<li><a href="'.route('gossips.list').'">Gossips List</a></li>';
          $data['gossips']=Gossip::where('del_flag', '0')
                                ->where('is_approved','=','y')
                               ->paginate(20);       
          $data['menu_active']='gossips';
          $data['submenu_active']='gossipslist';
          return view('gossips::gossipslist',$data);
     
   }else{
    return redirect('admin');
   }
 }
 
public function edit(Request $request ,$id){
if(Auth::guard('web')->check()){
    if($request->isMethod('get')){
          $data=[];
          $data['breadcrumbs']='<li><i class="fa fa-home"></i><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.route('gossips.create').'">Gossips Create</a></li>';
          $data['breadcrumbs'].='<li><a href="'.route('gossips.list').'">Gossips List</a></li>';
          $data['gossips']=Gossip::find($id);
          $data['menu_active']='gossips';
          $data['submenu_active']='gossipsedit';
          return view('gossips::gossipsedit',$data);
     }
     if($request->isMethod('post')){

     $rules=[
           'title'          => 'required',
            'description'    => 'required',
            'gtype'          =>'required', 
            'images.*'       => 'required|mimes:jpeg,png,bmp,gif,jpg|max:800',
            'is_approved'         =>'required'
             ];
        $messages =[
           'title.required' =>'Gossip Title is required',
            'description'    => 'Gossip Description is required',
            'gtype'          =>'Gossip type is required', 
            'images.*.mimes'    => 'Image format may be jpeg,bmp,png,jpg,gif or svg',
            'images.size'     =>'Image size not exceed to be 200kb', 
            'is_approved.required' =>'Gossip Approval is required'
        ];
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('gossips/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();               
        }
         $gossips['title']       =$request->get('title');
         $gossips['description'] =$request->get('description');
         $gossips['type']        =$request->get('gtype');
         $gossips['is_approved'] =$request->get('is_approved'); 
       if($request->hasFile('images')){
            File::delete(public_path('/images/'.$request->input('old_gossip_image')));
              $image=$request->file('images');
              $image_upload_path=public_path('/images/');
              $image_file_extension=$image->getClientOriginalExtension();
              $image_filename  = time() . '-' .rand(111111,999999).'.'.$image->getClientOriginalExtension();
              $image->move($image_upload_path,$image_filename);
              $gossips['gimage']=$image_filename;
          }else{
            $gossips['gimage']=$request->input('old_gossip_image');
          }
         $gossips['updated_by']=Auth::guard('web')->user()->id;
            if(Gossip::find($request->input('gossip_id'))->update($gossips)){
              if($request->input('submit&edit')){
               return redirect('gossips/list')->with('success_msg',' Edited Successfully!!');
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
               if(Gossip::find($id)->update($data)){
            return redirect('gossips/list')->with('success_msg','Deleted Successfully!!');
        }
      }else{
        return redirect('admin');
        
  }
} 
   
}
