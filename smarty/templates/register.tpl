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
            {foreach from=$languages key=k item=i}
                <option value="{$i.id}">{$i.language}</option>
            {/foreach}
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