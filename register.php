<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>IMDstagram Registration</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
	<link rel="stylesheet" href="css/style.css">
	<link href='https://fonts.googleapis.com/css?family=Raleway:500,700' rel='stylesheet' type='text/css'>
</head>
<body>
	<div class="container">
		<a href="" id="imd-logo">IMDstagram</a>
			<form action='' method="POST">
			  <fieldset>
				<div id="legend">
					<h1 class="legend">Sign up to see work and projects from IMD students</h1>
				</div>

				<button type="submit" class="btn btn-primary btn-block">Log in with Facebook</button>

				<p class="or">or</p>

				<div class="form-group">
					<input type="text" class="form-control" id="firstname" placeholder="First name">
				</div>
				
				<div class="form-group">
					<input type="text" class="form-control" id="lastname" placeholder="Last name">
				</div>
				
				<div class="radio">
				  <label><input type="radio" name="male" id="male" value="male">Male</label>
				</div>
				
				<div class="radio">
				  <label><input type="radio" name="female" id="female" value="female">Female</label>
				</div>
				
				<div class="form-group">
					<label>Birthday <input type="text" class="form-control" id="datepicker"></label>
				</div>
				
				<label>language</label>
				<select name="languages">
					<option value="" disabled selected>choose language</option>
					<option value="nl">nederlands</option>
					<option value="en">english</option>
				</select>
				  
				<div class="form-group">
					<input type="email" class="form-control" id="email" placeholder="Email">
				</div>

				<div class="form-group">
					<input type="text" class="form-control" id="username" placeholder="User name">
				</div>

				<div class="form-group">
					<input type="password" class="form-control" id="password" placeholder="Password">
				</div>

				<button type="submit" class="btn btn-primary btn-block">Sign up</button>
			  </fieldset>

			</form>
			
			<p class="agreement">By signing up, you agree to our <br>
			<a href="https://help.instagram.com/155833707900388" class="policy">Terms and Privacy Policy.</a>
			</p>
		</div>
		
		<script>
			$(function() {
			$( "#datepicker" ).datepicker();
		  });
			</script>
</body>
</html>