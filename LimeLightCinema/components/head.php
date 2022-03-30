
<head>
  <title>Latest Movies - New Films - 3D Movies | LimeLight Cinema Midlothian</title>
  <!-- start meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta property="og:title" content="Latest Movies - New Films - 3D Movies | LimeLight Cinema">
  <meta name="keywords" content="Limelight cinema, cinemas, movies, films, sbc cinemas, film competitions, film promotions, book ticket, book movie ticket, book film ticket, cinema reservation, cinema booking, cinema ticket, cinema information">
  <meta name="description" content="See the latest films  2D, 3D and IMAX 3D at LimeLight cinemas. Browse movie times at a cinema near you and book your tickets online today. "> 
  <!-- meta tags end -->
  <!-- stylesheet & fonts start -->
  <link rel="stylesheet" href="styles/styles.css"> 
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">      
  <link rel="icon" href="images/favicon.png" type="image/x-icon"/>
   <!-- stylesheet & fonts end -->

  <!-- junior quiz style -->
  <style>
    label:hover.bg-light:hover {
      background-color: #B03F3F!important;
      color: #f6f6f6;
    }
  </style>
  <!-- junior quiz style end -->
  <!-- scripts start -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- script end -->
  <?php
  session_start();
  include 'connection.php';

  // assign LOGIN session to $session variable 
  if(isset($_SESSION['LOGIN'])){
    $session = $_SESSION['LOGIN'];
  }
  ?>

</head>
