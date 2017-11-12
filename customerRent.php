<?php 
	include('customerAccessControl.php');
?>

<div style="text-align:right; margin-right:20px; color: red">Login as: <?php echo $username?></div>
<div style="text-align:left; margin-left:10px"><a href="customerMenu.php" style="color:blue; font-size:18px;margin-right:5px"> &#8678 Back to Customer Menu</a></div>

<link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.datepicker.min.css" rel="stylesheet" type="text/css">
<script src="jQueryAssets/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="jQueryAssets/jquery.ui-1.10.4.datepicker.min.js" type="text/javascript"></script>

<style>
 #table{
	 margin-top: 1%; 
	 margin-left: auto;
	 border: 4px thin black; 
	 border-collapse: separate;
	};
</style>

<style>
* {
    box-sizing: border-box;
}

.columns {
    float: left;
    width: 33.3%;
    padding: 8px;
}

.price {
    list-style-type: none;
    border: 1px solid #eee;
    margin: 0;
    padding: 0;
    -webkit-transition: 0.3s;
    transition: 0.3s;
}

.price:hover {
    box-shadow: 0 8px 12px 0 rgba(0,0,0,0.2)
}

.price .header {
    color: white;
    font-size: 25px;
	height: 150px;
}

.price li {
    border-bottom: 1px solid #eee;
    padding: 20px;
    text-align: center;
}

.price .grey {
    background-color: #eee;
    font-size: 20px;
}

.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 10px 25px;
    text-align: center;
    text-decoration: none;
    font-size: 18px;
}

@media only screen and (max-width: 600px) {
    .columns {
        width: 100%;
    }
}
</style>  	


<form method="post" action="">
  <table id="table" width="600" border="1" align="center" bordercolor="white">
    <tbody>
      <tr>
        <td><strong>Pick-up</strong></td>
        <td><strong>Drop-off</strong></td>
        <td><strong>Sorted by</strong></td>
        
      </tr>
      <tr>
        <td><input style="text-align: center" type="text" id="from" name="pickup" placeholder="mm/dd/yyyy" required="required"></td>
        <td><input style="text-align: center" type="text" id="to" name="dropoff" placeholder="mm/dd/yyyy" required="required"></td>
        <td>
          <select name="sorted">
            <option value="rate">Rate</option>
            <option value="brand">Brand</option>
            <option value="type">Type</option>
          </select>
        </td>
        <td rowspan="2"><input type="submit" name="search" value="Search"></td>
      </tr>
    </tbody>
  </table>
</form>


<form method="post" action="">
<?php
	if(isset($_POST["search"])){
		$pickup = date('Y-m-d',strtotime($_POST['pickup']));
		$dropoff = date('Y-m-d',strtotime($_POST['dropoff']));
		$_SESSION ['pickup']=$pickup;
		$_SESSION ['dropoff']=$dropoff;

		
		$sorted = $_POST['sorted'];
		$search_car = "SELECT * FROM cars WHERE available = 'yes' AND vin NOT IN (SELECT vin FROM  booking WHERE (pickup <= '$pickup' AND dropoff >= '$pickup' AND status <> 'cancelled' AND status <> 'declined') OR (pickup < '$dropoff' AND dropoff >= '$dropoff' AND status <> 'cancelled' AND status <> 'declined') OR ('$pickup' <= pickup AND '$dropoff' >= pickup AND status <> 'cancelled' AND status <> 'declined')) ORDER BY $sorted";	
		
		$result=mysqli_query($db, $search_car);

		while($row = mysqli_fetch_assoc($result)){
			?>
			<div class="columns">
				<ul class="price">
					<li class="header"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'" heigh="200" width="200"/>'?>	</li>
					<li class="grey"><?php echo "\$". $row['rate']."/day"?></li>
					<li><?php echo "Brand: ".$row['brand'] ?></li>	
					<li><?php echo "Model: ".$row['model'] ?></li>	
					<li><?php echo "Type: ".$row['type'] ?></li>	
					<li><?php echo "Year: ".$row['year'] ?></li>	
					<li><?php echo "Capacity: ".$row['capacity'] ?></li>	
					<li class="grey"><a href="customerPay.php?id=<?php echo $row['vin']?>&rate=<?php echo $row['rate']?>">Book Now</a>
				</ul>
			</div>
			
		<?php
		}
	}
?>
</form>

<script>
$(function () {
    $("#from").datepicker({
        minDate: 0,
        onSelect: function (selected) {
            var dt = new Date(selected);
            dt.setDate(dt.getDate() + 1);
            $("#to").datepicker("option", "minDate", dt);
        }
    });
    $("#to").datepicker({
       
        onSelect: function (selected) {
            var dt = new Date(selected);
            dt.setDate(dt.getDate() - 1);
            $("#txtFrom").datepicker("option", "maxDate", dt);
        }
    });
});
</script>
