<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Header,Content-Type,Access-Control-Allow-Methods, Authorization, X-requested-With');

include_once '../../config/config.php';
include_once '../../models/Post.php';

$database = new db();
$db = $database->connect();

//Instantiate post object

$post = new Post($db);

$data = json_decode(file_get_contents("php://input"));

//set ID to update

$post->id = $data->id;


if ($post->delete()) {

    echo json_encode(
        array('message' => 'Post Deleted')
    );
}
else {
    
    echo json_encode(
        array('message' => 'Post Not Deleted')
    );
}