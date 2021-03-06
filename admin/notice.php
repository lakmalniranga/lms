<?php  


if (isset($_GET['notice']) && $_GET['notice'] == 'add') {
	if (Input::exists() && Input::get('note') != '') {
		if (Token::check(Input::get('token'))) {
			$notice = escape(Input::get('note'));
			$title = escape(Input::get('title'));
			if ($db->insert('notice', [ 'notice' => $notice, 'title' => $title ,'default' => 1])) {
				Session::flash('notice', 'Added a New Notice');
				Redirect::to('dashboard.php?notice=view');
			}		
		}
	}
?>

<div class="student">
	<h3 class="group-title blue-b">NOTICE</h3>
	<?php if (Input::exists()) { 

		$validation = $validate->check($_POST, [
			'title'	=> [
				'required'	=> true,
			],
			'note'	=> [
				'required'	=> true
			]
		]);
	?>

		<div class="errors">
			<ul>
		<?php 		
			if (!$validation->passed()) {
			foreach ($validation->errors() as $error) {
 		?>
			<li><?php echo $error; ?></li>

	<?php 
		}
		?>
		</ul>
		</div>
	<?php
		}
	} ?>
	<form method="POST">
		<p><input type="text" name="title" class="text-input"></p>
		<p>
			<textarea name="note" id="notice" class="text-input textarea"></textarea>
		</p>
		<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
		<p><button class="btn btn-blue btn-lg">Add Note</button></p>
	</form>
</div>

<?php

} else if (isset($_GET['notice']) && $_GET['notice'] == 'view') {
	$notices = $db->query("SELECT * FROM notice")->results();
?>

<div class="student">
<h3 class="group-title blue-b">Notice</h3>
	<div class="column column-12 main margin dashboard-list">
		<ul>
			<?php foreach ($notices as $notice): ?>
				<li><p class="list-text"><?php echo $notice->title; ?><p class="action"><a class="btn btn-sm btn-green" href="dashboard.php?notice=edit&id=<?php echo $notice->id; ?>">Edit</a> <a class="btn btn-sm btn-red" href="dashboard.php?notice=delete&id=<?php echo $notice->id; ?>">Delete</a></p></li>
			<?php endforeach ?>
		</ul>
	</div>
	<div class="dash-option">
		<a href="dashboard.php?notice=add" class="btn btn-md btn-blue">Add Notice</a>
	</div>
</div>

<?php
} else if (isset($_GET['notice']) && $_GET['notice'] == 'delete' && isset($_GET['id']) && $_GET['id'] != '') {
	$id = (int) escape(Input::get('id'));
	if ($user->isLoggedIn() && $user->hasPermission('admin')) {
		if ($db->delete('notice', ['id', '=', $id])) {
			Session::flash('notice', 'Noticed Deleted Successfully!');
			Redirect::to('dashboard.php?notice=view');
		} else {
			Session::flash('error', 'Something went Wrong!');
			Redirect::to('dashboard.php?notice=view');
		}
	}

} else if (isset($_GET['notice']) && $_GET['notice'] == 'edit' && isset($_GET['id']) && $_GET['id'] != '') {
	$id = (int) escape(Input::get('id'));
	$note = $db->get('notice', ['id', '=', $id])->first();
	if (!$note) {
		Redirect::to('dashboard.php?notice=view');
	}

?>

<div class="add-form">
	<h3>Update a Notice</h3>
	<?php if (Input::exists()) { 

		$validation = $validate->check($_POST, [
			'title'	=> [
				'required'	=> true,
			],
			'note'	=> [
				'required'	=> true
			]
		]);
	?>

		<div class="errors">
			<ul>
		<?php 		
			if (!$validation->passed()) {
			foreach ($validation->errors() as $error) {
 		?>
			<li><?php echo $error; ?></li>

	<?php 
		}
		?>
		</ul>
		</div>
	<?php
		} else {
		if (Input::exists() && Input::get('note') != '') {
			if (Token::check(Input::get('token')) && empty($validate->errors())) {
				$id = (int) escape(Input::get('id'));
				$notice = escape(Input::get('note'));
				$title = escape(Input::get('title'));

				if ($user->isLoggedIn() && $user->hasPermission('admin')) {
					$update = $db->update('notice', $id, [
						'notice'	=> $notice,
						'title'		=> $title
					]);

					if ($update) {
						Session::flash('notice', 'Noticed Updated Successfully!');
						Redirect::to('dashboard.php?notice=view');
					} else {
						Session::flash('error', 'Something went Wrong!');
						Redirect::to('dashboard.php?notice=view');
					}
				}
			}
		}
	
		}
	} ?>
	<form method="POST">
		<p><input type="text" name="title" class="text-input" value="<?php echo $note->title; ?>"></p>
		<p>
			<textarea name="note" id="notice" class="text-input textarea"><?php echo $note->notice; ?></textarea>
		</p>
		<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
		<p><button class="btn btn-blue btn-lg">Update Note</button></p>
	</form>
</div>


<?php
}

?>