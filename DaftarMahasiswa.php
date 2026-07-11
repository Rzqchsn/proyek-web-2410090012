<?php

require 'koneksi.php';

// SEARCH
$cari = "";

if (isset($_GET['cari'])) {

    $cari = $_GET['cari'];

    $query = mysqli_query($conn, "
    SELECT mahasiswa.*, jurusan.nama_jurusan, fakultas.nama_fakultas
    FROM mahasiswa
    JOIN jurusan ON mahasiswa.id_jurusan = jurusan.id_jurusan
    JOIN fakultas ON jurusan.id_fakultas = fakultas.id_fakultas
    WHERE nama LIKE '%$cari%'
    ");

} else {

    $query = mysqli_query($conn, "
    SELECT mahasiswa.*, jurusan.nama_jurusan, fakultas.nama_fakultas
    FROM mahasiswa
    JOIN jurusan ON mahasiswa.id_jurusan = jurusan.id_jurusan
    JOIN fakultas ON jurusan.id_fakultas = fakultas.id_fakultas
    ");

}

?>

<!DOCTYPE html>
<html>
<head>

<title>Daftar Mahasiswa</title>

<style>

body{
    font-family: Arial;
    background: #f5f5f5;
    margin: 40px;
}

.container{
    background: white;
    padding: 20px;
    border-radius: 10px;
}

h2{
    text-align: center;
}

.form-box{
    background: #eee;
    padding: 20px;
    border-radius: 10px;
    margin-bottom: 20px;
}

input, select{
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    margin-bottom: 15px;
}

button{
    padding: 10px 20px;
    background: black;
    color: white;
    border: none;
}

table{
    width: 100%;
    border-collapse: collapse;
}

table th, table td{
    border: 1px solid black;
    padding: 10px;
    text-align: center;
}

table th{
    background: black;
    color: white;
}

a{
    text-decoration: none;
}

</style>

</head>

<body>

<div class="container">

<h2>DAFTAR MAHASISWA</h2>

<form method="GET">

<input type="text" name="cari" placeholder="Cari Nama Mahasiswa">

<button type="submit">Cari</button>

</form>

<br>

<?php

$edit = false;

if (isset($_GET['edit'])) {

    $edit = true;

    $nimEdit = $_GET['edit'];

    $dataEdit = mysqli_query($conn, "
    SELECT * FROM mahasiswa
    WHERE nim='$nimEdit'
    ");

    $d = mysqli_fetch_array($dataEdit);
}

?>

<div class="form-box">

<form method="POST" action="<?= $edit ? 'edit.php' : 'tambah.php' ?>">

NIM

<input type="text"
name="nim"
value="<?= $edit ? $d['nim'] : '' ?>"
<?= $edit ? 'readonly' : '' ?>
required>

Nama

<input type="text"
name="nama"
value="<?= $edit ? $d['nama'] : '' ?>"
required>

Tempat Lahir

<input type="text"
name="tempat"
value="<?= $edit ? $d['tempat_lahir'] : '' ?>"
required>

Tanggal Lahir

<input type="date"
name="tanggal"
value="<?= $edit ? $d['tanggal_lahir'] : '' ?>"
required>

IPK

<input type="text"
name="ipk"
value="<?= $edit ? $d['ipk'] : '' ?>"
required>

Jurusan

<select name="jurusan">

<?php

$jurusan = mysqli_query($conn, "
SELECT * FROM jurusan
");

while ($j = mysqli_fetch_array($jurusan)) {

?>

<option value="<?= $j['id_jurusan']; ?>"

<?php
if ($edit && $d['id_jurusan'] == $j['id_jurusan']) {
    echo "selected";
}
?>

>

<?= $j['nama_jurusan']; ?>

</option>

<?php } ?>

</select>

<?php if ($edit) { ?>

<button type="submit" name="update">
Update Data
</button>

<?php } else { ?>

<button type="submit" name="tambah">
Tambah Data
</button>

<?php } ?>

</form>

</div>

<table>

<tr>
    <th>NIM</th>
    <th>Nama</th>
    <th>Tempat Lahir</th>
    <th>Tanggal Lahir</th>
    <th>Fakultas</th>
    <th>Jurusan</th>
    <th>IPK</th>
    <th>Aksi</th>
</tr>

<?php while ($data = mysqli_fetch_array($query)) { ?>

<tr>

<td><?= $data['nim']; ?></td>
<td><?= $data['nama']; ?></td>
<td><?= $data['tempat_lahir']; ?></td>
<td><?= $data['tanggal_lahir']; ?></td>
<td><?= $data['nama_fakultas']; ?></td>
<td><?= $data['nama_jurusan']; ?></td>
<td><?= $data['ipk']; ?></td>

<td>

<a href="DaftarMahasiswa.php?edit=<?= $data['nim']; ?>">
Edit
</a>

|

<a href="hapus.php?hapus=<?= $data['nim']; ?>"
onclick="return confirm('Yakin hapus data?')">
Hapus
</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>
