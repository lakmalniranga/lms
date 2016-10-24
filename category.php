<?php require_once 'student/header.php'; ?>

<?php if (!$user->isLoggedIn()) : Redirect::to(404); endif;  ?>

<div class="column column-8 offset-2 main text-center">
 <section class="main border">
 <h2 class="group-title">Batch Categories</h2>
   <h4><a href="module.php">Year 01</a></h4>
   <h4><a href="">Year 02</a></h4>
   <h4><a href="">Year 03</a></h4>
   <h4><a href="">Plymouth 16.1</a></h4>
   <h4><a href="">Dublin CS 14.2</a></h4>
 </section>
</div>

<?php require_once 'student/footer.php' ?>