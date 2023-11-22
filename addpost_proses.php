<?php
session_start();

include 'koneksi.php';

$username     = $_POST["username"];
$postTitle    = $_POST['postTitle'];
$postContent  = $_POST['postContent'];
$posted       = date("Y-m-d");

$sql  = "INSERT INTO `posts`(`postTitle`, `posted`, `user`, `postContent`)
          VALUES('$postTitle', '$posted', '$username', '$postContent')";
$query = mysqli_query($connect, $sql) or die(mysqli_error($connect));
// $cek    = mysqli_num_rows($query);

header("location: home.php");

