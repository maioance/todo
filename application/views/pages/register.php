<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="column is-offset-3 is-6">
		<?php if (validation_errors()) : ?>
			<article class="message is-danger">
					<div class="message-header">
						<p>Erroare</p>
						<button class="delete" aria-label="delete" onclick="$('.message').hide();"></button>
					</div>
					<div class="message-body">
								<?= validation_errors() ?>
					</div>
			</article>

		<?php endif; ?>
		<?php if (isset($error)) : ?>
			<article class="message is-danger">
					<div class="message-header">
						<p>Erroare</p>
						<button class="delete" aria-label="delete" onclick="$('.message').hide();"></button>
					</div>
					<div class="message-body">
								<?=$error ?>
					</div>
			</article>
		<?php endif; ?>
		<div class="col-md-12">
			<div class="page-header">
				<h1>Inregistrare</h1>
			</div>
			<?= form_open() ?>
			<div class="field">
				<label class="label">Username</label>
				<div class="control has-icons-left">
					<input class="input" id="username" type="text"  name="username" placeholder="Username">
					<span class="icon is-small is-left">
						<i class="fa fa-user"></i>
					</span>
					<p class="help">Minim 4 caractere</p>
				</div>
			</div>
			<div class="field">
				<label class="label">Email</label>
				<div class="control has-icons-left">
					<input class="input" id="email" name="email"  placeholder="Enter your email">
					<span class="icon is-small is-left">
						<i class="fa fa-envelope"></i>
					</span>
					<p class="help">Un email valid <b>'examplu@domeniu.com'</b></p>
				</div>
			</div>
			<div class="field">
				<label class="label">Parola</label>
				<div class="control has-icons-left">
					<input class="input" type="password" id="password" name="password"  placeholder="Enter a password">
					<span class="icon is-small is-left">
						<i class="fa fa-lock"></i>
					</span>
					<p class="help">Minim 6 caractere</p>
				</div>
			</div>
			<div class="field">
				<label class="label">Confirma parola</label>
				<div class="control has-icons-left">
					<input class="input" type="password" id="password_confirm" name="password_confirm"  placeholder="Confirm your password">
					<span class="icon is-small is-left">
						<i class="fa fa-lock"></i>
					</span>
					<p class="help">Introduce inca o data parola</p>
				</div>
			</div>
			<div class="field">
				<p class="control">
					<button class="button is-success" type="submit" >
						Inregistrare
					</button>
				</p>
			</div>
			</form>
		</div>
</div><!-- .container -->
