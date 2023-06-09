<nav class="navbar navbar-expand-lg" style="background-color: #123354;">
<!--//Bu dosya tüm gezinme çubuğunu içerir-->
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fa-solid fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="dashbord.php"><?php echo lang('DASHBOARD')?></a></li>
          <li class="nav-item"><a class="nav-link" href="catigories.php"><?php echo lang('CATIGORIES')?></a></li>
          <li class="nav-item"><a class="nav-link" href="members.php"><?php echo lang('MEMBERS')?></a></li>
          <li class="nav-item"><a class="nav-link" href="items.php"><?php echo lang('ITEMS')?></a></li>
          <li class="nav-item"><a class="nav-link" href="comments.php"><?php echo lang('COMMENTS')?></a></li>
            <li class="nav-item dropdown   ">
                  <a class="nav-link dropdown-toggle"
                    href="#"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false">
                      <i class="fa-solid fa-user"></i>
                      <?php echo lang('ACCOUNT')?>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="members.php?do=Edit&ID=<?php echo $_SESSION['ID']?>"><?php echo lang('EDIT')?></a></li>
                    <li><a class="dropdown-item" href="../index.php"><?php echo lang('VISIT_SHOP')?></a></li>
                    <li><a class="dropdown-item" href="#"><?php echo lang('SITTING')?></a></li>
                    <li><a class="dropdown-item" href="logout.php"><?php echo lang('LOGOUT')?></a></li>
                  </ul>
            </li>
          <li class="nav-item dropdown   ">
              <a class="nav-link dropdown-toggle"
                 href="#"
                 role="button"
                 data-bs-toggle="dropdown"
                 aria-expanded="false">
                  <i class="fa-solid fa-globe"></i>
              </a>
              <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="?language=arabic.php""><?php echo lang('AR') ?></a></li>
                  <li><a class="dropdown-item" href="?language=turkish.php"><?php echo lang('TR') ?></a></li>
                  <li><a class="dropdown-item" href="?language=english.php"><?php echo lang('EN') ?></a></li>
              </ul>
          </li>
      </ul>
    </div>
  </div>
</nav>