<?php
session_start();

include 'koneksi.php';
$username   = $_POST['username'];
$password   = $_POST['password'];

$password = hash("sha256", $password);

$sql    = "SELECT * FROM users WHERE username = '$username'";
$query  = mysqli_query($connect, $sql) or die(mysqli_error($connect));;
$cek    = mysqli_num_rows($query);

if($cek > 0){
  while($data = mysqli_fetch_array($query)){
      if($data['password'] === $password){
          $_SESSION['username'] = $data['username'];
          header("location: home.php");
      }
      else{
          header("location: login.php?message=password_salah");
      }
  }
}
else {
  header("location: login.php?message=username_salah");
}
