<?php
require_once __DIR__ . '/vendor/autoload.php';

// Inisialisasi Google Client
$client = new Google_Client();

// Arahkan client untuk menggunakan file kunci Service Account
$client->setAuthConfig('./credentials/wahabinasrul_credential.json');

// Tentukan scope (izin) yang dibutuhkan oleh aplikasi Anda
$client->setScopes([
    'https://www.googleapis.com/auth/drive.readonly',
]);

// Sekarang client Anda sudah terotentikasi!
// Anda bisa langsung menggunakannya untuk mengakses layanan.

// Contoh: Mengakses Google Drive API
$driveService = new Google_Service_Drive($client);

// Lakukan operasi API yang Anda inginkan...
$files = $driveService->files->listFiles();

foreach ($files->getFiles() as $file) {
    printf("Found file: %s (%s)\n", $file->getName(), $file->getId());
}