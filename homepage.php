<?php
$con = mysqli_connect("localhost", "root", "", "pocketEdu") or die(mysqli_error($con));
if(isset($_POST['save'])){
	$block = $_POST['blockID'];
	$color = $_POST['color'];
	$qty = $_POST['quantity'];

	$query = "INSERT INTO details VALUES ('', '$block','$color', '$qty')";
	$result = mysqli_query($con, $query) or die (mysqli_error($con));
	//echo "success";
}

$query2 = "SELECT id, blockId, color, quantity FROM details";
$result2 = mysqli_query($con, $query2) or die (mysqli_error($con));
$total_rows = mysqli_num_rows($result2);
//$row = mysqli_fetch_array($result2);
//print_r($row);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="../bootstrap/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>

   <link rel="stylesheet" type="text/css" href="master.css">
</head>
<body >
<header>
	<div class="navbar navbar-inverse navbar-fixed-top mynav">
	    <div class="container">
	        <div class="navbar-header nav-header">

	        	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" >
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	            </button>
	            <a href="homepage.php" class="navbar-brand" style="margin-top: 5px;">Company Name</a>
	        </div>
	        <div class="collapse navbar-collapse" id="myNavbar">
		        <ul class="nav navbar-nav navbar-right">
		        	<li ><a href="newblock.php" class="newBlockbtn" style="padding:9px 30px;color: #25353b;">Add New Block</a></li>
		        </ul>  
		    </div>
	    </div>
	</div>
</header>

<main>
	<div class="container"> 
		<div class="row">	
			<div class="col-sm-6"> <h2>Dashboard</h2> </div>
		
			<div class="col-sm-6 search" >
				<input id="search" style="" type="search" name="searchBar" placeholder="Search">
			</div>			
		</div>
		
		<div class="table-container">
			<table class="table table-bordered">
				<thead class="sticky">
					<tr style="border: 1px solid black; ">
						<th>BLOCK ID</th> 
						<th>COLOR</th> 
						<th >QUANTITY</th> 
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php while($row = mysqli_fetch_array($result2)) { ?>
					<tr>
						<td style="width:150px"> <?php echo $row['blockId']; ?> </td> 
						<td style="width:150px"><?php echo $row['color']; ?></td> 
						<td style="width:150px"><?php echo $row['quantity']; ?></td> 
						<td style="text-align: right;">
							
								<a href="homepage.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
							
						</td>

					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
	<!-- value Edit -->
	<?php 
		if (isset($_GET['edit'])){

			$id = $_GET['edit'];
			$record = mysqli_query($con, "SELECT * FROM details WHERE id=$id");
			if (count(mysqli_num_rows($record)) == 1 ) {
				$n = mysqli_fetch_array($record);
				$block = $n['blockId'];
				$color = $n['color'];
				$qty = $n['quantity'];
			}
			echo '<input type="hidden" id="changing" name="changing" value="true">';
		}
	?>
	
	<button id="myBtn" style="display: none;">Open Modal</button>
	<div id="myModal" class="modal">
	  <div class="modal-content">
	    <div class="modal-header">
	      <span class="close">&times;</span>
	      <h2>Change data</h2>
	    </div>
	    <form action="change.php?i=<?php echo $id; ?>" method="post">
		    <div class="modal-body">
		    	<label for="blockID">Block ID</label>
		      	<div class="form-group">
                    <input type="text" class="form-control" id="blockID" name="blockID" placeholder="Block ID" required="required" value='<?php echo $block; ?>'> 

                </div>
                <label for="color">Color</label>
		      	<div class="form-group">
                    <input type="color" id="color" class="form-control" name="color" placeholder="Color-Value" value='<?php echo $color; ?>' required="required">
                </div>
		      	<label for="quantity">Quantity</label>
                <div class="form-group">
                    <input type="number" min="0" id="quantity" class="form-control" name="quantity" placeholder="Quantity" value='<?php echo $qty; ?>' required="required">
                </div>
		    </div>
		    <div class="modal-footer">
		      <input type="Submit" name="changeSubmit" value="Change">
		    </div>
	    </form>
	  </div>
	</div>


</main>
<script>

var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
  modal.style.display = "block";
}

span.onclick = function() {
  modal.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

</script>

<script>
	var x = false;

	x = document.getElementById("changing").value;

	$(document).ready(function () {
		if(x == "true"){
			document.getElementById("myBtn").click();
		}
	});

</script>
</body>
</html>