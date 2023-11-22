<?php

// Fungsi untuk menghasilkan kunci publik dan pribadi
function generateKeyPair() {
    $config = [
        "digest_alg" => "sha512",
        "private_key_bits" => 2048,
        "private_key_type" => OPENSSL_KEYTYPE_RSA,
    ];

    // Buat kunci
    $res = openssl_pkey_new($config);

    // Dapatkan informasi kunci privat
    openssl_pkey_export($res, $privateKey);

    // Dapatkan informasi kunci publik
    $publicKeyDetails = openssl_pkey_get_details($res);
    $publicKey = $publicKeyDetails["key"];

    return [
        'private' => $privateKey,
        'public' => $publicKey,
    ];
}

// Fungsi untuk mengenkripsi gambar menggunakan kunci publik RSA
function encryptImage($imagePath, $publicKey) {
    // Baca gambar dari file
    $imageData = file_get_contents($imagePath);

    // Enkripsi gambar menggunakan kunci publik
    openssl_public_encrypt($imageData, $encryptedData, $publicKey);

    // Simpan gambar terenkripsi ke file baru
    file_put_contents('encrypted_image.jpg', $encryptedData);
}

// Fungsi untuk mendekripsi gambar menggunakan kunci privat RSA
function decryptImage($encryptedImagePath, $privateKey) {
    // Baca data terenkripsi dari file
    $encryptedData = file_get_contents($encryptedImagePath);

    // Dekripsi data menggunakan kunci privat
    openssl_private_decrypt($encryptedData, $decryptedData, $privateKey);

    // Simpan gambar terdekripsi ke file baru
    file_put_contents('decrypted_image.jpg', $decryptedData);
}

// Menghasilkan kunci publik dan pribadi
$keyPair = generateKeyPair();

// Simpan kunci publik dan pribadi
file_put_contents('private.key', $keyPair['private']);
file_put_contents('public.key', $keyPair['public']);

// Enkripsi gambar menggunakan kunci publik
encryptImage('images/78.jpeg', $keyPair['public']);

// Dekripsi gambar menggunakan kunci privat
decryptImage('encrypted_image.jpg', $keyPair['private']);

?>