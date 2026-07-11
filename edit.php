<?php

require 'koneksi.php';

// EDIT / UPDATE DATA
if (isset($_POST['update'])) {

    $nim     = $_POST['nim'];
    $nama    = $_POST['nama'];
    $tempat  = $_POST['tempat'];
    $tanggal = $_POST['tanggal'];
    $ipk     = $_POST['ipk'];
    $jurusan = $_POST['jurusan'];

    mysqli_query($conn, "
    UPDATE mahasiswa SET
    nama='$nama',
    tempat_lahir='$tempat',
    tanggal_lahir='$tanggal',
    ipk='$ipk',
    id_jurusan='$jurusan'
    WHERE nim='$nim'
    ");

    header("Location: DaftarMahasiswa.php");
    exit;
}
