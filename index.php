<?php require_once 'student/header.php'; ?>

<?php if ($user->isLoggedIn()) : ?>
<div class="column column-8 offset-2 main text-center">
 <h2 class="group-title blue">Course Categories</h2>
 <section class="main border">
   <h3 class="group-title">School of computing <span class="toggle-icon"><img data-id="1" id="toggle-icon" src="<?php echo ROOT . "assets/images/toggle-plus.png"; ?>"></span></h3>
   <div class="group-content">
     <h4><a href="category.php">Plymouth Newtorking</a></h4>
     <h4><a href="">Plymouth Software Enginering</a></h4>
     <h4><a href="">Plymouth Computer Security</a></h4>
     <h4><a href="">Managment Informatoion Technology BSC hons</a></h4>
     <h4><a href="">Computer Seience</a></h4>
   </div>
 </section>

 <section class="main border">
   <h3 class="group-title">School of Managment <span class="toggle-icon"><img data-id="2" id="toggle-icon" src="<?php echo ROOT . "assets/images/toggle-plus.png"; ?>"></span></h3>
   <div class="group-content">
     <h4><a href="">Plymouth Newtorking</a></h4>
     <h4><a href="">Plymouth Software Enginering</a></h4>
     <h4><a href="">Plymouth Computer Security</a></h4>
     <h4><a href="">Managment Informatoion Technology BSC hons</a></h4>
     <h4><a href="">Computer Seience</a></h4>
   </div>
 </section>

 <section class="main border">
   <h3 class="group-title">School of Enginering <span class="toggle-icon"><img data-id="3" id="toggle-icon" src="<?php echo ROOT . "assets/images/toggle-plus.png"; ?>"></span></h3>
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
 <h2 class="group-title">News and Notice</h2>
 <section class="main border">
  <h3 class="group-title">Internship opportunity-Video Production and Editing</h3>
  <p class="side-padding">Applications are called for 3 Months internship in Video Production Editing.
  Interested students are requested to forward a CV to uditha.g@sliit.lk on or before 20th October 2016.</p>
 </section>

 <section class="main border">
  <h3 class="group-title">No Lectures</h3>
  <p class="side-padding">Please consider, there's no leactures in 2016.02.12 for the computing school</p>
 </section>

 <section class="main border">
  <h3 class="group-title">Internship opportunity-Video Production and Editing</h3>
  <p class="side-padding">Applications are called for 3 Months internship in Video Production Editing.
  Interested students are requested to forward a CV to uditha.g@sliit.lk on or before 20th October 2016.</p>
 </section>
</div>


<?php require_once 'student/footer.php' ?>
