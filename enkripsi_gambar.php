<?php

function encryptImage($inputImagePath, $outputImagePath, $encryptionKey)
{
    // Menghasilkan IV secara acak
    $iv = openssl_random_pseudo_bytes(16);

    // Membaca gambar ke dalam string
    $imageData = file_get_contents($inputImagePath);

    // Mengenkripsi data gambar menggunakan AES
    $encryptedData = openssl_encrypt($imageData, 'aes-256-cbc', $encryptionKey, 0, $iv);

    // Menyimpan IV dan data terenkripsi ke dalam file gambar baru
    $finalData = $iv . $encryptedData;
    file_put_contents($outputImagePath, $finalData);
}

?>