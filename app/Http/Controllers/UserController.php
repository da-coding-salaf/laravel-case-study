<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function userDatas($request){
        $usersData=DB::select("select * from users where email=?",[$request->session()->get('email')]);
        return $usersData;
    }
    public function userRegister(REQUEST $request){
        
        $request->validate([
            'username' => 'required|unique:users,username',
            'email' => 'required|unique:users,email',
            'fullname' => 'required|string',
            'password' => 'required',
        ]);


        $users = DB::insert('INSERT INTO `users`( `username`, `fullname`, `email`, `password`) VALUES (?,?,?,?)', [$request->username,$request->fullname,$request->email,$request->password]);
        //echo(($users[0]->username));

        return "eoor";
      //  return view('dashboard',["name"=>$users[0]->fullname]);
       // return $request;
    }

    public function userRegister2(Request $request){
    

        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users,username',
            'email' => 'required|unique:users,email',
            'fullname' => 'required|string',
            'password' => 'required',
        ]);
 
        if ($validator->fails()) {
            return ($validator->errors()->all()); 
        }else{
            $users = DB::insert('INSERT INTO `users`( `username`, `fullname`, `email`, `password`) VALUES (?,?,?,?)', [$request->username,$request->fullname,$request->email,$request->password]);
            //echo(($users[0]->username));
        }


       
        return "eoor";
      //  return view('dashboard',["name"=>$users[0]->fullname]);
       // return $request;
    }

    public function userLogin(REQUEST $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        $users = DB::select('select * from users where email=? and password=?', [$request->email,$request->password]);
        if($users){
            $request->session()->put('email', $request->email);
           // var_dump($this->userDatas($request));
             return redirect('dashboard');
            }else{
                return back()->with('status', "Invalid Login details");
                }
    }
    public function dashboard(Request $request){
       $datas=$this->userDatas($request);
        return view('dashboard',["username"=>$datas[0]->username,"fullname"=>$datas[0]->fullname,"email"=>"Abass"]);
    }

    public function profiles(Request $request){
        $datas=$this->userDatas($request);
         return view('profiles',["username"=>$datas[0]->username,"fullname"=>$datas[0]->fullname,"email"=>"Abass"]);
     }
}
