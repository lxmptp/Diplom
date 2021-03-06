<!DOCTYPE HTML>
<?php
include "sessiontest.php";
?>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Configurator</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,800" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script src="ajax.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>


	<aside id="fh5co-aside" role="sidebar" class="text-center" style="background-image: url(images/img_bg_1_gradient.jpg);">
<body onload="menuInit();">
	<nav id="navbar">
		<ul id="main-menu">
			<li><a href="http://127.0.0.1/index.php" target="_self"><i class="fa fa-list-alt"></i>Главная</a></li>
			<li><a href="#" target="_self"><i class="fa fa-home"></i>Подключение</a></li>
			<li><a href="web_console.php"><i class="fa fa-coffee"></i>Веб консоль</a></li>
			<li><a href="" target="_self"><i class="fa fa-quote-left"></i>Настройки конфигуратора</a></li>
			<li><a target="_self" href="login.php"><i class="fa fa-user"></i>Выход</a></li></form>
		</ul><!-- main-menu -->
	</nav><!-- navbar -->
	</aside>

	<div id="fh5co-main-content">
		<div class="dt js-dt">
			<div class="dtc js-dtc">
 <h1>Настройки конфигуратора</h1>
 <?php 
 $filename = 'WebManagement\manage.py runserver' 
 ?>
 <hr>
 <h3>Смена логина</h3>
 <div class="form_container">
<form class='mysubform' method="POST"  name="<?php echo basename($_SERVER['PHP_SELF']); ?>">
<div input>
<input type="text" class="firstname"  placeholder="Текущий логин" name="login" id="login"/> 
<input type="text" class="firstname"  placeholder="Новый логин"  name="newLogin" id="newLogin"/> 
<input type="text" class="firstname"  placeholder="Введите пароль" name="password" id="password"/> 
<input type="submit" value="Изменить" name="btn_login">
</div>

	<div class="statusblock">
<?php
ini_set('display_errors','On');
error_reporting('E_ALL');

$link = mysqli_connect("localhost", "root", "", "reg");
if (isset($_POST['btn_login'])){
    if (!empty($_POST['login'])){
        if (!empty($_POST['password'])){
            if (strlen($_POST['password']) >= 8 && strlen($_POST['password']) <= 32){
                if (mysqli_query($link, "UPDATE user SET login = '".$_POST['newLogin']."' WHERE login = '".$_POST['login']."' and password = '".htmlspecialchars(md5(md5(md5($_POST['password']))))."'") == 1)
                {
                	$test = mysqli_query($link, "SELECT * FROM user");
                	while($user = mysqli_fetch_assoc($test)) {
                		if($user['login'] == $_POST['newLogin']) {
    						echo "Успешно!"; // Вроде ковычки забыли
                		}
                		else {
                			echo "Ошибка!";
                		}
}
                	#if ({$user['name']} == ; // Вроде ковычки забыли
}
                  $_SESSION['auth'] = "SESSIONTRUE";
                } else echo "Неверный логин или пароль!";
            } else echo "Пароль должен содержать 8-32 символов";
        } else echo "Вы не ввели пароль";
    }
?>
</form>
</div>
</div>
 <hr>
 <h3>Смена пароля</h3>
 <div class="statusblock">
 <div class="form_container">
<form class='mysubform' method="POST"  name="<?php echo basename($_SERVER['PHP_SELF']); ?>">
<div input>
<input type="text" class="firstname"  placeholder="Логин" name="login" id="login"/> 
<input type="text" class="firstname"  placeholder="Пароль"  name="password" id="newLogin"/> 
<input type="text" class="firstname"  placeholder="Новый пароль" name="newPassword" id="password"/> 
<input type="submit" value="Изменить" name="btn_pass" size="	50px">
</div>


<?php
ini_set('display_errors','On');
error_reporting('E_ALL');
	
$link = mysqli_connect("localhost", "root", "", "reg");
if (isset($_POST['btn_pass'])){
    if (!empty($_POST['login'])){
        if (!empty($_POST['password'])){
            if (strlen($_POST['password']) >= 8 && strlen($_POST['password']) <= 32){
            	$pass = htmlspecialchars(md5(md5(md5($_POST['password']))));
            	$newPass = htmlspecialchars(md5(md5(md5($_POST['newPassword']))));
                if (mysqli_query($link, "UPDATE user SET password = '".$newPass."' WHERE login = '".$_POST['login']."' and password = '".$pass."'") == 1)
                {
                	$test = mysqli_query($link, "SELECT * FROM user");
                	while($user = mysqli_fetch_assoc($test)) {
                		if($user['password'] == $newPass) {
    						echo "Успешно!";
                		}
                		else {
                			echo "Ошибка!";
                		}
}
}
                  $_SESSION['auth'] = "SESSIONTRUE";
                } else echo "Неверный логин или пароль!";
            } else echo "Пароль должен содержать 8-32 символов";
        } else echo "Вы не ввели пароль";
    }




?>
</form>
</div>
</div>



		
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Count Down -->
	<script src="js/simplyCountdown.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>

