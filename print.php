
<?php
	require 'config.php';
	
	

    $grand_total = 0;
    $allItemas = 0;
    $items = array();

    $sql ="SELECT iname, qty , totalprice FROM cart";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc()){
        $grand_total +=$row['totalprice'];
        $items[] = $row['qty'];
    }
    $allItemas = implode(", ", $items);
?>
<!doctype html>
<html lang="en">
	<head>
		<title>Order</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link type="text/css" rel="stylesheet" href="css/print.css">
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <!--Bootsrtap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
			</head>
	<body onload="startTime()">
		<div id="editor" class="edit-mode-wrap" style="margin-top: 20px">
			
<div class="invoice-wrap">
<div class="invoice-inner">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tbody>
		<tr>
			<td align="left" class="is_logo" valign="top"><img class="editable-area" height="102" id="logo" src="/img/back1.jpg" width="122" /></td>
			<td align="right" valign="top">
			<div class="business_info">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tbody>
					<tr>
						<td><span class="editable-area" id="business_info"><h1 style="font-size: 14pt;">Beroti Resturant</h1>
Sultana Road<br />
Medina, Madina Munawara 484641<br />
<div id="showTime" class="time"> </div>
0569637550<br />
birouti@gmail.com</span></td>
					</tr>
				</tbody>
			</table>
			</div>
			</td>
			<td align="right" valign="top" width="50%">
			<img class="" height="102" id="logo" src="img/back1.jpg" width="122" />
			</td>
		</tr>
	</tbody>
</table>

<hr>
<hr>
<br>

<div id="items-list"><table class="table table-bordered table-condensed table-striped items-table">
	<thead>
		<tr>
			<th>Description</th>
			<th>Quantity</th>
			<th>Unit price</th>
									<th width="100">Amount</th>
		</tr>
	</thead>
	<tfoot>
												<tr class="totals-row">
			<td colspan="2" class="wide-cell"></td>
			<td><strong>Total</strong></td>
			<td coslpan="2"><b><?= number_format($grand_total,2)?>SAR</b></td>
		</tr>
		<tr class="totals-row">
			<td colspan="2" class="wide-cell"></td>
			<td><strong>Total after tax 5%</strong></td>
			<td coslpan="2"><b><?= number_format($grand_total*0.05 + $grand_total,2)?>SAR</b></td>
		</tr>

				</tbody>
	<tbody>
		<?php
		
		 require 'config.php';
	$stmt = $conn->prepare("SELECT * FROM cart");
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $grand_total = 0;
                            while ($row = $result->fetch_assoc()) :
                            ?>
					<tr>
				<td><b><?= $row['iname'] ?></b></td>
				<td><b><?= $row['qty'] ?></b></td>
				<td><b><?= number_format($row['iprice'], 2); ?>SAR</b></td>
												<td><b><?= number_format($row['totalprice'], 2); ?>SAR</b></td>
			</tr>
			<?php $grand_total += $row['totalprice']; ?>

<?php endwhile ?>
			</tbody>
</table>
					
</div>


	<style>
body {
    background: #EBEBEB;
}
.invoice-wrap {box-shadow: 0 0 4px rgba(0, 0, 0, 0.1); margin-bottom: 20px; }
#mobile-preview-close a {
position:fixed; left:20px; bottom:30px; 
background-color: #27c24c;
font-weight: 600;
outline: 0 !important;
line-height: 1.5;
border-radius: 3px;
font-size: 14px;
padding: 7px 10px;
border:1px solid #27c24c;
text-decoration:none;
}
#mobile-preview-close img {
	width:20px;
	height:auto;
}
#mobile-preview-close a:nth-child(2) {
left:190px;
background:#f5f5f5;
border:1px solid #9f9f9f;
color:#555 !important;
}
#mobile-preview-close a:nth-child(2) img {
    height: auto;
	position: relative;
top: 2px;
}
.invoice-wrap {padding: 20px;}


@media print {
  #mobile-preview-close a {
  display:none
}
.invoice-wrap {0}
body {
    background: none;
}
.invoice-wrap {box-shadow: none; margin-bottom: 0px;}

}
</style>
<a href="index.php" class="btn btn-success "><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Continue Ordering</a>
<a href="live.php" class="btn btn-warning ">Watch Your Order Live</a>
<button class="btn btn btn-info text-center" align="right" onclick="window.print();"><i class="fas fa-print"></i> Print</button>


        </div>
</div>





<script>
var d = new Date();
document.getElementById("showTime").innerHTML = d;
	</script>
</body>
</html>