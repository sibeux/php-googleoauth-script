<?php
require_once __DIR__ . '/vendor/autoload.php';

session_start();

$url = "https://sibeux.my.id/cloud-music-player/database/mobile-music-player/api/gdrive_api";
$goauthResponse = @file_get_contents($url);
$allApiData = ($goauthResponse) ? json_decode($goauthResponse, true) : [];

$clientId = null;
$clientSecret = null;
$refreshToken = null;

// Lakukan perulangan pada data yang diberikan
foreach ($allApiData as $item) {
    if (!isset($item['email']))
        continue;

    if ($item['email'] === 'wahabinasrul_googleoauth_client_id') {
        $clientId = $item['gdrive_api'];
    } else if ($item['email'] === 'wahabinasrul_googleoauth_client_secret') {
        $clientSecret = $item['gdrive_api'];
    }
}

$client = new Google_Client();
$client->setClientId($clientId);
$client->setClientSecret($clientSecret);
$client->setRedirectUri('https://sibeux.my.id/cloud-music-player/api/oauth2callback.php');
$client->addScope("email");
$client->addScope("profile");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login dengan Google</title>
</head>

<body>
    <h2>Verifikasi Google OAuth</h2>
    <p>Silakan login dengan akun Google Anda.</p>
    <a href="<?php echo $client->createAuthUrl(); ?>">
        <button>Login dengan Google</button>
    </a>
</body>

</html>