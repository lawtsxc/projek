<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Sample data for students
$students = [
    [
        'id' => 1,
        'nama' => 'Ahmad Rifki',
        'nis' => '001',
        'tgl_lahir' => '2020-05-15',
        'jenis_kelamin' => 'Laki-laki',
        'alamat' => 'Jl. Merdeka No. 123',
        'orang_tua' => 'Bapak Sugiyono'
    ],
    [
        'id' => 2,
        'nama' => 'Siti Nurhaliza',
        'nis' => '002',
        'tgl_lahir' => '2020-08-22',
        'jenis_kelamin' => 'Perempuan',
        'alamat' => 'Jl. Sudirman No. 45',
        'orang_tua' => 'Ibu Siti'
    ],
    [
        'id' => 3,
        'nama' => 'Muhammad Iqbal',
        'nis' => '003',
        'tgl_lahir' => '2020-03-10',
        'jenis_kelamin' => 'Laki-laki',
        'alamat' => 'Jl. Gatot Subroto No. 78',
        'orang_tua' => 'Bapak Ahmad'
    ],
    [
        'id' => 4,
        'nama' => 'Putri Ananda',
        'nis' => '004',
        'tgl_lahir' => '2020-11-05',
        'jenis_kelamin' => 'Perempuan',
        'alamat' => 'Jl. Ahmad Yani No. 32',
        'orang_tua' => 'Ibu Dewi'
    ],
    [
        'id' => 5,
        'nama' => 'Budi Santoso',
        'nis' => '005',
        'tgl_lahir' => '2020-07-18',
        'jenis_kelamin' => 'Laki-laki',
        'alamat' => 'Jl. Imam Bonjol No. 67',
        'orang_tua' => 'Bapak Santoso'
    ]
];

// Search functionality
$search = $_GET['search'] ?? '';
if ($search) {
    $students = array_filter($students, function($student) use ($search) {
        return stripos($student['nama'], $search) !== false || 
               stripos($student['nis'], $search) !== false;
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
                    😊 Data Siswa
                </h3>

                <!-- Search Box -->
                <div style="margin-bottom: 15px;">
                    <form method="GET" style="display: flex; gap: 8px;">
                        <input type="text" name="search" placeholder="Cari Data Siswa..." value="<?php echo htmlspecialchars($search); ?>" 
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
                                <th>NIS</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Orang Tua</th>
                                <th style="width: 60px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($students)): ?>
                                <tr>
                                    <td colspan="8" style="text-align: center; padding: 20px; color: #94a3b8;">
                                        Tidak ada data siswa
                                    </td>
                                </tr>
                            <?php else: ?>
                                <?php $no = 1; foreach($students as $student): ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo htmlspecialchars($student['nama']); ?></td>
                                        <td><?php echo htmlspecialchars($student['nis']); ?></td>
                                        <td><?php echo date('d-m-Y', strtotime($student['tgl_lahir'])); ?></td>
                                        <td><?php echo htmlspecialchars($student['jenis_kelamin']); ?></td>
                                        <td><?php echo htmlspecialchars($student['alamat']); ?></td>
                                        <td><?php echo htmlspecialchars($student['orang_tua']); ?></td>
                                        <td>
                                            <a href="#" style="color: #3b82f6; text-decoration: none; font-weight: 700; font-size: 0.75rem;">Edit</a>
                                            <span style="color: #cbd5e1;"> | </span>
                                            <a href="#" style="color: #ef4444; text-decoration: none; font-weight: 700; font-size: 0.75rem;">Hapus</a>
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
