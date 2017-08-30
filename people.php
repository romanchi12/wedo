<?php
session_start();

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title><?php echo $_SESSION['username']?> | Ties</title>
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/profile.js"></script>
<link  href="../css/profile.css" rel="stylesheet" type="text/css"/>
<link  href="../css/style.css" rel="stylesheet" type="text/css"/>
<meta charset="utf-8">
<link rel="stylesheet" href="css/people.css">
<script>
	var Profile={
		function: showRezults(self){
			self.addClass('active').removeClass('non-active');
		}
	};
	$(document).ready(function(){
		alert("s");
		var w=$(window).width();
		var h=$(window).height();
		var info_of_person_trigger=0;
		$(window).resize(function(){
			$("body").css({"width":w,"height":h});
		});
		$("#wrap-profile-info").click(function(){
			if(main_info_trigger==0){
				$("#main-info").css("height","200px");
				
				main_info_trigger=1;
			}else{
				$("#main-info").css("height","0px");
				
				main_info_trigger=0;
			}
		});
		$("#info-of-person").click(function(){
			if(info_of_person_trigger==0){
				
				
				$(this).width(584);
				info_of_person_trigger=1;
				
			
			}else{
				info_of_person_trigger=0;
				$(this).width(200);
			}
		});
		$("#signin").click(function(){
			window.location.href="/auth";
		});
		$("#logout").click(function(){
			$.ajax({
				url:'php/Auth.class.php',
				type: 'post',
				dataType: 'json',
				data: {action: 'logout'},
				beforeSend: function(){
					$("#logout").html("<img src='img/load.GIF' height='20' width='20'>");
				},
				success: function(data){
					
					window.location.href="../auth/";
				}
			});
		});
		$("#miting").click(function(event){
			window.location.href="http://vk.com";
			event.stopPropagation();
		});
		$(".overflow").click(function(){
			$(this).width(300);
		});
		$("#search-field").focus(function(event) {
			alert("d");
			$("#wrap-rezult").addClass('active').removeClass('non-active');
		});
	});
	
</script>
</head>

<body>
	<div id="logo">Ties</div>
	<div id="header-menu">
		<?php if($_SESSION['id']): ?>
		<div id="menu">
			<div id="into-menu">
				<div class="cell-menu active-cell-menu">Профіль</div>
				<a href="users"><div class="cell-menu">Рейтинг</div></a>
				<a href="people"><div class="cell-menu">Люди</div></a>
				<a href="settings"><div class="cell-menu">Налаштування</div></a>
			</div>
		</div>
		<div id="logout">Вийти</div>
		<?php else:?>
		<div id="signin">Увійти</div>
		<?php endif;?>
	</div>
	<!-- WARNING: window into-window scroll-box додаткові вікна Сторінка розміщена повнісю в блоці page-->
	
	<div id="window">
		<div id="into-window" data-baron-v="inited">
			<div id="scroll-box">
				<div id="page">
				<?php if($_SESSION['activate']==0):?>
				<div class="warning" id="non-activate">Ваш профіль не активований. Ви не зможете брати участь у голосуванні. Активуйте його за допомогою телефону.</div>
				<?php endif;?>
				<div class="wrap-search">
					<input type="text" id="search-field" placeholder="Пошук">
					<div id="wrap-rezults" class="non-active">
						<div class="rezult">Lorem ipsum dolor sit amet</div>
						<div class="rezult">porro necessitatibus consequatur eos modi</div>
						<div class="rezult">Lorem ipsum dolor sit amet</div>
						<div class="rezult">Lorem ipsum dolor sit amet</div>
						<div class="rezult">porro necessitatibus consequatur eos modi</div>
						<div class="rezult">Lorem ipsum dolor sit amet</div>
						<div class="rezult">porro necessitatibus consequatur eos modi</div>
						<div class="rezult">Lorem ipsum dolor sit amet</div>
						<div class="rezult">Lorem ipsum dolor sit amet</div>
						<div class="rezult">Lorem ipsum dolor sit amet</div>
					</div>
				</div>	
				</div>
				<div id="footer">
					Ties © 2014
				</div>
			</div>
			</div>
		</div>
	
</body>
</html>
