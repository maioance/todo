<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="column is-offset-4 is-4">
				<h1 class="title">Login</h1>
		<?php if(isset($error) && $error != ""):?>
			<article class="message is-danger">
				  <div class="message-header">
				    <p>Erroare</p>
				    <button class="delete" aria-label="delete" onclick="$('.message').hide();"></button>
				  </div>
				  <div class="message-body">
								<?php echo($error); ?>
					</div>
			</article>
		<?php endif;?>
			<?= form_open() ?>
			<div class="field">
			  <label class="label">Username</label>
			  <div class="control has-icons-left has-icons-right">
			    <input class="input" id="username" type="text"  name="username" placeholder="Username">
			    <span class="icon is-small is-left">
			      <i class="fa fa-user"></i>
			    </span>
			  </div>
			</div>
			<div class="field">
			  <label class="label">Password</label>
			  <div class="control has-icons-left has-icons-right">
			    <input class="input" type="password" id="password" name="password" placeholder="Passowrd">
			    <span class="icon is-small is-left">
			      <i class="fa fa-lock	"></i>
			    </span>
			  </div>
			</div>
			<div class="field">
			  <p class="control">
			    <button class="button is-success" type="submit" >
			      Login
			    </button>
			  </p>
			</div>
			</form>
</div>
