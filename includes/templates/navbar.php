<nav class="navbar navbar-expand-lg" style="background-color: #123354;">

  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fa-solid fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#"><?php echo lang('HOME')?></a></li>
        <li class="nav-item"><a class="nav-link" href="#"><?php echo lang('GATIGORIES')?></a></li>
        <li class="nav-item"><a class="nav-link" href="members.php"><?php echo lang('MEMPERS')?></a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" 
            href="#" 
            role="button" 
            data-bs-toggle="dropdown" 
            aria-expanded="false">
              isa
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="members.php?do=Edit&ID=<?php echo $_SESSION['ID']?>"><?php echo lang('EDIT')?></a></li>
            <li><a class="dropdown-item" href="#"><?php echo lang('SITTING')?></a></li>
            <li><a class="dropdown-item" href="logout.php"><?php echo lang('LOGOUT')?></a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>