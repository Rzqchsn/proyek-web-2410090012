<?php

require 'koneksi.php';

// TAMBAH DATA
if (isset($_POST['tambah'])) {

    $nim     = $_POST['nim'];
    $nama    = $_POST['nama'];
    $tempat  = $_POST['tempat'];
    $tanggal = $_POST['tanggal'];
    $ipk     = $_POST['ipk'];
    $jurusan = $_POST['jurusan'];

    mysqli_query($conn, "
    INSERT INTO mahasiswa
    VALUES('$nim','$nama','$tempat','$tanggal','$ipk','$jurusan')
    ");

    header("Location: DaftarMahasiswa.php");
    exit;
}
