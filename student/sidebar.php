<aside class="sidebar">
	<h3 class="group-title blue-b">Main Menu</h3>
	<ul class="main-menu">
		<?php
			$course = $db->query("SELECT  * FROM course")->limitTo(5);
			foreach ($course as $c) :
		?>
			<li><img src="<?php echo ROOT . 'assets/images/menu-icon.png'; ?>"><a href="category.php?id=<?php   ?>"><?php echo $c->name; ?></a></li>
		<?php endforeach; ?>
	</ul>
</aside>
