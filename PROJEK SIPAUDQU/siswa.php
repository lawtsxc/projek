<!DOCTYPE html>
<html>
<head>
    <title>Data Siswa</title>
    <link rel="stylesheet" href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/style.css?v=1">
</head>
<body>

<div class="container">

<?php include 'sidebars.php'; ?>

<div class="content">

    <div class="table-header">
        <h2>🧒 Data Siswa</h2>
        <a href="#" class="add-btn">+ Tambah Siswa</a>
    </div>

    <input type="text" id="searchInput" class="search" placeholder="Cari nama, NIS, orang tua, atau kelas...">

    <table class="table" id="studentTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIS</th>
                <th>Kelas</th>
                <th>Tgl Lahir</th>
                <th>Orang Tua</th>
                <th>No HP Ortu</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Ahmad Fauzi</td>
                <td>1001</td>
                <td>1A</td>
                <td>10 Februari 2020</td>
                <td>Budi Santoso</td>
                <td>08123456789</td>
                <td>
                    <button class="action-btn edit">✏</button>
                    <button class="action-btn delete">🗑</button>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Siti Rahayu</td>
                <td>1002</td>
                <td>2B</td>
                <td>15 Mei 2020</td>
                <td>Ahmad Yani</td>
                <td>08234567890</td>
                <td>
                    <button class="action-btn edit">✏</button>
                    <button class="action-btn delete">🗑</button>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Budi Prasetyo</td>
                <td>1003</td>
                <td>3C</td>
                <td>20 Agustus 2020</td>
                <td>Hendra Gunawan</td>
                <td>08345678901</td>
                <td>
                    <button class="action-btn edit">✏</button>
                    <button class="action-btn delete">🗑</button>
                </td>
            </tr>
            <tr>
                <td>4</td>
                <td>Dewi Lestari</td>
                <td>1004</td>
                <td>1B</td>
                <td>5 Maret 2020</td>
                <td>Rudi Hartono</td>
                <td>08456789012</td>
                <td>
                    <button class="action-btn edit">✏</button>
                    <button class="action-btn delete">🗑</button>
                </td>
            </tr>
            <tr>
                <td>5</td>
                <td>Eko Wahyudi</td>
                <td>1005</td>
                <td>2A</td>
                <td>12 November 2020</td>
                <td>Slamet Riyadi</td>
                <td>08567890123</td>
                <td>
                    <button class="action-btn edit">✏</button>
                    <button class="action-btn delete">🗑</button>
                </td>
            </tr>
            <tr>
                <td>6</td>
                <td>Nina Permata</td>
                <td>1006</td>
                <td>3A</td>
                <td>22 Januari 2020</td>
                <td>Rita Sari</td>
                <td>082391234567</td>
                <td>
                    <button class="action-btn edit">✏</button>
                    <button class="action-btn delete">🗑</button>
                </td>
            </tr>
        </tbody>
    </table>

    <script>
        const searchInput = document.getElementById('searchInput');
        const tableRows = document.querySelectorAll('#studentTable tbody tr');

        searchInput.addEventListener('input', function () {
            const filter = this.value.toLowerCase();

            tableRows.forEach(row => {
                const cells = Array.from(row.querySelectorAll('td'));
                const text = cells.map(cell => cell.textContent.toLowerCase()).join(' ');
                row.style.display = text.includes(filter) ? '' : 'none';
            });
        });
    </script>

</div>
</div>

</body>
</html>