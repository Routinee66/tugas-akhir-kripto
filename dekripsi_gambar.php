<?php

function decryptImage($inputImagePath, $outputImagePath, $encryptionKey)
{
    // Membaca data terenkripsi dari file gambar
    $encryptedData = file_get_contents($inputImagePath);

    // Mengambil IV (16 byte pertama)
    $iv = substr($encryptedData, 0, 16);

    // Mengambil data terenkripsi setelah IV
    $encryptedDataWithoutIV = substr($encryptedData, 16);

    // Mendekripsi data gambar menggunakan AES
    $decryptedData = openssl_decrypt($encryptedDataWithoutIV, 'aes-256-cbc', $encryptionKey, 0, $iv);

    // Menyimpan data terdekripsi ke dalam file gambar baru
    file_put_contents($outputImagePath, $decryptedData);
}

// Contoh penggunaan
$inputImagePath = 'images/398304760_727647946058901_989926059254281932_n.jpg';
$outputImagePath = 'images/sembuh.jpg';
$encryptionKey = 'ok';

decryptImage($inputImagePath, $outputImagePath, $encryptionKey);

?>