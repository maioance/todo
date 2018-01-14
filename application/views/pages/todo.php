<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="column is-offset-3 is-6">


	<!-- <?php var_dump($_SESSION); echo $_SESSION['user_id']?> -->
	<input id="token" hidden value="<?php echo $_SESSION['token'];?>"/>
	<input id="user_id" hidden value="<?php echo $_SESSION['user_id'];?>"/>
	<input id="base_url" hidden value="<?php base_url();?>"/>
	<div class="tile is-parent ">
    <article class="tile is-child box notification is-warning">
      <p class="title">To Do Today</p>
			<div class="field is-grouped">
			  <p class="control is-expanded">
			    <input id="textToDo" class="input" type="text" placeholder="Adauga in lista">
			  </p>
			  <p class="control" id="addTextToDo">
			    <a class="button is-info">
			     Adauga
			    </a>
			  </p>
			</div>
			<div id="toDoContent" class="content">
      </div>
    </article>
  </div>
</div>
<script src="<?= base_url('assets/js/to_do.js') ?>"></script>
