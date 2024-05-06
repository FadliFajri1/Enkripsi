<?php
// Fungsi untuk mengenkripsi menggunakan AES-256-CBC
function aes_encrypt($data, $key) {
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $key, 0, $iv);
    return base64_encode($encrypted . '::' . $iv);
}

// Fungsi untuk mendekripsi menggunakan AES-256-CBC
function aes_decrypt($data, $key) {
    list($encrypted_data, $iv) = explode('::', base64_decode($data), 2);
    return openssl_decrypt($encrypted_data, 'aes-256-cbc', $key, 0, $iv);
}

if(isset($_POST['submit']) && !empty($_POST['teks'])) {
    // Dekripsi teks yang diterima menggunakan AES
    $teks = aes_decrypt($_POST['teks'], "227006097");
    // Ubah teks menjadi gambar
    header("Content-type: image/gif");
    echo base64_decode($teks);
}
?>
