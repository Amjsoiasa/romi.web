<?php
session_start();
include "db.php";
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['nama'];
        $_SESSION['role'] = $user['role'];

        if ($user['role'] == 'admin') {
            header("Location: admin/index.php");
        } else {
            header("Location: dashboard.php");
        }
        exit;
    } else {
        $error = "Email atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Login ROMI</title>
</head>
<body class="bg-gray-100">

  <!-- Hero Section -->
  <div class="flex flex-col md:flex-row h-screen">
    
<div class="hidden md:block md:w-1/2 relative">
  <!-- Logo di kiri atas -->
  <div class="absolute top-4 left-4 bg-white bg-opacity-80 px-3 py-2 rounded-lg shadow">
    <img src="ganbar/logo.png" alt="Logo ROMI" class="h-10">
  </div>

  <!-- Gambar background -->
  <img src="ganbar/landing.jpg" alt="ROMI" class="w-full h-full object-cover">
</div>

    <!-- Kanan: Card Form -->
    <div class="w-full md:w-1/2 flex items-center justify-center bg-[#2D5C7F] px-6">
      <div class="bg-[#2D5C7F] text-white w-full max-w-md p-8 rounded-lg shadow-lg">
        <div class="flex justify-center mb-6">
          <div class="w-16 h-16 bg-white text-[#2D5C7F] flex items-center justify-center rounded-full text-2xl">👤</div>
        </div>
        <h2 class="text-2xl font-bold text-center mb-6">Masuk ke ROMI</h2>

        <?php if(isset($error)) echo "<p class='text-red-400 text-sm mb-4 text-center'>$error</p>"; ?>
        <?php if(isset($_GET['success'])) echo "<p class='text-green-400 text-sm mb-4 text-center'>Registrasi berhasil, silakan login.</p>"; ?>

        <form method="POST" class="space-y-5">
          <div class="relative">
            <span class="absolute left-3 top-3 text-gray-400">📧</span>
            <input type="email" name="email" placeholder="Alamat email" required 
                   class="w-full pl-10 pr-4 py-3 rounded-full text-gray-800 focus:ring-2 focus:ring-teal-400 focus:outline-none">
          </div>
          <div class="relative">
            <span class="absolute left-3 top-3 text-gray-400">🔒</span>
            <input type="password" name="password" placeholder="Kata sandi" required 
                   class="w-full pl-10 pr-4 py-3 rounded-full text-gray-800 focus:ring-2 focus:ring-teal-400 focus:outline-none">
          </div>
          <button type="submit" name="login" 
            class="w-full bg-white text-[#2D5C7F] py-3 rounded-full font-semibold text-lg hover:bg-gray-200 transition">
            Masuk
          </button>
        </form>

        <p class="text-sm mt-6 text-center">
          Belum punya akun? 
          <a href="register.php" class="text-teal-300 font-semibold hover:underline">Daftar</a>
        </p>
      </div>
    </div>
  </div>

  <!-- Fitur Section -->
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
