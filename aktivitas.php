<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

include '../../../App/Layout/header.php';
?>

<div class="page-wrapper">
    <div class="layout-container">
        <?php include '../../../App/Layout/sidebar.php'; ?>
        
        <div class="main-content">
            <div class="content-card">
                <h3 style="font-size: 1rem; font-weight: 800; color: #1e293b; margin-bottom: 15px; display: flex; align-items: center; gap: 8px;">
                    🎨 Aktivitas Harian
                </h3>

                <!-- Input Aktivitas Form -->
                <form method="POST" enctype="multipart/form-data">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
                        <!-- Tanggal -->
                        <div>
                            <label style="font-size: 0.8rem; font-weight: 700; color: #1e293b; display: block; margin-bottom: 5px;">Tanggal</label>
                            <input type="date" name="tanggal" style="width: 100%; padding: 10px 12px; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 0.85rem; font-family: 'Nunito', sans-serif;">
                        </div>

                        <!-- Nama Siswa -->
                        <div>
                            <label style="font-size: 0.8rem; font-weight: 700; color: #1e293b; display: block; margin-bottom: 5px;">Nama Siswa</label>
                            <input type="text" name="nama_siswa" placeholder="Pilih Siswa..." style="width: 100%; padding: 10px 12px; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 0.85rem; font-family: 'Nunito', sans-serif;">
                        </div>
                    </div>

                    <!-- Jenis Kegiatan -->
                    <div style="margin-bottom: 15px;">
                        <label style="font-size: 0.8rem; font-weight: 700; color: #1e293b; display: block; margin-bottom: 5px;">Jenis Kegiatan</label>
                        <input type="text" name="jenis_kegiatan" placeholder="Contoh: Mewarnai, Bermain..." style="width: 100%; padding: 10px 12px; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 0.85rem; font-family: 'Nunito', sans-serif;">
                    </div>

                    <!-- Kategori -->
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
                        <div>
                            <label style="font-size: 0.8rem; font-weight: 700; color: #1e293b; display: block; margin-bottom: 5px;">Kategori</label>
                            <select name="kategori" style="width: 100%; padding: 10px 12px; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 0.85rem; font-family: 'Nunito', sans-serif;">
                                <option>-- Pilih Kategori --</option>
                                <option>Seni</option>
                                <option>Motorik</option>
                                <option>Kognitif</option>
                                <option>Sosial</option>
                            </select>
                        </div>

                        <!-- Guru Pengajar -->
                        <div>
                            <label style="font-size: 0.8rem; font-weight: 700; color: #1e293b; display: block; margin-bottom: 5px;">Guru Pengajar</label>
                            <input type="text" name="guru_pengajar" placeholder="Pilih Guru..." style="width: 100%; padding: 10px 12px; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 0.85rem; font-family: 'Nunito', sans-serif;">
                        </div>
                    </div>

                    <!-- Catatan Khusus -->
                    <div style="margin-bottom: 15px;">
                        <label style="font-size: 0.8rem; font-weight: 700; color: #1e293b; display: block; margin-bottom: 5px;">Catatan Khusus</label>
                        <textarea name="catatan_khusus" rows="4" placeholder="Tulis catatan..." style="width: 100%; padding: 10px 12px; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 0.85rem; font-family: 'Nunito', sans-serif; resize: vertical;"></textarea>
                    </div>

                    <!-- Upload Dokumentasi -->
                    <div style="margin-bottom: 15px;">
                        <label style="font-size: 0.8rem; font-weight: 700; color: #1e293b; display: block; margin-bottom: 5px;">Upload Foto Dokumentasi</label>
                        <div style="border: 2px dashed #cbd5e1; border-radius: 8px; padding: 20px; text-align: center; background: #f8fafc;">
                            <input type="file" name="foto_dokumentasi" id="file-input" style="display: none;">
                            <label for="file-input" style="cursor: pointer; display: block;">
                                <div style="font-size: 1.5rem; margin-bottom: 8px;">📸</div>
                                <div style="font-size: 0.85rem; color: #64748b; font-weight: 700;">Klik untuk pilih file</div>
                            </label>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div style="display: flex; gap: 10px; justify-content: center;">
                        <button type="reset" style="padding: 10px 20px; border: 1px solid #e2e8f0; background: white; border-radius: 8px; font-weight: 700; font-size: 0.85rem; cursor: pointer; color: #64748b;">
                            Reset
                        </button>
                        <button type="submit" style="padding: 10px 20px; background: linear-gradient(135deg, #3b82f6, #2563eb); color: white; border: none; border-radius: 8px; font-weight: 700; font-size: 0.85rem; cursor: pointer; box-shadow: 0 4px 12px rgba(59,130,246,0.3);">
                            Simpan Aktivitas
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../../App/Layout/footer.php'; ?>