<?php

    global $temp, $connection;
    session_start();

    if(isset($_SESSION['Username'])){

      $page_title = 'DASHBOARD'; // The page name

       include 'init.php';

      /* Start Dashboard Page */

        // This function shows me a list of the data I want from the database

        $numUsers = 6;  // Number Of Latest Users

        $user_Latest = getLatest('*' ,'users' , 'Username' , $numUsers );
        $num_items = 6 ;
        $item_latest = getLatest("*" , 'items' ,'Name' ,$num_items);


      ?>
		<div class="home-stats">
			<div class="container text-center">
				<h1>Dashboard</h1>
				<div class="row">
					<div class="col-md-3">
						<div class="stat st-members">
                            <a href="members.php"><i class="fa fa-users"></i></a>
							<div class="info">
								Total Members
								<span>
									<a href="members.php"> <?= count_items('UserID' ,'users') ?> </a>
								</span>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="stat st-pending">
                            <a href="members.php?do=Mangae&page=pending"><i class="fa fa-user-plus"></i></a>
							<div class="info">
								Pending Members
								<span>
									<a href="members.php?do=Mangae&page=pending"><?= count_items('UserID' ,'users' , 'WHERE RegStatus = 0 ') ?></a>
								</span>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="stat st-items">
                            <a href="items.php"><i class="fa fa-tag"></i></a>
							<div class="info">
								Total Items
								<span>
									<a href="items.php"> <?= count_items('Item_ID' ,'items') ?> </a>
								</span>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="stat st-comments">
                            <a href="comments.php"><i class="fa fa-comments"></i></a>
							<div class="info">
								Total Comments
								<span>
                                    <a href="comments.php"> <?= count_items('comment_id' ,'comments') ?> </a>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        <div class="latest">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-users"></i>
                                Latest <?php echo 6 ?>  Registerd Users
                                <span class="toggle-info pull-right">
									<i class="fa fa-plus fa-lg"></i>
								</span>
                            </div>
                            <div class="panel-body">
                                <ul class="list-group latest-users ">
                                    <?php
                                    if (! empty($user_Latest)) {
                                        foreach ($user_Latest as $user) {
                                            echo '<li class="list-group-item">';
                                            echo $user['Username'];
                                            echo '<a href="members.php?do=Edit&ID=' . $user['UserID'] . '">';
                                            echo '<span class="btn btn-success pull-right">';
                                            echo '<i class="fa fa-edit"></i> Edit';
                                            if ($user['RegStatus'] == 0) {
                                                echo "<a 
																	href='members.php?do=activate&ID=" . $user['UserID'] . "' 
																	class='btn btn-info pull-right activate'>
																	<i class='fa fa-check'></i> Activate</a>";
                                            }
                                            echo '</span>';
                                            echo '</a>';
                                            echo '</li>';
                                        }
                                    } else {
                                        echo 'There\'s No Members To Show';
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-tag"></i> Latest  Items
                                <span class="toggle-info pull-right">
									<i class="fa fa-plus fa-lg"></i>
								</span>
                            </div>
                            <div class="panel-body">
                                <ul class="list-group latest-users ">
                                    <?php
                                    if (! empty($item_latest)) {
                                        foreach ($item_latest as $item) {
                                            echo '<li class="list-group-item">';
                                            echo $user['Username'];
                                            echo '<a href="items.php?do=Edit&item_id=' . $item['Item_ID'] . '">';
                                            echo '<span class="btn btn-success pull-right">';
                                            echo '<i class="fa fa-edit"></i> Edit';
                                            if ($item['Approve'] == 0) {
                                                echo "<a href='items.php?do=Approve&item_id=" . $item['Item_ID'] . "'class='btn btn-info pull-right activate'>
												<i class='fa fa-check'></i> Approve</a>";
                                            }
                                            echo '</span>';
                                            echo '</a>';
                                            echo '</li>';
                                        }
                                    } else {
                                        echo 'There\'s No Members To Show';
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Start Latest Comments -->
                <div class="row">
                    <div class="col-sm-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-comments-o"></i>
                                Latest Comments
                                <span class="toggle-info pull-right">
									<i class="fa fa-plus fa-lg"></i>
								</span>
                            </div>
                            <div class="panel-body">
                                <ul class="list-group latest-users ">
                                    <?php
                                    $stetment=$connection->prepare("SELECT comments.*,users.Username AS username
                                              FROM comments
                                              INNER JOIN users
                                              ON users.UserID  = comments.user_id 
                                              ");
                                    //execute the data entered by the user
                                    $stetment->execute();
                                    //Assign to variable...
                                    $comment_latest = $stetment->fetchAll();
                                    if (! empty($comment_latest)) {
                                        foreach ($comment_latest as $comment) {
                                            echo '<li class="list-group-item">';
                                            echo "<div class='user_comment' >";
                                                    echo $comment['username'];
                                                echo "<h5 class='comment'>";
                                                    echo $comment['Comment'];
                                                echo "<h5>";
                                            echo '<a href="comments.php?do=Edit&comment_id=' . $comment['comment_ID'] . '">';
                                            echo "</div>";
                                            echo '<span class="btn btn-success pull-right comment_edit ">';
                                            echo '<i class="fa fa-edit  "></i> Edit';
                                            if ($comment['Status'] == 0) {
                                                echo "<a href='comments.php?do=activate&comment_id=" . $comment['comment_ID'] . "'class='btn btn-info pull-right activate comment_edit'>
												<i class='fa fa-check '></i> Approve</a>";
                                            }
                                            echo '</span>';
                                            echo '</a>';
                                            echo '</li>';
                                        }
                                    } else {
                                        echo 'There\'s No Comment To Show';
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Latest Comments -->
            </div>
        </div>
		<?php
        include $temp."footer.php";
    }else{
      header('Location:index.php');// user is not admin  Around the index.php page
      exit();
}

