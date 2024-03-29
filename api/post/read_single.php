<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/config.php';
include_once '../../models/Post.php';

$database = new db();
$db = $database->connect();

//Instantiate post object

$post = new Post($db);

$post->id = isset($_GET['id']) ? $_GET['id'] : die();

$post->read_single();

$post_arr = array(
    'id' =>$post->id,
    'title' => $post->title,
    'body' => $post->body,
    'author' => $post->author,
    'category_id' => $post->category_id,
    'category_name' => $post->category_name
);

print_r(json_encode($post_arr));