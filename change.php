<?php
$con = mysqli_connect("localhost", "root", "", "pocketEdu") or die(mysqli_error($con));
if(isset($_POST['changeSubmit'])){
	$id=$_GET['i'];
	$block = $_POST['blockID'];
	$color = $_POST['color'];
	$qty = $_POST['quantity'];

	$query = "UPDATE details SET blockID = '$block',color = '$color', quantity= '$qty' WHERE id=$id";
	$result = mysqli_query($con, $query) or die (mysqli_error($con));
	
	echo '<input style="display:none;" id="changeSucess" name="changeSucess" value="true">';
	
	header('location:homepage.php');
}
?>
