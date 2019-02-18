<?php
if (!session_id()) {
    session_start();
}

include("config.php");

// Get album id from url
$album_id = isset($_GET['album_id']) ? $_GET['album_id'] : header("Location: index.php");
$album_name = isset($_GET['album_name']) ? $_GET['album_name'] : header("Location: index.php");

// Get access token from session
$access_token = $_SESSION['facebook_access_token'];

// Get photos of Facebook page album using Facebook Graph API
$graphPhoLink = "https://graph.facebook.com/v3.2/{$album_id}?fields=photos.limit(1000)%7Bimages%7D&access_token={$access_token}";
$jsonData = file_get_contents($graphPhoLink);
$fbPhotoObj = json_decode($jsonData, true);

// Facebook photos content
$fbPhotoData = $fbPhotoObj['photos']['data'];

// Render all photos
foreach ($fbPhotoData as $data) {
    $imgSource = isset($data['images'][0]['source']) ? $data['images'][0]['source'] : '';

    echo "<div class=''>";
    echo "<img width='200' src='{$imgSource}' alt=''>";
    echo "</div>";
}
?>
