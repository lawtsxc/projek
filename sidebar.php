<?php
// includes/sidebar.php
// $currentPage = 'dashboard' | 'jadwal' | 'laporan'
$currentPage = isset($currentPage) ? $currentPage : 'dashboard';
?>
<aside class="sidebar">
  <nav>
    <ul class="sidebar-nav">
      <li>
        <a href="dashboard.php" class="<?= $currentPage === 'dashboard' ? 'active' : '' ?>">
          <span class="nav-icon"><i class="fas fa-home"></i></span>
          Dashboard
        </a>
      </li>
      <li>
        <a href="jadwal.php" class="<?= $currentPage === 'jadwal' ? 'active' : '' ?>">
          <span class="nav-icon"><i class="fas fa-calendar-alt"></i></span>
          Jadwal Belajar
        </a>
      </li>
      <li>
        <a href="laporan.php" class="<?= $currentPage === 'laporan' ? 'active' : '' ?>">
          <span class="nav-icon"><i class="fas fa-chart-bar"></i></span>
          Laporan Anak
        </a>
      </li>
    </ul>
    <div class="sidebar-logout">
      <a href="logout.php">
        <i class="fas fa-sign-out-alt"></i>
        Logout
      </a>
    </div>
  </nav>
</aside>
