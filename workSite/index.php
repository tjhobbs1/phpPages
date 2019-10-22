
<?php
	include('functions.php');
	if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>


	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.6.0/moment-with-langs.min.js"></script>

	<link rel="stylesheet" href="bootstrap-datepicker.css">
	<script src="bootstrap-datepicker.js"></script>
	<title>Home</title>

	<script type="text/javascript">


			let errorMessages =[];
				//Check If Crew One is equal to crew two
				function validateForm(){
					let date = document.querySelector("#dayShift").value;
					console.log(date);


					//Check to see if any errors had been caught
					if(errorMessages.length > 0){
						console.log(errorMessages);
						return false;
					}else{
						return true;
					}

				}//End validateForm()


	</script>

</head>
<body>
	<div class="header">
		<h2>Home Page</h2>
	</div>

	<div class="content">
		<!-- notification message that you are logged in. d -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php
						echo $_SESSION['success'];
						unset($_SESSION['success']);
						echo $_SESSION['user']['username'];
					?>
				</h3>
			</div>
		<?php endif ?>  <!--End Login alert-->

		<!-- logged in user information -->
		<div class="profile_info">
			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i>
						<br>
						<a href="index.php?logout='1'" style="color: red;">logout</a>
					</small>

				<?php endif ?>
			</div>

		</div> <!--End profile_info-->
		<div class="container">
				<div class="page-header">
						<h1>Daily Check</h1>
				</div>

				<form role="form" class="col-sm-4">

					<!--Date-->
						<div class="form-group">
								<label>Shift Date:</label>
								<input type="text" class="form-control datepicker" data-default-today="true" />
						</div>  	<!-- End Date-->

						<div class="form-check">
						  <input class="form-check-input" type="radio" name="shift" id="dayShift" value="Day Shift" checked>
						  <label class="form-check-label" for="exampleRadios1">
						    Day Shift
						  </label>
						</div>
						<!--Shift-->
						<div class="form-check">
						  <input class="form-check-input" type="radio" name="shift" id="nightShift" value="Night Shift">
						  <label class="form-check-label" for="exampleRadios2">
						    Night Shift
						  </label>
						</div> <!--End Shift-->

			</div>
				<!--Submit Button-->
	      <button type="button" name="button" onclick="validateForm()">Submit</button>
			</form>

		</div>
	</div>  <!--End Content-->

	<!--Date Picker Function-->
	<script type="text/javascript">
	$('input.datepicker').each(function(){
			var datepicker = $(this);
			datepicker.bootstrapDatePicker(datepicker.data());
	});
	</script>


</html>
