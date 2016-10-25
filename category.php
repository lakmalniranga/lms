<?php require_once 'student/header.php'; ?>

<?php if (isset($_GET['id'])) : 
	$id = (int) escape(Input::get('id'));
	$batch = $db->get('batch', ['course_id', '=', $id])->results();
?>

<div class="column column-8 offset-2 main text-center">
 <section class="main border-blue">
 <h2 class="group-title blue-b">Batch Categories</h2>
 	<?php foreach ($batch as $b) : ?>
	<h4><a href="module.php?id=<?php echo $b->id; ?>"><?php echo $b->name; ?></a></h4>
	<?php endforeach; ?>
 </section>
</div>

<?php else : Redirect::to('index.php'); ?>
<?php endif; ?>

<?php require_once 'student/footer.php' ?>