<?php  

if (isset($_GET['sub_module']) && $_GET['sub_module'] == 'view') {
	echo $controller->subModuleView();
} else if (isset($_GET['sub_module']) && $_GET['sub_module'] == 'add') {
	echo $controller->subModuleAddForm();
} else if (isset($_GET['sub_module']) && $_GET['sub_module'] == 'delete' && isset($_GET['id']) && $_GET['id'] != '') {
	$id = (int) escape($_GET['id']);
	$controller->subModuleDelete($id);
} else if (isset($_GET['sub_module']) && $_GET['sub_module'] == 'edit' && isset($_GET['id']) && $_GET['id'] != '') {
	$id = (int) escape($_GET['id']);
	echo $controller->subModuleEditForm($id);
}

?>