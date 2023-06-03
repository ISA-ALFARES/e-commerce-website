<?php
$do = '';

if(isset($_GET['do'])){
  $do = $_GET['do'];
}else {
  $do = 'Mange';
}
//if the page  is main page...
  if($do == 'manage'){
    echo 'Welcome  you are in manage  category<br>';
    echo '<a href="page.php?do=Add">Add New Category..<br></a>';
    echo '<a href="page.php?do=Edit">Edit  ..<br></a>';
    echo '<a href="page.php?do=Update">Update  ..<br></a>';
  }elseif($do == 'Edit'){
    echo 'Welcome  you are in Edit  category';
  }elseif($do == 'Add'){
    echo 'Welcome  you are in Add  category';
  }elseif($do == 'Delete'){
    echo 'Welcome  you are in Delete  category';
  }elseif($do == 'Update'){
    echo 'Welcome  you are in Update  category';
  }else{
    echo 'Error  There\'s no page with the name...';
  }


?>