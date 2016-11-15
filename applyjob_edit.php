<?php	
	require_once 'dbconfig.php';

			if(isset($_GET['apply_id'])){
			$apply_id =$_GET['apply_id'];

}

?>
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

		<h1><a href="#">Rapid<span>JOBBS</span></a></h1>

		<nav>
			<a href="#">Home</a>
			<a href="#" class="selected">Login</a>
			<a href="#">Jobbs</a>
			<a href="#">About</a>
			<a href="#">Faq</a>
			<a href="#">Contact</a>
		</nav>
	</div>

</header>

<!-- The content of your page would go here. -->
        <div class="row" style="padding-left: 100px;padding-right: 100px;">
		<br>
		<ul class="nav nav-pills" role="tablist">
			  <li role="presentation" class="active"><a href="#">Home <span class="badge">42</span></a></li>
			  <li role="presentation"><a href="#">Profile</a></li>
			  <li role="presentation"><a href="#">Jobs <span class="badge">3</span></a></li>
			  <li role="presentation"><a href="#">Messages <span class="badge">12</span></a></li>
		</ul>
            <br>

    
<br />
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Advertisement Publishing Module</h3>
                </div>


<?php

		$stmt_edit = $DB_con->prepare('SELECT * FROM vacancies WHERE vacID=:cid');
		$stmt_edit->execute(array(':cid'=>$apply_id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	
	

	$stmt = $DB_con->prepare('SELECT * FROM apply WHERE applicantID=:bid');
	$stmt->bindParam(':bid',$a);
	$stmt->execute();
	?>
				<div class="container">

			<div class="page-header">
				<h1 class="h2"> <?php echo "Jobs Applied  by &nbsp; <strong>".$b.'</strong>';?></h1> 
			</div>
                </div>

                 <div class="panel-body">
<?php 
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
				<a class="btn btn-primary" href="deletejob.php?delete_id=<?php echo $row['appID']; ?>" title="click for delete" onclick="return confirm('sure to delete ?')"> Revoke</a>
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
</div></div></div>
		<footer class="footer-basic-centered">

			<p class="footer-company-motto">RapidJOBBS, Right people for right jobs.</p>

			<p class="footer-links">
				<a href="#">Home</a>
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