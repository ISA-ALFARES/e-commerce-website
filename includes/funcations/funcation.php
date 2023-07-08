<?php
    function getCat() {

        global $connection ;

        $statement = $connection->prepare("SELECT * FROM categories ");

        $statement->execute();
        $cats = $statement->fetchAll();

        return $cats;
    }
    function getItem($catID , $approve = NULL){

        global $connection ;
        if ($approve == NULL){
            $sql =  "AND Approve = 1";
        }else{
            $sql = "NULL";
        }
        $statement = $connection->prepare("SELECT * FROM items  where Cat_ID = ? $sql");

        $statement->execute(array($catID));

        $items = $statement->fetchAll();

        return $items;
    }
    function CheckUserStatus($user) {

    global $connection ;

    $statement = $connection->prepare("SELECT Username , RegStatus FROM users where Username = ? AND RegStatus = 0 ");

    $statement->execute(array($user));

    $status = $statement->rowCount();

    return $status;
}
    function getitems($where,$value) {

        global $connection ;

        $statement = $connection->prepare("SELECT * FROM items  WHERE $where = ? ");

        $statement->execute(array($value));

        $items  = $statement->fetchAll();
        return $items ;
    }
    /*
    ** Check newUser Function v1.0
    ** Function to Check Item In Database [ Function Accept Parameters ]
    ** $select = The Item To Select [ Example: user, item, category ]
    ** $from = The Table To Select From [ Example: users, items, categories ]
    ** $where_value = The Value Of Select [ Example: isa, Box, Electronics ]
    */
    function chekNewUser($select,$from,$where_value) {

        global $connection ;

        $statement = $connection->prepare("SELECT $select FROM $from  WHERE $select = ? ");

        $statement->execute(array($where_value));

        $count = $statement->rowCount();
        return $count;
    }

    /*
    ** Home Redirect Function v2.0
    ** This Function Accept Parameters
    ** $theMsg = Echo The Message [ Error | Success | Warning ]
    ** $page_adress = The address You Want To Redirect To
    ** $seconds = Seconds Before Redirecting
    */
function redirect_secces($themesg, $seconds = 3) {
    echo $themesg;
    echo '<div class="alert alert-info">You will be redirected to the previous page after '.$seconds.' seconds.</div>';

    header("refresh:$seconds;url=" . $_SERVER['HTTP_REFERER']);

    exit();
}





/*
** Get All Function v2.0
** Function To Get All Records From Any Database Table
*/

    function getAllFrom($field, $table, $where = NULL, $and = NULL, $ordering = "DESC" , $approve = NULL) {

    global $connection;

    if ($approve == NULL){
        $sql =  "Approve = 1";
    }else{
        $sql = "NULL";
    }
    $getAll = $connection->prepare("SELECT $field FROM $table WHERE $sql $and ORDER BY  $ordering");

    $getAll->execute();

    $all = $getAll->fetchAll();

    return $all;

}


























function get_title(){

              global $page_title ;

              if(isset($page_title)){

                echo lang($page_title);

              }else{

                echo 'Default';
              }
    }




/*
** Count Number Of Items Function v1.0
** Function To Count Number Of Items Rows
** $item = The Item To Count
** $table = The Table To Choose From
 * $condition = The
*/
    function count_items( $item , $table ,$condition = '' ){

      global $connection ;

      $statement = $connection->prepare("SELECT COUNT($item) FROM $table $condition ");

      $statement->execute();

      return $statement->fetchColumn();
    }
    /*
    ** Get Latest Records Function v1.0
    ** Function To Get Latest Items From Database [ Users, Items, Comments ]
    ** $select = Field To Select
    ** $table = The Table To Choose From
    ** $order = The Desc Ordering
    ** $limit = Number Of Records To Get
    */
    function getLatest($select , $table , $order , $limit = 5 ){

        global $connection ;

        $statement=$connection->prepare("SELECT  $select  FROM $table ORDER BY  $order desc LIMIT $limit    ");

        $statement->execute();

        return $statement->fetchAll();
    }
    function getCount($column , $table){

        global $connection ;

        $statement = $connection->prepare("SELECT $column AS number FROM $table");
        $statement->execute();
        $result = $statement->fetch();
        if ($result) {
            echo $result['number'];
        } else {
            echo "No data found.";
        }

    }


