<?php
require_once 'core/init.php';

if (!isset($_GET['id'])) {
	Redirect::to('index.php');
}

$id = (int) Input::get('id');

$data = $db->get('sub_module', ['id', '=', $id])->first();
$file = 'upload/' . $data->file;

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=' . $data->file);
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
header('Content-Length: ' . filesize($file));

echo file_get_contents($file);

?>