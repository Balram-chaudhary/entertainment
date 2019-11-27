<?php

namespace Modules\Home\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Videos;
use App\Sports;
use App\Pictures;
use App\Gossip;
use App\Sayari;
use App\Quotes;
use Validator;
class HomeController extends Controller
{
    public function index()
    {
       $data['videos']=Videos::where('del_flag','=','0')
                               ->where('is_approved','=','y')
                               ->get();
       foreach($data['videos'] as $v)
       {
        $data['image']= $v->image;
       }         
        $data['sports']=Sports::where('del_flag','=','0')
                              ->where('is_approved','=','y')
                              ->get();              
       foreach($data['sports'] as $s)
       {
        $data['simage']= $s->image;
       }                       
        $data['quotes']=Quotes::where('del_flag','=','0')
                               ->where('is_approved','=','y')
                               ->get(); 
        foreach($data['quotes'] as $q)
        {
        $data['qimage']= $q->qimage;
        }                          
        $data['gossips']=Gossip::where('del_flag','=','0')
                               ->where('is_approved','=','y')
                               ->get();
        foreach($data['gossips'] as $g)
        {
        $data['gimage']= $g->gimage;
        }                           
        $data['pictures']=Pictures::where('del_flag','=','0')
                               ->where('is_approved','=','y')
                               ->get();                    
         foreach($data['pictures'] as $p)
         {
         $data['pimage']= $p->pimage;
         }

      $data['sayari']=Sayari::where('del_flag','=','0')
                               ->where('is_approved','=','y')
                               ->get();

         foreach($data['sayari'] as $sa)
         {
         $data['sayariimage']= $sa->simage;
         }
    return view('home::index',$data);
    }
    public function pictures()
    {
        $data['pictures']=Pictures::where('del_flag','=','0')
                               ->where('is_approved','=','y')
                               ->get();
        return view('home::pictures',$data);
    }
    public function videos()
    {
        $data['videos']=Videos::where('del_flag','=','0')
                               ->where('is_approved','=','y')
                               ->take(3)
                               ->get();
         $data['others']=Videos::where('del_flag','=','0')
                               ->where('is_approved','=','y')
                               ->where('id','!=',['1','2','3'])
                               ->take(8)
                               ->get();            
        return view('home::videos',$data);
    }
    public function videosdetail($id)
    {
        $data['videos'] =Videos::find($id);
        $data['relatedvideos']=Videos::where('del_flag','=','0')
                              ->where('is_approved','=','y')
                              ->where('id','!=',$id)
                              ->take(8)
                              ->get(); 

        return view('home::videosdetail',$data);
    }
    public function sports()
    {
      $data['sports']=Sports::where('del_flag','=','0')
                              ->where('is_approved','=','y')
                              ->get();
        return view('home::sports',$data);
    }
    public function sportsdetail($id)
    {
        $data['sports']=Sports::find($id);
        $data['others']=Sports::where('del_flag','=','0')
                        ->where('is_approved','=','y')
                        ->where('id','!=',$id)
                        ->take(8)
                        ->get();  
        return view('home::sportsdetail',$data);
    }
    public function sayari()
    {
        $data['sayari']=Sayari::where('del_flag','=','0')
                               ->where('is_approved','=','y')
                               ->get();
        return view('home::sayari',$data);
    }
     public function quotes()
    {
         $data['quotes']=Quotes::where('del_flag','=','0')
                               ->where('is_approved','=','y')
                               ->get();
        return view('home::quotes',$data);
    }
    public function gossip()
    {
      $data['gossips']=Gossip::where('del_flag','=','0')
                               ->where('is_approved','=','y')
                               ->get();
        return view('home::gossip',$data);
    }
    public function gossipdetail($id)
    {
       $data['gossips']=Gossip::find($id);
       $data['others']=Gossip::where('del_flag','=','0')
                        ->where('is_approved','=','y')
                        ->where('id','!=',$id)
                        ->take(8)
                        ->get();  
        return view('home::gossipdetail',$data);
    }
    public function upload()
    {
      return view('home::upload');
    }
    public function uploadeddata(Request $request)
    {
      if($request->get('type')=='s'){
       $rules=[
            'name'          => 'required',
            'images.*'       => 'required|mimes:jpeg,png,bmp,gif,jpg|max:800',
             ];
        $messages =[
            'name.required' =>'Name is required',
            'images.*.mimes'    => 'Image format may be jpeg,bmp,png,jpg,gif or svg',
            'images.size'     =>'Image size not exceed to be 200kb', 
          
        ];
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('/upload/create')
                        ->withErrors($validator)
                        ->withInput();               
        }
         
         $sayari['title']       =$request->get('name');
         $sayari['type']        ='o';
         $sayari['is_approved'] ='n';
         if($request->hasFile('images')){
              $image=$request->file('images');
              $image_upload_path=public_path('/images/');
              $image_file_extension=$image->getClientOriginalExtension();
              $image_filename  = time() . '-' .rand(111111,999999).'.'.$image->getClientOriginalExtension();
              $image->move($image_upload_path,$image_filename);
              $sayari['simage']=$image_filename;
              }
         $sayari['created_by']='5';
        if(Sayari::create($sayari)){
              if($request->input('submit&upload')){
               return redirect('/upload/create')->with('success_msg','Data Uploaded Successfully!!');
        }   
     }else{
        return redirect('/upload/create')->with('error_msg','Data Not Uploaded');
     }
      }
      if($request->get('type')=='p'){
          $rules=[
            'name'          => 'required',
            'images.*'       => 'required|mimes:jpeg,png,bmp,gif,jpg|max:800',
             ];
        $messages =[
            'name.required' =>'Name is required',
            'images.*.mimes'    => 'Image format may be jpeg,bmp,png,jpg,gif or svg',
            'images.size'     =>'Image size not exceed to be 200kb', 
          
        ];
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('/upload/create')
                        ->withErrors($validator)
                        ->withInput();               
        }
         
         $picture['pname']       =$request->get('name');
         $picture['ptype']        ='o';
         $picture['is_approved'] ='n';
         if($request->hasFile('images')){
              $image=$request->file('images');
              $image_upload_path=public_path('/images/');
              $image_file_extension=$image->getClientOriginalExtension();
              $image_filename  = time() . '-' .rand(111111,999999).'.'.$image->getClientOriginalExtension();
              $image->move($image_upload_path,$image_filename);
              $picture['pimage']=$image_filename;
              }
         $picture['created_by']='6';
        if(Pictures::create($picture)){
              if($request->input('submit&upload')){
               return redirect('/upload/create')->with('success_msg','Data Uploaded Successfully!!');
        }   
     }else{
        return redirect('/upload/create')->with('error_msg','Data Not Uploaded');
     }
      }
      if($request->get('type')=='q'){
         $rules=[
            'name'          => 'required',
            'images.*'       => 'required|mimes:jpeg,png,bmp,gif,jpg|max:800',
             ];
        $messages =[
            'name.required' =>'Name is required',
            'images.*.mimes'    => 'Image format may be jpeg,bmp,png,jpg,gif or svg',
            'images.size'     =>'Image size not exceed to be 200kb', 
          
        ];
         $validator = Validator::make($request->all(),$rules,$messages);
          if ($validator->fails()) {
            return redirect('/upload/create')
                        ->withErrors($validator)
                        ->withInput();               
        }
         
         $quotes['qname']       =$request->get('name');
         $quotes['is_approved'] ='n';
         if($request->hasFile('images')){
              $image=$request->file('images');
              $image_upload_path=public_path('/images/');
              $image_file_extension=$image->getClientOriginalExtension();
              $image_filename  = time() . '-' .rand(111111,999999).'.'.$image->getClientOriginalExtension();
              $image->move($image_upload_path,$image_filename);
              $quotes['qimage']=$image_filename;
              }
         $quotes['created_by']='7';
        if(Quotes::create($quotes)){
              if($request->input('submit&upload')){
               return redirect('/upload/create')->with('success_msg','Data Uploaded Successfully!!');
        }   
     }else{
        return redirect('/upload/create')->with('error_msg','Data Not Uploaded');
     }
        
      }
    }
   
}
