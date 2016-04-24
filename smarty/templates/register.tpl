<div class="bg registration">
   <div class="container registration">
    <a href="" id="imd-logo">IMDstagram</a>
    <form action='' method="POST">
      <fieldset>
        <div id="legend">
            <h1 class="legend">Sign up to discover inspiration from IMD students</h1>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Log in with Facebook</button>

        <p class="or">or</p>
 
        <label class="register-lbl">First name</label>
			<div class="input-group">
					<span class="input-group-addon">
			   			<i class="fa fa-user"></i>
				   </span>
				   <div class="form-group">
						<input type="text" class="form-control input-lg" id="firstname" placeholder="First name">
				   </div>
			</div>
       
       <label class="register-lbl">Last name</label>
			<div class="input-group">
					<span class="input-group-addon">
			   			<i class="fa fa-user"></i>
				   </span>
				   <div class="form-group">
						<input type="text" class="form-control input-lg" id="lastname" placeholder="Last name">
				   </div>
			</div>
       
       		<label class="register-lbl">Gender</label>
  			<div class="radio"><label class="radio-inline">
        	 	<input type="radio" name="gender" id="male" class="male" value="male">
         	 	Male
			</label>
				
		  	<label class="radio-inline">
			  <input type="radio" name="gender" id="female" value="female">
			  Female
       	  	</label>
		  </div>
       
       		<label class="register-lbl">Birthday</label>
			<div class="input-group">
					<span class="input-group-addon">
			   			<i class="fa fa-birthday-cake" aria-hidden="true"></i>
				   </span>
				   <div class="form-group">
						<input type="text" class="form-control input-lg" id="datepicker">
				   </div>
			</div>
        
       	<label class="register-lbl">Language</label>
        <select class="form-control" name="languages">
            <option value="" disabled selected>choose language</option>
            {foreach from=$languages key=k item=i}
                <option value="{$i.id}">{$i.language}</option>
            {/foreach}
        </select>
         
        <label class="register-lbl">Email</label>
			<div class="input-group">
				<span class="input-group-addon">
			   		<i class="fa fa-envelope" aria-hidden="true"></i>
				</span>
       			<div class="form-group">
        			<input type="email" class="form-control input-lg" id="email" placeholder="Email">
        		</div>
		  </div>
        
        <label class="register-lbl">Username</label>
			<div class="input-group">
				<span class="input-group-addon">
			   		<i class="fa fa-user"></i>
				</span>
       			<div class="form-group">
            		<input type="text" class="form-control input-lg" id="username" placeholder="Username">
        		</div>
		  </div>
                
        <label class="register-lbl">Password</label>
			<div class="input-group">
				<span class="input-group-addon">
			   		<i class="fa fa-unlock-alt" aria-hidden="true"></i>
				</span>
       			<div class="form-group">
       				<input type="password" class="form-control input-lg" id="password" placeholder="Password">
        		</div>
		  </div>

        <button type="submit" class="btn btn-primary btn-block">Sign up</button>
      </fieldset>

    </form>
        
    <p class="agreement">By signing up, you agree to our <br>
    <a href="https://help.instagram.com/155833707900388" class="policy">Terms and Privacy Policy.</a>
    </p>
</div>
</div>

<script>
    $(function() {
        $( "#datepicker" ).datepicker();
    });
</script>