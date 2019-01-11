<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GstModel extends Model
{
    //
    protected $table = 'claims';
    protected $fillable = [
        'user_id', 'gstin_number', 'attachment','claim_status','claim_details','return_amount'
    ];
}
