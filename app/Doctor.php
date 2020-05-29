<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
   protected $fillable = [
      'user_id',
      'service_id',
      'specialization_id',
      'qualification_id',
      'category_id',
      'clinic_id',
      'description',
      'experience',
      'video',
      'gender',
      'position',
      'agreement',
   ];

   public function user(){
      return $this->belongsTo('App\User');
   }

   public function city(){
      return $this->belongsTo('App\City');
   }

   public function qualifications(){
      return $this->belongsTo('App\Qualification', 'qualification_id', 'id');
   }

   public function category(){
      return $this->belongsTo('App\Category');
   }

   public function specialization(){
      return $this->belongsTo('App\Specialization');
   }

   public function clinic(){
      return $this->belongsTo('App\Clinic');
   }
}
