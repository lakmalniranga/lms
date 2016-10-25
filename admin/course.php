<?php  

if (isset($_GET['course']) && $_GET['course'] == 'view') {
	echo $controller->courseView();
} else if (isset($_GET['course']) && $_GET['course'] == 'add') {
	echo $controller->courseAddForm();
} else if (isset($_GET['course']) && $_GET['course'] == 'delete' && isset($_GET['id']) && $_GET['id'] != '') {
	$id = (int) escape($_GET['id']);
	$controller->courseDelete($id);
} else if (isset($_GET['course']) && $_GET['course'] == 'edit' && isset($_GET['id']) && $_GET['id'] != '') {
	$id = (int) escape($_GET['id']);
	echo $controller->courseEditForm($id);
}

?>