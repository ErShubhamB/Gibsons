<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use DB;
use Session;
class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function update_avatar(Request $request){
    	if($request->hasFile('file')){
    		$avatar = $request->file('file');
    		$main_image_filename = $avatar->getClientOriginalName();
            $avatar->move(public_path('uploads'), $main_image_filename);
            $user_id = Auth::user()->id;
            DB::table('users')
            ->where('id', $user_id)
            ->update(['avatar' => $main_image_filename]);
            
            echo $main_image_filename;
    	}else{
            echo "no file found";
        }
    }
}
