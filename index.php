<?php require_once 'student/header.php'; 
$faculty = $db->query("SELECT * FROM faculty")->results();
$i = 1;
?>

<?php if ($user->isLoggedIn()) : ?>
<div class="column column-8 offset-2 main text-center">
  <h2 class="group-title blue-b">Course</h2>
  <?php foreach ($faculty as $f) : ?>
    <section class="main border-ash">
     <h4 class="group-title ash-b"><?php echo $f->name; ?><span class="toggle-icon"><img data-id="<?php echo $i; ?>" id="toggle-icon" src="<?php echo ROOT . "assets/images/toggle-plus.png"; ?>"></span></h4>
     <div class="group-content">
        <?php 
        $course = $db->get('course', ['faculty_id', '=', $f->id])->results();
        foreach ($course as $c) : ?>
       <h4><a href="category.php?id=<?php echo $c->id ?>"><?php echo $c->name ?></a></h4>
     <?php endforeach; ?>
     </div>
   </section>
  <?php $i++; ?>
  <?php endforeach; ?>


</div>
<?php endif; ?>

<div class="column column-8 offset-2 main text-center">
 <h2 class="group-title blue-b">Notice</h2>
 <?php $notice = DB::getInstance()->query('SELECT * FROM notice'); ?>

 <?php if ($notice->count() > 0): ?>
  <?php foreach ($notice->results() as $n): ?>
      <section class="main border-ash">
      <h4 class="group-title ash-b"><?php echo $n->title ?></h4>
      <p class="side-padding"><?php echo $n->notice ?></p>
    </section>
  <?php endforeach; ?>
  <?php endif; ?>
</div>

<?php require_once 'student/footer.php' ?>
