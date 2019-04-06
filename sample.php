<?php 

header("Content-type: application/json");

include_once('database.php');
$db = new Database();
$query = 'select * from emf';
$data_array = array();
if ($results = $db->select($query)) {
    while ($row = mysqli_fetch_assoc($results)) {
        $data_array[] = $row;
    }
}
$json = json_encode($data_array);
echo $json;
?> 