<?php
// laporan.php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$pageTitle   = 'Laporan Anak';
$currentPage = 'laporan';
$studentName = $_SESSION['student_name'] ?? 'Ahmad Fauzan Al Farizi';

// Tab aktif: absensi | aktivitas | perkembangan
$activeTab = $_GET['tab'] ?? 'absensi';
$allowed_tabs = ['absensi', 'aktivitas', 'perkembangan'];
if (!in_array($activeTab, $allowed_tabs)) {
    $activeTab = 'absensi';
}

// Bulan filter
$selectedBulan = $_GET['bulan'] ?? 'April 2026';

// =============================================
// TODO: Ambil data dari database
// Data dummy untuk demo:
// =============================================
$student = [
    'nama'  => 'Ahmad Fauzan Al Farizi',
    'kelas' => 'A',
];

// --- Data Absensi ---
$rekap_absensi = [
    'hadir' => 18,
    'izin'  => 1,
    'sakit' => 1,
    'alpha' => 0,
];

$detail_absensi = [
    ['no'=>1, 'tanggal'=>'1/4/2026',  'hari'=>'Senin',   'status'=>'Hadir', 'keterangan'=>'-'],
    ['no'=>2, 'tanggal'=>'2/4/2026',  'hari'=>'Selasa',  'status'=>'Hadir', 'keterangan'=>'-'],
    ['no'=>3, 'tanggal'=>'3/4/2026',  'hari'=>'Rabu',    'status'=>'Sakit', 'keterangan'=>'Demam'],
    ['no'=>4, 'tanggal'=>'4/4/2026',  'hari'=>'Kamis',   'status'=>'Hadir', 'keterangan'=>'-'],
    ['no'=>5, 'tanggal'=>'5/4/2026',  'hari'=>'Jum\'at', 'status'=>'Izin',  'keterangan'=>'Keperluan keluarga'],
    ['no'=>6, 'tanggal'=>'7/4/2026',  'hari'=>'Senin',   'status'=>'Hadir', 'keterangan'=>'-'],
    ['no'=>7, 'tanggal'=>'8/4/2026',  'hari'=>'Selasa',  'status'=>'Hadir', 'keterangan'=>'-'],
    ['no'=>8, 'tanggal'=>'9/4/2026',  'hari'=>'Rabu',    'status'=>'Hadir', 'keterangan'=>'-'],
    ['no'=>9, 'tanggal'=>'10/4/2026', 'hari'=>'Kamis',   'status'=>'Hadir', 'keterangan'=>'-'],
    ['no'=>10,'tanggal'=>'11/4/2026', 'hari'=>'Jum\'at', 'status'=>'Hadir', 'keterangan'=>'-'],
];

// --- Data Aktivitas Harian ---
$aktivitas_harian = [
    [
        'no'          => 1,
        'tanggal'     => '1/4/2026',
        'hari'        => 'Senin',
        'kategori'    => 'Mengenal',
        'kategori_class' => 'badge-mengenal',
        'guru'        => 'Bu Miftahul',
        'dokumentasi' => '',
    ],
    [
        'no'          => 2,
        'tanggal'     => '3/4/2026',
        'hari'        => 'Selasa',
        'kategori'    => 'Mewarnai',
        'kategori_class' => 'badge-mewarnai',
        'guru'        => 'Bu Halimatus',
        'dokumentasi' => '',
    ],
    [
        'no'          => 3,
        'tanggal'     => '5/4/2026',
        'hari'        => 'Rabu',
        'kategori'    => 'Menghitung',
        'kategori_class' => 'badge-menghitung',
        'guru'        => 'Bu Miftahul',
        'dokumentasi' => '',
    ],
    [
        'no'          => 4,
        'tanggal'     => '7/4/2026',
        'hari'        => 'Kamis',
        'kategori'    => 'Motorik',
        'kategori_class' => 'badge-motorik',
        'guru'        => 'Bu Halimatus',
        'dokumentasi' => '',
    ],
    [
        'no'          => 5,
        'tanggal'     => '8/4/2026',
        'hari'        => 'Jum\'at',
        'kategori'    => 'Bermain',
        'kategori_class' => 'badge-bermain',
        'guru'        => 'Bu Miftahul',
        'dokumentasi' => '',
    ],
];

// --- Data Perkembangan Anak ---
$perkembangan = [
    [
        'aspek'       => 'Aspek Bahasa',
        'kelas'       => '',
        'deskripsi'   => 'Sudah berani berbicara di depan kelas dan dapat menyebutkan namanya sendiri',
        'icon'        => '💬',
        'card_class'  => '',
    ],
    [
        'aspek'       => 'Aspek Motorik',
        'kelas'       => 'motorik',
        'deskripsi'   => 'Koordinasi tangan semakin baik, dapat memegang pensil dengan benar saat menulis',
        'icon'        => '✏️',
        'card_class'  => 'motorik',
    ],
    [
        'aspek'       => 'Aspek Sosial Emosional',
        'kelas'       => 'sosial',
        'deskripsi'   => 'Mulai bisa berbagi mainan dengan temandannya dan mengikuti aturan bermain bersama',
        'icon'        => '🤝',
        'card_class'  => 'sosial',
    ],
    [
        'aspek'       => 'Aspek Kognitif',
        'kelas'       => 'kognitif',
        'deskripsi'   => 'Mampu mengenal angka 1–10 dan mulai bisa membedakan warna dengan baik',
        'icon'        => '🧠',
        'card_class'  => 'kognitif',
    ],
];

// Status badge helper
function statusBadge(string $status): string {
    $map = [
        'Hadir' => 'status-hadir',
        'Sakit' => 'status-sakit',
        'Izin'  => 'status-izin',
        'Alpha' => 'status-alpha',
    ];
    $class = $map[$status] ?? 'status-alpha';
    return "<span class=\"status-badge {$class}\">{$status}</span>";
}

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
          <p>Informasi laporan absensi, aktivitas dan perkembangan anak Anda</p>
        </div>

        <!-- Student Info Box -->
        <div class="student-info-box">
          <?= htmlspecialchars($student['nama']) ?>
          <div class="student-class">Kelompok <?= htmlspecialchars($student['kelas']) ?></div>
        </div>

        <!-- Section Title -->
        <div class="section-heading">
          <i class="fas fa-chart-bar" style="color:#3b82f6;"></i>
          Laporan Anak
        </div>
        <p style="font-size:0.8rem; color:#64748b; margin-bottom:15px;">
          Informasi laporan absensi, aktivitas dan perkembangan anak Anda
        </p>

        <!-- Tab Navigation -->
        <div class="tab-nav">
          <a href="?tab=absensi&bulan=<?= urlencode($selectedBulan) ?>"
             class="tab-btn <?= $activeTab === 'absensi' ? 'active' : '' ?>">
            Laporan Absensi
          </a>
          <a href="?tab=aktivitas&bulan=<?= urlencode($selectedBulan) ?>"
             class="tab-btn <?= $activeTab === 'aktivitas' ? 'active' : '' ?>">
            Laporan Aktivitas Harian
          </a>
          <a href="?tab=perkembangan&bulan=<?= urlencode($selectedBulan) ?>"
             class="tab-btn <?= $activeTab === 'perkembangan' ? 'active' : '' ?>">
            Laporan Perkembangan Anak
          </a>
        </div>

        <!-- Month Filter -->
        <div class="month-filter">
          <label>Bulan :</label>
          <select onchange="window.location.href='?tab=<?= urlencode($activeTab) ?>&bulan='+this.value">
            <?php
            $bulan_options = ['Januari 2026','Februari 2026','Maret 2026','April 2026','Mei 2026','Juni 2026'];
            foreach ($bulan_options as $opt):
            ?>
              <option value="<?= htmlspecialchars($opt) ?>" <?= $opt === $selectedBulan ? 'selected' : '' ?>>
                <?= htmlspecialchars($opt) ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <!-- ============================
             TAB: LAPORAN ABSENSI
             ============================ -->
        <?php if ($activeTab === 'absensi'): ?>

          <div class="section-heading">Rekap Absensi</div>
          <div class="rekap-grid">
            <div class="rekap-item">
              <div class="rekap-label">Hadir</div>
              <div class="rekap-value" style="color:#16a34a;"><?= $rekap_absensi['hadir'] ?></div>
            </div>
            <div class="rekap-item">
              <div class="rekap-label">Izin</div>
              <div class="rekap-value" style="color:#d97706;"><?= $rekap_absensi['izin'] ?></div>
            </div>
            <div class="rekap-item">
              <div class="rekap-label">Sakit</div>
              <div class="rekap-value" style="color:#dc2626;"><?= $rekap_absensi['sakit'] ?></div>
            </div>
            <div class="rekap-item">
              <div class="rekap-label">Alpha</div>
              <div class="rekap-value" style="color:#4338ca;"><?= $rekap_absensi['alpha'] ?></div>
            </div>
          </div>

          <div class="section-heading">Detail Absensi</div>
          <div style="overflow-x:auto;">
            <table class="data-table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Hari</th>
                  <th>Status</th>
                  <th>Keterangan</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($detail_absensi as $row): ?>
                <tr>
                  <td><?= $row['no'] ?></td>
                  <td><?= htmlspecialchars($row['tanggal']) ?></td>
                  <td><?= htmlspecialchars($row['hari']) ?></td>
                  <td><?= statusBadge($row['status']) ?></td>
                  <td><?= htmlspecialchars($row['keterangan']) ?></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

        <?php endif; ?>

        <!-- ============================
             TAB: AKTIVITAS HARIAN
             ============================ -->
        <?php if ($activeTab === 'aktivitas'): ?>

          <div class="section-heading">Laporan Aktivitas Harian</div>
          <div style="overflow-x:auto;">
            <table class="data-table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Hari</th>
                  <th>Kategori</th>
                  <th>Guru</th>
                  <th>Dokumentasi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($aktivitas_harian as $row): ?>
                <tr>
                  <td><?= $row['no'] ?></td>
                  <td><?= htmlspecialchars($row['tanggal']) ?></td>
                  <td><?= htmlspecialchars($row['hari']) ?></td>
                  <td>
                    <span class="badge <?= htmlspecialchars($row['kategori_class']) ?>">
                      <?= htmlspecialchars($row['kategori']) ?>
                    </span>
                  </td>
                  <td><?= htmlspecialchars($row['guru']) ?></td>
                  <td>
                    <?php if (!empty($row['dokumentasi'])): ?>
                      <a href="<?= htmlspecialchars($row['dokumentasi']) ?>" target="_blank" style="color:#3b82f6; font-weight:700;">
                        <i class="fas fa-image"></i> Lihat
                      </a>
                    <?php else: ?>
                      <span style="color:#94a3b8; font-size:0.75rem;">-</span>
                    <?php endif; ?>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

        <?php endif; ?>

        <!-- ============================
             TAB: PERKEMBANGAN ANAK
             ============================ -->
        <?php if ($activeTab === 'perkembangan'): ?>

          <div class="section-heading">Laporan Perkembangan Anak</div>
          <?php foreach ($perkembangan as $item): ?>
          <div class="dev-aspect-card <?= htmlspecialchars($item['card_class']) ?>">
            <h4><?= $item['icon'] ?> <?= htmlspecialchars($item['aspek']) ?></h4>
            <p><?= htmlspecialchars($item['deskripsi']) ?></p>
          </div>
          <?php endforeach; ?>

        <?php endif; ?>

      </div><!-- .content-card -->
    </main>
  </div><!-- .layout-container -->

<?php include 'footer.php'; ?>
</body>
</html>

