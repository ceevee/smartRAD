<?php

	error_reporting( ~E_NOTICE );
	
	require_once 'dbconfig.php';
	
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT companyName, vacProfession, vacPic FROM vacancies WHERE vacID =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: alljobs.php");
	}
	
	
	
	if(isset($_POST['btn_save_updates']))
	{
		$companyName = $_POST['companyName'];
		$vacProfession = $_POST['vacProfession'];
		
		$imgFile = $_FILES['newPic']['name'];
		$tmp_dir = $_FILES['newPic']['tmp_name'];
		$imgSize = $_FILES['newPic']['size'];
					
		if($imgFile)
		{
			$upload_dir = 'vac_images/'; // upload directory	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
			$vacPic = rand(1000,1000000).".".$imgExt;
			if(in_array($imgExt, $valid_extensions))
			{			
				if($imgSize < 5000000)
				{

					unlink($upload_dir.$edit_row['vacPic']);
					move_uploaded_file($tmp_dir,$upload_dir.$vacPic);
				}
				else
				{
					$errMSG = "Sorry, your file is too large it should be less then 5MB";
				}
			}
			else
			{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}	
		}
		else
		{
			// if no image selected the old image remain as it is.
			$vacPic = $edit_row['vacPic']; // old image from database
		}	
						
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE vacancies 
									     SET companyName=:cname, 
										     vacProfession=:cjob, 
										     vacPic=:cpic 
								       WHERE vacID=:uid');
			$stmt->bindParam(':cname',$companyName);
			$stmt->bindParam(':cjob',$vacProfession);
			$stmt->bindParam(':cpic',$vacPic);
			$stmt->bindParam(':uid',$id);
				
			if($stmt->execute()){
				?>
                <script>
				alert('Successfully Updated ...');
				window.location.href='alljobs.php';
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry Data Could Not Updated !";
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
                    <h3 class="panel-title">Advertisement Module</h3>
                </div>
                <div class="panel-body">
                    <form method="post" enctype="multipart/form-data" class="form-horizontal">
	<div class="page-header">
    	<h1 class="h2">Edit Advertisement </h1>
    </div>
    

    <?php
	if(isset($errMSG)){
		?>
        <div class="alert alert-danger">
         &nbsp; <?php echo $errMSG; ?>
        </div>
        <?php
	}
	?>
	
<table class="table table-bordered table-responsive">
	
    <tr>
    	<td><label class="control-label">Company Name</label></td>
        <td><input class="form-control" type="text" name="companyName" value="<?php echo $companyName; ?>" required /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Job Title</label></td>
        <td><input class="form-control" type="text" name="vacProfession" value="<?php echo $vacProfession; ?>" required /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Advertisement</label></td>
        <td>
        	<p><img src="vac_images/<?php echo $vacPic; ?>" height="150" width="150" /></p>
        	<input class="input-group" type="file" name="newPic" accept="image/*" />
        </td>
    </tr>
    
    </table>
		                            <div class="row">
                                <div class="col-lg-8">
                                </div>
                                <div class="col-lg-2">
<a class="btn btn-primary" href="index.php">  cancel </a>
		                                </div>
                                <div class="col-lg-2">
                <button type="submit" name="btn_save_updates" class="btn btn-primary">
	Update
        </button>
        
        
                                       </div>
                            </div>


                            <br>

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
