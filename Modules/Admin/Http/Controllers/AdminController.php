<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Auth;
use Session;
use Carbon\Carbon;
use Crypt;
use Validator;
use App\Admin;
class AdminController extends Controller
{
   public function __construct(){
        $this->currenttimestamp=Carbon::now()->toDateTimeString();
        $this->currentdate=Carbon::now()->toDateString();
        $this->carbondate=Carbon::now();
    }
     public function index()
    {
        $data=array();
         if(isset($_COOKIE['rem_e']) && $_COOKIE['rem_e'] != null && isset($_COOKIE['rem_p']) && $_COOKIE['rem_p'] != null){
        
            $data['u_e'] = $_COOKIE['rem_e'];
        
            $data['u_p'] = Crypt::decrypt($_COOKIE['rem_p']);
           }
        $data['title']="Login Portal";
        $data['menu_active']='admin';
        $data['submenu_active']='admin';
        return view('admin::index',$data);
    }
    public function authenticate(Request $request){
   
     $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

     if (Auth::attempt([
        'email'     => $request->email, 
        'password'  => $request->password,
     ])) 
     {
        if($request->input('remember_me')=="yes"){
                Session::put('remember_me','yes');
            }
             return redirect()->intended('admin/dashboard');
           }else{

               Session::flash('error_message', 'Invalid Email or Password.');
               return redirect('admin'); 
        }

    }
    public function dashboard(){
      $data['title']='Admin';
      $data['menu_active']='admin';
      $data['submenu_active']='admin';
      return view('admin::dashboard',$data);
    }

    public function logout(){
        return redirect('/admin');
    }


}
