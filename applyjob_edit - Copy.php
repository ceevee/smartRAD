<?php	
	require_once 'dbconfig.php';

			if(isset($_GET['delete_id']))
	{

		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM apply WHERE appID =:xid');
		$stmt_delete->bindParam(':xid',$_GET['delete_id']);
		$stmt_delete->execute();
		$apply_id= $_GET['apply_id'];
		
		header('Location: applyjob_edit.php?apply_id=10'.$apply_id);
	}else if($_GET['apply_id']>0){
	$apply_id =$_GET['apply_id'];
	//echo $_GET['apply_id'];/////////////////////////remove this
}

?>

<?php


	


?>

<?php

		$stmt_edit = $DB_con->prepare('SELECT * FROM vacancies WHERE vacID=:cid');
		$stmt_edit->execute(array(':cid'=>$apply_id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	
	
		if($apply_id>0)
		{
			$stmt = $DB_con->prepare('INSERT INTO apply(applicantID,applicantName,vacID,companyName,vacProfession,vacPic) VALUES(:cID,:cName,:cvacID,:ccompanyName,:cvacProfession,:cpic)');
			$stmt->bindParam(':cID',$a=0000);// Hard coded till user module up
			$stmt->bindParam(':cName',$b='Nadana Kodippili');// Hard coded till user module up
			$stmt->bindParam(':cvacID',$apply_id);
			$stmt->bindParam(':ccompanyName',$companyName);
			$stmt->bindParam(':cvacProfession',$vacProfession);
			$stmt->bindParam(':cpic',$vacPic);
			
			if($stmt->execute())
			{
				$successMSG = "Your  advertisement published successfully!";
				//header("refresh:5;index.php"); // redirects image view page after 5 seconds.
			}
			else
			{
				$errMSG = "Error while publishing!";
			}
		}
	$stmt = $DB_con->prepare('SELECT * FROM apply WHERE applicantID=:bid');
	$stmt->bindParam(':bid',$a);
	$stmt->execute();
	?>
<div class="col-xs-3">	
 <p class="page-header">
 <?php echo "Jobs Applied  by &nbsp; <strong>".$b.'</strong>';?>
 </p>
 </div> 
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
				<a class="btn btn-primary" href="?delete_id=<?php echo $row['appID']; ?>" title="click for delete" onclick="return confirm('sure to delete ?')"> Revoke</a>
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