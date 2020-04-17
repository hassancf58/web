<?php
/*we have created a base page that common between more than one page 
it include the nav bar and backround image and that six buttons so here we need to include it */

include_once('base.php')
 ?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <style>
    #sticky-footer{
            position:static;
            bottom: 0;
            left: 0;
            right: 0;
        }
  </style>
</head>
<body>
<div class="container">
    <div class="row mt-2 pb-3">

      <?php
      /* In this project we need to connet to the database base a lot so we create that
      connection in a other page and when we need to connect to DB we have to include it */

      include 'config.php';
      // This our query ussing prepare function
      $stmt = $conn->prepare("SELECT * FROM items");
      //execute it
      $stmt->execute();
      //all rows will be saved in result variable
      $result = $stmt->get_result();
      //Tis while loop to go through all rows one by one ad saved it in row variable
      while ($row = $result->fetch_assoc()) :
      ?>
        <!-- Now for every row we want to take the vale for img and name and price -->
        <div class="col-lg-3 col-sm-6 col-md-4 mb-2">
          <div class="card-deck">
            <div class="card p-2 border-secodary mb-2">
              <img src="<?= $row['iimg'] ?>" class="card-img-top img-fluid">
              <div class="card-body p-1">
                <h4 class="card-title text-center text-info"><?= $row['iname'] ?><h4>
                    <h5 class="card-text text-center text-danger"><i class="fas fa-money-bill-wave"></i>&nbsp;&nbsp;<?= number_format($row['iprice'], 2) ?> SAR</h5>
              </div>
              <!-- Now this is a hidden information, if the user click on add to cart so we can know which item 
              we will use javascript to get this info  -->
              <div class="card-footer p-1">
              <!-- in base.php page we will use the class of this form below -->
                <form action="" class="form-submit">
                  <input type="hidden" class="pid" value="<?= $row['iid'] ?>">
                  <input type="hidden" class="pname" value="<?= $row['iname'] ?>">
                  <input type="hidden" class="pprice" value="<?= $row['iprice'] ?>">
                  <input type="hidden" class="pimage" value="<?= $row['iimg'] ?>">
                  <input type="hidden" class="pcat" value="<?= $row['icat'] ?>">
                  <input type="hidden" class="pcode" value="<?= $row['icode'] ?>">
                  <button class="btn btn-info btn-block addItemBtn"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to cart</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
    <br><br><br><br>
    

  </div>
      <!-- Footer -->
      <footer id="sticky-footer" class="py-4 bg-dark text-white-50">
        <div class="container text-center">
          © 2020 Copyright:
          <a href="http://localhost/cs314project/">Baeruti.com</a>
        </div>
      </footer>
      <!-- Footer -->
</body>

</html>

    
  