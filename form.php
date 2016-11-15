<?php

	error_reporting( ~E_NOTICE ); // avoid notice
	
	require_once 'dbconfig.php';
	
	if(isset($_POST['btnsave']))
	{

		$companyName = $_POST['companyName'];
		$vacProfession = $_POST['vacProfession'];
		
		$imgFile = $_FILES['vacPic']['name'];
		$tmp_dir = $_FILES['vacPic']['tmp_name'];
		$imgSize = $_FILES['vacPic']['size'];
		
		
		if(empty($companyName)){
			$errMSG = "Please Enter Company Name.";
		}
		else if(empty($vacProfession)){
			$errMSG = "Please Enter Job Title.";
		}
		else if(empty($imgFile)){
			$errMSG = "Please Select an Advertisement.";
		}
		else
		{
			$upload_dir = 'vac_images/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
			// rename uploading image
			$vacPic = rand(1000,1000000).".".$imgExt;
				
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){			
				// Check file size '5MB'
				if($imgSize < 5000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$vacPic);
				}
				else{
					$errMSG = "Sorry, your file is too large.";
				}
			}
			else{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}
		}
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO vacancies(companyName,vacProfession,vacPic) VALUES(:cname, :cjob, :cpic)');
			$stmt->bindParam(':cname',$companyName);
			$stmt->bindParam(':cjob',$vacProfession);
			$stmt->bindParam(':cpic',$vacPic);
			
			if($stmt->execute())
			{
				$successMSG = "Your  advertisement published successfully!";
				header("refresh:5;alljobs.php"); // redirects image view page after 5 seconds.
			}
			else
			{
				$errMSG = "Error while publishing!";
			}
		}
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
    	<h1 class="h2">Publish a New Advertisement </h1>
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
    	<td><label class="control-label">Company Name</label></td>
        <td><input class="form-control" type="text" name="companyName" placeholder="Enter Company Name" value="<?php echo $companyName; ?>" /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Job Title</label></td>
        <td><input class="form-control" type="text" name="vacProfession" placeholder="Enter Profession" value="<?php echo $vacProfession; ?>" /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Advertisement</label></td>
        <td><input class="input-group" type="file" name="vacPic" accept="image/*" /></td>
    </tr>
   
    
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
