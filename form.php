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
			
           <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Curriculum Vitae</h3>
                </div>
                <div class="panel-body">
                    <form name="LoanApplication" id="LoanApplication" action="response_eb.php" method="post">
                        <div id="panel1">
                            <br>
                            <div class="row">
                                <div class="col-lg-3">
                                    <label>Name with initials :</label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" placeholder="Enter name" id="customerName" name="customerName" value="" class="form-control" maxlength="30" required="required" data-index="2">
                                    <span class="has-error">
                                        <small data-fv-result="INVALID" id="namevalid" data-fv-for="message" data-fv-validator="notEmpty" class="help-block" style="display:none">Invalid name</small>
                                    </span>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-3">
                                    <label>Address :</label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" placeholder="Enter address" id="customerAddress" name="customerAddress" value="" class="form-control" maxlength="100" required="required" data-index="3">
                                    <span class="has-error">
                                        <small data-fv-result="INVALID" id="addressvalid" data-fv-for="message" data-fv-validator="notEmpty" class="help-block" style="display:none">Invalid address</small>
                                    </span>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-3">
                                    <label>NIC:</label>
                                </div>
                                <div class="col-lg-3">
                                    <input type="text" placeholder="Enter NIC" id="nicNo" name="nicNo" value="" class="form-control" maxlength="12" required="required" data-index="4">
                                    <span class="has-error">
                                        <small data-fv-result="INVALID" id="nicvalid" data-fv-for="message" data-fv-validator="notEmpty" class="help-block" style="display:none">Invalid National Identity Card Number</small>
                                    </span>
                                </div>
                                <div class="col-lg-2">
                                    <label>Date of Birth:</label>
                                </div>
                                <div class="col-lg-4">
                                    <input type="text" placeholder="Click to select" name="dob" id="datepicker" value="" class="form-control" maxlength="10" required="required" data-index="5">
                                    <span class="has-error">
                                        <small data-fv-result="INVALID" id="dobvalid" data-fv-for="message" data-fv-validator="notEmpty" class="help-block" style="display:none">Invalid date of birth</small>
                                    </span>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-3">
                                    <label>Mobile No:</label>
                                </div>
                                <div class="col-lg-3">
                                    <input type="text" placeholder="Ex:0731234567" id="contactNo" name="contactNo" value="" class="form-control" maxlength="10" required="required" data-index="6">
                                    <span class="has-error">
                                        <small data-fv-result="INVALID" id="phonevalid" data-fv-for="message" data-fv-validator="notEmpty" class="help-block" style="display:none">Invalid mobile no</small>
                                    </span>
                                </div>
                                <div class="col-lg-2">
                                    <label>Email:</label>
                                </div>
                                <div class="col-lg-4">
                                    <input type="email" placeholder="Ex:abc@abc.lk" id="emailAddress" name="emailAddress" value="" class="form-control" maxlength="30" required="required" data-index="7">
                                    <span class="has-error" >
                                        <small data-fv-result="INVALID" id="emailnvalid" data-fv-for="message" data-fv-validator="notEmpty" class="help-block" style="display: none;">Invalid email</small>
                                    </span>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-lg-8">
                                </div>
                                <div class="col-lg-2">
                                    <button class="btn btn-primary btn-right" id="panel1_back">Back</button>
                                </div>
                                <div class="col-lg-2">
                                    <button class="btn btn-primary btn-right" id="panel1_next" data-index="8">Next</button>
                                </div>
                            </div>
                            <br>
                            <div class="progress">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" style="width:25%">
                                    25% Complete
                                </div>
                            </div>
                        </div>
                        <div id="panel2">
                            <div class="row">
                                <div class="col-lg-3">
                                    <label>Education Qualifications:</label>
                                </div>
                                <div class="col-lg-9">
                                    <select name="education"  class="form-control"  data-index="10">
                                        <option value="1">Bachelor's Degree</option>
										<option value="2">Master's Degree</option>
										<option value="3">Up to ALs</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-3">
                                    <label>Employment Type:</label>
                                </div>
                                <div class="col-lg-9">
                                    <select name="employment"  class="form-control"  data-index="11">
                                        <option value="1">Permanent</option>
										<option value="2">Contract</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-3">
                                    <label>Expected Salary:</label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" placeholder="Enter Expecting Amount" name="salaryAmount" value="" class="form-control" maxlength="15" required="required"  data-index="12">
                                    <span class="has-error">
                                        <small data-fv-result="INVALID" id="amountvalid" data-fv-for="message" data-fv-validator="notEmpty" class="help-block" style="display:none">Invalid  amount. Enter without cents.Ex:100000</small>
                                    </span>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-3">
                                    <label>Years of Experience:</label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" placeholder="Enter Experience in years" name="expPeriod" value="" class="form-control" maxlength="3" required="required"  data-index="13">
                                    <span class="has-error">
                                        <small data-fv-result="INVALID" id="periodvalid" data-fv-for="message" data-fv-validator="notEmpty" class="help-block" style="display:none">Invalid . Please enter in years</small>
                                    </span>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-8">
                                </div>
                                <div class="col-lg-2">
                                    <button class="btn btn-primary btn-right" id="panel2_back">Back</button>
                                </div>
                                <div class="col-lg-2">
                                    <button class="btn btn-primary btn-right" id="panel2_next" data-index="14">Next</button>
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
				<a href="#">Home</a>
				�
				<a href="#">Jobs</a>
				�
				<a href="#">Profile</a>
				�
				<a href="#">About</a>
				�
				<a href="#">Faq</a>
				�
				<a href="#">Contact</a>
			</p>

			<p class="footer-company-name">RapidJOBBS &copy; 2016</p>

		</footer>

</body>

</html>
