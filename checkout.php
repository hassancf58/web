<?php
    require 'config.php';

    $grand_total = 0;
    $allItemas = 0;
    $items = array();

    $sql ="SELECT CONCAT(iname, '(',qty,')') AS ItemQty, totalprice FROM cart";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc()){
        $grand_total +=$row['totalprice'];
        $items[] = $row['ItemQty'];
    }
    $allItemas = implode(", ", $items);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Checkout</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
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

<body style="background: radial-gradient(lightblue 50% ,orange 50%);">


  <nav class="navbar navbar-expand-xl bg-dark navbar-dark">
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
          <a class="nav-link active" href="index.php"> Food</a>
        </li>&nbsp;
        <li class="nav-item ">
          <a class="nav-link" href="aboutus.php">About us </a>
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
  <div>
    <img src="./img/back3.jpg" alt="backround" class="back">
  </div>
  <br><br><br>
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 px-4 pb-4">
            <h4 class="text-center text-info p-2">Complete your order!</h4>
            <div class="jumbotron p-3 mb-2 text-center"  id="printJS-form">
                <h6 class="lead"><b>Order(s) : </b><?= $allItemas;?></h6>
                <h5><b>Total Amount Payable : </b><?= number_format($grand_total,2)?>SAR</h5>
                
            </div>
            <button class="btn" onclick="window.print();"><i class="fas fa-print"></i> Download</button>
        </div>
    </div>
  </div>


      
  <!-- Bootstrap 4 w3s JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <!-- Font awasome JS -->
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="print.js?v1.0.61"></script>
  <!-- Bootstrap 4 JS -->
 
  <script type="text/javascript">
    $(document).ready(function() {
 
   
      load_cart_item_number();

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
</body>

</html>