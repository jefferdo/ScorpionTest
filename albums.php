<?php
if (!session_id()) {
    session_start();
}

include("config.php");


//$graph_album_link = "https://graph.facebook.com/v3.2/{$facebook_page_id}?fields={$fields}&access_token={$access_token}";

$graph_album_link = "https://graph.facebook.com/v3.2/" . $facebook_page_id . "?fields=albums%7Bcover_photo%2Cphoto_count%2Clink%2Cname%2Cid%2Cdescription%7D&access_token=" . $access_token;


$jsonData = file_get_contents($graph_album_link);
//echo $jsonData;
echo "<br/><br/>";
$fbAlbumObj = json_decode($jsonData, true);


// Facebook albums content
$fbAlbumData = $fbAlbumObj['albums']['data'];

// Render all photo albums
foreach ($fbAlbumData as $data) {
    $id = $data['id'];
    $name = $data['name'];
    $cover_photo_id = $data['cover_photo']['id'];
    $count = $data['photo_count'];
    $coverId = $data['cover_photo']['id'];
    $link = $data['link'];
    if (isset($data['description']))
        $description = $data['description'];

    $pictureLink = "photos.php?album_id={$id}&album_name={$name}";

    echo "<div class='fb-album'>";
    echo "<a href='{$pictureLink}'>";
    echo "<img width='200' src='https://graph.facebook.com/v2.9/{$cover_photo_id}/picture?access_token={$access_token}' alt=''>";
    echo "</a>";
    echo "<h3>{$name}</h3>";

    $photoCount = ($count > 1) ? $count . ' Photos' : $count . 'Photo';

    echo "<p><span style='color:#888;'>{$photoCount} / <a href='{$link}' target='_blank'>View on Facebook</a></span></p>";
    if (isset($description))
        echo "<p>{$description}</p>";
    echo "</div>";
}
?>