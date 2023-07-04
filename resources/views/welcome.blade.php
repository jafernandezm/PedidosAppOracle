<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <div class="bg-gray-200">
    <div class="flex justify-center items-center h-screen">
      <form class="w-1/3 p-6 bg-orange-200 rounded shadow-md" method="POST" action="{{ route('login') }}">
          @csrf
          <div class="mb-4">
              <label for="email" class="block mb-2 text-sm font-medium text-gray-600">Email</label>
              <input type="email" name="email" id="email" class="w-full p-2 border border-gray-300 rounded">
          </div>
          <div class="mb-4">
              <label for="password" class="block mb-2 text-sm font-medium text-gray-600">Contraseña</label>
              <input type="password" name="password" id="password" class="w-full p-2 border border-gray-300 rounded">
          </div>
          <div class="mb-4">
              <button type="submit" class="w-full p-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600">Iniciar sesión</button>
          </div>
          {{-- poner un mensaje con message --}}
          @if(session()->has('message'))
          <div class="alert alert-success">
              {{ session()->get('message') }}
          </div>
          @endif
      </form>
    </div>
  </div>
  

</body>
</html>