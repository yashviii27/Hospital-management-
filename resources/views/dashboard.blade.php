<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Hospital Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#1D4ED8',
            secondary: '#3B82F6',
            accent: '#38BDF8',
            dark: '#0F172A',
            card: 'rgba(255, 255, 255, 0.8)',
          },
          fontFamily: {
            sans: ['Poppins', 'sans-serif']
          },
        }
      }
    }
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    .main-bg {
      background-image: linear-gradient(rgba(15, 23, 42, 0.75), rgba(15, 23, 42, 0.75)),
        url('https://images.unsplash.com/photo-1588776814546-98e26a1085a5?auto=format&fit=crop&w=1600&q=80');
      background-size: cover;
      background-position: center;
    }
  </style>
</head>
<body class="font-sans text-gray-800 main-bg min-h-screen flex flex-col lg:flex-row overflow-x-hidden">

  <!-- Toggle Button (Mobile) -->
  <button id="menuToggle" class="lg:hidden fixed top-4 left-4 z-50 bg-white p-2 rounded-full shadow-lg">
    <i class="fas fa-bars text-primary text-xl"></i>
  </button>

  <!-- Sidebar -->
  <aside id="sidebar" class="w-72 bg-white min-h-screen shadow-xl p-6 fixed top-0 left-0 z-40 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 rounded-tr-3xl rounded-br-3xl flex flex-col justify-between">
    <div>
      <h1 class="text-2xl font-bold text-primary mb-10 flex items-center gap-2">
        <i class="fas fa-hospital text-secondary"></i> Hospital Admin
      </h1>
      <nav class="space-y-4">
        <a href="#" class="flex items-center gap-3 p-3 rounded-lg transition bg-gray-50 hover:bg-primary hover:text-white">
          <i class="fas fa-home"></i> Dashboard
        </a>
        <a href="#" class="flex items-center gap-3 p-3 rounded-lg transition bg-gray-50 hover:bg-primary hover:text-white">
          <i class="fas fa-user-injured"></i> Patients
        </a>
        <a href="#" class="flex items-center gap-3 p-3 rounded-lg transition bg-gray-50 hover:bg-primary hover:text-white">
          <i class="fas fa-calendar-check"></i> Appointments
        </a>
        <a href="#" class="flex items-center gap-3 p-3 rounded-lg transition bg-gray-50 hover:bg-primary hover:text-white">
          <i class="fas fa-user-md"></i> Doctors
        </a>
        <a href="#" class="flex items-center gap-3 p-3 rounded-lg transition bg-gray-50 hover:bg-primary hover:text-white">
          <i class="fas fa-file-medical-alt"></i> Reports
        </a>
      </nav>
    </div>
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button class="mt-8 bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-xl w-full transition flex items-center justify-center gap-2">
        <i class="fas fa-sign-out-alt"></i> Logout
      </button>
    </form>
  </aside>

  <!-- Main Section -->
  <main class="flex-1 lg:ml-72 p-6 sm:p-10 mt-24 lg:mt-0">
    <div class="bg-white/30 backdrop-blur-xl border border-white/20 rounded-3xl p-6 sm:p-10 shadow-xl text-white">

      <!-- Welcome -->
      <div class="mb-8">
        <h1 class="text-3xl sm:text-4xl font-bold">Welcome, <span class="text-accent">{{ Auth::user()->name }}</span> 👋</h1>
        <p class="text-white/80 mt-2 text-lg">Manage hospital activities in one place.</p>
      </div>

      <!-- Dashboard Cards -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-card backdrop-blur-md p-6 rounded-2xl border-l-8 border-blue-500 shadow-md hover:scale-[1.03] transition transform">
          <h3 class="text-lg font-semibold text-gray-700">Total Patients</h3>
          <p class="text-4xl font-bold text-blue-700 mt-1">124</p>
        </div>
        <div class="bg-card backdrop-blur-md p-6 rounded-2xl border-l-8 border-green-500 shadow-md hover:scale-[1.03] transition transform">
          <h3 class="text-lg font-semibold text-gray-700">Appointments Today</h3>
          <p class="text-4xl font-bold text-green-700 mt-1">36</p>
        </div>
        <div class="bg-card backdrop-blur-md p-6 rounded-2xl border-l-8 border-yellow-500 shadow-md hover:scale-[1.03] transition transform">
          <h3 class="text-lg font-semibold text-gray-700">Available Doctors</h3>
          <p class="text-4xl font-bold text-yellow-600 mt-1">12</p>
        </div>
      </div>
    </div>
  </main>

  <!-- Toggle Sidebar -->
  <script>
    const toggleBtn = document.getElementById('menuToggle');
    const sidebar = document.getElementById('sidebar');
    toggleBtn.addEventListener('click', () => {
      sidebar.classList.toggle('-translate-x-full');
    });
  </script>
</body>
</html>
