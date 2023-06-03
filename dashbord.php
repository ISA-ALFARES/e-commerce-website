<?php
session_start();
if(isset($_SESSION['Username'])){

      $page_title = 'DASHBORD'; // The page name
      include 'init.php'; 
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
									<a href="members.php"> <?php echo count_items('UserID' ,'users'); ?> </a>
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
									<a href="members.php?do=Manage&page=Pending">
										13
									</a>
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
									<a href="items.php">12</a>
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
									<a href="comments.php">15</a>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
      <?php
      include $temp."footer.php";

}else{
  header('Location:index.php');// user is not admin  Around the index.php page 
  exit();
}
