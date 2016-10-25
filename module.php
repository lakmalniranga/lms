<?php require_once 'student/header.php'; 
if (isset($_GET['id'])) {
	$id = (int) escape($_GET['id']);
} else {
	Redirect::to('index.php');
}

?>

<div class="row">
	<div class="column column-3">
		<?php require_once 'student/sidebar.php' ?>
	</div>

	<div class="column column-9 main">
	 <h3 class="group-title blue-b">Modules
		<?php if ($user->hasPermission('admin')):?>
				<a href="dashboard.php?module=add">
					<i class="fa fa-plus-square-o white-f" aria-hidden="true"></i>
					<span class="tooltiptext">Add</span>
				</a>
		<?php endif; ?>
	 </h3>
	 <section class="main">
	 	<?php 

	 	$module = $db->get('module', ['batch_id', '=', $id])->results();
	 	foreach ($module as $m) : 
	 	?>
	   <h4>
		<?php if ($user->hasPermission('admin')):?>
				<a href="dashboard.php?module=edit&id=<?php echo $m->id ?>">
					<i class="fa fa-pencil-square-o teal-f" aria-hidden="true"></i>
					<span class="tooltiptext">Edit</span>
				</a>
				<a href="dashboard.php?module=delete&id=<?php echo $m->id ?>">
					<i class="fa fa-trash-o red-f" aria-hidden="true"></i>
					<span class="tooltiptext">Delete</span>
				</a>
		<?php endif; ?>
		<a href="content.php?id=<?php echo $m->id; ?>"><?php echo $m->name; ?></a>
	   </h4>
	<?php endforeach; ?>
	 </section>
	</div>
</div>

<?php require_once 'student/footer.php' ?>