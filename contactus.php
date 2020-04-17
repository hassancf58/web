<?php
  require 'config.php';

  // define variables and set to empty values
$nameErr = $emailErr = $messageErr = "";
$name = $email = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
  if (empty($_POST["message"])) {
   $messageErr = "Message is required";
 } else {
   $message = test_input($_POST["message"]);
 }
    
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

  

  $insr ="insert into contact(fullname,email,message)values('$name','$email','$message')";
  mysqli_query($conn,$insr)


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Contact Us</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link type="text/css" rel="stylesheet" href="css/contactus.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<!------ Include the above in your HEAD tag ---------->

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,800,900%7cRaleway:300,400,500,600,700" rel="stylesheet">
<style>
.error {color: #FF0000;}
</style>
</head>
<body>


<nav class="navbar fixed-top navbar navbar-expand-xl bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="index.php"><i class="fas fa-utensils"></i>&nbsp;&nbsp;Baeruti resturant</a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">


      <ul class="navbar-nav mx-auto">
        <li class="nav-item ">
          <a class="nav-link " href="index.php"> Food</a>
        </li>&nbsp;
        <li class="nav-item ">
          <a class="nav-link" href="aboutusNew.php">About us </a>
        </li>&nbsp;
        <li class="nav-item ">
          <a class="nav-link active" href="contactus.php">Contact us</a>
        </li>&nbsp;

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i>Cart<span id="cart-item" class="badge badge-danger"></span></a>
        </li>
      </ul>
    </div>
  </nav>
  

    <section class="contact pt-100 pb-100" id="contact">
         <div class="container">
            <div class="row">
               <div class="col-xl-6 mx-auto text-center">
                  <div class="section-title mb-100">
                     <p>Get In Touch</p>
                     <h4>Contact Us</h4>
                  </div>
               </div>
            </div>
            <div class="row text-center">
                  <div class="col-md-8">
                     <form action="contactus.php" class="contact-form" method="POST" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
                        <div class="row">
                           <div class="col-xl-6">
                           <span class="error"> <?php echo $nameErr;?></span>
                              <input type="text" placeholder="name" name="name"> 
                           </div>
                           <div class="col-xl-6">
                           <span class="error"> <?php echo $emailErr;?></span>
                              <input type="text" placeholder="email" name="email"> 
                           </div>
                           <div class="col-xl-12">
                           <span class="error"><?php echo $messageErr;?></span>
                              <textarea placeholder="message" cols="30" rows="10" name="message"></textarea>
                              
                              <input type="submit" value="send message">
                           </div>
                        </div>
                     </form>
                  </div>
                  <div class="col-md-4">
                     <div class="single-contact">
                        <i class="fa fa-map-marker"></i>
                        <h5>Address</h5>
                        <p>Alhijra Streest, Madina, KSA</p>
                     </div>
                     <div class="single-contact">
                        <i class="fa fa-phone"></i>
                        <h5>Phone</h5>
                        <p>(+966) 581155803</p>
                     </div>
                     <div class="single-contact">
                        <i class="fa fa-envelope"></i>
                        <h5>Email</h5>
                        <p>Baeruti@gmail.com</p>
                     </div>
                  </div>
            </div>
         </div>
      </section>
</body>
</html>