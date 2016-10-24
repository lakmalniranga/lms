<?php require_once 'student/header.php'; ?>

<?php if (!$user->isLoggedIn()) : Redirect::to(404); endif;  ?>

<div class="column column-8 offset-2 main text-center">
 <h2>BATCH CATEGORIES</h2>
 <section class="main border">
   <h3><a href="module.php">Year 01</a></h3>
   <h3><a href="">Year 02</a></h3>
   <h3><a href="">Year 03</a></h3>
   <h3><a href="">Plymouth 16.1</a></h3>
   <h3><a href="">Dublin CS 14.2</a></h3>
 </section>
</div>

<?php require_once 'student/footer.php' ?>