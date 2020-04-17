<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cart</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="css/Aghiad.css">
    <!--Bootsrtap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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

<body class="indexBody">

<!-- Nav bar-->
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
    <!--Display an message when item removed -->
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div style="display:<?php if (isset($_SESSION['showAlert'])) {
                                        echo $_SESSION['showAlert'];
                                    } else {
                                        echo 'none';
                                    }
                                    unset($_SESSION['showAlert']); ?>" class="alert alert-success alert-dismissible mt-3">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><?php if (isset($_SESSION['message'])) {
                                echo $_SESSION['message'];
                            }
                            unset($_SESSION['message']); ?></strong>
                </div>
                <br>
                <div class="table-responsive mt-2">
                    <table class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <td colspan="7">
                                    <h4 class="text-center text-info m-0">Products in your cart</h4>
                                </td>
                            </tr>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>
                                    <a href="action.php?clear=all" class="badge-danger badge p-1" onclick="return confirm('Are you sure want to clear your cart?');"><i class="fas fa-trash"></i>&nbsp;&nbsp;Clear Cart</a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // display all items in cart table
                            require 'config.php';
                            $stmt = $conn->prepare("SELECT * FROM cart");
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $grand_total = 0;
                            while ($row = $result->fetch_assoc()) :
                            ?>
                                <tr>
                                    <td><?= $row['iid'] ?></td>
                                    <input type="hidden" class="pid" value="<?= $row['iid'] ?>">
                                    <td><img src="<?= $row['iimg'] ?>" class="img-fluid"></td>
                                    <td><?= $row['iname'] ?></td>
                                    <td><i class="fas fa-money-bill-wave"></i>&nbsp;&nbsp;<?= number_format($row['iprice'], 2); ?></td>
                                    <input type="hidden" class="pprice" value="<?= $row['iprice'] ?>">
                                    <td><input type="number" min="1" max="5" class="form-control itemQty text-center" value="<?= $row['qty'] ?>" style="width:75px;"></td>
                                    <td><i class="fas fa-money-bill-wave"></i>&nbsp;&nbsp;<?= number_format($row['totalprice'], 2); ?></td>
                                    <td>
                                        <a href="action.php?remove=<?= $row['iid'] ?>" class="text-danger lead" onclick="return confirm('Are you sure want to remove this item?');"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <!-- Calculate the sum of money -->
                                <?php $grand_total += $row['totalprice']; ?>

                            <?php endwhile ?>
                        
                            <tr>
                                <td colspan="3">
                                <!-- Take user to Home page-->
                                    <a href="index.php" class="btn btn-success"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Continue Ordering</a>
                                </td>
                                <td colspan="2"><b>Grand Total</b></td>
                                <td>
                                    <b> <i class="fas fa-money-bill-wave"></i>&nbsp;&nbsp;<?= number_format($grand_total, 2); ?></b>
                                </td>
                                <td>
                                    <!-- here if grand total less than 1 this means there is no items in cart so i want to disable the checkout button-->
                                    <a href="print.php" class="btn btn-info <?= ($grand_total > 1) ? "" : "disabled" ?>"><i class="far fa-credit-card">&nbsp;&nbsp;Place Order</i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br><br><br><br><br>
                    <!-- Footer -->
                    <footer id="sticky-footer" class="py-4 bg-dark text-white-50">
                        <div class="container text-center">
                        © 2020 Copyright:
                        <a href="http://localhost/cs314project/">Baeruti.com</a>
                        </div>
                    </footer>
                    <!-- Footer -->
                </div>

            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <!-- Font awasome JS -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
                // send the id and price of the item that i want to chang it's quantity
            $(".itemQty").on('change', function() {
                var $el = $(this).closest('tr');
                var pid = $el.find('.pid').val();
                var pprice = $el.find('.pprice').val();
                var qty = $el.find('.itemQty').val();
                location.reload(true);
             
                $.ajax({
                    url: 'action.php',
                    method: 'post',
                    cache: false,
                    data: {
                        qty:qty,
                        pid:pid,
                        pprice:pprice
                    },
                    success: function(response) {
                        console.log(response);
                    }

                });
            });

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