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

		$result .= '<div class="student">
			<h3 class="group-title blue-b">Faculty</h3>';

		if ($this->db->count()) {
			$result .= '
				<div class="column column-12 main margin dashboard-list">
					<ul>';

			foreach ($data as $d) {
				$result .= '<li><p class="list-text">'. $d->name .'<p class="action"><a class="btn btn-sm btn-green" href="dashboard.php?faculty=edit&id='. $d->id .'">Edit</a> <a class="btn btn-sm btn-red" href="dashboard.php?faculty=delete&id='. $d->id .'">Delete</a></p></li>';
			}
			
			$result .= '				
					</ul>
				</div>
				</div>
				<div class="dash-option">
					<a href="dashboard.php?faculty=add" class="btn btn-md btn-blue">Add Faculty</a>
				</div>
			</div>';

		} else {
			$result = '<div class="student">
			<h3 class="group-title blue-b">Faculty</h3>
				<div class="column column-12 main margin dashboard-list">
					<ul>
					</ul>
				</div>
				<div class="dash-option">
					<a href="dashboard.php?faculty=add" class="btn btn-md btn-blue">Add Faculty</a>
				</div>
			</div>';
		}

		$result .= '</div>';

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

		$result .= '<div class="student">
			<h3 class="group-title blue-b">Faculty Add</h3>';

		$result .= $errors;

		$result .=	'<form method="post">
				<p><input type="text" name="name" placeholder="Enter Faculty Name" class="text-input"></p>
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

		$result .= '<div class="student">
			<h3 class="group-title blue-b">Faculty Edit</h3>';

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


		$result .= '<div class="student">
			<h3 class="group-title blue-b">Course</h3>';

		if ($this->db->count()) {
			$result .= '
				<div class="column column-12 main margin dashboard-list">
					<ul>';

			foreach ($data as $d) {
				$result .= '<li><p class="list-text">'. $d->name .'<p class="action"><a class="btn btn-sm btn-green" href="dashboard.php?course=edit&id='. $d->id .'">Edit</a> <a class="btn btn-sm btn-red" href="dashboard.php?course=delete&id='. $d->id .'">Delete</a></p></li>';
			}
			
			$result .= '				
					</ul>
				</div>

				</div>
				<div class="dash-option">
					<a href="dashboard.php?course=add" class="btn btn-md btn-blue">Add Course</a>
				</div>
			</div>';
		} else {
			$result = '<div class="student">
			<h3 class="group-title blue-b">Course</h3>
				<div class="column column-12 main margin dashboard-list">
					<ul>
					</ul>
				</div>
				<div class="dash-option">
					<a href="dashboard.php?course=add" class="btn btn-md btn-blue">Add Course</a>
				</div>
			</div>';
		}

		$result .= '</div>';

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

		$result = '<div class="student">
			<h3 class="group-title blue-b">Course Add</h3>';

		$result .= $errors;

		$result .=	'<form method="post">
				<p><input type="text" name="name" placeholder="Enter Course Name" class="text-input"></p>
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

		$result .= '<div class="student">
			<h3 class="group-title blue-b">Course Edit</h3>';

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

		$result .= '<div class="student">
		<h3 class="group-title blue-b">Batch</h3>';

		if ($this->db->count()) {
			$result .= '<div class="column column-12 main margin dashboard-list">
					<ul>';

			foreach ($data as $d) {
				$c = $this->db->get('course', ['id', '=', $d->course_id])->first()->name;
				$result .= '<li><p class="list-text">'. $d->name .' - '. $c .'<p class="action"><a class="btn btn-sm btn-green" href="dashboard.php?batch=edit&id='. $d->id .'">Edit</a> <a class="btn btn-sm btn-red" href="dashboard.php?batch=delete&id='. $d->id .'">Delete</a></p></li>';
			}
			
			$result .= '				
					</ul>
				</div>
				<div class="dash-option">
					<a href="dashboard.php?batch=add" class="btn btn-md btn-blue">Add Batch</a>
				</div>';
		}else {
			$result = '<div class="student">
			<h3 class="group-title blue-b">Faculty</h3>
				<div class="column column-12 main margin dashboard-list">
					<ul>
					</ul>
				</div>
				<div class="dash-option">
					<a href="dashboard.php?batch=add" class="btn btn-md btn-blue">Add Batch</a>
				</div>
			</div>';
		}

		$result .= '</div>';

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

		$result .= '<div class="student">
		<h3 class="group-title blue-b">Batch ADd</h3>';

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

		$result .= '<div class="student">
		<h3 class="group-title blue-b">Batch Edit</h3>';

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

	public function moduleView() {
		$result = '<div class="student">
			<h3 class="group-title blue-b">Module</h3>';
		$data = $this->db->query("SELECT * FROM module")->results();

		if ($this->db->count()) {
			$result .= 
				'<div class="column column-12 main margin dashboard-list">
					<ul>';

			foreach ($data as $d) {
				$c = $this->db->get('course', ['id', '=', $d->course_id])->first()->name;
				$b = $this->db->get('batch', ['id', '=', $d->batch_id])->first()->name;
				$result .= '<li><p class="list-text"><b>'. $d->name .'</b> - '. $c .' - '. $b .'<p class="action"><a class="btn btn-sm btn-green" href="dashboard.php?module=edit&id='. $d->id .'">Edit</a> <a class="btn btn-sm btn-red" href="dashboard.php?module=delete&id='. $d->id .'">Delete</a></p></li>';
			}
			
			$result .= '
			<div class="dash-option">
					<a href="dashboard.php?module=add" class="btn btn-md btn-blue">Add Module</a>
				</div>				
					</ul>
				</div>';
		}else {
			$result = '<div class="student">
			<h3 class="group-title blue-b">Faculty</h3>
				<div class="column column-12 main margin dashboard-list">
					<ul>
					</ul>
				</div>
				<div class="dash-option">
					<a href="dashboard.php?module=add" class="btn btn-md btn-blue">Add Module</a>
				</div>
			</div>';
		}

		$result .= '</div>';


		return $result;
	}

	public function moduleAddForm() {
		$errors = '';
		if (Input::exists()) {
			if (Token::check(Input::get('token'))) {
				$validation = $this->validate->check($_POST, [
					'name'	=> [
						'required'	=> true
					],
					'course'	=> [
						'required'	=> true
					],
					'batch'	=> [
						'required'	=> true
					]
				]);

				if (!$validation->passed()) {
					$errors = $this->showErrors($validation->errors());
				} else {
					$name = escape(Input::get('name'));
					$course = (int) Input::get('course');
					$batch = (int) Input::get('batch');

					if ($this->db->insert('module', ['name'	=> $name, 'course_id'	=> $course, 'batch_id'	=> $batch])) {
						Session::flash('home', 'Module added successfully!');
						Redirect::to('dashboard.php?module=view');
					} else {
						Session::flash('error', 'Something went wrong!');
						Redirect::to('dashboard.php?module=view');
					}
				}

			}
		}

		$result = '';

		$result .= '<div class="student">
			<h3 class="group-title blue-b">Module Add</h3>';

		$result .= $errors;

		$result .=	'<form method="post">
				<p><input type="text" name="name" class="text-input" placeholder="Module Name"></p>
				<p>
					Course : <select name="course">';

				foreach ($this->get('course') as $course) {
					$result .= '<option value="'. $course->id .'">'. $course->name .'</option>';
				}
					
		$result .= 	'</select>
					</p>
					<p>
						Batch : <select name="batch">';

				foreach ($this->get('batch') as $batch) {
					$c = $this->db->get('course', ['id', '=', $batch->course_id])->first()->name;
					$result .= '<option value="'. $batch->id .'">'. $batch->name .' - '. $c .'</option>';
				}

		$result .=	'</select>
					</p>
				<input type="hidden" name="token" value='. Token::generate() .'>
				<p><button class="btn btn-blue btn-lg">Add Module</button></p>
			</form>
		';

		$result .= '</div>';

		return $result;
	}

	public function moduleEditForm($id) {
		$data = $this->db->get('module', ['id', '=', $id])->first();
		$errors = '';
		if (Input::exists()) {
			if (Token::check(Input::get('token'))) {
				$validation = $this->validate->check($_POST, [
					'name'	=> [
						'required'	=> true
					],
					'course'	=> [
						'required'	=> true
					],
					'batch'	=> [
						'required'	=> true
					]
				]);

				if (!$validation->passed()) {
					$errors = $this->showErrors($validation->errors());
				} else {
					$name = escape(Input::get('name'));
					$course = (int) Input::get('course');
					$batch = (int) Input::get('batch');

					if ($this->db->update('module', $id, ['name'	=> $name, 'course_id'	=> $course, 'batch_id'	=> $batch])) {
						Session::flash('home', 'Module updated successfully!');
						Redirect::to('dashboard.php?module=view');
					} else {
						Session::flash('error', 'Something went wrong!');
						Redirect::to('dashboard.php?module=view');
					}
				}

			}
		}

		$result = '';

		$result .= '<div class="student">
			<h3 class="group-title blue-b">Module Edit</h3>';

		$result .= $errors;

		$result .=	'<form method="post">
				<p><input type="text" name="name" class="text-input" placeholder="Module Name" value="'. $data->name .'"></p>
				<p>
					Course : <select name="course">';

				foreach ($this->get('course') as $course) {
					$result .= '<option value="'. $course->id .'">'. $course->name .'</option>';
				}
					
		$result .= 	'</select>
					</p>
					<p>
						Batch : <select name="batch">';

				foreach ($this->get('batch') as $batch) {
					$c = $this->db->get('course', ['id', '=', $batch->course_id])->first()->name;
					$result .= '<option value="'. $batch->id .'">'. $batch->name .' - '. $c .'</option>';
				}

		$result .=	'</select>
					</p>
				<input type="hidden" name="token" value='. Token::generate() .'>
				<p><button class="btn btn-blue btn-lg">Update Module</button></p>
			</form>
		';

		$result .= '</div>';

		return $result;
	}

	public function moduleDelete($id) {
		if ($this->db->delete('module', ['id', '=', $id])) {
			Session::flash('home', 'Module deleted successfully!');
			Redirect::to('dashboard.php?module=view');
		} else {
			Session::flash('error', 'Something went Wrong!');
			Redirect::to('dashboard.php?module=view');
		}
	}

	public function subModuleView() {
		$result = '';
		$data = $this->db->query("SELECT * FROM sub_module")->results();

		$result .= '<div class="student">
			<h3 class="group-title blue-b">Sub-Module</h3>';

		if ($this->db->count()) {
			$result .= 
				'<div class="column column-12 main margin dashboard-list">
					<ul>';

			foreach ($data as $d) {
				$m = $this->db->get('module', ['id', '=', $d->module_id])->first()->name;
				$result .= '<li><p class="list-text"><b>'. $d->name .'</b> - '. $m .'<p class="action"><a class="btn btn-sm btn-green" href="dashboard.php?sub_module=edit&id='. $d->id .'">Edit</a> <a class="btn btn-sm btn-red" href="dashboard.php?sub_module=delete&id='. $d->id .'">Delete</a></p></li>';
			}
			
			$result .= '</ul>
				</div>
				</div>
				<div class="dash-option">
					<a href="dashboard.php?sub_module=add" class="btn btn-md btn-blue">Add Sub-Module</a>
				</div>
			</div>';
		}else {
			$result = '<div class="student">
			<h3 class="group-title blue-b">Faculty</h3>
				<div class="column column-12 main margin dashboard-list">
					<ul>
					</ul>
				</div>
				<div class="dash-option">
					<a href="dashboard.php?sub_module=add" class="btn btn-md btn-blue">Add Sub-Module</a>
				</div>
			</div>';
		}

		$result .= '</div>';


		return $result;
	}

	public function subModuleAddForm() {
		$errors = '';
		if (Input::exists()) {
			if (Token::check(Input::get('token'))) {
				$validation = $this->validate->check($_POST, [
					'name'	=> [
						'required'	=> true
					],
					'public'	=> [
						'required'	=> true
					],
					'publish'	=> [
						'required'	=> true
					],
					'description'	=> [
						'required'	=> true
					],
					'module'	=> [
						'required'	=> true
					]
				]);

				if (!$validation->passed()) {
					$errors = $this->showErrors($validation->errors());
				} else {
					$extensions = ['jpg', 'jpeg', 'doc', 'docx', 'pdf', 'png', 'xlsx', 'pptx', 'xlsm', 'ppt'];
					$mimeTypes = ['image/jpeg', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/pdf', 'image/png', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.ms-excel.sheet.macroEnabled.12', 'application/vnd.ms-powerpointtd>', 'application/vnd.openxmlformats-officedocument.presentationml.presentation', 'application/octet-stream'];
					if((!empty($_FILES["file"])) && ($_FILES['file']['error'] == 0)) {
						$filename = basename($_FILES['file']['name']);
						$ext = substr($filename, strrpos($filename, '.') + 1);
						if (in_array($ext, $extensions) && in_array($_FILES["file"]["type"], $mimeTypes)) {
							$name = escape(Input::get('name'));
							$description = escape(Input::get('description'));
							$module = (int) Input::get('module');
							$public = (int) Input::get('public');
							$publish = (int) Input::get('publish');

							$str = uniqid();
							$filename = $str . '_' . $filename;
							$newname =  dirname(dirname(__FILE__)).'/upload/'.$filename;

							if ((move_uploaded_file($_FILES['file']['tmp_name'],$newname))) {

								if ($this->db->insert('sub_module', ['name'	=> $name, 'description'	=> $description, 'module_id'	=> $module, 'public'	=> $public, 'publish'	=> $publish, 'file' => $filename])) {
									Session::flash('home', 'Module added successfully!');
									Redirect::to('dashboard.php?sub_module=view');
								} else {
									Session::flash('error', 'Something went wrong!');
									Redirect::to('dashboard.php?sub_module=view');
								}
							}
						} else {
							$validate->addError('Upload file error');
							$errors = $this->showErrors($validation->errors());
						}
					}
					
				}

			}
		}

		$result = '';

		$result .= '<div class="student">
			<h3 class="group-title blue-b">Sub-Module Add</h3>';

		$result .= $errors;

		$result .=	'<form method="post" enctype="multipart/form-data">
				<p><input type="text" name="name" class="text-input" placeholder="Module Name"></p>
				<p><textarea name="description" class="text-input textarea" placeholder="Description"></textarea></p>
				';
					
		$result .= 	'
					<p>
						Module : <select name="module">';

				foreach ($this->get('module') as $module) {
					$b = $this->db->get('batch', ['id', '=', $module->batch_id])->first()->name;
					$c = $this->db->get('course', ['id', '=', $module->course_id])->first()->name;
					$result .= '<option value="'. $module->id .'">'. $module->name .' - '. $b .' - '. $c .'</option>';
				}

		$result .=	'</select>
					</p>
				<p>
					Publish : <select name="publish">
						<option value="1">Yes</option>
						<option value="1">No</option>
					</select>
				</p>
				<p>
					Public : <select name="public">
						<option value="1">Yes</option>
						<option value="1">No</option>
					</select>
				</p>
				<p>Document : <input type="file" name="file"></p>
				<input type="hidden" name="token" value='. Token::generate() .'>
				<p><button class="btn btn-blue btn-lg">Add Module Data</button></p>
			</form>
		';

		$result .= '</div>';

		return $result;
	}

	public function subModuleEditForm($id) {
		$data = $this->db->get('sub_module', ['id', '=', $id])->first();
		$errors = '';
		if (Input::exists()) {
			if (Token::check(Input::get('token'))) {
				$validation = $this->validate->check($_POST, [
					'name'	=> [
						'required'	=> true
					],
					'public'	=> [
						'required'	=> true
					],
					'publish'	=> [
						'required'	=> true
					],
					'description'	=> [
						'required'	=> true
					],
					'module'	=> [
						'required'	=> true
					]
				]);

				if (!$validation->passed()) {
					$errors = $this->showErrors($validation->errors());
				} else {
					if((!empty($_FILES["file"])) && ($_FILES['file']['error'] == 0)) {
						$filename = basename($_FILES['file']['name']);
						$ext = substr($filename, strrpos($filename, '.') + 1);
						if (($ext == "jpg") && ($_FILES["file"]["type"] == "image/jpeg")) {
							$name = escape(Input::get('name'));
							$description = escape(Input::get('description'));
							$module = (int) Input::get('module');
							$public = (int) Input::get('public');
							$publish = (int) Input::get('publish');

							$str = uniqid();
							$filename = $str . '_' . $filename;
							$newname =  dirname(dirname(__FILE__)).'/upload/'.$filename;

							if ((move_uploaded_file($_FILES['file']['tmp_name'],$newname))) {

								if ($this->db->update('sub_module', $id, ['name'	=> $name, 'description'	=> $description, 'module_id'	=> $module, 'public'	=> $public, 'publish'	=> $publish, 'file' => $filename])) {
									Session::flash('home', 'Module added successfully!');
									Redirect::to('dashboard.php?sub_module=view');
								} else {
									Session::flash('error', 'Something went wrong!');
									Redirect::to('dashboard.php?sub_module=view');
								}
							}
						} else {
							$this->validate->addError('Upload file error');
							$errors = $this->showErrors($validation->errors());
						}
					} else {
						$name = escape(Input::get('name'));
						$description = escape(Input::get('description'));
						$module = (int) Input::get('module');
						$public = (int) Input::get('public');
						$publish = (int) Input::get('publish');

						if ($this->db->update('sub_module', $id, ['name'	=> $name, 'description'	=> $description, 'module_id'	=> $module, 'public'	=> $public, 'publish'	=> $publish])) {
							Session::flash('home', 'Module added successfully!');
							Redirect::to('dashboard.php?sub_module=view');
						} else {
							Session::flash('error', 'Something went wrong!');
							Redirect::to('dashboard.php?sub_module=view');
						}
					}
					
				}

			}
		}

		$result = '';

		$result .= '<div class="student">
			<h3 class="group-title blue-b">Sub-Module Edit</h3>';

		$result .= $errors;

		$result .=	'<form method="post" enctype="multipart/form-data">
				<p><input type="text" name="name" class="text-input" placeholder="Module Name" value="'. $data->name .'"></p>
				<p><textarea name="description" class="text-input textarea" placeholder="Description">'. $data->description .'</textarea></p>
				';
					
		$result .= 	'
					<p>
						Module : <select name="module">';

				foreach ($this->get('module') as $module) {
					$b = $this->db->get('batch', ['id', '=', $module->batch_id])->first()->name;
					$c = $this->db->get('course', ['id', '=', $module->course_id])->first()->name;
					$result .= '<option value="'. $module->id .'">'. $module->name .' - '. $b .' - '. $c .'</option>';
				}

		$result .=	'</select>
					</p>
				<p>
					Publish : <select name="publish">
						<option value="1">Yes</option>
						<option value="1">No</option>
					</select>
				</p>
				<p>
					Public : <select name="public">
						<option value="1">Yes</option>
						<option value="1">No</option>
					</select>
				</p>
				<p>Document : <input type="file" name="file"></p>
				<input type="hidden" name="token" value='. Token::generate() .'>
				<p><button class="btn btn-blue btn-lg">Update Module Data</button></p>
			</form>
		';

		$result .= '</div>';

		return $result;
	}

	public function subModuleDelete($id) {
		if ($this->db->delete('sub_module', ['id', '=', $id])) {
			Session::flash('home', 'Sub Module deleted successfully!');
			Redirect::to('dashboard.php?sub_module=view');
		} else {
			Session::flash('error', 'Something went Wrong!');
			Redirect::to('dashboard.php?sub_module=view');
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