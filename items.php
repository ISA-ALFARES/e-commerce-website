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
            <h1 class="text-center"><?php echo $item['Name'] ?></h1>
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
                            <li class="tags-items">
                                <i class="fa fa-user fa-fw"></i>
                                <span>Tags</span> :
    <!--                            --><?php
    //                                $allTags = explode(",", $item['tags']);
    //                                foreach ($allTags as $tag) {
    //                                    $tag = str_replace(' ', '', $tag);
    //                                    $lowertag = strtolower($tag);
    //                                    if (! empty($tag)) {
    //                                        echo "<a href='tags.php?name={$lowertag}'>" . $tag . '</a>';
    //                                    }
    //                                }
    //                            ?>
                            </li>
                        </ul>
                    </div>
                </div>
                <hr class="custom-hr">
                <?php if (isset($_SESSION['user'])) { ?>
                    <!-- Start Add Comment -->
                    <div class="row">
                        <div class="col-md-9 offset-md-3">
                            <div class="add-comment">
                                <h3 class="mb-4">Add Your Comment</h3>
                                <form action="<?php echo $_SERVER['PHP_SELF'] . '?item_ID=' . $item['Item_ID'] ?>" method="POST">
                                    <div class="mb-3">
                                        <textarea class="form-control" name="comment" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <input class="btn btn-primary" type="submit" value="Add Comment">
                                    </div>
                                </form>
                                <?php
                                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                    $comment = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);
                                    $commentItemid = $item['Item_ID'];
                                    $userid = $_SESSION['usrID'];

                                    if (!empty($comment)) {
                                        $stmt = $connection->prepare("INSERT INTO comments(Comment, Status, Comment_data, item_id, user_id) VALUES(:zcomment, 0, NOW(), :zitemid, :zuserid)");
                                        $stmt->execute(array(
                                            'zcomment' => $comment,
                                            'zitemid' => $commentItemid,
                                            'zuserid' => $userid
                                        ));

                                        if ($stmt) {
                                            echo '<div class="alert alert-success">Comment Added</div>';
                                        }
                                    } else {
                                        echo '<div class="alert alert-danger">You Must Add Comment</div>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- End Add Comment -->
                <?php }  else {
                    echo '<a href="login.php">Login</a> or <a href="login.php">Register</a> To Add Comment';
                }?>
                <hr class="custom-hr">
                <?php

                    // Select All Users Except Admin
                    $stmt = $connection->prepare("SELECT 
                                                comments.*, users.Username AS Member  
                                            FROM 
                                                comments
                                            INNER JOIN 
                                                users 
                                            ON 
                                                users.UserID = comments.user_id
                                            WHERE 
                                                Item_ID = ?
                                            AND 
                                                status = 1
                                            ORDER BY 
                                                comment_ID DESC");

                    // Execute The Statement

                    $stmt->execute(array($item['Item_ID']));

                    // Assign To Variable

                    $comments = $stmt->fetchAll();

                ?>

            <?php foreach ($comments as $comment) { ?>
                <div class="comment-box">
                    <div class="row">
                        <div class="col-2 text-center">
                            <img class="img-fluid img-thumbnail rounded-circle" src="./layout/images/b5.jpg" alt="" />
                            <p class="mt-2"><?php echo $comment['Member'] ?></p>
                        </div>
                        <div class="col-10">
                            <p class="lead text-dark"><?php echo $comment['Comment'] ?></p>
                        </div>
                    </div>
                </div>
                <hr class="custom-hr">
            <?php }
       echo '</div>';
	} else {
		echo '<div class="container">';
			echo '<div class="alert alert-danger">There\'s no Such ID Or This Item Is Waiting Approval</div>';
		echo '</div>';
	}



    include $temp."footer.php";
    ob_end_flush();

