<!-- admin navigation bar -->

<nav class="navbar navbar-expand-md navbar-dark" style="background:#08001C">
  
  <a class="navbar-brand" href="index.php">
    <img src="images/logolime.png" style="width:100px;" class="d-inline-block align-top" alt="logo">
  </a>

  <button class="navbar-toggler"  type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon" ></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link p-3" style="color: #b3df00"  href="admin.php">ADMIN PANEL </a>
      </li>
      <li class="nav-item">
        <a class="nav-link p-3" style="color: #b3df00" href="admin_user.php"><i class="fas fa-users-cog"></i> MEMBERS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link p-3" style="color: #b3df00" href="admin_films.php"><i class="fas fa-video"></i> FILMS</a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link p-3" style="color: #b3df00" href="admin_news.php"><i class="fas fa-newspaper"></i> NEWSLETTER</a>
      </li> -->
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
