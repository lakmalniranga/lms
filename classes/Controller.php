<?php 

class Controller {

	protected $db, $user, $validate;

	public function __construct() {
		$this->db = DB::getInstance();
		$this->user = new User();
		$this->validate = new Validate();
	}

	public function facultyView() {
		$result = '';
		$data = $this->db->query("SELECT * FROM faculty")->results();

		if ($this->db->count()) {
			$result .= '<div class="student">
				<div class="dash-option">
					<a href="dashboard.php?faculty=add" class="btn btn-md btn-blue">Add Faculty</a>
				</div>
				<div class="column column-12 main margin dashboard-list">
					<ul>';

			foreach ($data as $d) {
				$result .= '<li><p class="list-text">'. $d->name .'<p class="action"><a class="btn btn-sm btn-green" href="dashboard.php?faculty=edit&id='. $d->id .'">Edit</a> <a class="btn btn-sm btn-red" href="dashboard.php?faculty=delete&id='. $d->id .'">Delete</a></p></li>';
			}
			
			$result .= '				
					</ul>
				</div>
			</div>';
		}


		return $result;
	}

	public function facultyAddForm() {
		$errors = '';
		if (Input::exists()) {
			if (Token::check(Input::get('token'))) {
				$validation = $this->validate->check($_POST, [
					'name'	=> [
						'required'	=> true
					]
				]);

				if (!$validation->passed()) {
					$errors = $this->showErrors($validation->errors());
				} else {
					$name = escape(Input::get('name'));
					if ($this->db->insert('faculty', ['name'	=> $name])) {
						Session::flash('home', 'Faculty added successfully!');
						Redirect::to('dashboard.php?faculty=view');
					} else {
						Session::flash('error', 'Something went wrong!');
						Redirect::to('dashboard.php?faculty=view');
					}
				}

			}
		}

		$result = '';

		$result .= '<div class="add-form">
			<h3>Add a Faculty</h3>';

		$result .= $errors;

		$result .=	'<form method="post">
				<p><input type="text" name="name" class="text-input"></p>
				<input type="hidden" name="token" value='. Token::generate() .'>
				<p><button class="btn btn-blue btn-lg">Add Faculty</button></p>
			</form>
		';

		$result .= '</div>';

		return $result;
	}

	public function facultyEditForm($id) {
		$data = $this->db->get('faculty', ['id', '=', $id])->first();

		$errors = '';
		if (Input::exists()) {
			if (Token::check(Input::get('token'))) {
				$validation = $this->validate->check($_POST, [
					'name'	=> [
						'required'	=> true
					]
				]);

				if (!$validation->passed()) {
					$errors = $this->showErrors($validation->errors());
				} else {
					$name = escape(Input::get('name'));
					if ($this->db->update('faculty', $id, ['name'	=> $name])) {
						Session::flash('home', 'Faculty updated successfully!');
						Redirect::to('dashboard.php?faculty=view');
					} else {
						Session::flash('error', 'Something went wrong!');
						Redirect::to('dashboard.php?faculty=view');
					}
				}

			}
		}

		$result = '';

		$result .= '<div class="add-form">
			<h3>Upda Faculty</h3>';

		$result .= $errors;

		$result .=	'<form method="post">
				<p><input type="text" name="name" class="text-input" value="'. $data->name .'"></p>
				<input type="hidden" name="token" value='. Token::generate() .'>
				<p><button class="btn btn-blue btn-lg">Update Faculty</button></p>
			</form>
		';

		$result .= '</div>';

		return $result;
	}

	public function facultyDelete($id) {
		if ($this->db->delete('faculty', ['id', '=', $id])) {
			Session::flash('home', 'Faculty deleted successfully!');
			Redirect::to('dashboard.php?faculty=view');
		} else {
			Session::flash('error', 'Something went Wrong!');
			Redirect::to('dashboard.php?faculty=view');
		}
	}

	public function courseView() {
		$result = '';
		$data = $this->db->query("SELECT * FROM course")->results();

		if ($this->db->count()) {
			$result .= '<div class="student">
				<div class="dash-option">
					<a href="dashboard.php?course=add" class="btn btn-md btn-blue">Add Course</a>
				</div>
				<div class="column column-12 main margin dashboard-list">
					<ul>';

			foreach ($data as $d) {
				$result .= '<li><p class="list-text">'. $d->name .'<p class="action"><a class="btn btn-sm btn-green" href="dashboard.php?course=edit&id='. $d->id .'">Edit</a> <a class="btn btn-sm btn-red" href="dashboard.php?course=delete&id='. $d->id .'">Delete</a></p></li>';
			}
			
			$result .= '				
					</ul>
				</div>
			</div>';
		}


		return $result;
	}

	public function courseAddForm() {
		$errors = '';
		if (Input::exists()) {
			if (Token::check(Input::get('token'))) {
				$validation = $this->validate->check($_POST, [
					'name'	=> [
						'required'	=> true
					],
					'faculty'	=> [
						'required'	=> true
					]
				]);

				if (!$validation->passed()) {
					$errors = $this->showErrors($validation->errors());
				} else {
					$name = escape(Input::get('name'));
					$facultyId = (int) Input::get('faculty');

					if ($this->db->insert('course', ['name'	=> $name, 'faculty_id'	=> $facultyId])) {
						Session::flash('home', 'Faculty added successfully!');
						Redirect::to('dashboard.php?course=view');
					} else {
						Session::flash('error', 'Something went wrong!');
						Redirect::to('dashboard.php?course=view');
					}
				}

			}
		}

		$result = '';

		$result .= '<div class="add-form">
			<h3>Add a Course</h3>';

		$result .= $errors;

		$result .=	'<form method="post">
				<p><input type="text" name="name" class="text-input"></p>
				<p>
					<select name="faculty">';

				foreach ($this->get('faculty') as $faculty) {
					$result .= '<option value="'. $faculty->id .'">'. $faculty->name .'</option>';
				}
					
		$result .= 	'</select>
					</p>
				<input type="hidden" name="token" value='. Token::generate() .'>
				<p><button class="btn btn-blue btn-lg">Add Course</button></p>
			</form>
		';

		$result .= '</div>';

		return $result;
	}

	public function courseEditForm($id) {
		$data = $this->db->get('course', ['id', '=', $id])->first();
		$errors = '';

		if (Input::exists()) {
			if (Token::check(Input::get('token'))) {
				$validation = $this->validate->check($_POST, [
					'name'	=> [
						'required'	=> true
					],
					'faculty'	=> [
						'required'	=> true
					]
				]);

				if (!$validation->passed()) {
					$errors = $this->showErrors($validation->errors());
				} else {
					$name = escape(Input::get('name'));
					$facultyId = (int) Input::get('faculty');
					
					if ($this->db->update('course', $id, ['name'	=> $name, 'faculty_id'	=> $facultyId])) {
						Session::flash('home', 'Faculty added successfully!');
						Redirect::to('dashboard.php?course=view');
					} else {
						Session::flash('error', 'Something went wrong!');
						Redirect::to('dashboard.php?course=view');
					}
				}

			}
		}

		$result = '';

		$result .= '<div class="add-form">
			<h3>Update Course</h3>';

		$result .= $errors;

		$result .=	'<form method="post">
				<p><input type="text" name="name" class="text-input" value="'. $data->name .'"></p>
				<p>
					<select name="faculty">';

				foreach ($this->get('faculty') as $faculty) {
					$result .= '<option value="'. $faculty->id .'">'. $faculty->name .'</option>';
				}
					
		$result .= 	'</select>
					</p>
				<input type="hidden" name="token" value='. Token::generate() .'>
				<p><button class="btn btn-blue btn-lg">Update Course</button></p>
			</form>
		';

		$result .= '</div>';

		return $result;
	}

	public function courseDelete($id) {
		if ($this->db->delete('course', ['id', '=', $id])) {
			Session::flash('home', 'Course deleted successfully!');
			Redirect::to('dashboard.php?course=view');
		} else {
			Session::flash('error', 'Something went Wrong!');
			Redirect::to('dashboard.php?course=view');
		}
	}

	public function batchView() {
		$result = '';
		$data = $this->db->query("SELECT * FROM batch")->results();


		if ($this->db->count()) {
			$result .= '<div class="student">
				<div class="dash-option">
					<a href="dashboard.php?batch=add" class="btn btn-md btn-blue">Add Faculty</a>
				</div>
				<div class="column column-12 main margin dashboard-list">
					<ul>';

			foreach ($data as $d) {
				$c = $this->db->get('course', ['id', '=', $d->course_id])->first()->name;
				$result .= '<li><p class="list-text">'. $d->name .' - '. $c .'<p class="action"><a class="btn btn-sm btn-green" href="dashboard.php?batch=edit&id='. $d->id .'">Edit</a> <a class="btn btn-sm btn-red" href="dashboard.php?batch=delete&id='. $d->id .'">Delete</a></p></li>';
			}
			
			$result .= '				
					</ul>
				</div>
			</div>';
		}


		return $result;
	}

	public function batchAddForm() {
		$errors = '';
		if (Input::exists()) {
			if (Token::check(Input::get('token'))) {
				$validation = $this->validate->check($_POST, [
					'name'	=> [
						'required'	=> true
					],
					'course'	=> [
						'required'	=> true
					]
				]);

				if (!$validation->passed()) {
					$errors = $this->showErrors($validation->errors());
				} else {
					$name = escape(Input::get('name'));
					$course = (int) Input::get('course');

					if ($this->db->insert('batch', ['name'	=> $name, 'course_id'	=> $course])) {
						Session::flash('home', 'Batch added successfully!');
						Redirect::to('dashboard.php?batch=view');
					} else {
						Session::flash('error', 'Something went wrong!');
						Redirect::to('dashboard.php?batch=view');
					}
				}

			}
		}

		$result = '';

		$result .= '<div class="add-form">
			<h3>Add a Batch</h3>';

		$result .= $errors;

		$result .=	'<form method="post">
				<p><input type="text" name="name" class="text-input" placeholder="Batch Name"></p>
				<p>
					<select name="course">';

				foreach ($this->get('course') as $course) {
					$result .= '<option value="'. $course->id .'">'. $course->name .'</option>';
				}
					
		$result .= 	'</select>
					</p>
				<input type="hidden" name="token" value='. Token::generate() .'>
				<p><button class="btn btn-blue btn-lg">Add Batch</button></p>
			</form>
		';

		$result .= '</div>';

		return $result;
	}

	public function batchEditForm($id) {
		$data = $this->db->get('batch', ['id', '=', $id])->first();
		$errors = '';

		if (Input::exists()) {
			if (Token::check(Input::get('token'))) {
				$validation = $this->validate->check($_POST, [
					'name'	=> [
						'required'	=> true
					],
					'course'	=> [
						'required'	=> true
					]
				]);

				if (!$validation->passed()) {
					$errors = $this->showErrors($validation->errors());
				} else {
					$name = escape(Input::get('name'));
					$course = (int) Input::get('course');
					
					if ($this->db->update('batch', $id, ['name'	=> $name, 'course_id'	=> $course])) {
						Session::flash('home', 'Batch added successfully!');
						Redirect::to('dashboard.php?batch=view');
					} else {
						Session::flash('error', 'Something went wrong!');
						Redirect::to('dashboard.php?batch=view');
					}
				}

			}
		}

		$result = '';

		$result .= '<div class="add-form">
			<h3>Update Batch</h3>';

		$result .= $errors;

		$result .=	'<form method="post">
				<p><input type="text" name="name" class="text-input" value="'. $data->name .'"></p>
				<p>
					<select name="course">';

				foreach ($this->get('course') as $course) {
					$result .= '<option value="'. $course->id .'">'. $course->name .'</option>';
				}
					
		$result .= 	'</select>
					</p>
				<input type="hidden" name="token" value='. Token::generate() .'>
				<p><button class="btn btn-blue btn-lg">Update Batch</button></p>
			</form>
		';

		$result .= '</div>';

		return $result;
	}

	public function batchDelete($id) {
		if ($this->db->delete('batch', ['id', '=', $id])) {
			Session::flash('home', 'Batch deleted successfully!');
			Redirect::to('dashboard.php?batch=view');
		} else {
			Session::flash('error', 'Something went Wrong!');
			Redirect::to('dashboard.php?batch=view');
		}
	}

	public function get($table) {
		$data = $this->db->query("SELECT * FROM $table");
		if ($data) {
			return $data->results();
		}

		return false;
	}


	public function showErrors($errors = []) {
		$result = '';
		$result .= '<div class="errors">
		<ul>';
		foreach ($errors as $error) {
			$result .= '<li>'. $error .'</li>';
		}
		$result .= '</ul></div>';

		return $result;
	}

}