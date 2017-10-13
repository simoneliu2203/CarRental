<?php
	include("header.php");
	include("connection.php"); //Establishing connection with our database
?>
   

   <table style="margin-top: 50px; margin-left: auto ; margin-right: auto; border-radius: 20px">
    <tr>
        <td>
            <table id="table" width="600" height="550" border="1" >
				<tbody>
					<tr>
					   <td id="boxc1" colspan="3" style="border:none; font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'"><font size="7" color="red" align="center">Profile</td>
					</tr>
					<tr>
					  <td id="boxc2" align="right"><strong>First name</strong></td>
					  <td id="boxc2"><input size="30" type="text" name="first"></td>
					</tr>
					<tr>
					  <td id="boxc2" align="right"><strong>Last name</strong></td>
					  <td id="boxc2"><input size="30" type="text" name="last"></td>
					</tr>
					<tr>
					  <td id="boxc2" align="right"><strong>Email</strong></td>
					  <td id="boxc2"><input size="30" type="text" name="email"></td>
					</tr>
					<tr>
					  <td id="boxc2" align="right"><strong>Address</strong></td>
					  <td id="boxc2"><input size="30" type="text" name="address"></td>
					</tr>
					<tr>
					  <td id="boxc2" align="right"><strong>License Number</strong></td>
					  <td id="boxc2"><input size="30" type="text" name="license"></td>
					</tr>
					<tr>
					  <td id="boxc2" align="right"><strong>License State</strong></td>
					  <td id="boxc2"><input size="30" type="text" name="state"></td>
					</tr>

					<tr>
					  <td id="boxc3" colspan="2"><input type="submit" name="submit" id="submit" value="Update" style="background-color: black; font-size: 20px; width: 100px; color: white"></td>

				  </tbody>
            </table>
        </td>
        <td>
            <table id="table" width="600" height="550" border="1" style="margin-left: 20px">
              		<tbody>
					<tr>
					  <td id="boxc2" align="right"><strong>Email</strong></td>
					  <td id="boxc2"><input size="30" type="text" name="email"></td>
					</tr>
					<tr>
					  <td id="boxc2" align="right"><strong>Address</strong></td>
					  <td id="boxc2"><input size="30" type="text" name="address"></td>
					</tr>
					<tr>
					  <td id="boxc2" align="right"><strong>License Number</strong></td>
					  <td id="boxc2"><input size="30" type="text" name="license"></td>
					</tr>
					<tr>
					  <td id="boxc2" align="right"><strong>License State</strong></td>
					  <td id="boxc2"><input size="30" type="text" name="state"></td>
					</tr>

					<tr>
					  <td id="boxc3" colspan="2"><input type="submit" name="submit" id="submit" value="Update" style="background-color: black; font-size: 20px; width: 100px; color: white"></td>

            </table>
        </td>
    </tr>
</table>