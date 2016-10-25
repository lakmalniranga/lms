<?php require_once 'student/header.php';
if (!isset($_GET['id'])) {
	Redirect::to('index.php');
} 
$id = (int) Input::get('id');
$data = $db->get('module', ['id', '=', $id])->first();
$subModule = $db->get('sub_module', ['module_id', '=', $data->id])->results();
?>

<div class="row">
	<div class="column column-3">
		<?php require_once 'student/sidebar.php' ?>
	</div>

	<div class="column column-9 main">
	 <h3 class="group-title blue-b capitalize">
		<?php if ($user->hasPermission('admin')):?>
				<a href="dashboard.php?module=add">
					<i class="fa fa-plus-square-o white-f" aria-hidden="true"></i>
					<span class="tooltiptext">Add</span>
				</a>
				<a href="dashboard.php?module=edit&id=<?php echo $data->id; ?>">
					<i class="fa fa-pencil-square-o white-f" aria-hidden="true"></i>
					<span class="tooltiptext">Edit</span>
				</a>

				<a href="dashboard.php?module=delete&id=<?php echo $data->id; ?>">
					<i class="fa fa-trash-o white-f" aria-hidden="true"></i>
					<span class="tooltiptext">Delete</span>
				</a>
				<?php echo $data->name; ?>
		<?php endif; ?>
	 </h3>
	 <section class="main">
	 <?php $i = 1; foreach ($subModule as $sub) : ?>
	   <div class="topic-group">
	   	<h4 class="topic-title">
			<?php if ($user->hasPermission('admin')):?>
				<a href="dashboard.php?sub_module=add">
					<i class="fa fa-plus-square-o green-f" aria-hidden="true"></i>
					<span class="tooltiptext">Add</span>
				</a>
				<a href="dashboard.php?sub_module=edit&id=<?php echo $sub->id;  ?>">
					<i class="fa fa-pencil-square-o teal-f" aria-hidden="true"></i>
					<span class="tooltiptext">Edit</span>
				</a>
				<a href="dashboard.php?sub_module=delete&id=<?php echo $sub->id;  ?>">
					<i class="fa fa-trash-o red-f" aria-hidden="true"></i>
					<span class="tooltiptext">Delete</span>
				</a>
			<?php endif; ?>
			<?php echo $i . " " . $sub->name; ?>
	   	</h4>

	   		<p class="topic-des">	
			<?php echo $sub->description; ?>
			</p>
	   		<div class="topic">
				<i class="fa fa-file-powerpoint-o" aria-hidden="true"></i><a href="download.php?id=<?php echo $sub->id; ?>"><?php echo $sub->file; ?></a>
				<br>
				<?php if ($user->hasPermission('admin')):?>
				<?php endif; ?>
	   		</div>

		<?php $i++; endforeach; ?>
	 </section>
	</div>
</div>

<?php require_once 'student/footer.php' ?>