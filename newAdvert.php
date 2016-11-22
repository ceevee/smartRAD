<?php

	error_reporting( ~E_NOTICE ); // avoid notice
	
	require_once 'dbconfig.php';
	
	if(isset($_POST['btnsave']))
	{

		$jobTitle = $_POST['jobTitle'];
		$jobCategory = $_POST['jobCategory'];
		$email = $_POST['email'];
		$organization = $_POST['organization'];
		$description = $_POST['description'];
		$publisher_id = $_POST['publisher_id'];
		
		
		if(empty($jobTitle)){
			$errMSG = "Please Enter a Job Title";
		}
		else if(empty($jobCategory)){
			$errMSG = "Please select a job category";
		}
		else if(empty(organization)){
			$errMSG = "Please enter an organization";
		}
		
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO jobadvert(jobTitle,jobCategory,email,organization,description,publisher_id) 
			VALUES(:jtitle, :jcat, :email, :org, :des, :publisher")');
			$stmt->bindParam(':jtitle',$jobTitle);
			$stmt->bindParam(':jcat',$jobCategory);
			$stmt->bindParam(':email',$email);
			$stmt->bindParam(':org',$organization);
			$stmt->bindParam(':des',$description);
			$stmt->bindParam(':publisher',$publisher_id);
			
			if($stmt->execute())
			{
				$successMSG = "Your job advertisement published successfully!";
				header("refresh:5;alljobs.php"); // redirects image view page after 5 seconds.
			}
			else
			{
				$errMSG = "Error while publishing!";
			}
		}
	}
?>

<?php

	error_reporting( ~E_NOTICE ); // avoid notice
	
	require_once 'dbconfig.php';
		
	$jobcat = $DB_con->prepare('SELECT jobCategory_Id,description FROM jobcategory WHERE status=1');
	$jobcat->execute();
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
	<link rel="stylesheet" href="./css/jquery-ui.css" >
    <link rel="stylesheet" href="./css/style.css" >
	<script type="text/javascript" src="./js/jquery-1.11.0.js"></script>
	<script type="text/javascript" src="./js/bootstrap.js"></script>
	<script type="text/javascript" src="./js/jquery-ui.js"></script>
    <script type="text/javascript" src="./js/logic.js"></script>


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
			
           <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Publish Module</h3>
                </div>
                <div class="panel-body">
                    <form method="post" enctype="multipart/form-data" class="form-horizontal">
	<div class="page-header">
    	<h1 class="h2">New Job Advertisement </h1>
    </div>
    

	<?php
	if(isset($errMSG)){
			?>
            <div class="alert alert-danger">
				<strong><?php echo $errMSG; ?></strong>
            </div>
            <?php
	}
	else if(isset($successMSG)){
		?>
        <div class="alert alert-success">
              <strong> <?php echo $successMSG; ?></strong>
        </div>
        <?php
	}
	?>   
	
		<table class="table table-bordered table-responsive">
	
    <tr>
    	<td><label class="control-label">Job Title</label></td>
        <td><input class="form-control" type="text" name="jobTitle" placeholder="Enter Job Title" value="<?php echo $jobTitle; ?>" /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Job Category</label></td>
        <td><select name="jobcat" class="form-control">
		<?php 
		while ($row = $jobcat->fetch(PDO::FETCH_ASSOC))
		{
		echo '<option value="'.$row['jobCategory_Id'].'">'.$row['description'].'</option>';
		}
		?>
		</select></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Email</label></td>
        <td><input class="form-control" type="text" name="email" placeholder="Enter Email" value="<?php echo $email; ?>" /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Organization</label></td>
        <td><input class="form-control" type="text" name="organization" placeholder="Enter Organization" value="<?php echo $organization; ?>" /></td>
    </tr>
	
	<tr>
    	<td><label class="control-label">Description</label></td>
        <td><input class="form-control" type="textarea" cols="40" rows="5" name="description" placeholder="Enter Description" value="<?php echo $description; ?>" /></td>
    </tr>
	
	<?php $publisher_id=1; ?>
      
    </table>
                            <br>
                            <div class="row">
                                <div class="col-lg-8">
                                </div>
                                <div class="col-lg-2">
                                    <a class="btn btn-primary" href=""> &nbsp; View All</a>
                                </div>
                                <div class="col-lg-2">
                                    <button type="submit" name="btnsave" class="btn btn-primary">&nbsp; Publish</button>
                                </div>
                            </div>
                            <br>
                            <div class="progress">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" style="width:50%">
                                    50% Complete
                                </div>
                            </div>
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
