<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Dashboard ROMI</title>
</head>
<body class="bg-gray-100 min-h-screen">
  <nav class="bg-blue-700 text-white p-4 flex justify-between">
    <h1 class="font-bold text-lg">ROMI - Kesehatan Digital</h1>
    <div>
      <span class="mr-4">Halo, <?= $_SESSION['user']; ?>!</span>
      <a href="logout.php" class="bg-red-500 px-3 py-1 rounded">Logout</a>
    </div>
  </nav>
  <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-6">
    <a href="konsultasi.php" class="p-6 bg-white rounded-xl shadow hover:bg-blue-50">📹 Konsultasi Video</a>
    <a href="video.php" class="p-6 bg-white rounded-xl shadow hover:bg-blue-50">🎥 Perpustakaan Video</a>
    <a href="paket.php" class="p-6 bg-white rounded-xl shadow hover:bg-blue-50">💳 Paket Layanan</a>
  </div>
</body>
</html>
