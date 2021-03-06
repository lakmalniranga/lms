<?php require_once 'admin/header.php'; ?>
<div class="row">
	<div class="column column-3">
		<?php require_once 'admin/sidebar.php' ?>
	</div>
	<div class="column column-9 main">
		<?php
			// Student
			if ((isset($_GET['student'])) && ($_GET['student']=='view')) {
				require_once 'admin/student.php';
			}
			elseif ((isset($_GET['student'])) && ($_GET['student']=='add')) {
				require_once 'admin/student_add.php';
			}
			elseif ((isset($_GET['student'])) && ($_GET['student']=='edit')) {
				require_once 'admin/student_edit.php';
			}
			// Teacher
			elseif ((isset($_GET['teacher'])) && ($_GET['teacher']=='view')) {
				require_once 'admin/teacher.php';
			}
			elseif ((isset($_GET['teacher'])) && ($_GET['teacher']=='add')) {
				require_once 'admin/teacher_add.php';
			}
			elseif ((isset($_GET['teacher'])) && ($_GET['teacher']=='edit')) {
				require_once 'admin/teacher_edit.php';
			}
			// Admin
			elseif ((isset($_GET['admin'])) && ($_GET['admin']=='view')) {
				require_once 'admin/admin.php';
			}
			elseif ((isset($_GET['admin'])) && ($_GET['admin']=='add')) {
				require_once 'admin/admin_add.php';
			}
			elseif ((isset($_GET['admin'])) && ($_GET['admin']=='edit')) {
				require_once 'admin/admin_edit.php';
			}
			// Faculty
			elseif ((isset($_GET['faculty'])) && ($_GET['faculty']=='view')) {
				require_once 'admin/faculty.php';
			} else if ((isset($_GET['faculty'])) && ($_GET['faculty']=='add')) {
				require_once 'admin/faculty.php';
			} else if (((isset($_GET['faculty'])) && isset($_GET['id']) && ($_GET['faculty']=='delete'))) {
				require_once 'admin/faculty.php';
			} else if (((isset($_GET['faculty'])) && isset($_GET['id']) && ($_GET['faculty']=='edit'))) {
				require_once 'admin/faculty.php';
			} elseif ((isset($_GET['course'])) && ($_GET['course']=='view')) {
				require_once 'admin/course.php';
			} else if ((isset($_GET['course'])) && ($_GET['course']=='add')) {
				require_once 'admin/course.php';
			} else if (((isset($_GET['course'])) && isset($_GET['id']) && ($_GET['course']=='delete'))) {
				require_once 'admin/course.php';
			} else if (((isset($_GET['course'])) && isset($_GET['id']) && ($_GET['course']=='edit'))) {
				require_once 'admin/course.php';
			} elseif ((isset($_GET['batch'])) && ($_GET['batch']=='view')) {
				require_once 'admin/batch.php';
			} else if ((isset($_GET['batch'])) && ($_GET['batch']=='add')) {
				require_once 'admin/batch.php';
			} else if (((isset($_GET['batch'])) && isset($_GET['id']) && ($_GET['batch']=='delete'))) {
				require_once 'admin/batch.php';
			} else if (((isset($_GET['batch'])) && isset($_GET['id']) && ($_GET['batch']=='edit'))) {
				require_once 'admin/batch.php';
			} elseif ((isset($_GET['module'])) && ($_GET['module']=='view')) {
				require_once 'admin/module.php';
			} else if ((isset($_GET['module'])) && ($_GET['module']=='add')) {
				require_once 'admin/module.php';
			} else if (((isset($_GET['module'])) && isset($_GET['id']) && ($_GET['module']=='delete'))) {
				require_once 'admin/module.php';
			} else if (((isset($_GET['module'])) && isset($_GET['id']) && ($_GET['module']=='edit'))) {
				require_once 'admin/module.php';
			} elseif ((isset($_GET['sub_module'])) && ($_GET['sub_module']=='view')) {
				require_once 'admin/sub_module.php';
			} else if ((isset($_GET['sub_module'])) && ($_GET['sub_module']=='add')) {
				require_once 'admin/sub_module.php';
			} else if (((isset($_GET['sub_module'])) && isset($_GET['id']) && ($_GET['sub_module']=='delete'))) {
				require_once 'admin/sub_module.php';
			} else if (((isset($_GET['sub_module'])) && isset($_GET['id']) && ($_GET['sub_module']=='edit'))) {
				require_once 'admin/sub_module.php';
			} 
			elseif ((isset($_GET['notice'])) && ($_GET['notice']=='view')) {
				require_once 'admin/notice.php';
			}
			elseif ((isset($_GET['backup'])) && ($_GET['backup']=='view')) {
				require_once 'admin/backup.php';
			}
			elseif ((isset($_GET['template'])) && ($_GET['template']=='view')) {
				require_once 'admin/template.php';
			} else if ((isset($_GET['notice'])) && ($_GET['notice']=='add')) {
				require_once 'admin/notice.php';
			} else if ((isset($_GET['notice'])) && isset($_GET['id']) && ($_GET['notice']=='delete')) {
				require_once 'admin/notice.php';
			} else if ((isset($_GET['notice'])) && isset($_GET['id']) && ($_GET['notice']=='edit')) {
				require_once 'admin/notice.php';
			} else{
				require_once 'admin/dashboard.php';
			}
		?>
	</div>
</div>
<?php require_once 'admin/footer.php' ?>