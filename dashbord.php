<?php

    global $temp;
    session_start();

    if(isset($_SESSION['Username'])){

      $page_title = 'DASHBOARD'; // The page name

       include 'init.php';

      /* Start Dashboard Page */

        // This function shows me a list of the data I want from the database

        $numUsers = 6;  // Number Of Latest Users

        $theLatest = getLatest('*' ,'users' , 'Username' , $numUsers );


      ?>
		<div class="home-stats">
			<div class="container text-center">
				<h1>Dashboard</h1>
				<div class="row">
					<div class="col-md-3">
						<div class="stat st-members">
							<i class="fa fa-users"></i>
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
							<i class="fa fa-user-plus"></i>
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
							<i class="fa fa-tag"></i>
							<div class="info">
								Total Items
								<span>
									<a href="#">12</a>
								</span>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="stat st-comments">
							<i class="fa fa-comments"></i>
							<div class="info">
								Total Comments
								<span>
									<a href="#">15</a>
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
                                <ul class="list-group latest-users">
                                    <?php
                                    if (! empty($theLatest)) {
                                        foreach ($theLatest as $user) {
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
                                <ul class="list-unstyled latest-users">

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

