<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GstModel;
use Auth;
use Carbon\Carbon;
class GstController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function listClaims(){
    	$user_id = Auth::user()->id;
    	$claims = GstModel::where('user_id',$user_id)
                            ->whereNull('deleted_at')
                            ->orderBy('created_at','desc')
                            ->get();
    	// dd($claims);
    	return view('pages.claims-list')
    			->with('claims',$claims);
    }

    public function createClaims(Request $request){
        // dd(Carbon::now()->timestamp);
        if($request->hasFile('file')){
            $avatar = $request->file('file');
            $main_image_filename = $avatar->getClientOriginalName();
            $avatar->move(public_path('uploads'), $main_image_filename);
        }
        $claims = new GstModel;
        $claims['gstin_number'] = $request->input('gstin');
        $claims['claim_details'] = $request->input('claim_details');
        $claims['return_amount'] = $request->input('claimAmount');
        $claims['attachment'] = $main_image_filename;
        $claims['user_id'] = Auth::user()->id;
        if($claims->save()){
            $resp[] = array("status"=>200); 
        }else{
            $resp[] = array("status"=>500); 

        }
        return json_encode($resp);
    }

    public function viewCreateClaim(){
        return view('pages.create-claim');
    }
}
