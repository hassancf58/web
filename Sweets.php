<?php
include_once('base.php')
 ?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sweets Page</title>
</head>
<body>
  
  <div class="container">
  <div class="row mt-2 pb-3">
      <?php
      include 'config.php';
      $stmt = $conn->prepare("SELECT * FROM items WHERE icat=5");
      $stmt->execute();
      $result = $stmt->get_result();
      while ($row = $result->fetch_assoc()) :
      ?>
        <div class="col-lg-3 col-sm-6 col-md-4 mb-2">
          <div class="card-deck">
            <div class="card p-2 border-secodary mb-2">
              <img src="<?= $row['iimg'] ?>" class="card-img-top img-fluid">
              <div class="card-body p-1">
                <h4 class="card-title text-center text-info"><?= $row['iname'] ?><h4>
                    <h5 class="card-text text-center text-danger"><i class="fas fa-money-bill-wave"></i>&nbsp;&nbsp;<?= number_format($row['iprice'], 2) ?> SAR</h5>
              </div>
              <div class="card-footer p-1">
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