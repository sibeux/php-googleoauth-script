<?php
require_once __DIR__ . '/vendor/autoload.php';

$client = new Google_Client();
// Arahkan ke file kunci JSON Anda
$client->setAuthConfig('/home/sibs6571/private-key/cybeat-flutter-b4e1ab481e45.json');
$client->setScopes(['https://www.googleapis.com/auth/drive.readonly']);

$driveService = new Google_Service_Drive($client);

// Ganti dengan ID file yang tadi Anda share
$fileId = '12hlNSE8jr340-_-NEcOGqwHSS7qAEy2c';

try {
    $file = $driveService->files->get($fileId, ['fields' => 'id, name']);
    echo "✅ Berhasil! Service Account bisa melihat file: " . $file->getName();

} catch (Exception $e) {
    echo "❌ Gagal! Error: " . $e->getMessage();
}