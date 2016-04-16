<div class="bg-img login">
	<div class="container login">
		<a href="" id="imd-logo">IMDstagram</a>
			<form action='' method="POST">
			  <fieldset>

				<label class="login-lbl">User name</label>
				<div class="input-group">
				   <span class="input-group-addon">
						<i class="fa fa-user"></i>
				   </span>
				   <div class="form-group">
						<input type="text" class="form-control input-lg" id="username" placeholder="User name">
				   </div>
				</div>

				<label class="login-lbl">Password</label>
				<div class="input-group ch-profile-input">
					<span class="input-group-addon">
						<i class="fa fa-unlock-alt"></i>
					</span>
					<input type="password" class="form-control input-lg" id="password" placeholder="Current password">
				 </div>

				<button type="submit" class="btn btn-primary btn-block btn-login">Log in</button>
			  </fieldset>
			</form>
			
		<p class="forgot-pw"><a class="forgot-pw-link" href="{$siteurl}/resetpass">Forgot your password?</a></p>

			<p class="signup">Don't have an account? 
				<a href="{$siteurl}/register" class="signup-link">Sign up</a>
			</p>
	</div>
</div>