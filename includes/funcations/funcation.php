<?php

function get_title(){

  global $page_title ;

  if(isset($page_title)){

    echo lang($page_title);

  }else{
    echo 'Default';
  }
}
/**
 * Home redirect funcation....
 */
function redirect_home($themesg , $secends =3,$page_adress = 'index.php' ){
  
    echo  $themesg;
    echo '<div class="alert alert-info"> You will be redirected to the previous page after seconds '.$secends.'</div>';
      header("refresh:$secends;url=$page_adress");
      exit();
}

/**
 * Check  Items fincation....
 */
function chekitem($select,$from,$where_value) {

  global $connection ;

  $stetment = $connection->prepare("SELECT $select FROM $from  WHERE $select = ? ");

  $stetment->execute(array($where_value));

  $count = $stetment->rowCount();

  return $count;
};
/**
 *Count  Numbaer of items  funcation...
 */
function count_items( $item , $table ){

  global $connection ;
  
  $stetment = $connection->prepare("SELECT COUNT($item) FROM $table");
  
  $stetment->execute();

  $count = $stetment->fetchColumn();
  return $count ;
}
?>