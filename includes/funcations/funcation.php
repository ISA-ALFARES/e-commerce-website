<?php
    function getCat() {

        global $connection ;

        $statement = $connection->prepare("SELECT * FROM categories ");

        $statement->execute();
        $cats = $statement->fetchAll();

        return $cats;
    }
    function getItem($catID) {

        global $connection ;

        $statement = $connection->prepare("SELECT * FROM items where Cat_ID = ? ");

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
































    function get_title(){

              global $page_title ;

              if(isset($page_title)){

                echo lang($page_title);

              }else{

                echo 'Default';
              }
    }
    /*
    ** Home Redirect Function v2.0
    ** This Function Accept Parameters
    ** $theMsg = Echo The Message [ Error | Success | Warning ]
    ** $page_adress = The address You Want To Redirect To
    ** $seconds = Seconds Before Redirecting
    */
    function redirect_home($themesg , $secends =3,$page_adress = 'index.php' ){

        echo  $themesg;

        echo '<div class="alert alert-info"> You will be redirected to the previous page after seconds '.$secends.'</div>';

        header("refresh:$secends;url=$page_adress");

        exit();
    }

    /*
    ** Check Items Function v1.0
    ** Function to Check Item In Database [ Function Accept Parameters ]
    ** $select = The Item To Select [ Example: user, item, category ]
    ** $from = The Table To Select From [ Example: users, items, categories ]
    ** $where_value = The Value Of Select [ Example: Osama, Box, Electronics ]
    */
    function chekitem($select,$from,$where_value) {

      global $connection ;

      $statement = $connection->prepare("SELECT $select FROM $from  WHERE $select = ? ");

      $statement->execute(array($where_value));

      return $statement->rowCount();
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

