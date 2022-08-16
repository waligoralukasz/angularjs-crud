<?php 

//Posty
function createPost($conn){
    $table_name = "posts";

    $data = json_decode(file_get_contents("php://input"));

    $title_post = $data->title_post;
    $desc_post = $data->desc_post;
    $date_post =  $data->date_post;
    $id_user = $data->id_user;
    $id_category = $data->id_category;

    $stmt = $conn->prepare ("INSERT posts (title_post, desc_post, date_post, id_user, id_category) VALUES (?,?,?,?,?)");
    $stmt->bind_param("sssii", $title_post, $desc_post, $date_post, $id_user, $id_category);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

function updatePost($conn){
    $table_name = "posts";

    $data = json_decode(file_get_contents("php://input"));

    $id = $data->id;
    $title_post = $data->title_post;
    $desc_post = $data->desc_post;
    $date_post =  $data->date_post;
    $id_user = $data->id_user;
    $id_category = $data->id_category;

    $stmt = $conn->prepare ("UPDATE posts SET title_post = ?, desc_post = ?, date_post = ?, id_user = ?, id_category = ? WHERE id = ?");
    $stmt->bind_param("sssiii", $title_post, $desc_post, $date_post, $id_user, $id_category, $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

function getAllPosts($conn){
    $table_name = "posts";

    $result = $conn->query ("SELECT * FROM ".$table_name." ORDER BY id");
    return $result;
}


function getPost($conn, $id){
    $table_name = "posts";

    $stmt = $conn->prepare ("SELECT * FROM ".$table_name." WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
    
}

function deletePost($conn, $id){
    $table_name = "posts";

    $stmt = $conn->prepare ("DELETE FROM ".$table_name." WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
    
}


//Użytkownicy
function getAllUsers($conn){
    $table_name = "users";

    $result = $conn->query ("SELECT * FROM ".$table_name." ORDER BY id");
    return $result;
}


function getUserName($conn, $id){
    $table_name = "users";
    $stmt = $conn->prepare ("SELECT * FROM ".$table_name." WHERE id= ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    
    echo $row['name_user'];
}


//Kategorie
function getAllCategories($conn){
    $table_name = "categories";

    $result = $conn->query ("SELECT * FROM ".$table_name." ORDER BY id");
    return $result;
}

?>