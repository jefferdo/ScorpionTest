<?php
$_SESSION['facebook_access_token'] = "EAAEVxUvwbdkBAHDer0JOtGWsCx2Lrr6eH9PatgZCfhinMAOAFzGbZATT6mJiiamFpVJYmy1q2bU4Ml2ZAAql4UABSH7FAARIKNcYrbOjVZCionLnItvtXbnyE2qqsWJ8d04mbnjI7qBZC8i4dNNJQhZACj6FJPsbwCBMds9ojegXxvDVsvy9i5MogjGJkRxjeG5dhjAr1nWEgRi6iFT96u";
/*
 * Get access token using Facebook Graph API
 */
if (isset($_SESSION['facebook_access_token'])) {
    // Get access token from session
    $access_token = $_SESSION['facebook_access_token'];
} else {
    // Facebook app id & app secret 
    $app_id = '305412103499225';
    $app_secret = '3436602e8d3971813e73fda1354ed269';
    
    // Generate access token
    $fb_graph_act_link = "https://graph.facebook.com/oauth/access_token?client_id={$app_id}&client_secret={$app_secret}&grant_type=client_credentials";
    
    // Retrieve access token
    $accessTokenJson = file_get_contents($fb_graph_act_link);
    $accessTokenObj = json_decode($accessTokenJson);
    $access_token = $accessTokenObj->access_token;
    
    // Store access token in session
    $_SESSION['facebook_access_token'] = $access_token;
}

$facebook_page_id = "1646112932336014";
// Get photo albums of Facebook page using Facebook Graph API
$_SESSION['facebook_page_id'] = $facebook_page_id;

?>