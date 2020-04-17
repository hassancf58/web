<!DOCTYPE html>
<html lang="en">

<head>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <link rel="stylesheet" href="css/Aghiad.css">
  <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">  
  <!--Bootsrtap CDN -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <style>
    .back {
      height: 100%;
      width: 100%;
    }

    a {
      color: white;
    }

    #cart_count {
      text-align: center;
      padding: 0 0.9rem 0.1rem 0.9rem;
      border-radius: 3rem;
    }
  </style>


</head>

<!-- <body style="background: radial-gradient(lightblue 50% ,orange 50%);"> -->

<body class="indexBody">
<!-- This is te nav bar-->
  <nav class="navbar fixed-top navbar navbar-expand-xl bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="index.php"><i class="fas fa-utensils"></i>&nbsp;&nbsp;Baeruti Resturant</a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="navbar fixed-top collapse navbar-collapse navbar-fixed-top" id="collapsibleNavbar">


      <ul class="navbar-nav mx-auto">
        <li class="nav-item ">
          <a class="nav-link" href="index.php"> Food</a>
        </li>&nbsp;
        <li class="nav-item ">
          <a class="nav-link" href="aboutusNew.php">About us </a>
        </li>&nbsp;
        <li class="nav-item ">
          <a class="nav-link" href="contactus.php">Contact us</a>
        </li>&nbsp;

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i>Cart<span id="cart-item" class="badge badge-danger"></span></a>
        </li>
      </ul>
    </div>
  </nav>

    <!-- Backround IMG -->
  <div>
    <img src="./img/back1.jpg" alt="backround" class="back">
      <div class="container">
      <h1 class="Aghiad">Welcome To Baeruti Restaurant</h1>
      <h5 class="Aghiad" id="h3">There is no <span id="span">sincerer love</span></h5>
      <h6 class="Aghiad" id="h5">than the love of food!</h6>
      </div>
    </div>
 

<!-- The buttons row-->
  <div class="container">
    <div class="btn-group btn-group-lg" role="group" aria-label="Basic example">
      <button type="button" class="btn btn-info"><a href="index.php">Home</a></button>
      <button type="button" class="btn btn-info"><a href="Breakfast.php">Breakfast</a></button>
      <button type="button" class="btn btn-info"><a href="Lunch.php">Lunch</a></button>
      <button type="button" class="btn btn-info"><a href="Dinner.php">Dinner</a></button>
      <button type="button" class="btn btn-info"><a href="Drinks.php">Drinks</a></button>
      <button type="button" class="btn btn-info"><a href="Sweets.php">Sweets</a></button>
    </div>
    <div id="message"></div>
    <br><br>
    
    <!-- Bootstrap 4 w3s JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <!-- Font awasome JS -->
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  
  <!-- Bootstrap 4 JS -->
 <!-- using this javascript we will be able to-->
  <script type="text/javascript">
    $(document).ready(function() {
  
      // when user click on add to cart button which has "addItemBtn" calss
      $(".addItemBtn").click(function(e) {
        //To stop refresh page
        e.preventDefault();
        //assighn the form values at $form var to get all hidden values
        var $form = $(this).closest(".form-submit");
        //get the value using .find() & .val()
        var pid = $form.find(".pid").val();
        var pname = $form.find(".pname").val();
        var pprice = $form.find(".pprice").val();
        var pimage = $form.find(".pimage").val();
        var pcode = $form.find(".pcode").val();
        var pcat = $form.find(".pcat").val();
        // sending a request to the server using ajax
        $.ajax({
          //data will be send to action.php
          url: 'action.php',
          method: 'post',
          //the data we want to send
          data: {
            pid: pid,
            pname: pname,
            pprice: pprice,
            pimage: pimage,
            pcode: pcode,
            pcat: pcat
          },
          success: function(response) {
            // we will succcess message to inform the user that item has added successfully
            $("#message").html(response);
            window.scrollTo(0, 0)
            load_cart_item_number();
          }
        });
      });
   
      load_cart_item_number();
        /* This function to get the number of items on cart 
        and send it to cart symbol in nav bar in base.php page*/
      function load_cart_item_number() {
        $.ajax({
          url: 'action.php',
          method: 'get',
          data: {
            cartItem: "cart_item"
          },
          success: function(response) {
            $("#cart-item").html(response);
          }
        });
      }
    });
  </script>

