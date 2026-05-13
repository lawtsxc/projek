<!DOCTYPE html>
<html>
<head>
    <title>Data Guru</title>
    <link rel="stylesheet" href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/style.css?v=1">
</head>
<body>

<div class="container">

<?php include 'sidebar.php'; ?>

<div class="content">

    <div class="table-header">
        <h2>👩‍🏫 Data Guru</h2>
        <a href="#" class="add-btn">+ Tambah Guru</a>
    </div>

    <input type="text" class="search" placeholder="Cari Guru...">

    <table class="table">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIP</th>
            <th>No HP</th>
            <th>Email</th>
            <th>Jabatan</th>
            <th>Aksi</th>
        </tr>

        <tr>
            <td>1</td>
            <td>Ibu Kartini</td>
            <td>12345678</td>
            <td>085111222333</td>
            <td>kartini@paudqu.sch.id</td>
            <td>Guru Pengajar</td>
            <td>
                <button class="action-btn edit">✏</button>
                <button class="action-btn delete">🗑</button>
            </td>
        </tr>

    </table>

</div>
</div>

</body>
</html>