<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use DB;
use Auth;
use Image;
use Storage;
use App\Doctor;

class AuthController extends Controller{

   public function register(){


      $role = null;

      if(request('utype') == 'doctor'){
         $role = 3;
      }else{
         $role = 4;
      }

      $photo = request('photo');
      $photo_name = '';
      if ($photo != '') {
         $image = Image::make($photo);
         $mime = $image->mime();
         $extension = explode('/', $mime)[1];
         $path = "user_photo/" ;
         if (!is_writable(storage_path('public/'.$path))) {
            Storage::makeDirectory('public/'.$path, true);
         }
         $photo_name = "profile_photo_".substr(time(), 5) . "." . $extension;

         $image->save(storage_path('app/public/'.$path. "/" .$photo_name));
      }


      $user = User::create([
         'lastname' => request('lastname'),
         'firstname' => request('firstname'),
         'middlename' => request('middlename'),

         'city_id' => request('city'),

         'photo' => $photo_name,

         'email' => request('email'),
         'role_id' => $role,
         'password' => bcrypt(request('password'))
      ]);

      if($user){
         $doctor = Doctor::create([
            'user_id' => $user->id,
            'clinic_id' => request('clinic'),
            'specialization_id' => request('specialization'),
            'qualification_id' => request('qualification'),
            'category_id' => request('category'),
            'experience' => ['1', '2'],
            'agreement' => true,
            'service_id' => '1',
         ]);
      }
      // Если пользователь с таким email адресом найден - проверим совпадает
      // ли его пароль с указанным
      if (!Hash::check(request('password'), $user->password)) {
         return response()->json([
            'message' => 'Wrong email or password',
            'status' => 422
         ], 422);
      }

      // Внутренний API запрос для получения токенов
      $client = DB::table('oauth_clients')
      ->where('password_client', true)
      ->first();

      // Убедимся, что Password Client существует в БД (т.е. Laravel Passport
      // установлен правильно)
      if (!$client) {
         return response()->json([
            'message' => 'Laravel Passport is not setup properly.',
            'status' => 500
         ], 500);
      }

      $data = [
         'grant_type' => 'password',
         'client_id' => $client->id,
         'client_secret' => $client->secret,
         'username' => request('email'),
         'password' => request('password'),
      ];

      $request = Request::create('/oauth/token', 'POST', $data);

      $response = app()->handle($request);

      // Проверяем был ли внутренний запрос успешным
      if ($response->getStatusCode() != 200) {
         return response()->json([
            'message' => 'Wrong email or password',
            'status' => 422
         ], 422);
      }

      // Вытаскиваем данные из ответа
      $data = json_decode($response->getContent());



      // Формируем окончательный ответ в нужном формате
      return response()->json([
         'token' => $data->access_token,
         'user' => $user,
         'status' => 200,
         'err'=> request('specialization')
      ]);

   }


   public function login(){
      // Проверяем существует ли пользователь с указанным email адресом
      $user = User::whereEmail(request('username'))->first();

      if (!$user) {
         return response()->json([
            'message' => 'Wrong email or password',
            'status' => 422
         ], 422);
      }

      // Если пользователь с таким email адресом найден - проверим совпадает
      // ли его пароль с указанным
      if (!Hash::check(request('password'), $user->password)) {
         return response()->json([
            'message' => 'Wrong email or password',
            'status' => 422
         ], 422);
      }

      // Внутренний API запрос для получения токенов
      $client = DB::table('oauth_clients')
      ->where('password_client', true)
      ->first();

      // Убедимся, что Password Client существует в БД (т.е. Laravel Passport
      // установлен правильно)
      if (!$client) {
         return response()->json([
            'message' => 'Laravel Passport is not setup properly.',
            'status' => 500
         ], 500);
      }

      $data = [
         'grant_type' => 'password',
         'client_id' => $client->id,
         'client_secret' => $client->secret,
         'username' => request('username'),
         'password' => request('password'),
      ];

      $request = Request::create('/oauth/token', 'POST', $data);

      $response = app()->handle($request);

      // Проверяем был ли внутренний запрос успешным
      if ($response->getStatusCode() != 200) {
         return response()->json([
            'message' => 'Wrong email or password',
            'status' => 422
         ], 422);
      }

      // Вытаскиваем данные из ответа
      $data = json_decode($response->getContent());

      // Формируем окончательный ответ в нужном формате
      return response()->json([
         'token' => $data->access_token,
         'user' => $user,
         'status' => 200
      ]);
   }


   public function logout(){
      $accessToken = auth()->user()->token();

      $refreshToken = DB::table('oauth_refresh_tokens')
      ->where('access_token_id', $accessToken->id)
      ->update([
         'revoked' => true
      ]);

      $accessToken->revoke();

      return response()->json(['status' => 200]);
   }


   public function getUser(){
      return auth()->user();
   }


}
