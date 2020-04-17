<?php
    session_start();
    require 'config.php';
    // store all variables that coming from client side 
    if(isset($_POST['pid'])){
        $pid = $_POST['pid'];
        $pname = $_POST['pname'];
        $pprice = $_POST['pprice'];
        $pimage = $_POST['pimage'];
        $pcode = $_POST['pcode'];
        $pcat= $_POST['pcat'];
        $pqty = 1;
        //get all items has been chosen by the  through the item code => icode
        $stmt = $conn->prepare("SELECT icode FROM cart WHERE icode=?");
        $stmt->bind_param("s",$pcode);
        $stmt->execute();
        $res = $stmt->get_result();
        $r = $res->fetch_assoc();
      
        
        //check if it is not exist add that item into cart table and show message
        //..else show message it is already added
        if(!$r['icode']){
            $query = $conn->prepare("INSERT INTO cart (iname,iimg,iprice,icat,qty,totalprice,icode) VALUES (?,?,?,?,?,?,?)");
            $query->bind_param("ssiiiis",$pname,$pimage,$pprice,$pcat,$pqty,$pprice,$pcode);
            $query->execute();

            echo '<div class="alert alert-success alert-dismissible mt-2">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Item added to your cart!</strong>
             </div>';

        }
        // if the item already exist in cart => then show message
        else{
            echo '<div class="alert alert-danger alert-dismissible mt-2">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Item Already added to your cart!</strong>
             </div>';
        }
    }// to count the number items in cart
    if(isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item'){
        $stmt = $conn->prepare("SELECT * FROM cart");
        $stmt->execute();
        $stmt->store_result();
        $rows = $stmt->num_rows;
        echo $rows;
    }// when user click on remove symbol in cart so remove it from cart table
    if(isset($_GET['remove'])){
        $id = $_GET['remove'];
        $stmt = $conn->prepare("DELETE FROM cart WHERE iid=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();

        $_SESSION['showAlert'] = 'block';
        //desplay message Then load the cart.php page again
        $_SESSION['message'] = 'Item removed from the cart!';
        header('location:cart.php');
   }// This is to delete all items from cart table
   if(isset($_GET['clear'])){
       $stmt = $conn->prepare("DELETE FROM cart");
       $stmt->execute();
       $_SESSION['showAlert'] = 'block';
        $_SESSION['message'] = 'All Item removed from the cart!';
        header('location:cart.php');

   }// update qty value if user increase the number of items
   if(isset($_POST['qty'])){
       $qty = $_POST['qty'];
       $pid = $_POST['pid'];
       $pprice = $_POST['pprice'];
       $tprice = $qty*$pprice;
       $stmt = $conn->prepare("UPDATE cart SET qty=?, totalprice=? WHERE iid=?");
       $stmt->bind_param('iii',$qty,$tprice,$pid);
       $stmt->execute();
   }
   
?>