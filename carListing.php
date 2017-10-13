<?php include("header.php")?>


<h1>Car Inventory</h1>
<table border=2 align=center style='margin-top:30px; font-size:25px' >
<tr>
<th width='10%' bgcolor=lightgray style='color:black; padding:15px'>Vehicle</th>
<th width='10%' bgcolor=lightgray style='color:black; padding:15px'>Brand</th>
<th width='10%' bgcolor=lightgray style='color:black; padding:15px'>Model</th>
<th width='10%' bgcolor=lightgray style='color:black; padding:15px'>Type</th>
<th width='10%' bgcolor=lightgray style='color:black; padding:15px'>Year</th>
<th width='10%' bgcolor=lightgray style='color:black; padding:15px'>Color</th>
<th width='10%' bgcolor=lightgray style='color:black; padding:15px'>Rate</th>
<th width='10%' bgcolor=lightgray style='color:black; padding:15px'>Mileage</th>
<th width='10%' bgcolor=lightgray style='color:black; padding:15px'>Seating Capacity</th>

</tr>

<?php 	include("connection.php");
	if(isset($_POST["search"])){
		
		if(isset($_GET['order'])){
			$order = $_GET['order'];
		}else{
			$order = "brand";
		}
		if(isset($_GET['sort'])){
			$sort = $_GET['sort'];
		}else{
			$sort = "ASC";
		}
		
		$list_car = "SELECT * FROM cars ORDER BY brand ASC";
		//$orderSet = mysqli_query($db,"SELECT * FROM cars ORDER BY brand ASC");
		$result=mysqli_query($db, $list_car);
		
		while($row = mysqli_fetch_assoc($result))
			{	

				//echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'" heigh="200" width="200"/>';

				echo  "<tr>" . "<td>" . '<img src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'" heigh="200" width="200"/>' . "</td>";
				echo  "<td>". $row['brand']. "</td>"; 
				echo  "<td>". $row['model']. "</td>"; 
				echo  "<td>". $row['type']. "</td>"; 
				echo  "<td>". $row['year']. "</td>"; 
				echo  "<td>". $row['color']. "</td>";
				echo  "<td>". "\$". $row['rate']. "</td>";
				echo  "<td>". $row['mileage']. "</td>";
				echo  "<td>". $row['capacity']. "</td>";
			}
	}

		

?>