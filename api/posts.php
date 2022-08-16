<?php
include_once '../include/database.php';
include_once '../include/functions.php';

$posts = getAllPosts($conn);
$rows=[];

while($post = $posts -> fetch_assoc()){ ?>
   <?php $rows[] = $post;?>
<?php } ?>

<?php print json_encode($rows); ?>




