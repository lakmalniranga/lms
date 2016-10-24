<?php require_once 'student/header.php'; ?>

<?php if (!$user->isLoggedIn()) : Redirect::to(404); endif;  ?>

<div class="row">
	<div class="column column-3">
		<?php require_once 'student/sidebar.php' ?>
	</div>

	<div class="column column-9 main">
	 <h3 class="group-title">Topics</h3>
	 <section class="main">
	   <div class="topic-group">
	   	<h4 class="topic-title">01. Database Design</h4>
	   		<p class="topic-des">	
			Each group should meet the supervisor for 5 (five) times throughout the project timeline. Need to bring a filled form of the following document to each supervisory meeting. You can meet me on every Friday between 9.00 am to 5.00 pm with a prior appointment via email. (dileeka@nsbm.lk)
			</p>
	   		<div class="topic">
				<i class="fa fa-file-powerpoint-o" aria-hidden="true"></i><a href=" href="#"">ER Diagaram</a>
				<br>
				<span class="topic-date">Last modified : 2016-08-02 06:12PM</span>
	   		</div>

	   		<div class="topic">
				<i class="fa fa-file-pdf-o" aria-hidden="true"></i><a href=" href="#"">ER Diagaram Part 2</a>
				<br>
				<span class="topic-date">Last modified : 2016-08-02 06:12PM</span>
	   		</div>
	   </div>

	   <div class="topic-group">
	   	<h4 class="topic-title">02. Normalization</h4>
	   		<p class="topic-des">	
			Each group should meet the supervisor for 5 (five) times throughout the project timeline. Need to bring a filled form of the following document to each supervisory meeting. You can meet me on every Friday between 9.00 am to 5.00 pm with a prior appointment via email. (dileeka@nsbm.lk)
			</p>
	   		<div class="topic">
				<i class="fa fa-file-powerpoint-o" aria-hidden="true"></i><a href=" href="#"">ER Diagaram</a>
				<br>
				<span class="topic-date">Last modified : 2016-08-02 06:12PM</span>
	   		</div>

	   		<div class="topic">
				<i class="fa fa-file-pdf-o" aria-hidden="true"></i><a href=" href="#"">ER Diagaram Part 2</a>
				<br>
				<span class="topic-date">Last modified : 2016-08-02 06:12PM</span>
	   		</div>
	   </div>
	 </section>
	</div>
</div>

<?php require_once 'student/footer.php' ?>