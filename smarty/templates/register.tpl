<div class="bg registration">
   <div class="container registration">
    <a href="" id="imd-logo">IMDstagram</a>
    <form action='{$siteurl}/register' method="POST">
      <fieldset>
        <div id="legend">
            <h1 class="legend">Sign up to discover inspiration from IMD students</h1>
        </div>

        {if isset($notice)}
            <div style="color: {$notice.color}; text-align: center; font-size: 16px;">{$notice.message}</div><br /><br />
		{/if}
        
        <button type="submit" class="btn btn-primary btn-block">Log in with Facebook</button>

        <p class="or">or</p>
 
        <label class="register-lbl">First name</label>
			<div class="input-group">
					<span class="input-group-addon">
			   			<i class="fa fa-user"></i>
				   </span>
				   <div class="form-group">
						<input type="text" class="form-control input-lg" id="firstname" name="firstname" placeholder="First name" value="{$firstname}">
				   </div>
			</div>
       
       <label class="register-lbl">Last name</label>
			<div class="input-group">
					<span class="input-group-addon">
			   			<i class="fa fa-user"></i>
				   </span>
				   <div class="form-group">
						<input type="text" class="form-control input-lg" id="lastname" name="lastname" placeholder="Last name" value="{$lastname}">
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
						<input type="text" class="form-control input-lg" name="birthday" id="datepicker" value="{$birthday}">
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
        			<input type="email" class="form-control input-lg" id="email" name="email" placeholder="Email" value="{$email}">
        		</div>
		  </div>
        
        <label class="register-lbl">Username</label>
			<div class="input-group">
				<span class="input-group-addon">
			   		<i class="fa fa-user"></i>
				</span>
       			<div class="form-group">
            		<input type="text" class="form-control input-lg" id="username" name="username" placeholder="Username" value="{$username}">
        		</div>
		  </div>
                
        <label class="register-lbl">Password</label>
			<div class="input-group">
				<span class="input-group-addon">
			   		<i class="fa fa-unlock-alt" aria-hidden="true"></i>
				</span>
       			<div class="form-group">
       				<input type="password" class="form-control input-lg" id="password" name="password" placeholder="Password">
        		</div>
		  </div>

        <button type="submit" name="btnRegister" class="btn btn-primary btn-block">Sign up</button>
      </fieldset>

    </form>
        
    <p class="agreement">By signing up, you agree to our <br>
    <a href="https://help.instagram.com/155833707900388" class="policy">Terms and Privacy Policy.</a>
    </p>
</div>
</div>

<script>
	var dateToday = new Date();
	var range = (dateToday.getFullYear() - 130) + ":" + (dateToday.getFullYear() - 13);

    $(function() {
        $( "#datepicker" ).datepicker({
            changeMonth: true,
			changeYear: true,
			yearRange : range
		});
    });
</script>