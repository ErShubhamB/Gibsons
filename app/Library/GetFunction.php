<?php
namespace App\Library;
use Session;
use DB;
use App\User;
use App\GstModel;
class GetFunction{
	
	public static function userById($user_id){
		$user_data = User::where('id',$user_id)->get()->first();
		return	$user_data->name;
	}	
}