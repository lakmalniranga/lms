<?php

if (Input::exists()) {
  if (Token::check(Input::get('token'))) {
	    $validation = $validate->check($_POST, array(
	      'checkbox' => array(
	      		'required' => true
	      	)
	    ));

    	if ($validation->passed()) {
	    	foreach (array_values(Input::get('checkbox')) as $value) {
	    		$u = DB::getInstance()->delete('users', array('id', '=', $value));
	    	}

	  
		} else {
			echo "failed";
		}
 	}
}
?>


<div class="student">
<h3 class="group-title blue-b">Teacher</h3>
	<div class="column column-12 main margin">
		<table class="table">
			<thead>
				<th>#</th>
				<th>Username</th>
				<th>Name</th>
				<th>Contact</th>
				<th></th>
			</thead>
			<tbody>
			<form method="post">
			<?php $u = DB::getInstance()->get('users', array('role', '=', '3'));	?>
				<?php if ($u->count() > 0): ?>
		  			<?php foreach ($u->limitTo(10) as $user): ?>
						<tr>
							<td><input type="checkbox" name="checkbox[]" value="<?php echo $user->id; ?>" id="<?php echo $user->id; ?>"></td>
							<td><?php echo $user->username; ?></td>
							<td><?php echo $user->name; ?></td>
							<td>
								<a href="mailto:<?php echo $user->email; ?>">
									<i class="fa fa-envelope-o" aria-hidden="true"></i>
								</a>
								<a href="#">
									<i class="fa fa-mobile" aria-hidden="true"></i>
									<span class="tooltiptext"><?php echo $user->mobile; ?></span>
								</a> 
							</td>
							<td><a href="dashboard.php?teacher=edit&id=<?php echo $user->id; ?>" class="btn btn-md btn-teal">Edit</a></td>
						</tr>
					<?php endforeach; ?>
				<?php else: ?>
		  			<tr><td colspan="6"><?php echo 'No Result Found'; ?></td></tr>
			<?php endif; ?>
			</tbody>
		</table>
	</div>

	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">

	<div class="dash-option">
		<a onclick="selectall()" class="btn btn-md btn-green">Select All</a>
		<a onclick="selectnone()" class="btn btn-md btn-green">Select None</a>
		<button type="submit" class="btn btn-md btn-red">Delete</button>
		<a href="dashboard.php?teacher=add" class="btn btn-md btn-blue">Add</a>
	</div>

	</form>
</div>