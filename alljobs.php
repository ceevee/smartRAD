<?php

	require_once 'dbconfig.php';
	
	if(isset($_GET['delete_id']))
	{
		// select image from db to delete
		$stmt_select = $DB_con->prepare('SELECT vacPic FROM vacancies WHERE vacID =:uid');
		$stmt_select->execute(array(':uid'=>$_GET['delete_id']));
		$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
		unlink("vac_images/".$imgRow['vacPic']);
		
		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM vacancies WHERE vacID =:uid');
		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
		$stmt_delete->execute();
		
		header("Location: alljobs.php");
	}

?>

<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>RapidJOBBS, Right people for right jobs</title>
	<link rel="stylesheet" href="./css/header-basic-light.css">
	<link rel="stylesheet" href="./css/footer-basic-centered.css">
	<link rel="stylesheet" href="./css/bootstrap.min.css">
	<link rel="stylesheet" href="./css/jquery-ui.css">
    <link rel="stylesheet" href="./css/style.css" >
	<script type="text/javascript" src="./js/jquery-1.11.0.js"></script>
    <script type="text/javascript" src="./js/bootstrap.js"></script>


</head>

<body>

<header class="header-basic-light">

	<div class="header-limiter">

		<h1><a href="index.php">Rapid<span>JOBBS</span></a></h1>

		<nav>
			<a href="index.php">Home</a>
			<a href="#" class="selected">Login</a>
			<a href="#">Jobbs</a>
			<a href="#">About</a>
			<a href="#">Faq</a>
			<a href="#">Contact</a>
		</nav>
	</div>

</header>


        <div class="row" style="padding-left: 100px;padding-right: 100px;">
		<br>
		<ul class="nav nav-pills" role="tablist">
			  <li role="presentation" class="active"><a href="index.php">Home <span class="badge">42</span></a></li>
			  <li role="presentation"><a href="#">Profile</a></li>
			  <li role="presentation"><a href="#">Jobs <span class="badge">3</span></a></li>
			  <li role="presentation"><a href="#">Messages <span class="badge">12</span></a></li>
		</ul>
            <br>

    
<br />
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Advertisement Module</h3>
                </div>
                <div class="panel-body">
			<div class="container">

			<div class="page-header">
				<h1 class="h2">All Vacancies &nbsp;<a class="btn btn-primary" href="form.php"> &nbsp; Add New  </a></h1> 
			</div>
                </div>
				
				<div class="row">
<?php
	
	$stmt = $DB_con->prepare('SELECT vacID, companyName, vacProfession, vacPic FROM vacancies ORDER BY vacID DESC');
	$stmt->execute();
	
	if($stmt->rowCount() > 0)
	{
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);
			?>
			<div class="col-xs-3">
				<p class="page-header"><?php echo "<strong>".$companyName."</strong>&nbsp;/&nbsp;".$vacProfession; ?></p>
				<img src="vac_images/<?php echo $row['vacPic']; ?>" class="img-rounded" width="150px" height="150px" />
				<p class="page-header">
				<span>
				<a class="btn btn-default" href="editform.php?edit_id=<?php echo $row['vacID']; ?>" title="click for edit" onclick="return confirm('sure to edit ?')"> Edit Adv</a> 
				<a class="btn btn-primary" href="?delete_id=<?php echo $row['vacID']; ?>" title="click for delete" onclick="return confirm('sure to delete ?')"> Delete</a>
				</span>
				</p>
			</div>       
			<?php
		}
	}
	else
	{
		?>
        <div class="col-xs-12">
        	<div class="alert alert-warning">
            	 &nbsp; No Data Found 
            </div>
        </div>
        <?php
	}
	
?>
</div>	

				
            </div>
        </div>
		
		

		<footer class="footer-basic-centered">

			<p class="footer-company-motto">RapidJOBBS, Right people for right jobs.</p>

			<p class="footer-links">
				<a href="index.php">Home</a>
				.
				<a href="#">Jobs</a>
				.
				<a href="#">Profile</a>
				.
				<a href="#">About</a>
				.
				<a href="#">Faq</a>
				.
				<a href="#">Contact</a>
			</p>

			<p class="footer-company-name">RapidJOBBS &copy; 2016</p>

		</footer>

</body>

</html>
