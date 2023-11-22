<?php
session_start();

include 'koneksi.php';
// include '../session.php';
include 'enkripsi_teks.php';
include 'enkripsi_gambar.php';

if (!($_SESSION['username'])) {
  header("location: login.php?message=belum_login");
}

$id_post        = $_POST['id_post'];
$comment        = $_POST['comment'];
$isEncrypted = isset($_POST['isEncrypted']) ? $_POST['isEncrypted'] : '';
$isEncrypted2 = isset($_POST['isEncrypted-image']) ? $_POST['isEncrypted-image'] : '';
$key            = $_POST['key'];
$username       = $_POST['username'];
$post           = $_POST['post'];

$key2            = $_POST['key2'];

$targetdir = "images/";

if (!file_exists($targetdir)) {
  mkdir($targetdir, 0777, true);
}

$targetFile = $targetdir . basename($_FILES['image']['name']);
$uploadSuccess = move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);


if ($isEncrypted) {
  $comment = enkripsi($comment, $key);
}

if ($isEncrypted2) {
  // $comment = enkripsi($comment, $key);
  encryptImage($targetFile, $targetFile, $key2);
}

$targetFile = ($targetFile == "images/") ? "" : $targetFile;

// $sql    = "INSERT INTO `comments`(`id`, `comment`, `posted`, `isEncrypted`, `user`, `image`, `keyText`, `post`, `keyImage`, `isEncrypted2`)
//             VALUES ('$comment', '$pos')";
$sql    = "INSERT INTO `comments` (`comment`, `isEncrypted`, `user`, `image`, `keyText`, `post`, `keyImage`, `isEncrypted2`) 
                VALUES ('$comment', '$isEncrypted', '$username', '$targetFile', '$key', '$post', '$key2', '$isEncrypted2')";
$query  = mysqli_query($connect, $sql) or die(mysqli_error($connect));

if ($query) {
  header("location: post.php?id=$id_post");
} else {
  header("location: login.php?message=username_salah");
}
