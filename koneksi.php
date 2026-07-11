<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// KONEKSI DATABASE
$conn = mysqli_connect("localhost", "root", "", "db_mahasiswa");

if (!$conn) {
    die("Koneksi Database Gagal");
}
