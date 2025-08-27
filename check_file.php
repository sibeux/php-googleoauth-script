<?php
require_once __DIR__ . '/vendor/autoload.php';

$client = new Google_Client();
// Arahkan ke file kunci JSON Anda
$client->setAuthConfig('/home/sibs6571/private-key/cybeat-music-4d407edfed15.json');
$client->setScopes(['https://www.googleapis.com/auth/drive.readonly']);

$driveService = new Google_Service_Drive($client);

// Ganti dengan ID file yang tadi Anda share
$fileId = '12WBF7qdmdBCY3r5445lg2yBum1f2rJqg';

try {
    $file = $driveService->files->get($fileId, ['fields' => 'id, name']);
    echo "✅ Berhasil! Service Account bisa melihat file: " . $file->getName();

} catch (Exception $e) {
    echo "❌ Gagal! Error: " . $e->getMessage();
}