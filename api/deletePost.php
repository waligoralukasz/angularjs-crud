<?php
include_once '../include/database.php';
include_once '../include/functions.php';

$id = $_GET['id'];

$posts = deletePost($conn, $id);
// $rows=[];

// while($post = $posts -> fetch_assoc()){
//     $rows[] = $post;
// }

// print json_encode($rows);