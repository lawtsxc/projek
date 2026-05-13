<!DOCTYPE html>
<html>
<head>
    <title>Absensi</title>
    <link rel="stylesheet" href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/style.css?v=1">
</head>
<body>

<div class="container">

<?php include 'sidebar.php'; ?>

<div class="content">

    <h2 style="margin-bottom:20px;color:#4f8cff;">📋 Absensi Siswa</h2>

    <input type="date" class="form-control" style="width:250px;margin-bottom:20px;">

    <table class="table">
        <tr>
            <th>No</th>
            <th>Nama Siswa</th>
            <th>Status Kehadiran</th>
            <th>Aksi</th>
        </tr>

        <tr>
            <td>1</td>
            <td>Ahmad Fauzi</td>
            <td>
                <button class="badge hadir">Hadir</button>
                <button class="badge izin">Izin</button>
                <button class="badge sakit">Sakit</button>
                <button class="badge alpha">Alpha</button>
            </td>
            <td>
                <button class="action-btn save">💾 Simpan</button>
            </td>
        </tr>

    </table>

</div>
</div>

</body>
</html>