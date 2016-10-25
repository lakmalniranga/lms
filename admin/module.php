<?php  

if (isset($_GET['module']) && $_GET['module'] == 'view') {
	echo $controller->moduleView();
} else if (isset($_GET['module']) && $_GET['module'] == 'add') {
	echo $controller->moduleAddForm();
} else if (isset($_GET['module']) && $_GET['module'] == 'delete' && isset($_GET['id']) && $_GET['id'] != '') {
	$id = (int) escape($_GET['id']);
	$controller->moduleDelete($id);
} else if (isset($_GET['module']) && $_GET['module'] == 'edit' && isset($_GET['id']) && $_GET['id'] != '') {
	$id = (int) escape($_GET['id']);
	echo $controller->moduleEditForm($id);
}

?>