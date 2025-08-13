<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Hospital Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    input, button, a, img {
      transition: all 0.3s ease;
    }
  </style>
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-br from-blue-50 to-blue-100 px-4">

  <div class="flex flex-col-reverse md:flex-row w-full max-w-5xl bg-white rounded-3xl shadow-lg overflow-hidden">
    
    <!-- Form Side (Left) -->
    <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-center">
      <h2 class="text-3xl font-bold text-blue-800 text-center md:text-left mb-6">Welcome to Login</h2>

      <!-- Display Error Message -->
      @if (session('error'))
        <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-700 rounded-lg text-center">
          {{ session('error') }}
        </div>
      @endif

      <!-- Display Validation Errors -->
      @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-700 rounded-lg text-sm">
          <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      
      <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf
        <input type="email" name="email" placeholder="Email" required
          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 hover:shadow-md hover:bg-blue-50">
        
        <input type="password" name="password" placeholder="Password" required
          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 hover:shadow-md hover:bg-blue-50">

        <button type="submit"
          class="w-full bg-blue-600 text-white font-semibold py-3 rounded-lg hover:bg-blue-700 hover:scale-[1.02] transition transform duration-200">
          Login
        </button>
      </form>

      <p class="mt-5 text-center text-sm text-gray-600">
        Don’t have an account?
        <a href="{{ route('register.form') }}" class="text-blue-600 hover:text-blue-800 hover:underline font-medium">
          Register
        </a>
      </p>
    </div>

    <!-- Image Side (Right) -->
    <div class="w-full md:w-1/2 h-64 md:h-auto group overflow-hidden">
      <img src="{{ asset('hospital/h4.jpg') }}" alt="Hospital"
           class="w-full h-full object-cover group-hover:scale-105 duration-500">
    </div>

  </div>

</body>
</html>
