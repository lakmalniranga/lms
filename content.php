<?php require_once 'student/header.php'; ?>

<div class="row">
	<div class="column column-3">
		<?php require_once 'student/sidebar.php' ?>
	</div>

	<div class="column column-9 main">
	 <h3 class="group-title blue-b capitalize">
		<?php if ($user->hasPermission('admin')):?>
				<a href="#">
					<i class="fa fa-plus-square-o white-f" aria-hidden="true"></i>
					<span class="tooltiptext">Add</span>
				</a>
				<a href="#">
					<i class="fa fa-pencil-square-o white-f" aria-hidden="true"></i>
					<span class="tooltiptext">Edit</span>
				</a>
				<a href="#">
					<i class="fa fa-eye-slash white-f" aria-hidden="true"></i>
					<span class="tooltiptext">Unpublish</span>
				</a>
				<a href="#">
					<i class="fa fa-trash-o white-f" aria-hidden="true"></i>
					<span class="tooltiptext">Delete</span>
				</a>
				Module name
		<?php endif; ?>
	 </h3>
	 <section class="main">
	   <div class="topic-group">
	   	<h4 class="topic-title">
			<?php if ($user->hasPermission('admin')):?>
				<a href="#">
					<i class="fa fa-plus-square-o green-f" aria-hidden="true"></i>
					<span class="tooltiptext">Add</span>
				</a>
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
			01. Database Design
	   	</h4>

	   		<p class="topic-des">	
			Each group should meet the supervisor for 5 (five) times throughout the project timeline. Need to bring a filled form of the following document to each supervisory meeting. You can meet me on every Friday between 9.00 am to 5.00 pm with a prior appointment via email. (dileeka@nsbm.lk)
			</p>
	   		<div class="topic">
				<i class="fa fa-file-powerpoint-o" aria-hidden="true"></i><a href=" href="#"">ER Diagaram</a>
				<br>
				<span class="topic-date">Last modified : 2016-08-02 06:12PM</span>
				<?php if ($user->hasPermission('admin')):?>
					<div class="topic-options">
						<br>
						<a href="#">
							<i class="fa fa-pencil-square-o teal-f" aria-hidden="true"></i>
							<span class="tooltiptext">Add</span>
						</a>
						<a href="#">
							<i class="fa fa-eye-slash blue-f" aria-hidden="true"></i>
							<span class="tooltiptext">Unpublish</span>
						</a>
						<a href="#">
							<i class="fa fa-trash-o red-f" aria-hidden="true"></i>
							<span class="tooltiptext">Delete</span>
						</a>
					</div>
				<?php endif; ?>
	   		</div>

	   		<div class="topic">
				<i class="fa fa-file-pdf-o" aria-hidden="true"></i><a href=" href="#"">ER Diagaram Part 2</a>
				<br>
				<span class="topic-date">Last modified : 2016-08-02 06:12PM</span>
				<?php if ($user->hasPermission('admin')):?>
					<div class="topic-options">
						<br>
						<a href="#">
							<i class="fa fa-pencil-square-o teal-f" aria-hidden="true"></i>
							<span class="tooltiptext">Add</span>
						</a>
						<a href="#">
							<i class="fa fa-eye-slash blue-f" aria-hidden="true"></i>
							<span class="tooltiptext">Unpublish</span>
						</a>
						<a href="#">
							<i class="fa fa-trash-o red-f" aria-hidden="true"></i>
							<span class="tooltiptext">Delete</span>
						</a>
					</div>
				<?php endif; ?>
	   		</div>
	   </div>

	   <div class="topic-group">
	   	<h4 class="topic-title">
			<?php if ($user->hasPermission('admin')):?>
				<a href="#">
					<i class="fa fa-plus-square-o green-f" aria-hidden="true"></i>
					<span class="tooltiptext">Add</span>
				</a>
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
			02. Normalization
	   	</h4>
	   		<p class="topic-des">	
			Each group should meet the supervisor for 5 (five) times throughout the project timeline. Need to bring a filled form of the following document to each supervisory meeting. You can meet me on every Friday between 9.00 am to 5.00 pm with a prior appointment via email. (dileeka@nsbm.lk)
			</p>
	   		<div class="topic">
				<i class="fa fa-file-powerpoint-o" aria-hidden="true"></i><a href=" href="#"">ER Diagaram</a>
				<br>
				<span class="topic-date">Last modified : 2016-08-02 06:12PM</span>
				<?php if ($user->hasPermission('admin')):?>
					<div class="topic-options">
						<br>
						<a href="#">
							<i class="fa fa-pencil-square-o teal-f" aria-hidden="true"></i>
							<span class="tooltiptext">Add</span>
						</a>
						<a href="#">
							<i class="fa fa-eye-slash blue-f" aria-hidden="true"></i>
							<span class="tooltiptext">Unpublish</span>
						</a>
						<a href="#">
							<i class="fa fa-trash-o red-f" aria-hidden="true"></i>
							<span class="tooltiptext">Delete</span>
						</a>
					</div>
				<?php endif; ?>
	   		</div>

	   		<div class="topic">
				<i class="fa fa-file-pdf-o" aria-hidden="true"></i><a href=" href="#"">ER Diagaram Part 2</a>
				<br>
				<span class="topic-date">Last modified : 2016-08-02 06:12PM</span>
				<?php if ($user->hasPermission('admin')):?>
					<div class="topic-options">
						<br>
						<a href="#">
							<i class="fa fa-pencil-square-o teal-f" aria-hidden="true"></i>
							<span class="tooltiptext">Add</span>
						</a>
						<a href="#">
							<i class="fa fa-eye-slash blue-f" aria-hidden="true"></i>
							<span class="tooltiptext">Unpublish</span>
						</a>
						<a href="#">
							<i class="fa fa-trash-o red-f" aria-hidden="true"></i>
							<span class="tooltiptext">Delete</span>
						</a>
					</div>
				<?php endif; ?>
	   		</div>
	   </div>
	 </section>
	</div>
</div>

<?php require_once 'student/footer.php' ?>