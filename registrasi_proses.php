<?php
session_start();

include 'koneksi.php';

$username   = $_POST["username"];
$name       = $_POST["nama"];
$email      = $_POST["email"];
$phone      = $_POST["telepon"];
$country    = $_POST["asal"];
$password   = $_POST["password"];
$gambar     = $_POST["gambar"];
$joined     = date("Y-m-d");

$password = hash("sha256", $password);

$targetdir = "images/";

if (!file_exists($targetdir)) {
  mkdir($targetdir, 0777, true);
}

$targetFile = $targetdir . basename($_FILES['gambar']['name']);
$uploadSuccess = move_uploaded_file($_FILES['gambar']['tmp_name'], $targetFile);

$sql_cek = "SELECT * FROM users WHERE username = '$username'";
$querry_cek = $connect->query($sql_cek);

$cek = mysqli_num_rows($querry_cek);

if ($cek > 0) {
  header("Location: registrasi.php?message=terdaftar");
}

$sql            = "INSERT INTO users (username, name, password, email, phone, country, photo, joined) 
                      VALUES('$username', '$name', '$password', '$email', '$phone', '$country', '$targetFile', '$joined')";
$query          = mysqli_query($connect, $sql) or die(mysqli_error($connect));

$sql2           = "SELECT username FROM users WHERE username = '$username'";
$query2          = mysqli_query($connect, $sql2);

while ($data = mysqli_fetch_array($query2)) {
  $username   = $data['username'];
}

if ($query) {
  session_start();
  $_SESSION['username'] = $username;
  header("location: home.php");
} else {
  header("location: registrasi.php?message=failed");
}
