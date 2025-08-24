<?php
require_once __DIR__ . '/vendor/autoload.php';

// Inisialisasi Google Client
$client = new Google_Client();

// Arahkan client untuk menggunakan file kunci Service Account
$client->setAuthConfig('./credentials/wahabinasrul_credential.json');

// --- LANGKAH B: TENTUKAN IZIN (SCOPE) YANG DIBUTUHKAN ---
// Pastikan scope ini sesuai dengan API yang akan Anda panggil
$client->setScopes([
    'https://www.googleapis.com/auth/drive.readonly'
]);

// Sampai di sini, client sudah memiliki identitas.
// Sekarang Anda bisa membuat objek service.

// --- LANGKAH C: BUAT OBJEK SERVICE ---
$driveService = new Google_Service_Drive($client);

// --- LANGKAH D: BARU LAKUKAN PANGGILAN API ---
// Jangan lakukan ini sebelum langkah A dan B selesai.
$files = $driveService->files->listFiles([
    'pageSize' => 10,
    'fields' => 'nextPageToken, files(id, name)'
]);

// Tampilkan hasilnya
foreach ($files->getFiles() as $file) {
    printf("File ditemukan: %s (%s)\n", $file->getName(), $file->getId());
}