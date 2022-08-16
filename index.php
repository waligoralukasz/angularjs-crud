<?php
include_once 'classes/database.php';
include_once 'classes/functions.php';

$posts = getAllPosts($conn);
$rows=[];

while($post = $posts -> fetch_assoc()){ ?>
   <?php $rows[] = $post;?>
<?php } ?>
<pre>
   <?php print json_encode($rows); ?>
</pre>



