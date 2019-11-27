<?php

namespace Modules\Quotes\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Validator;
use App\Quotes;
use App\Admin;
use File;
use Session;
use Auth;
use DB;
class QuotesController extends Controller
{

    public function create(Request $request)
    {
     if(Auth::guard('web')->check()){
        if($request->isMethod('get')){
          $data=[];
          $data['breadcrumbs']='<li><span class="glyphicon glyphicon-film" aria-hidden="true"></span><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.route('quotes.create').'">Quotes Create</a></li>';
          $data['menu_active']='quotes';
          $data['submenu_active']='quotesadd';
          return view('quotes::index',$data);
     }
     if($request->isMethod('post')){
            $rules=[
            'qname'          => 'required',
            'images.*'       => 'required|mimes:jpeg,png,bmp,gif,jpg|max:800',
            'is_approved'         =>'required'
             ];
        $messages =[
            'qname.required' =>'Picture Name is required',
            'images.*.mimes'    => 'Image format may be jpeg,bmp,png,jpg,gif or svg',
            'images.size'     =>'Image size not exceed to be 200kb', 
            'is_approved.required' =>'Picture Approval is required'
        ];
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('quotes/create')
                        ->withErrors($validator)
                        ->withInput();               
        }
         $quotes['qname']       =$request->get('qname');
         $quotes['is_approved'] =$request->get('is_approved');
        
         if($request->hasFile('images')){
              $image=$request->file('images');
              $image_upload_path=public_path('/images/');
              $image_file_extension=$image->getClientOriginalExtension();
              $image_filename  = time() . '-' .rand(111111,999999).'.'.$image->getClientOriginalExtension();
              $image->move($image_upload_path,$image_filename);
              $quotes['qimage']=$image_filename;
              }
         $quotes['created_by']=Auth::guard('web')->user()->id;
        if(Quotes::create($quotes)){
              if($request->input('submit&create')){
               return redirect('quotes/create')->with('success_msg','Quotes Created Successfully!!');
        }   
     }else{
        return redirect('quotes/create')->with('error_msg','Quotes Not Created');
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
          $data['breadcrumbs'].='<li><a href="'.route('quotes.list').'">Pictures List</a></li>';
          $data['quotes']=Quotes::where('del_flag', '0')
                               ->paginate(20);       
          $data['menu_active']='quotes';
          $data['submenu_active']='quoteslist';
          return view('quotes::quoteslist',$data);
     
   }else{
    return redirect('admin');
   }
 }
 
public function edit(Request $request ,$id){
if(Auth::guard('web')->check()){
    if($request->isMethod('get')){
          $data=[];
          $data['breadcrumbs']='<li><i class="fa fa-home"></i><a href="'.route('admin.dashboard').'">Admin</a></li>';
          $data['breadcrumbs'].='<li><a href="'.route('quotes.create').'">Quotes Create</a></li>';
          $data['breadcrumbs'].='<li><a href="'.route('quotes.list').'">Quotes List</a></li>';
          $data['quotes']=Quotes::find($id);
          $data['menu_active']='quotes';
          $data['submenu_active']='quotesedit';
          return view('quotes::quotesedit',$data);
     }
     if($request->isMethod('post')){
     $rules=[
           'qname'          => 'required',
            'images.*'       => 'required|mimes:jpeg,png,bmp,gif,jpg|max:800',
            'is_approved'         =>'required'
             ];
        $messages =[
           'qname.required' =>'Picture Name is required',
            'images.*.mimes'    => 'Image format may be jpeg,bmp,png,jpg,gif or svg',
            'images.size'     =>'Image size not exceed to be 200kb', 
            'is_approved.required' =>'Picture Approval is required'
        ];
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('quotes/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();               
        }
         $quotes['qname']       =$request->get('qname');
         $quotes['is_approved'] =$request->get('is_approved');
        if($request->hasFile('images')){
            File::delete(public_path('/images/'.$request->input('old_quote_image')));
              $image=$request->file('images');
              $image_upload_path=public_path('/images/');
              $image_file_extension=$image->getClientOriginalExtension();
              $image_filename  = time() . '-' .rand(111111,999999).'.'.$image->getClientOriginalExtension();
              $image->move($image_upload_path,$image_filename);
              $quotes['qimage']=$image_filename;
          }else{
            $quotes['qimage']=$request->input('old_quote_image');
          }
         $quotes['updated_by']=Auth::guard('web')->user()->id;
        if(Quotes::find($request->get('quote_id'))->update($quotes)){
              if($request->input('submit&edit')){
               return redirect('quotes/list')->with('success_msg',' Edited Successfully!!');
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
               if(Quotes::find($id)->update($data)){
            return redirect('quotes/list')->with('success_msg','Deleted Successfully!!');
        }
      }else{
        return redirect('admin');
        
  }
} 
 
}
