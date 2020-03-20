<?php

namespace App\Http\Controllers;
use DataTables;
use App\User;
use App\UserListing;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use DB;

class UserListingController extends Controller
{
    // public function index()
    // {
    //   $users = DB::table('users')->get();
    //   return view('admin/Userlist/list',compact('users'));
    // }


    // public function index(Request $request)
    // {  
    //     if($request->ajax())
    //     {
    //       $users = User::orderBy('id','asc')->select('*');
    //       return DataTables::of($users)->addIndexColumn()
    //       ->make(true);
    //     }
    //     return view('admin/Userlist/list');
    // }


    public function index(Request $request)
    {  
        if($request->ajax())
        {
          $users = DB::select("select * from users where role = 'user'");
          return DataTables::of($users)->addIndexColumn()
          ->make(true);
        }
        return view('admin/Userlist/list');
    }
   
}
