<?php
// jadwal.php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$pageTitle   = 'Jadwal Belajar';
$currentPage = 'jadwal';
$studentName = $_SESSION['student_name'] ?? 'Ahmad Fauzan Al Farizi';

// =============================================
// TODO: Ambil data jadwal dari database
// Data dummy untuk demo:
// =============================================
$student = [
    'nama'  => 'Ahmad Fauzan Al Farizi',
    'kelas' => 'A',
];

$jadwal_info = [
    'tema'  => 'BINATANG',
    'bulan' => 'April 2026',
];

$jadwal_list = [
    [
        'tanggal'   => '1',
        'bulan'     => 'April',
        'halaman'   => 'Halaman 1',
        'badge'     => 'Mengenal',
        'badge_class'=> 'badge-mengenal',
        'deskripsi' => 'Mengenal berbagai jenis hewan dan habitatnya',
    ],
    [
        'tanggal'   => '2',
        'bulan'     => 'April',
        'halaman'   => 'Halaman 2',
        'badge'     => 'Mewarnai',
        'badge_class'=> 'badge-mewarnai',
        'deskripsi' => 'Mewarnai gambar hewan kesukaanku',
    ],
    [
        'tanggal'   => '3',
        'bulan'     => 'April',
        'halaman'   => 'Halaman 3–4',
        'badge'     => 'Menghitung',
        'badge_class'=> 'badge-menghitung',
        'deskripsi' => 'Menghitung jumlah hewan (kecil, sedang, besar) dan menyusun mencocokkan angka dengan gambar',
    ],
    [
        'tanggal'   => '4',
        'bulan'     => 'April',
        'halaman'   => 'Halaman 5',
        'badge'     => 'Motorik',
        'badge_class'=> 'badge-motorik',
        'deskripsi' => 'Menempel bagian-bagian tubuh hewan sesuai contohnya',
    ],
    [
        'tanggal'   => '5',
        'bulan'     => 'April',
        'halaman'   => 'Outdoor',
        'badge'     => 'Bermain',
        'badge_class'=> 'badge-bermain',
        'deskripsi' => 'Bermain di luar',
    ],
    [
        'tanggal'   => '7',
        'bulan'     => 'April',
        'halaman'   => 'Halaman 6',
        'badge'     => 'Mengenal',
        'badge_class'=> 'badge-mengenal',
        'deskripsi' => 'Mengenal bunyi-bunyi hewan dan menirukan suaranya',
    ],
    [
        'tanggal'   => '8',
        'bulan'     => 'April',
        'halaman'   => 'Halaman 7',
        'badge'     => 'Mewarnai',
        'badge_class'=> 'badge-mewarnai',
        'deskripsi' => 'Mewarnai dan menghias gambar hutan',
    ],
];

include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SIPAUDQU</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
     <div class="layout-container">
    <?php include 'sidebar.php'; ?>

    <main class="main-content">
      <div class="content-card">

        <!-- Welcome Banner -->
        <div class="welcome-banner">
          <h3>🎉 Selamat datang, Bapak/Ibu Wali Murid!</h3>
          <p>Berikut adalah Jadwal kegiatan belajar anak Anda</p>
        </div>

        <!-- Student Info Box -->
        <div class="student-info-box">
          <?= htmlspecialchars($student['nama']) ?>
          <div class="student-class">Kelompok <?= htmlspecialchars($student['kelas']) ?></div>
        </div>

        <!-- Section Title -->
        <div class="section-heading">
          <i class="fas fa-calendar-alt" style="color:#3b82f6;"></i>
          Jadwal Belajar
        </div>
        <p style="font-size:0.8rem; color:#64748b; margin-bottom:15px;">
          Berikut adalah Jadwal kegiatan belajar anak Anda
        </p>

        <!-- Theme Banner -->
        <div class="theme-banner">
          <i class="fas fa-tag" style="color:#f59e0b;"></i>
          <span>Tema Bulan ini : </span>
          <span class="theme-highlight"><?= htmlspecialchars($jadwal_info['tema']) ?></span>
          <span style="margin-left:15px; color:#64748b;">Bulan : <?= htmlspecialchars($jadwal_info['bulan']) ?></span>
        </div>

        <!-- Schedule List -->
        <div class="schedule-list">
          <?php foreach ($jadwal_list as $item): ?>
          <div class="schedule-item">
            <div class="schedule-date">
              <span class="date-num"><?= htmlspecialchars($item['tanggal']) ?></span>
              <?= htmlspecialchars($item['bulan']) ?>
            </div>
            <div class="schedule-info">
              <h5><?= htmlspecialchars($item['halaman']) ?>
                <span class="badge <?= htmlspecialchars($item['badge_class']) ?>"><?= htmlspecialchars($item['badge']) ?></span>
              </h5>
              <p><?= htmlspecialchars($item['deskripsi']) ?></p>
            </div>
          </div>
          <?php endforeach; ?>
        </div>

      </div><!-- .content-card -->
    </main>
  </div><!-- .layout-container -->

<?php include 'footer.php'; ?>
</body>
</html>
