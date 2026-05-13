<?php
// dashboard.php
session_start();

// Cek login
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}


$pageTitle   = 'Dashboard';
$currentPage = 'dashboard';
$studentName = $_SESSION['student_name'] ?? 'Ahmad Fauzan Al Farizi';

// =============================================
// TODO: Ambil data dari database
// Data dummy untuk demo:
// =============================================
$student = [
    'nama'          => 'Ahmad Fauzan Al Farizi',
    'nis'           => '1234',
    'tanggal_lahir' => '8 Januari 2021',
    'jenis_kelamin' => 'Laki-laki',
    'alamat'        => 'Jember',
    'orangtua'      => 'Yanto',
    'kelas'         => 'A',
  
];

$absensi_bulan = [
    'bulan' => 'April',
    'hadir' => 18,
    'alpha' => 0,
    'sakit' => 1,
    'izin'  => 1,
];

$aktivitas_terakhir = [
    'tanggal'  => '23',
    'bulan'    => 'April',
    'kegiatan' => 'Bermain',
    'deskripsi'=> 'Bermain balok dan menyusun puzzle',
    'guru'     => 'Bu Miftahul Jannah',
];

$perkembangan_terbaru = [
    'bulan'  => 'April',
    'tahun'  => '2026',
    'aspek'  => 'Aspek Bahasa',
    'catatan'=> 'Sudah mulai berani berbicara di depan kelas',
    'guru'   => 'Bu Halimatus',
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
     <!-- MAIN LAYOUT -->
  <div class="layout-container">
    <?php include 'sidebar.php'; ?>

    <main class="main-content">
      <div class="content-card">

        <!-- Welcome Banner -->
        <div class="welcome-banner">
          <h3>🎉 Selamat datang, Bapak/Ibu Wali Murid!</h3>
          <p>Berikut adalah ringkasan informasi anak Anda</p>
        </div>

        <!-- Student Info Box -->
        <div class="student-info-box">
          <?= htmlspecialchars($student['nama']) ?>
          <div class="student-class">Kelompok <?= htmlspecialchars($student['kelas']) ?></div>
        </div>

        <!-- Dashboard Grid -->
        <div class="dashboard-grid">

          <!-- Biodata Anak -->
          <div class="biodata-card">
            <h4>🌱 Biodata Anak</h4>
            <table class="biodata-table">
              <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?= htmlspecialchars($student['nama']) ?></td>
              </tr>
              <tr>
                <td>NIS</td>
                <td>:</td>
                <td><?= htmlspecialchars($student['nis']) ?></td>
              </tr>
              <tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td><?= htmlspecialchars($student['tanggal_lahir']) ?></td>
              </tr>
              <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td><?= htmlspecialchars($student['jenis_kelamin']) ?></td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><?= htmlspecialchars($student['alamat']) ?></td>
              </tr>
              <tr>
                <td>Orangtua</td>
                <td>:</td>
                <td><?= htmlspecialchars($student['orangtua']) ?></td>
              </tr>
              <tr>
                <td>Kelas</td>
                <td>:</td>
                <td><?= htmlspecialchars($student['kelas']) ?></td>
              </tr>
            </table>
          </div>

          <!-- Ringkasan Absensi -->
          <div class="absensi-card">
            <h4>Ringkasan Absensi Bulan <?= htmlspecialchars($absensi_bulan['bulan']) ?></h4>
            <div class="absensi-grid">
              <div class="absensi-item hadir">
                Hadir : <?= $absensi_bulan['hadir'] ?> Hari
              </div>
              <div class="absensi-item alpha">
                Alpha : <?= $absensi_bulan['alpha'] ?> Hari
              </div>
              <div class="absensi-item sakit">
                Sakit : <?= $absensi_bulan['sakit'] ?> Hari
              </div>
              <div class="absensi-item izin">
                Izin : <?= $absensi_bulan['izin'] ?> Hari
              </div>
            </div>
          </div>

          <!-- Aktivitas Terakhir -->
          <div class="info-card-mini">
            <h4>📅 Aktivitas Terakhir</h4>
            <div class="activity-item">
              <div class="activity-date">
                <span class="day-num"><?= htmlspecialchars($aktivitas_terakhir['tanggal']) ?></span>
                <?= htmlspecialchars($aktivitas_terakhir['bulan']) ?>
              </div>
              <div class="activity-info">
                <h5><?= htmlspecialchars($aktivitas_terakhir['kegiatan']) ?></h5>
                <p><?= htmlspecialchars($aktivitas_terakhir['deskripsi']) ?></p>
                <p class="teacher">Oleh <?= htmlspecialchars($aktivitas_terakhir['guru']) ?></p>
              </div>
            </div>
          </div>

          <!-- Perkembangan Terbaru -->
          <div class="info-card-mini">
            <h4>⭐ Perkembangan Terbaru</h4>
            <div class="dev-item">
              <div class="dev-month"><?= htmlspecialchars($perkembangan_terbaru['bulan']) ?> <?= htmlspecialchars($perkembangan_terbaru['tahun']) ?></div>
              <h5><?= htmlspecialchars($perkembangan_terbaru['aspek']) ?></h5>
              <p><?= htmlspecialchars($perkembangan_terbaru['catatan']) ?></p>
              <p class="teacher" style="margin-top:3px; font-size:0.7rem; color:#94a3b8;">
                Oleh <?= htmlspecialchars($perkembangan_terbaru['guru']) ?>
              </p>
            </div>
          </div>

        </div><!-- .dashboard-grid -->

      </div><!-- .content-card -->
    </main>
  </div><!-- .layout-container -->

<?php include 'footer.php'; ?>
</body>
</html>
