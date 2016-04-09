<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>IMDstagram Change Profile</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Raleway:500,700' rel='stylesheet' type='text/css'>
</head>
<body>
	<div class="container">
		 <form>
			 <fieldset>
				 <div id="legend">
					<h1 class="ch-profile-legend">Change your profile</h1>
				</div>

				 <div class="input-group ch-profile-input">
				   <span class="input-group-addon">
						<i class="fa fa-user"></i>
				   </span>
				   <input tye="text" class="form-control input-lg" id="username" placeholder="User name">
				 </div>
				 
				<div class="input-group ch-profile-input">
				   <span class="input-group-addon">
						<i class="fa fa-envelope"></i>
				   </span>
				   <input type="email" class="form-control input-lg" id="email" placeholder="Email">
				 </div>
				 
				 <div class="input-group ch-profile-input">
				 	<span class="input-group-addon">
				 		<i class="fa fa-unlock-alt"></i>
					</span>
					<input type="password" class="form-control input-lg" id="password" placeholder="Current password">
				 </div>
				 
				 <div class="input-group ch-profile-input">
				 	<span class="input-group-addon">
				 		<i class="fa fa-unlock-alt"></i>
					</span>
					<input type="password" class="form-control input-lg" id="password" placeholder="New password">
				 </div>
				 
				 <button type="submit" class="btn btn-primary btn-block save-changes">Save your changes</button>
			</div>
				 
				 
			</fieldset>
		</form>
	</div>
	
</body>
</html>