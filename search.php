
<!DOCTYPE html>
<html>
<head>
<!-- title of page -->
<title>Seahawk Rent-A-Car </title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>

/* sets the style for the buttons */
.button {
    border: none;
	border-radius: 12px;
    color: white;
    padding: 5px 18px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    transition-duration: 0.4s;
    cursor: pointer;
}

/* sets the style for the button when it's not hovered over by the cursor */
.button1 {
    background-color: black; 
    color: white; 
    border: 2px solid black;
}

/* sets the style for the button when it's hovered over by the cursor */
.button1:hover {
    background-color: black;
    color: antiquewhite;
	border: 2px solid white;
}
	
/* sets the style of the table */
 #table{
	 margin-top: 20px; 
	 margin-left: 20% ;
	 border: 4px solid black; 
	 border-radius: 25px;
	 border-collapse: separate;
	}

/* sets the style for the background behind the title within the input table */
 #boxc1{
	background-color: ghostwhite; 
	opacity: 0.8;
	 border-top-left-radius: 20px;
	 border-top-right-radius: 20px;
	}

/* sets the style for the background behind the body of the table whithin the input table */
 #boxc2{
	background-color: lightgray; 
	border: none;
	opacity: 0.9;
	}
	
/* sets the style for the background behind the button at the bottom of the input table */
#boxc3{
	background-color: dimgray; 
	text-decoration-color: black;
	border-bottom-left-radius: 20px;
	border-bottom-right-radius: 20px;
	}

</style>

<!-- connect to css files -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.datepicker.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.slider.min.css" rel="stylesheet" type="text/css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="jQueryAssets/jquery-1.11.1.min.js"></script>
<script src="jQueryAssets/jquery.ui-1.10.4.datepicker.min.js"></script>
<script src="jQueryAssets/jquery.ui-1.10.4.slider.min.js"></script>
</head>

<!-- style format for the table -->
<form method="post" action="searchHandler.php">
<table width="400" height="300" border="1" id="table">
  <tbody>
    <tr>
     <!-- style format for the title font for the table -->
      <td id="boxc1" colspan="3" style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'"><font size="8" color="red" align="center">Select Date</td>
    </tr>
    <tr>
     <!-- style format for the Pick-up option -->
      <td id="boxc2" colspan="2"><strong>Pick-up: </strong></td>
      <td id="boxc2"><input style="text-align: center" type="text" name="pickup" placeholder="mm/dd/yyyy" id="from" required="required" onkeydown="return false"></td>
    </tr>
    <tr>
     <!-- style format for the Drop-off option -->
      <td id="boxc2" colspan="2"><strong> Drop-off:</strong></td>
      <td id="boxc2"><input style="text-align: center" type="text" name="dropoff" placeholder="mm/dd/yyyy" id="to" required="required" onkeydown="return false"></td>
    </tr>
	 <tr>
     <!-- style format for the Sorted by option -->
      <td id="boxc2" colspan="2"><strong>Sorted by:</strong></td>
      <td id="boxc2">
         <!-- attributes for 'Sorted by' option -->
          <select name="sorted">
            <option value="rate">Rate</option>
            <option value="brand">Brand</option>
            <option value="type">Type</option>
          </select>
        </td>
    </tr>
    <tr>
     <!-- set style for search button -->
      <td id="boxc3" colspan="3"><button class="button button1" type="submit" id="submit" name="search">Search</button></td>
    </tr>
  </tbody>
</table>
</form>


</body>

<!-- set up calendar date options -->
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
