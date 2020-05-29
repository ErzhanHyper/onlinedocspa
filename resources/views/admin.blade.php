<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <title>Admin</title>

   <!-- Fonts -->
   <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
   <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
   {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

</head>
<body>

   <div id="admin">
      <v-app>
         <admin></admin>
      </v-app>
   </div>

   {{-- <script src="{{ asset('js/app.js') }}"></script> --}}

</body>
</html>
