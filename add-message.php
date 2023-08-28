<?
require_once('funcs.php');
// debug($_SERVER);
// die();
if(isset($_POST['send'])){
    add_message();
    $back = $_SERVER['HTTP_REFERER'];
    header("location: $back");
}
?>