<?php
include "db.php";

if (isset($_POST['register'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];

    // Validasi konfirmasi password
    if ($password !== $confirm) {
        $error = "Password dan Konfirmasi Password tidak sama!";
    } else {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        // Cek apakah email sudah terdaftar
        $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
        if (mysqli_num_rows($check) > 0) {
            $error = "Email sudah terdaftar, silakan gunakan email lain!";
        } else {
            $sql = "INSERT INTO users (nama, email, password, role) VALUES ('$nama','$email','$passwordHash','user')";
            if (mysqli_query($conn, $sql)) {
                header("Location: login.php?success=1");
                exit;
            } else {
                $error = "Terjadi kesalahan: " . mysqli_error($conn);
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Registrasi ROMI</title>
</head>
<body class="bg-gray-100">

  <div class="flex flex-col md:flex-row h-screen">
    
    <!-- Kiri: Gambar -->
<div class="hidden md:block md:w-1/2 relative">
  <!-- Logo di kiri atas -->
  <div class="absolute top-4 left-4 bg-white bg-opacity-80 px-3 py-2 rounded-lg shadow">
    <img src="ganbar/logo.png" alt="Logo ROMI" class="h-10">
  </div>

  <!-- Gambar background -->
  <img src="ganbar/landing.jpg" alt="ROMI" class="w-full h-full object-cover">
</div>

    <!-- Kanan: Form Registrasi -->
    <div class="w-full md:w-1/2 flex items-center justify-center bg-[#2D5C7F] px-6">
      <div class="bg-[#2D5C7F] text-white w-full max-w-md p-8 rounded-lg shadow-lg">

        <div class="flex justify-center mb-6">
          <div class="w-16 h-16 bg-white text-[#2D5C7F] flex items-center justify-center rounded-full text-2xl">📝</div>
        </div>
        
        <h2 class="text-2xl font-bold text-center mb-6">Daftar Akun ROMI</h2>

        <!-- Error Message -->
        <?php if(isset($error)) echo "<p class='text-red-400 text-sm mb-4 text-center'>$error</p>"; ?>

        <form method="POST" class="space-y-5">
          <!-- Nama -->
          <div class="relative">
            <span class="absolute left-3 top-3 text-gray-400">👤</span>
            <input type="text" name="nama" placeholder="Nama Lengkap" required 
                   class="w-full pl-10 pr-4 py-3 rounded-full text-gray-800 focus:ring-2 focus:ring-teal-400 focus:outline-none">
          </div>
          <!-- Email -->
          <div class="relative">
            <span class="absolute left-3 top-3 text-gray-400">📧</span>
            <input type="email" name="email" placeholder="Email" required 
                   class="w-full pl-10 pr-4 py-3 rounded-full text-gray-800 focus:ring-2 focus:ring-teal-400 focus:outline-none">
          </div>
          <!-- Password -->
          <div class="relative">
            <span class="absolute left-3 top-3 text-gray-400">🔒</span>
            <input type="password" name="password" placeholder="Password" required 
                   class="w-full pl-10 pr-4 py-3 rounded-full text-gray-800 focus:ring-2 focus:ring-teal-400 focus:outline-none">
          </div>
          <!-- Konfirmasi Password -->
          <div class="relative">
            <span class="absolute left-3 top-3 text-gray-400">🔒</span>
            <input type="password" name="confirm_password" placeholder="Ulangi Password" required 
                   class="w-full pl-10 pr-4 py-3 rounded-full text-gray-800 focus:ring-2 focus:ring-teal-400 focus:outline-none">
          </div>

          <!-- Tombol -->
          <button type="submit" name="register" 
            class="w-full bg-white text-[#2D5C7F] py-3 rounded-full font-semibold text-lg hover:bg-gray-200 transition">
            Daftar
          </button>
        </form>

        <!-- Link Login -->
        <p class="text-sm mt-6 text-center">
          Sudah punya akun? 
          <a href="login.php" class="text-teal-300 font-semibold hover:underline">Masuk</a>
        </p>
      </div>
    </div>
  </div>

  <section class="bg-white py-10">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
      <div class="flex flex-col items-center">
        <img src="icon/chart.png" class="w-12 h-12 mb-2" alt="Pantau ROM">
        <p class="font-semibold">Pantau ROM</p>
      </div>
      <div class="flex flex-col items-center">
        <img src="icon/chat.png" class="w-12 h-12 mb-2" alt="Chat Terapis">
        <p class="font-semibold">Chat Terapis Profesional</p>
      </div>
      <div class="flex flex-col items-center">
        <img src="icon/call.png" class="w-12 h-12 mb-2" alt="Customer Service">
        <p class="font-semibold">Customer Service</p>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-[#2D5C7F] text-white py-8">
    <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center justify-between px-6 space-y-6 md:space-y-0">
      <div class="text-center md:text-right">
        <p class="text-sm">Unduh aplikasi ROMI</p>
        <a href="https://www.unduhromi.com" class="font-bold underline">WWW.UNDUHROMI.COM</a>
      </div>
    </div>
  </footer>

</body>
</html>
