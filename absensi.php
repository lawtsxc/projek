<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Get date from parameter or use today
$current_date = $_GET['date'] ?? date('Y-m-d');
$display_date = date('d/m/Y', strtotime($current_date));
$month_year = date('F Y', strtotime($current_date));

// Sample attendance data
$students = [
    ['id' => 1, 'nama' => 'Ahmad Rifki', 'status' => 'Hadir'],
    ['id' => 2, 'nama' => 'Siti Nurhaliza', 'status' => 'Izin'],
    ['id' => 3, 'nama' => 'Muhammad Iqbal', 'status' => 'Hadir'],
    ['id' => 4, 'nama' => 'Putri Ananda', 'status' => 'Sakit'],
    ['id' => 5, 'nama' => 'Budi Santoso', 'status' => 'Hadir'],
    ['id' => 6, 'nama' => 'Rina Wijaya', 'status' => 'Hadir'],
];

// Calculate attendance summary
$hadir = count(array_filter($students, fn($s) => $s['status'] === 'Hadir'));
$izin = count(array_filter($students, fn($s) => $s['status'] === 'Izin'));
$sakit = count(array_filter($students, fn($s) => $s['status'] === 'Sakit'));
$alpa = count(array_filter($students, fn($s) => $s['status'] === 'Alpa'));

include '../../../App/Layout/header.php';
?>

<div class="page-wrapper">
    <div class="layout-container">
        <?php include '../../../App/Layout/sidebar.php'; ?>
        
        <div class="main-content">
            <div class="content-card">
                <h3 style="font-size: 1rem; font-weight: 800; color: #1e293b; margin-bottom: 15px; display: flex; align-items: center; gap: 8px;">
                    📋 Absensi Siswa
                </h3>

                <!-- Date Header -->
                <div style="background: #f0f9ff; border: 1px solid #bfdbfe; border-radius: 8px; padding: 12px; margin-bottom: 15px; font-size: 0.85rem; font-weight: 700;">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span><?php echo $display_date; ?></span>
                        <span style="color: #64748b;">1 April 2026</span>
                    </div>
                </div>

                <!-- Attendance Summary -->
                <div class="rekap-grid">
                    <div class="rekap-item">
                        <div class="rekap-label">Hadir ✓</div>
                        <div class="rekap-value" style="color: #22c55e;"><?php echo $hadir; ?></div>
                    </div>
                    <div class="rekap-item">
                        <div class="rekap-label">Izin 🟡</div>
                        <div class="rekap-value" style="color: #f59e0b;"><?php echo $izin; ?></div>
                    </div>
                    <div class="rekap-item">
                        <div class="rekap-label">Sakit 🔴</div>
                        <div class="rekap-value" style="color: #ef4444;"><?php echo $sakit; ?></div>
                    </div>
                    <div class="rekap-item">
                        <div class="rekap-label">Alpa 🔵</div>
                        <div class="rekap-value" style="color: #3b82f6;"><?php echo $alpa; ?></div>
                    </div>
                </div>

                <!-- Attendance Table -->
                <div style="overflow-x: auto;">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th style="width: 40px;">No</th>
                                <th>Nama</th>
                                <th colspan="4" style="text-align: center;">Status Kehadiran</th>
                                <th style="width: 60px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach($students as $student): ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo htmlspecialchars($student['nama']); ?></td>
                                    <td style="text-align: center; padding: 8px;">
                                        <button style="padding: 6px 12px; border: none; border-radius: 6px; font-weight: 700; font-size: 0.7rem; cursor: pointer; background: <?php echo $student['status'] === 'Hadir' ? '#22c55e' : '#e2e8f0'; ?>; color: <?php echo $student['status'] === 'Hadir' ? 'white' : '#475569'; ?>;">Hadir</button>
                                    </td>
                                    <td style="text-align: center; padding: 8px;">
                                        <button style="padding: 6px 12px; border: none; border-radius: 6px; font-weight: 700; font-size: 0.7rem; cursor: pointer; background: <?php echo $student['status'] === 'Izin' ? '#f59e0b' : '#e2e8f0'; ?>; color: <?php echo $student['status'] === 'Izin' ? 'white' : '#475569'; ?>;">Izin</button>
                                    </td>
                                    <td style="text-align: center; padding: 8px;">
                                        <button style="padding: 6px 12px; border: none; border-radius: 6px; font-weight: 700; font-size: 0.7rem; cursor: pointer; background: <?php echo $student['status'] === 'Sakit' ? '#ef4444' : '#e2e8f0'; ?>; color: <?php echo $student['status'] === 'Sakit' ? 'white' : '#475569'; ?>;">Sakit</button>
                                    </td>
                                    <td style="text-align: center; padding: 8px;">
                                        <button style="padding: 6px 12px; border: none; border-radius: 6px; font-weight: 700; font-size: 0.7rem; cursor: pointer; background: <?php echo $student['status'] === 'Alpa' ? '#3b82f6' : '#e2e8f0'; ?>; color: <?php echo $student['status'] === 'Alpa' ? 'white' : '#475569'; ?>;">Alpa</button>
                                    </td>
                                    <td style="text-align: center;">
                                        <a href="#" style="color: #3b82f6; text-decoration: none; font-weight: 700; font-size: 0.75rem;">Edit</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../../App/Layout/footer.php'; ?>