<?php  

if (isset($_GET['batch']) && $_GET['batch'] == 'view') {
	echo $controller->batchView();
} else if (isset($_GET['batch']) && $_GET['batch'] == 'add') {
	echo $controller->batchAddForm();
} else if (isset($_GET['batch']) && $_GET['batch'] == 'delete' && isset($_GET['id']) && $_GET['id'] != '') {
	$id = (int) escape($_GET['id']);
	$controller->batchDelete($id);
} else if (isset($_GET['batch']) && $_GET['batch'] == 'edit' && isset($_GET['id']) && $_GET['id'] != '') {
	$id = (int) escape($_GET['id']);
	echo $controller->batchEditForm($id);
}

?>