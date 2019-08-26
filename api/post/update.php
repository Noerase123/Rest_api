<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
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

$post->title = $data->title;
$post->body = $data->body;
$post->author = $data->author;
$post->category_id = $data->category_id;

if ($post->update()) {

    echo json_encode(
        array('message' => 'Post Updated')
    );
}
else {
    
    echo json_encode(
        array('message' => 'Post Not Updated')
    );
}