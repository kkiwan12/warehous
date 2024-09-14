<?php if($_SESSION['lang'] == 'en'):?>
<nav class="navbar navbar-expand-lg bg-white sticky-top shadow" id="navbar-example2">
  <div class="container">
    <a class="navbar-brand " href="#" style="color: #0f4e81;">Kiwan Taekwondo Irbid</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#news">News</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#contact_us">contact us</a>
        </li>
 
      <li>
            <div class="dropdown">
        <button class="btn btn-outline-darck dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-globe-americas"></i>
        </button>
        <ul class="dropdown-menu">
          <li> <button class="dropdown-item" onclick="setLanguage('en')">English</button></li>
          <li> <button class="dropdown-item" onclick="setLanguage('ar')">العربية</button></li>
          
        </ul>
      </div>
      </li>
        <?php if(isset($_SESSION['loggedIn'])): ?>
        <li class="nav-item">
          <a class="nav-link" href="#"><?= $_SESSION['loggedInUser']['name'] ?></a>
        </li>
        <li class="nav-item">
          <a class="btn btn-outline-danger " href="logout.php"><i class="bi bi-box-arrow-right"></i></a>
        </li>
        <?php else: ?>
        <li class="nav-item">
          <a class="nav-link" href="login.php">login</a>
        </li>    
        <?php endif; ?>
    

      </ul>

    </div>
  </div>
</nav>
<?php else: ?>
  <nav class="navbar navbar-expand-lg bg-white sticky-top shadow" id="navbar-example2">
  <div class="container">
    <a class="navbar-brand " href="#" style="color: #0f4e81;">Kiwan Taekwondo Irbid</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">الرئيسية</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#news">الاحداث</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#about">من نحن</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#contact_us">تواصل معنا</a>
        </li>
 
      <li>
            <div class="dropdown">
        <button class="btn btn-outline-darck dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-globe-americas"></i>
        </button>
        <ul class="dropdown-menu">
          <li> <button class="dropdown-item" onclick="setLanguage('en')">English</button></li>
          <li> <button class="dropdown-item" onclick="setLanguage('ar')">العربية</button></li>
          
        </ul>
      </div>
      </li>
        <?php if(isset($_SESSION['loggedIn'])): ?>
        <li class="nav-item">
          <a class="nav-link" href="#"><?= $_SESSION['loggedInUser']['name'] ?></a>
        </li>
        <li class="nav-item">
          <a class="btn btn-outline-danger " href="logout.php"><i class="bi bi-box-arrow-right"></i></a>
        </li>
        <?php else: ?>
        <li class="nav-item">
          <a class="nav-link" href="login.php">تسجيل دخول</a>
        </li>    
        <?php endif; ?>
    

      </ul>

    </div>
  </div>
</nav>
  <?php endif; ?>