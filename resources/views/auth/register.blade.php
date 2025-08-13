<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Hospital Register</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    input, button, img, a {
      transition: all 0.3s ease;
    }

    .shine-card {
      position: relative;
      overflow: hidden;
      z-index: 0;
    }

    .shine-card::before {
      content: "";
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: linear-gradient(
        120deg,
        rgba(255, 255, 255, 0) 30%,
        rgba(255, 255, 255, 0.3) 50%,
        rgba(255, 255, 255, 0) 70%
      );
      transform: rotate(25deg);
      animation: shine 3s infinite;
      z-index: 1;
    }

    @keyframes shine {
      0% {
        transform: translateX(-100%) rotate(25deg);
      }
      100% {
        transform: translateX(100%) rotate(25deg);
      }
    }

    .shine-card > * {
      position: relative;
      z-index: 2;
    }
  </style>
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-br from-blue-50 to-blue-100 px-4">

  <div class="shine-card flex flex-col md:flex-row w-full max-w-5xl bg-white rounded-3xl shadow-xl overflow-hidden">
    
    <!-- Image Side -->
    <div class="md:w-1/2 h-64 md:h-auto group overflow-hidden">
      <img src="{{ asset('hospital/h3.jpg') }}" alt="Hospital"
           class="w-full h-full object-cover group-hover:scale-105 duration-500">
    </div>

    <!-- Form Side -->
    <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-center">
      <h2 class="text-3xl font-bold text-blue-800 text-center md:text-left mb-6">Patient Registration</h2>
      <form method="POST" action="{{ route('register') }}" class="space-y-5" onsubmit="return checkPasswords()">
        @csrf
        <input type="text" name="name" placeholder="Full Name" required
               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 hover:shadow-md hover:bg-blue-50">
        
        <input type="email" name="email" placeholder="Email" required
               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 hover:shadow-md hover:bg-blue-50">
        
        <!-- Password with toggle -->
        <div class="relative">
          <input type="password" name="password" id="password" placeholder="Password" required
                 class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 hover:shadow-md hover:bg-blue-50">
          <button type="button" onclick="togglePassword('password', this)"
                  class="absolute inset-y-0 right-3 flex items-center text-sm text-blue-500 hover:text-blue-700">
            👁️
          </button>
        </div>

        <!-- Confirm Password with toggle -->
        <div class="relative">
          <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required
                 class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 hover:shadow-md hover:bg-blue-50">
          <button type="button" onclick="togglePassword('password_confirmation', this)"
                  class="absolute inset-y-0 right-3 flex items-center text-sm text-blue-500 hover:text-blue-700">
            👁️
          </button>
        </div>

        <!-- Error Message -->
        <p id="password-error" class="text-red-500 text-sm hidden">Passwords do not match.</p>

        <button type="submit"
                class="w-full bg-blue-600 text-white font-semibold py-3 rounded-lg hover:bg-blue-700 hover:scale-[1.02] transition transform duration-200">
          Register
        </button>
      </form>
      <p class="mt-5 text-center text-sm text-gray-600">
        Already have an account?
        <a href="{{ route('login.form') }}"
           class="text-blue-600 hover:text-blue-800 hover:underline transition duration-200 font-medium">
          Login
        </a>
      </p>
    </div>
  </div>

  <!-- Scripts -->
  <script>
    function togglePassword(fieldId, button) {
      const input = document.getElementById(fieldId);
      const isPassword = input.type === "password";
      input.type = isPassword ? "text" : "password";
      button.textContent = isPassword ? "🙈" : "👁️";
    }

    function checkPasswords() {
      const password = document.getElementById('password').value;
      const confirm = document.getElementById('password_confirmation').value;
      const errorText = document.getElementById('password-error');

      if (password !== confirm) {
        errorText.classList.remove('hidden');
        return false;
      } else {
        errorText.classList.add('hidden');
        return true;
      }
    }
  </script>

</body>
</html>
