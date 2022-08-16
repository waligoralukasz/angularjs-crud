<?php
include_once '../include/database.php';
include_once '../include/functions.php';

$categories = getAllCategories($conn);
$rows=[];

while($category = $categories -> fetch_assoc()){ ?>
   <?php $rows[] = $category;?>
<?php } ?>

<?php print json_encode($rows); ?>




