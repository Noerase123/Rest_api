<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/config.php';
include_once '../../models/Category.php';

//Instantiate DB & connect
$database = new db();
$db = $database->connect();

//Instantiate post object
$category = new Category($db);
//Blog post query
$result = $category->read();
//get row count
$num = $result->rowCount();

//check if any Cat
if ($num > 0){
    //cat array
    $cat_arr = array();
    $cat_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {

        extract($row);

        $cat_item = array(
            'id' => $id,
            'name' =>$name,
        );

        //Push to data
        array_push($cat_arr['data'], $cat_item);
    }
    //Turn to JSON & output
    echo json_encode($cat_arr);
}
else{
    // No categories
    echo json_encode(
    array('message' => 'No Categories Found')
    );
}

?>