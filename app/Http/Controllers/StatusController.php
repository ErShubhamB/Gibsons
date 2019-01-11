<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GstModel;
class StatusController extends Controller
{
    //
    public function updateStatus(Request $request){
    	$status =1;
    	if($request->input('mode') == 'p'){
    		$status = 1;
    	}else if($request->input('mode') == 's'){
    		$status = 2;
    	}else if($request->input('mode') == 'r'){
    		$status = 3;
    	}
    	$res = GstModel::where('id',$request->input('id'))
    			->update(['claim_status'=>$status]);

    	if($res){
    		$resp[] = array('status'=>200);
    	}else{
    		$resp[] = array('status'=>500);

    	}
    	return json_encode($resp);
    }
}
