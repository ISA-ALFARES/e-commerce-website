<?php
global $tpl, $connection, $items, $temp;
ob_start();
session_start();
$pageTitle = 'Show Items';
include 'init.php';

// Check If Get Request item Is Numeric & Get Its Integer Value
$itemid = isset($_GET['item_ID']) && is_numeric($_GET['item_ID']) ? intval($_GET['item_ID']) : 0;

// Select All Data Depend On This ID
$stmt = $connection->prepare("SELECT 
								items.*, 
								categories.Name AS category_name, 
								users.Username 
							FROM 
								items
							INNER JOIN 
								categories 
							ON 
								categories.ID = items.Cat_ID 
							INNER JOIN 
								users 
							ON 
								users.UserID = items.Member_ID 
							WHERE 
								Item_ID = ?
							AND 
								Approve = 0");

// Execute Query
$stmt->execute(array($itemid));

$count = $stmt->rowCount();

if ($count > 0) {

    // Fetch The Data
    $item = $stmt->fetch();
    ?>
    <h1 class="text-center text-dark"><?php echo $item['Name'] ?></h1>
    <div class="container">
    <div class="row">
        <div class="col-md-3">
            <img class="img-responsive img-thumbnail center-block " src="./layout/images/b3.jpg" alt="" />
        </div>
        <div class="col-md-9 item-info">
            <h2><?php echo $item['Name'] ?></h2>
            <p><?php echo $item['Description'] ?></p>
            <ul class="list-unstyled">
                <li>
                    <i class="fa fa-calendar fa-fw"></i>
                    <span>Added Date</span> : <?php echo $item['Add_Data'] ?>
                </li>
                <li>
                    <i class="fa fa-magic  fa-fw"></i>
                    <span>Price</span> : <?php echo $item['Price'] ?>
                </li>
                <li>
                    <i class="fa fa-building fa-fw"></i>
                    <span>Made In</span> : <?php echo $item['Country'] ?>
                </li>
                <li>
                    <i class="fa fa-tags fa-fw"></i>
                    <span>Category</span> : <a href="catigories.php?cat_id=<?php echo $item['Cat_ID'] ?>"><?php echo $item['category_name'] ?></a>
                </li>
                <li>
                    <i class="fa fa-user fa-fw"></i>
                    <span>Added By</span> : <a href="#"><?php echo $item['Username'] ?></a>
                </li>
            </ul>
        </div>
    </div>
    <hr class="custom-hr">
    <?php

    }else{

        header('Location:login.php'); // This page does not exist. Invalid login
        exit();

    }
    include $temp."footer.php";
    ob_end_flush();

