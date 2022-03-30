
<!-- members navigation bar -->
<nav class="navbar navbar-expand-md navbar-dark" style="background:#08001C">
  
  <a class="navbar-brand" href="index.php">
    <img src="images/logolime.png" style="width:100px;" class="d-inline-block align-top" alt="logo">
  </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item"> 
        <a class="nav-link p-3" style="color: #b3df00" href="index.php"><i class="fas fa-film"></i> What's On</a>
      </li>
      <li class="nav-item">
        <a class="nav-link p-3" style="color: #b3df00"  href="about.php"><i class="fas fa-info"></i> About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link p-3" style="color: #b3df00"  href="contact.php"><i class="fas fa-address-book"></i> Contact</a>
      </li>
      <li class="nav-item">
        <?php
      //  include 'return.php';
        ?>
      </li>
    </ul>
    <?php
      include 'signout.php';
    ?>
  </div>

 </nav>

