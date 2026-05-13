<!DOCTYPE html>
<html>
<head>
    <title>Aktivitas Harian</title>
    <link rel="stylesheet" href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/style.css?v=1">
</head>
<body>

<div class="container">

<?php include 'sidebar.php'; ?>

<div class="content">

    <h2 style="margin-bottom:20px;color:#4f8cff;">🎨 Aktivitas Harian</h2>

    <div class="row">
        <div class="form-group">
            <label>Tanggal</label>
            <input type="date" class="form-control">
        </div>

        <div class="form-group">
            <label>Nama Siswa</label>
            <select class="form-control">
                <option>-- Pilih Siswa --</option>
                <option>Ahmad Fauzi</option>
                <option>Siti Rahayu</option>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <label>Jenis Kegiatan</label>
            <input type="text" class="form-control" placeholder="Contoh: Mewarnai">
        </div>

        <div class="form-group">
            <label>Kategori</label>
            <select class="form-control">
                <option>-- Pilih Kategori --</option>
                <option>Seni</option>
                <option>Motorik</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label>Guru Pengampu</label>
        <select class="form-control">
            <option>-- Pilih Guru --</option>
            <option>Ibu Kartini</option>
        </select>
    </div>

    <div class="form-group">
        <label>Catatan Khusus</label>
        <textarea class="form-control" rows="5"></textarea>
    </div>

    <button class="add-btn" style="border:none;cursor:pointer;">
        Simpan Aktivitas
    </button>

</div>
</div>

</body>
</html>