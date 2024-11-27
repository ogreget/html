<?php
// URL feed Blogger
$feed_url = 'https://jalansmut.blogspot.com/feeds/posts/default?orderby=updated&alt=json';

// Mengambil konten feed menggunakan cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $feed_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Untuk menghindari masalah sertifikat SSL
$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Memeriksa apakah respons berhasil
if ($http_code == 200) {
    header('Content-Type: application/json'); // Mengatur header JSON
    echo $response; // Mengembalikan data feed ke front-end
} else {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Gagal mengambil data feed.']);
}
?>
