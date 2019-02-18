<?php
$_SESSION['facebook_access_token'] = "EAAGCMbvybsQBAPkXjk43GBhUDE8IcWCYJGOb6UOjyv2esidGbpnZCzlYZBTUgOTF6F4rQh6854jgt98WGeVPE7vxMzTCPyfgoUYlSCOVGtsJlbdTiSZBM5ZAHvfdHOZAhjj7Bl6zs3nIAQmZCZCDA8ZBiBWjXbssIzWUUpZCZApcmjZBAGQNMrZA7Qr9TSV5AymGvka19jR4YpB1J421sFAka1IUDZByKmhr6QR2uEHULx56lfsq8aPrlkGUH";
/*
 * Get access token using Facebook Graph API
 */
if (isset($_SESSION['facebook_access_token'])) {
    // Get access token from session
    $access_token = $_SESSION['facebook_access_token'];
} else {
    // Facebook app id & app secret 
    $app_id = '424625094946500';
    $app_secret = '1f4820a72b5a3aa46f562d4542a1cf62';
    
    // Generate access token
    $fb_graph_act_link = "https://graph.facebook.com/oauth/access_token?client_id={$app_id}&client_secret={$app_secret}&grant_type=client_credentials";
    
    // Retrieve access token
    $accessTokenJson = file_get_contents($fb_graph_act_link);
    $accessTokenObj = json_decode($accessTokenJson);
    $access_token = $accessTokenObj->access_token;
    
    // Store access token in session
    $_SESSION['facebook_access_token'] = $access_token;
}

$facebook_page_id = "585338791518628";
// Get photo albums of Facebook page using Facebook Graph API
$_SESSION['facebook_page_id'] = $facebook_page_id;

?>