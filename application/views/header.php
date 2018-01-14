<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>ToDo List</title>
	<!-- css -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="<?= base_url('assets/bulma-0.6.1/bulma.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
	<!-- js -->
	<script src="<?= base_url('assets/js/jquery-3.2.1.min.js') ?>"></script>
</head>
<body>

	<header id="todo-header">
		<nav class="navbar header-footer" role="navigation" aria-label="main navigation">
  	<div class="navbar-brand">
    <a class="navbar-item" href="<?= base_url() ?>">
      <img src="<?php base_url('logout') ?>assets/images/logo.png ?>" alt="ToDo list">
		</a>
		<span class="navbar-burger burger" data-target="nav-menu">
            <span></span>
            <span></span>
            <span></span>
          </span>
		</div>
		<div class="navbar-menu is-active" id="nav-menu">
			<div class="navbar-end">
						<?php if (isset($_SESSION['username']) && $_SESSION['logged_in'] === true) : ?>
							<a class="navbar-item" href="<?= base_url('logout') ?>">Logout</a>
						<?php else : ?>
							<a class="navbar-item" href="<?= base_url('register') ?>">Register</a>
							<a class="navbar-item " href="<?= base_url('login') ?>">Login</a>
						<?php endif; ?>
			</div>
		</div>
			</div>
		</nav><!-- .navbar -->
	</header><!-- #site-header -->

	<div id="site-content" class="container">

		<?php if (isset($_SESSION)) : ?>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
					</div>
				</div><!-- .row -->
			</div><!-- .container -->
		<?php endif; ?>
