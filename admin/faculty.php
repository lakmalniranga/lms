<?php  

if (isset($_GET['faculty']) && $_GET['faculty'] == 'view') {
	echo $controller->facultyView();
} else if (isset($_GET['faculty']) && $_GET['faculty'] == 'add') {
	echo $controller->facultyAddForm();
} else if (isset($_GET['faculty']) && $_GET['faculty'] == 'delete' && isset($_GET['id']) && $_GET['id'] != '') {
	$id = (int) escape($_GET['id']);
	$controller->facultyDelete($id);
} else if (isset($_GET['faculty']) && $_GET['faculty'] == 'edit' && isset($_GET['id']) && $_GET['id'] != '') {
	$id = (int) escape($_GET['id']);
	echo $controller->facultyEditForm($id);
}

?>