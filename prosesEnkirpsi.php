<?php
    // Fungsi untuk mengenkripsi menggunakan AES-256-CBC
    function aes_encrypt($data, $key) {
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $encrypted = openssl_encrypt($data, 'aes-256-cbc', $key, 0, $iv);
        return base64_encode($encrypted . '::' . $iv);
    }

    // File gambar yang akan dienkripsi
    $gambar = "foto.png";

    // Baca file dan enkripsi datanya
    $data = file_get_contents($gambar);
    $kunci = "227006097";
    $enkripsi = aes_encrypt($data, $kunci);

    echo $enkripsi;
?>
