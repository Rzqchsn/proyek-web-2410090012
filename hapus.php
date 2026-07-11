<?php

require 'koneksi.php';

// HAPUS DATA
if (isset($_GET['hapus'])) {

    $nim = $_GET['hapus'];

    mysqli_query($conn, "
    DELETE FROM mahasiswa
    WHERE nim='$nim'
    ");

    header("Location: DaftarMahasiswa.php");
    exit;
}
