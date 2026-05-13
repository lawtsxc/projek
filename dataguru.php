<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Sample data for teachers
$teachers = [
    [
        'id' => 1,
        'nama' => 'Miftahul Jannah, S.Akum',
        'nik' => '123456789001',
        'no_hp' => '081234567890',
        'jabatan' => 'Guru Kelas A'
    ],
    [
        'id' => 2,
        'nama' => 'Dewi Zahrotun Nisa\'yah, S.E',
        'nik' => '123456789002',
        'no_hp' => '081234567891',
        'jabatan' => 'Guru Kelas B'
    ],
    [
        'id' => 3,
        'nama' => 'Halimatus Solebah',
        'nik' => '123456789003',
        'no_hp' => '081234567892',
        'jabatan' => 'Kepala Sekolah'
    ],
    [
        'id' => 4,
        'nama' => 'Hadiyya Azzalyah Putri Saltasbila',
        'nik' => '123456789004',
        'no_hp' => '081234567893',
        'jabatan' => 'Guru Agama'
    ]
];

// Search functionality
$search = $_GET['search'] ?? '';
if ($search) {
    $teachers = array_filter($teachers, function($teacher) use ($search) {
        return stripos($teacher['nama'], $search) !== false || 
               stripos($teacher['nik'], $search) !== false;
    });
}

include '../../../App/Layout/header.php';
?>

<div class="page-wrapper">
    <div class="layout-container">
        <?php include '../../../App/Layout/sidebar.php'; ?>
        
        <div class="main-content">
            <div class="content-card">
                <h3 style="font-size: 1rem; font-weight: 800; color: #1e293b; margin-bottom: 15px; display: flex; align-items: center; gap: 8px;">
                    👩‍🏫 Data Guru
                </h3>

                <!-- Search Box -->
                <div style="margin-bottom: 15px;">
                    <form method="GET" style="display: flex; gap: 8px;">
                        <input type="text" name="search" placeholder="Cari Guru..." value="<?php echo htmlspecialchars($search); ?>" 
                               style="flex: 1; padding: 10px 12px; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 0.85rem; font-family: 'Nunito', sans-serif;">
                    </form>
                </div>

                <!-- Data Table -->
                <div style="overflow-x: auto;">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th style="width: 40px;">No</th>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>No HP</th>
                                <th>Jabatan</th>
                                <th style="width: 60px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($teachers)): ?>
                                <tr>
                                    <td colspan="6" style="text-align: center; padding: 20px; color: #94a3b8;">
                                        Tidak ada data guru
                                    </td>
                                </tr>
                            <?php else: ?>
                                <?php $no = 1; foreach($teachers as $teacher): ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo htmlspecialchars($teacher['nama']); ?></td>
                                        <td><?php echo htmlspecialchars($teacher['nik']); ?></td>
                                        <td><?php echo htmlspecialchars($teacher['no_hp']); ?></td>
                                        <td><?php echo htmlspecialchars($teacher['jabatan']); ?></td>
                                        <td>
                                            <div style="display: flex; gap: 5px; align-items: center; justify-content: center;">
                                                <input type="checkbox" style="cursor: pointer;">
                                                <input type="checkbox" style="cursor: pointer;">
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../../App/Layout/footer.php'; ?>
