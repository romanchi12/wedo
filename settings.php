<?php
session_start();
if(!isset($_SESSION['username'])){
	header("Location: auth");
}
include("php/config.php");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Налаштування | Ties</title>
	<script type="text/javascript" src="../js/jquery.js"></script>

	<link  href="../css/profile.css" rel="stylesheet" type="text/css"/>
	<link  href="../css/style.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript" src="js/jquery.maskedinput.js"></script>
	<meta charset="utf-8">

	<script>
	$(document).ready(function(){
		var w=$(window).width();
		var h=$(window).height();
		var info_of_person_trigger=0;
		$(window).resize(function(){
			$("body").css({"width":w,"height":h});
		});
		$("#page").css("color","black");
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
		$(".clasic-button").mousedown(function(event) {
			$(this).addClass('clasic-button-ms-down');
		});
		$(".clasic-button").mouseup(function(event) {
		    $(this).removeClass('clasic-button-ms-down');
		});
		 $("#phone").mask("(999) 99-99-999");


		 $("#submit-contacts").click(function(){
		 	
		 	
		 });
		 $("#submit-contacts").click(function(){
		 	var phones=$("#phone").val().replace('(','').replace(')','').replace(' ','').replace('-','').replace('-','');
		 	$.ajax({
		 		url: 'php/Auth.class.php',
		 		type: 'post',
		 		dataType: 'html',
		 		data: {action: 'save_contacts',phone: phones,email:$("#email").val()},
		 		success: function(data){
		 			
		 		}
		 	});
		 });
	});
	
</script>
	<script type="text/javascript" src="../js/profile.js"></script>
</head>

<body>
	<div id="logo">Ti<span class="flashing">e</span>s</div>
	<div id="header-menu">
		<?php if($_SESSION['id']): ?>
		<div id="menu">
			<div id="into-menu">
				<?php
				echo '<a href="'.$host.'">
				<div class="cell-menu">Профіль</div>
			</a>
			';
				?>
			<a href="users">
				<div class="cell-menu">Рейтинг</div>
			</a>
			<a href="people">
				<div class="cell-menu">Люди</div>
			</a>
			<a href="settings">
				<div class="cell-menu active-cell-menu">Налаштування</div>
			</a>
		</div>
	</div>
	<div id="logout">Вийти</div>
	<?php else:?>
	<div id="signin">Увійти</div>
	<?php endif;?></div>
<!-- WARNING: window into-window scroll-box додаткові вікна Сторінка розміщена повнісю в блоці page-->

<div id="window">
	<div id="into-window" data-baron-v="inited">
		<div id="scroll-box">
			<div id="page">
				<?php if($_SESSION['activate']==0):?>
				<div class="warning" id="non-activate">Ваш профіль не активований. Ви не зможете брати участь у голосуванні. Активуйте його за допомогою телефону.</div>
				<?php endif;?>
				<div class="clear"></div>
				<div style="height: 150px;">
					<div id="names">
						<center>
							<span class="text-header-settings" style="margin-left: 5px;">Особисті дані</span>
							<?php echo '<input class="clasic-field" id="first-name" value="'.$_SESSION['first_name'].'" name="first-name" placeholder="Ім\'я" style="margin-top: 5px;">
							<br/>
							<input class="clasic-field" id="first-name" name="first-name" value="'.$_SESSION['last_name'].'" placeholder="Прізвище" style="margin-top: 5px;">
							<br/>
							';?>
							<button class="clasic-button" id="submit-names" style="margin-top: 5px;">Зберегти</button>
						</center>
					</div>
					<div id="names" style="display: inline-block;">
						<center>
							<span class="text-header-settings" style="margin-left: 5px;">Контактні дані</span>
							<?php echo '<input type="text" id="phone" class="clasic-field" value="'.$_SESSION['phone'].'" name="phone" placeholder="Телефон" style="margin-top:5px;">
							<input type="text" id="email" class="clasic-field" value="'.$_SESSION['email'].'" name="email" placeholder="E-mail" style="margin-top:5px;">' ;?>
							<button class="clasic-button" id="submit-contacts" style="margin-top: 5px;">Зберегти</button>
						</center>
					</div>
				</div>

			</div>
			<div id="footer">Ties © 2014</div>
		</div>
	</div>
</div>

</body>
</html>