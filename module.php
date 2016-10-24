<?php require_once 'student/header.php'; ?>

<div class="row">
	<div class="column column-3">
		<?php require_once 'student/sidebar.php' ?>
	</div>

	<div class="column column-9 main">
	 <h3 class="group-title blue-b">Modules
		<?php if ($user->hasPermission('admin')):?>
				<a href="#">
					<i class="fa fa-plus-square-o white-f" aria-hidden="true"></i>
					<span class="tooltiptext">Add</span>
				</a>
		<?php endif; ?>
	 </h3>
	 <section class="main">
	   <h4>
		<?php if ($user->hasPermission('admin')):?>
				<a href="#">
					<i class="fa fa-pencil-square-o teal-f" aria-hidden="true"></i>
					<span class="tooltiptext">Edit</span>
				</a>
				<a href="#">
					<i class="fa fa-eye-slash blue-f" aria-hidden="true"></i>
					<span class="tooltiptext">Unpublish</span>
				</a>
				<a href="#">
					<i class="fa fa-trash-o red-f" aria-hidden="true"></i>
					<span class="tooltiptext">Delete</span>
				</a>
		<?php endif; ?>
		<a href="content.php">Database Systems</a>
	   </h4>
	   <h4>
		<?php if ($user->hasPermission('admin')):?>
				<a href="#">
					<i class="fa fa-pencil-square-o teal-f" aria-hidden="true"></i>
					<span class="tooltiptext">Edit</span>
				</a>
				<a href="#">
					<i class="fa fa-eye-slash blue-f" aria-hidden="true"></i>
					<span class="tooltiptext">Unpublish</span>
				</a>
				<a href="#">
					<i class="fa fa-trash-o red-f" aria-hidden="true"></i>
					<span class="tooltiptext">Delete</span>
				</a>
		<?php endif; ?>
		<a href="">OOP Java</a>
	   </h4>
	 </section>
	</div>
</div>

<?php require_once 'student/footer.php' ?>