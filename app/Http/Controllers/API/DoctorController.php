<?php

namespace App\Http\Controllers\API;

use App\Doctor;
use App\Specialization;
use App\Qualification;
use App\Language;
use App\Facades\Paginator;

use Storage;
use File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DoctorController extends Controller
{
   /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

   public function get_doctors(){

      $all_doctors = request('all_doctors');
      $online_consultation = request('online_doctors');
      $offline_consultation = request('offline_doctors');
      $service = null;

      $doctors = Doctor::all();

      if($online_consultation){
         $doctors = Doctor::where('service_id', 'like', 1)->get();
      }elseif($offline_consultation){
         $doctors = Doctor::where('service_id', 'like', 2)->get();
      }

      $specializations = Specialization::all();
      $doctors_online = [];
      $languages = Language::all();

      foreach ($doctors as $doctor) {
         $experience = null;
         $specialization_arr = [];
         $languages_arr = [];

         $photo = asset('img/' . '/logo1430.png');
         $doctor_photo = $doctor->user['photo'];
         if($doctor_photo != null && Storage::disk('public')->path('user_photo/'.$doctor_photo) ){
            $photo ='/storage/user_photo/'.$doctor_photo;
         }

         foreach ($specializations as $specialization){

            if(is_array(json_decode($doctor->specialization_id))){

               foreach (json_decode($doctor->specialization_id) as $spec){
                  if($specialization->id == $spec){
                     $specialization_arr[] = $specialization->name;
                  }
               }

            }else{

               if($specialization->id == $doctor->specialization_id){
                  $specialization_arr[] = $specialization->name;
               }

            }
         }

         foreach ($languages as $language){
            if(is_array(json_decode($doctor->language_id))){
               foreach (json_decode($doctor->language_id) as $lang){
                  if($language->id == $lang){
                     $languages_arr[] = $language->name;
                  }
               }
            }else{
               if($language->id == $doctor->language_id){
                  $languages_arr[] = $language->name;
               }
            }
         }


         if(is_array(json_decode($doctor->experience))){
            $year = intval(json_decode($doctor->experience)['0']);
            if(!empty(json_decode($doctor->experience)['1'])){
               $month = intval(json_decode($doctor->experience)['1']);
            }else{
               $month = '';
            }
         }

         if($doctor->experience != null){
            if($year == '0'){
               $experience = 'до 1 года';
            }else{
               $experience = $year;
               if($year == 1){
                  $experience .= ' год';
               }
               elseif($year > 1 && $year < 5){
                  $experience .= ' года';
               }
               elseif($year >= 5){
                  $experience .= ' лет';
               }else{
                  $experience .= '';
               }
               if($month != 0 && $month != null){
                  $experience .= ' '. $month;
                  $experience .= ' мес.';
               }else{
                  $experience .= '';
               }
            }
         }else{
            $experience .= ' Без опыта';
         }



         $doctors_online[] = [
            'id' => $doctor->id,
            'specialization' => rtrim(implode(', ', $specialization_arr), ','),
            'profile' => $doctor->category['name'],
            'qualification' => $doctor->qualifications['name'],
            'experience' => $experience,
            'fullname' => $doctor->user['lastname'] . ' ' . $doctor->user['firstname'] . ' ' . $doctor->user['middlename'],
            'lang' => rtrim(implode(', ', $languages_arr), ','),
            'photo' => $photo,
            'online_consultation_price' => number_format(60000, 0, '.', ' ') . ' тг.',
            'offline_consultation_price' => number_format(2000, 0, '.', ' ') . ' тг.',
            'online_consultation_period' => '40 мин.',
            'offline_consultation_period' => '15 мин.',
         ];

      }
      $data = collect($doctors_online);

      return response()->json($data);
   }

   public function index()
   {
      //
   }

   /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function create()
   {
      //
   }

   /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
   public function store(Request $request)
   {
      //
   }

   /**
   * Display the specified resource.
   *
   * @param  \App\Doctor  $doctor
   * @return \Illuminate\Http\Response
   */
   public function show(Doctor $doctor)
   {
      //
   }

   /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Doctor  $doctor
   * @return \Illuminate\Http\Response
   */
   public function edit(Doctor $doctor)
   {
      //
   }

   /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Doctor  $doctor
   * @return \Illuminate\Http\Response
   */
   public function update(Request $request, Doctor $doctor)
   {
      //
   }

   /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Doctor  $doctor
   * @return \Illuminate\Http\Response
   */
   public function destroy(Doctor $doctor)
   {
      //
   }
}
