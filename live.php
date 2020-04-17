
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="css/Aghiad.css">
    <!--Bootsrtap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Display Webcam Stream</title>

    <style>
      #container {
        margin: 0px auto;
        width: 1000px;
        height: 700px;
        border: 10px #333 solid;
      }
      #videoElement {
        width: 1000px;
        height: 700px;
        background-color: #666;
      }
     
    </style>
  </head>

  <body>
  <nav class="navbar navbar-expand-xl bg-dark navbar-dark">
        <!-- Brand -->
        <a class="navbar-brand" href="index.php"><i class="fas fa-utensils"></i>&nbsp;&nbsp;Baeruti Resturant</a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">


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
                    <a class="nav-link active" href="cart.php"><i class="fas fa-shopping-cart"></i>Cart<span id="cart-item" class="badge badge-danger"></span></a>
                </li>
            </ul>
        </div>
    </nav>
    <br><br><br>
    <div class="container">
    <h1>Now You Are Watching The Happines Factory:</h1>
    <br><br>
      <div  id="container">
      <video autoplay="true" id="videoElement"></video>
      </div>
      </div>
      
    <br><br><br><br><br>

<footer id="sticky-footer" class="py-4 bg-dark text-white-50">
    <div class="container text-center">
    © 2020 Copyright:
  <a href="http://localhost/cs314project/">Baeruti.com</a>
    </div>
  </footer>
<!-- Footer -->
    <script>
      var video = document.querySelector("#videoElement");

      if (navigator.mediaDevices.getUserMedia) {
        navigator.mediaDevices
          .getUserMedia({ video: true })
          .then(function (stream) {
            video.srcObject = stream;
          })
          .catch(function (err0r) {
            console.log("Something went wrong!");
          });
      }
    </script>
  </body>
</html>
