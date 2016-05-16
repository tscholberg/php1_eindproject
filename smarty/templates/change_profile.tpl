<div class="container change-profile">
		 <form>
			 <fieldset>
				 <div id="legend">
					<h1 class="ch-profile-legend">Change your profile</h1>
				</div>

				 <div class="ch-profile-pic">
					 <a href="#">
						 <img alt="Change profile picture" class="ch-profile-pic" id="ch-profile-pic" src="{$siteurl}/images/blank-user.jpg">
					 </a>
					 <button class="btn-delete" onclick="deleteUserPict()">x</button>
				 </div>

				 <div class="input-group ch-profile-input">
				   <span class="input-group-addon">
						<i class="fa fa-user"></i>
				   </span>
				   <input type="text" class="form-control input-lg" id="username" placeholder="User name">
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
					<input type="password" class="form-control input-lg" id="password2" placeholder="New password">
				 </div>
				 
				 <button type="submit" class="btn btn-primary btn-block save-changes">Save your changes</button>

			</fieldset>
		</form>
	</div>

 <script src="{$siteurl}/js/jquery.js"></script>