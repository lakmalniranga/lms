<?php require_once 'student/header.php'; ?>

<?php if (!$user->isLoggedIn()) : Redirect::to(404); endif;  ?>

<div class="row">
	<div class="column column-3">
		<?php require_once 'student/sidebar.php' ?>
	</div>

	<div class="column column-9 main">
	 <h3 class="group-title">Modules</h3>
	 <section class="main">
	   <h4><a href="content.php">Year 01</a></h4>
	   <h4><a href="">Year 02</a></h4>
	   <h4><a href="">Year 03</a></h4>
	   <h4><a href="">Plymouth 16.1</a></h4>
	   <h4><a href="">Dublin CS 14.2</a></h4>
	 </section>
	</div>
</div>

<?php require_once 'student/footer.php' ?>