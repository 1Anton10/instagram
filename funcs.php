<?php
session_start();
require_once "connect.php";
	function debug($data){
		echo '<pre>' . print_r($data, 1).'</pre>';
	}
	function registration() :bool{
		global $pdo;
		$login = !empty(htmlspecialchars($_POST['imya'])) ? htmlspecialchars(trim($_POST['imya'])): '';
		$pass = !empty(htmlspecialchars($_POST['pswd'])) ? htmlspecialchars(trim($_POST['pswd'])): '';
		if(empty($login) || empty($pass)){
			$_SESSION['errors'] = 'Поля логин/пароль обязательны';
			return false;
		}
		$res = $pdo->prepare("SELECT COUNT(*) FROM users WHERE login = ?");
		$res->execute([$login]);
		if ($res->fetchColumn()){
			$_SESSION['errors'] = 'Данное имя уже используется';
			return false;
		}
		$pass= password_hash($pass,PASSWORD_DEFAULT);
		$res = $pdo->prepare("INSERT INTO users (login, pass) VALUES (?, ?)");
		if ($res->execute([$login, $pass])){
			$_SESSION['success'] = 'Успешная регистрация';
			return true;
		}else{
			$_SESSION['errors'] = 'Ошибка регистрации';
			return false;
		}
	}
	function login() :bool{
		global $pdo;
		$login = !empty(htmlspecialchars($_POST['imya'])) ? htmlspecialchars(trim($_POST['imya'])): '';
		$pass = htmlspecialchars(!empty($_POST['pswd'])) ? htmlspecialchars(trim($_POST['pswd'])): '';
		if(empty($login) || empty($pass)){
			$_SESSION['errors'] = 'Поля логин/пароль обязательны';
			return false;
		}
		$res = $pdo->prepare("SELECT * FROM users WHERE login = ?");
		$res->execute([$login]);
		if (!$user = $res->fetch()){
			$_SESSION['errors'] = 'Логин/Пароль введены не верно';
			return false;
		}
		if(!password_verify($pass, $user['pass'])){
			$_SESSION['errors'] = 'Логин/Пароль введены не верно';
			return false;
		}else{
			$_SESSION['success']='Вы успешно авторизировались';
			$_SESSION['user']['name'] = $user['login'];
			$_SESSION['user']['id'] = $user['id'];
			header("location: main.php");
			return true;
		}
	}
	function login_a() :bool{
		global $pdo;
		$login = !empty(htmlspecialchars($_POST['imya'])) ? htmlspecialchars(trim($_POST['imya'])): '';
		$pass = !empty(htmlspecialchars($_POST['pswd'])) ? htmlspecialchars(trim($_POST['pswd'])): '';
		if(empty($login) || empty($pass)){
			$_SESSION['errors'] = 'Поля логин/пароль обязательны';
			return false;
		}
		$res = $pdo->prepare("SELECT * FROM `admin` WHERE `login_a` = ?");
		$res->execute([$login]);
		if (!$user = $res->fetch()){
			$_SESSION['errors'] = 'Логин/Пароль введены не верно';
			return false;
		}

		if(!password_verify($pass, $user['pass_a'])){
			$_SESSION['errors'] = 'Логин/Пароль введены не верно';
			return false;
		}else{
			$_SESSION['success']='Вы успешно авторизировались';
			$_SESSION['user']['name'] = $user['login_a'];
			$_SESSION['user']['id'] = $user['id_a'];
			return true;
		}
	}
	function registration_a() :bool{
		global $pdo;
		$login = !empty(htmlspecialchars($_POST['imya'])) ? htmlspecialchars(trim($_POST['imya'])): '';
		$pass = !empty(htmlspecialchars($_POST['pswd'])) ? htmlspecialchars(trim($_POST['pswd'])): '';
		if(empty($login) || empty($pass)){
			$_SESSION['errors'] = 'Поля логин/пароль обязательны';
			return false;
		}
		$res = $pdo->prepare("SELECT COUNT(*) FROM admin WHERE login_a = ?");
		$res->execute([$login]);
		if ($res->fetchColumn()){
			$_SESSION['errors'] = 'Данное имя уже используется';
			return false;
		}
		$pass= password_hash($pass,PASSWORD_DEFAULT);
		$res = $pdo->prepare("INSERT INTO admin (login_a, pass_a) VALUES (?, ?)");
		if ($res->execute([$login, $pass])){
			$_SESSION['success'] = 'Успешная регистрация';
			return true;
		}else{
			$_SESSION['errors'] = 'Ошибка регистрации';
			return false;
		}
	}
	function get_messages(): array{
		global $pdo;
		$res = $pdo->query("SELECT * FROM messages");
		return $res->fetchALL();
	}
		function add_message(): bool{
			global $pdo;
			$text = htmlspecialchars($_POST['mess']);
			$cod = $_SESSION['user']['id'];
			$res = $pdo->prepare("INSERT INTO messages (`message`, us_id, id_diag) VALUES (?,?,?)");
			$res->execute([$text, $cod, 1]);
			return true;
			}
		function sql() :array{
			global $pdo;
			$code = $_SESSION['user']['id'];
			$sql2 = "SELECT * FROM dialogs inner join users on id_d = id where u1_id = $code OR u2_id = $code";    //u2 id         
			$films = $pdo->query($sql2);
			return $films -> fetchALL();
		}
		function post() :array{
			global $pdo;
			$sql2 = "SELECT * FROM post INNER JOIN users on u_id = id ORDER BY id_p DESC";
			$films = $pdo->query($sql2);
			return $films -> fetchALL();
		}
		function user() :array{
			global $pdo;
			$code = $_SESSION['user']['id'];
			$sql2 = "SELECT * FROM users WHERE id = $code";
			$films = $pdo->query($sql2);
			return $films -> fetchALL();
		}
		function mes() :array{
			global $pdo;
			$code_d= $_GET['id_diag'];
			$sql2 = "SELECT messages.id, message, created_at, us_id, id_diag, users.login, users.photo FROM `messages` INNER JOIN users on messages.us_id = users.id where id_diag = $code_d";        
			$films = $pdo->query($sql2);
			return $films -> fetchALL();
		}
		function photo() :array{
			global $pdo;
			$code = $_SESSION['user']['id'];
			$sql2 = "SELECT * FROM users where id = $code";            
			$films = $pdo->query($sql2);
			return $films -> fetchALL();
		}
		function profile($id) :array{
			global $pdo;
			$sql2 = "SELECT * FROM users INNER JOIN post on id = u_id where id = $id";           
			$films = $pdo->query($sql2);
			return $films -> fetchALL();
		}
		function profile_count($id) :array{
			global $pdo;
			$sql2 = "SELECT count(id_p) as c_id_p, subscribers as c_sub, subs as c_subs FROM users INNER JOIN post on id = u_id where id = $id";           
			$films = $pdo->query($sql2);
			return $films -> fetchALL();
		}
		function lastMessage($dialogId) :array{
			global $pdo;
			$sql2 = "SELECT * FROM `messages` WHERE id_diag  = $dialogId ORDER BY id DESC LIMIT 1";             
			$films = $pdo->query($sql2);
			if($messages = $films -> fetch()){
				return ($messages);
			} else return (["message" =>""]);
		}
		function add_post(): bool{
			global $pdo;
			$image = $_POST['img'];
			$title = $_POST['tit'];
			$сod = $_SESSION['user']['id'];
			$res = $pdo->prepare("INSERT INTO post (u_id, p_image, p_title) VALUES (?,?,?)");
			$res->execute([$сod,$image,$title]);
			return true;
			}
?>