<?php require_once 'student/header.php'; ?>

<?php if ($user->isLoggedIn()) : ?>
<div class="column column-8 offset-2 main text-center">
 <h2 class="group-title blue-b">Course</h2>
 <section class="main border-ash">
   <h4 class="group-title ash-b">School of computing <span class="toggle-icon"><img data-id="1" id="toggle-icon" src="<?php echo ROOT . "assets/images/toggle-plus.png"; ?>"></span></h4>
   <div class="group-content">
     <h4><a href="category.php">Plymouth Newtorking</a></h4>
     <h4><a href="">Plymouth Software Enginering</a></h4>
     <h4><a href="">Plymouth Computer Security</a></h4>
     <h4><a href="">Managment Informatoion Technology BSC hons</a></h4>
     <h4><a href="">Computer Seience</a></h4>
   </div>
 </section>

 <section class="main border-ash">
   <h4 class="group-title ash-b">School of Managment <span class="toggle-icon"><img data-id="2" id="toggle-icon" src="<?php echo ROOT . "assets/images/toggle-plus.png"; ?>"></span></h4>
   <div class="group-content">
     <h4><a href="">Plymouth Newtorking</a></h4>
     <h4><a href="">Plymouth Software Enginering</a></h4>
     <h4><a href="">Plymouth Computer Security</a></h4>
     <h4><a href="">Managment Informatoion Technology BSC hons</a></h4>
     <h4><a href="">Computer Seience</a></h4>
   </div>
 </section>

 <section class="main border-ash">
   <h4 class="group-title ash-b">School of Enginering <span class="toggle-icon"><img data-id="3" id="toggle-icon" src="<?php echo ROOT . "assets/images/toggle-plus.png"; ?>"></span></h4>
   <div class="group-content">
     <h4><a href="">Plymouth Newtorking</a></h4>
     <h4><a href="">Plymouth Software Enginering</a></h4>
     <h4><a href="">Plymouth Computer Security</a></h4>
     <h4><a href="">Managment Informatoion Technology BSC hons</a></h4>
     <h4><a href="">Computer Seience</a></h4>
   </div>
 </section>
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
