<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Welcome to Hospital Management</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body, html {
      height: 100%;
      margin: 0;
    }
    /* Full background image with overlay */
    body {
      background: url('{{ asset("hospital/h6.jpg") }}') no-repeat center center fixed;
      background-size: cover;
      position: relative;
    }
    /* Overlay for better text contrast */
    .overlay {
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 0;
    }
    /* Content above overlay */
    .content {
      position: relative;
      z-index: 10;
    }
  </style>
</head>
<body class="flex items-center justify-center min-h-screen text-white px-4">

  <div class="overlay"></div>

  <div class="content max-w-4xl text-center space-y-8">
    <!-- <h1 class="text-5xl font-extrabold drop-shadow-lg">Welcome to Cloud Hospital Management System</h1> -->
     <h1 class="text-5xl font-extrabold drop-shadow-lg">WelCome to
  <span class="text-blue-400">Cloud  Hospital </span>Management System
</h1>

    <p class="text-xl max-w-xl mx-auto drop-shadow-md">Providing you seamless healthcare management at your fingertips.</p>

    <div class="flex justify-center gap-8">
      <a href="{{ route('register.form') }}" 
         class="px-8 py-3 bg-blue-600 hover:bg-blue-700 rounded-full font-semibold transition duration-300 shadow-lg">
         Register
      </a>
      <a href="{{ route('login.form') }}" 
         class="px-8 py-3 border-2 border-white hover:bg-white hover:text-blue-700 rounded-full font-semibold transition duration-300 shadow-lg">
         Login
      </a>
    </div>
  </div>

</body>
</html>
