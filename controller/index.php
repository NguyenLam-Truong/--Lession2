<?php
define('ARR_COTROLLER',['home','maloai','product','action_product']);
$ctrl = "home";
if(isset($_GET['ctrl'])==true) {
    $ctrl = $_GET['ctrl'];
}
if(in_array($ctrl,ARR_COTROLLER)==false) {
    require_once ('../view/404_ERROR.php');
}
$pathfile = $ctrl.'_admin.php';
if(file_exists($pathfile)==true) {
    header("Location: $pathfile");
}
?>