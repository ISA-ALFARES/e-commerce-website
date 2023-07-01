
<?php
global $connection, $items;
session_start();
    global $temp;
    include  "init.php";
    $itemID = isset($_GET['item_ID']) && is_numeric($_GET['item_ID'])  ?  intval($_GET['item_ID']) : 0 ;
    $statment=$connection->prepare("SELECT * FROM items WHERE item_ID = ?");
    $statment->execute(array($itemID));
    $items = $statment->fetchAll();
     if ($statment->rowCount() == 1 ){
        foreach ($items as $item){
            echo $item['Name'];
        }
     }else{
         echo "There is no Items...!";
     }
    include $temp."footer.php";
