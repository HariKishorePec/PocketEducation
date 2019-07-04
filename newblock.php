<!DOCTYPE html>
<html>
<head>
	<title>NewBlock</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="../bootstrap/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="master.css">
</head>
<body>
<header>
	<div class="navbar navbar-inverse navbar-fixed-top mynav">
        <div class="container">
            <div class="navbar-header nav-header">
                <a href="homepage.php" class="navbar-brand" style="margin-top: 5px;">Company Name</a>
            </div>
            
        </div>
    </div>
</header>
<main>
	<div class="container">
        <div class="form-container">
            <form action="homepage.php" class="form" method="post">
                <div class="form-input">
                    <ol>
                        <li>
                    	   <label for="blockID">Block ID</label>
                        </li>
                        <div class="form-group">
                            <input type="text" class="form-control" id="blockID" name="blockID" placeholder="Block ID" required="required" >
                        </div>
                        <li>
                        <label for="color">Color</label>
                        </li>
                        <div class="form-group">
                           <!-- <div class="row">
                            	<div class="col-sm-9 col-xs-7"> -->
                            		<input type="color" id="color" class="form-control" name="color" placeholder="Color-Value" value="#0924f7" required="required">
                          <!--  	</div>
                            	
                            	<div class="col-sm-3 col-xs-5">
                            		 <input type="text" id="col_picker" class="form-control" name="color" placeholder="Color" value="#0924f7" onclick="colorChange()" required="required">
                            	</div>
                           
                            </div> --> 
                        </div>
                        <li>
                        <label for="quantity">Quantity</label>
                        </li>
                        <div class="form-group">
                            <input type="number" min="0" id="quantity" class="form-control" name="quantity" placeholder="Quantity" required="required">
                        </div>
                    </ol>
                </div>
                
                <input type="submit"  class="btnSave" name="save" value="Save" >
                
            </form>
        </div>
    </div>
</main>

<script src="./save.js"></script>
<script>
    

</script>
</body>
</html>


