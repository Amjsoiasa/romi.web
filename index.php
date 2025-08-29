<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>ROMI - Kesehatan dari Rumah</title>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

  <!-- Hero Section -->
  <section class="flex flex-col md:flex-row h-screen">
    
    <!-- Gambar Kiri -->
<div class="hidden md:block md:w-1/2 relative">
  <!-- Logo di kiri atas -->
  <div class="absolute top-4 left-4 bg-white bg-opacity-80 px-3 py-2 rounded-lg shadow">
    <img src="ganbar/logo.png" alt="Logo ROMI" class="h-10">
  </div>

  <!-- Gambar background -->
  <img src="ganbar/landing.jpg" alt="ROMI" class="w-full h-full object-cover">
</div>

    <!-- Konten Kanan -->
    <div class="md:w-1/2 w-full flex flex-col justify-center px-10 bg-[#2D5C7F] text-white">
      <h1 class="text-3xl md:text-4xl font-bold mb-6 leading-snug">
        Merangkai Kesehatan Dari Rumah!
      </h1>
      <p class="text-base md:text-lg leading-relaxed mb-8">
        Nikmati kemudahan konsultasi medis dari rumah dengan ROMI. 
        Layanan telemedicine kami memungkinkan Anda bertemu dengan 
        terapis profesional melalui video call aman. 
        Dapatkan perawatan terbaik tanpa harus meninggalkan kenyamanan rumah Anda.
     </p>
    </div>
  </section>

  <!-- Fitur Section -->
  <section class="bg-white py-12">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
      <div class="flex flex-col items-center">
        <div class="text-4xl mb-3">📊</div>
        <p class="font-semibold">Pantau ROM</p>
      </div>
      <div class="flex flex-col items-center">
        <div class="text-4xl mb-3">💬</div>
        <p class="font-semibold">Chat Terapis Profesional</p>
      </div>
      <div class="flex flex-col items-center">
        <div class="text-4xl mb-3">📞</div>
        <p class="font-semibold">Customer Service</p>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-[#2D5C7F] text-white py-8">
    <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center justify-between px-6 space-y-4 md:space-y-0">
      <a href="register.php" 
         class="bg-teal-500 hover:bg-teal-600 px-6 py-3 rounded-lg shadow-md font-semibold transition">
        Daftar Sekarang
      </a>
      <div class="text-center md:text-right">
        <p class="text-sm mb-2">Unduh aplikasi ROMI</p>
        <a href="https://www.unduhromi.com" class="font-bold underline">WWW.UNDUHROMI.COM</a>
      </div>
    </div>
  </footer>

</body>
</html>
