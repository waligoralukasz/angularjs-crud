<?php
include_once '../include/database.php';
include_once '../include/functions.php';

$users = getAllUsers($conn);
$rows=[];

while($user = $users -> fetch_assoc()){ ?>
   <?php $rows[] = $user;?>
<?php } ?>

<?php print json_encode($rows); ?>



