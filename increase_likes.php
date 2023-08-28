<?require_once 'connect.php';
$id = $_POST['id'];
global $pdo;
$pdo->query("UPDATE post SET likes = likes + 1 WHERE id_p = $id");

?>