<!--
 * GenesisUI - Bootstrap 4 Admin Template
 * @version v1.8.1
 * @link https://genesisui.com
 * Copyright (c) 2017 creativeLabs Łukasz Holeczek
 * @license Commercial
 -->
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=shift_jis">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=base_url();?>/resources/css/login_style.css">
    <title>Quiz Hub</title>
</head>
<body>
    <div id="logreg-forms">
		<?php echo form_open("Auth/login", array("class" => "form-signin"));?>
            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Sign in</h1>
            
			<div class="form-group">
				<input type="email" name="identity" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
            </div>
			<div class="form-group">
			<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="">
            </div>
            <button class="btn btn-success btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Sign in</button>
    
            <?php echo form_close();?>

            <form action="/reset/password/" class="form-reset">
                <input type="email" id="resetEmail" class="form-control" placeholder="Email address" required="" autofocus="">
                <button class="btn btn-primary btn-block" type="submit">Reset Password</button>
                <a href="#" id="cancel_reset"><i class="fas fa-angle-left"></i> Back</a>
            </form>  
            <br>
            
    </div>

	

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="<?=base_url();?>/resources/js/libs/login_script.js"></script>
	
		
</body>
</html>