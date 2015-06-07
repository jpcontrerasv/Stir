
<?php get_header(); ?>
  <section id="register" class="container">
  	<div class="col-lg-12">
	
	<?php global $user_ID, $user_identity; get_currentuserinfo(); if (!$user_ID) { ?>
    <ul class="tabs">
        <li class="tab-link <?php if(!isset($_POST['reset_pass'])):?>current<?php endif;?>" data-tab="tab-1">Register</li>
        <li class="tab-link" data-tab="tab-2">Log in</li>
        <li class="tab-link <?php if(isset($_POST['reset_pass'])):?>current<?php endif;?>" data-tab="tab-3 ">Forgot password?</li>
    </ul>

	<div id="tab-1" class="tab-content <?php if(!isset($_POST['reset_pass'])):?>current<?php endif;?>">
			<?php $register = $_GET['register']; $reset = $_GET['reset']; if ($register == true) { ?>

			<h3>Success!</h3>
			<p>Check your email for the password and then return to log in.</p>

			<?php } elseif ($reset == true) { ?>

			<h3>Success!</h3>
			<p>Check your email to reset your password.</p>

			<?php } else { ?>

			<h3 style="color:#e8e3d9;">Have an account?</h3>
			<p>Sign up! It&rsquo;s fast &amp; <em>free!</em></p>

			<?php } ?>
			
	<?php echo do_shortcode("[pie_register_form]"); ?>
    <div id="warning_register" class="box fleft fwidth">
    	<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 text-center">
        	<i class="fa fa-exclamation-triangle fa-3x"></i>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
        <p>Please, remember to confirm your account, <span>or you won't be able to login and support or create projects</span>. After registration a confirmation email will be sent.</p>
        </div>
        
    	 
	</div>
            
	</div>
	<div id="tab-2" class="tab-content">
			<h3 style="color:#e8e3d9;">Login</h3>
			<?php /*?><?php wp_login_form(); ?><?php */?>
            <?php echo do_shortcode("[pie_register_login]"); ?>
	</div>
	<div id="tab-3" class="tab-content <?php if(isset($_POST['reset_pass'])):?>current<?php endif;?>">
			<h3 style="color:#e8e3d9;">Lose something?</h3>
			<p>Enter your username or email to reset your password.</p>
            
            <?php echo do_shortcode("[pie_register_forgot_password]"); ?>
            
			<?php /*?><form method="post" action="<?php echo site_url('wp-login.php?action=lostpassword', 'login_post') ?>" class="wp-user-form">
				<div class="username">
					<label for="user_login" class="hide"><?php _e('Username or Email'); ?>: </label>
					<input type="text" name="user_login" value="" size="20" id="user_login" tabindex="1001" />
				</div>
				<div class="login_fields">
					<?php do_action('login_form', 'resetpass'); ?>
					<input type="submit" name="user-submit" value="<?php _e('Reset my password'); ?>" class="user-submit" tabindex="1002" />
					<?php $reset = $_GET['reset']; if($reset == true) { echo '<p>A message will be sent to your email address.</p>'; } ?>
					<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>?reset=true" />
					<input type="hidden" name="user-cookie" value="1" />
				</div>
			</form><?php */?>
	</div>

	<?php } else { // is logged in ?>

	<div class="sidebox">
		<h3>Welcome, <?php echo $user_identity; ?></h3>
		<div class="usericon">
			<?php global $userdata; get_currentuserinfo(); echo get_avatar($userdata->ID, 60); ?>

		</div>
		<div class="userinfo">
			<p>You&rsquo;re logged in as <strong><?php echo $user_identity; ?></strong></p>
			<p>
				<a href="<?php echo wp_logout_url('index.php'); ?>">Log out</a> | 
				<?php if (current_user_can('manage_options')) { 
					echo '<a href="' . admin_url() . '">' . __('Admin') . '</a>'; } else { 
					echo '<a href="' . admin_url() . 'profile.php">' . __('Profile') . '</a>'; } ?>

			</p>
		</div>
	</div>

	<?php } ?>
    
    </div>
  </section>
  

<?php get_footer(); ?>