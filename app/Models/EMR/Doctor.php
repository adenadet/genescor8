<?php

namespace App\Models\EMR;

use Illuminate\Database\Eloquent\Model;
use App\Models\Structure;

class Doctor extends Structure
{
    protected $primaryKey = 'id';
    protected $table = 'emr_doctors';
    protected $fillable = array('user_id', 'hospital_id', 'annual_license_number', 'license_expiry', 'confirmed_by', 'confirmed_at', 'created_by', 'created_at', 'updated_at', 'deleted_at', 'deleted_by');

    public function details(){
    	return $this->belongsTo('App\Models\User', 'user_id', 'id');
	}

    public function hospital(){
    	return $this->belongsTo('App\Models\EMR\Hospital', 'hospital_id', 'id');
	}
}
