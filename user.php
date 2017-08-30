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
<style type="text/css">
	#df1{
		background-image: url(img/back.jpg);
		background-position: center;
		border-top-left-radius: 5px;
	}
	#df2{
		background-image: url(img/AVA.jpg);
		background-position: center;
		border-top-right-radius: 5px;
	}
</style>
<meta charset="utf-8">

<script>
	

	$(document).ready(function(){
		
		var w=$(window).width();
		var h=$(window).height();
		$(window).resize(function(){
			$("body").css({"width":w,"height":h});
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
					$("#logout").html("<img src='img/load.GIF' height='20' width='20'  style='margin-top: 3px;'>");
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
		$("#about-darlings").click(function(event) {
			self=$(this);
			if(self.hasClass('about-darlings-hidden')){
            	self.removeClass('about-darlings-hidden');
			}else{
				self.addClass('about-darlings-hidden');
			}
		});
		$("#departmens ul li").hover(
			function(){
				if(!$(this).hasClass('active-departmen')){
					$(this).addClass('departmen-hovered');
				}	
			},
			function(){
				$(this).removeClass('departmen-hovered');
			}
		);
		$("#departmens ul li").click(function(){
			if($(this).hasClass('active-departmen')){
				$(this).removeClass('active-departmen');
				$(this).find('div').removeClass('show-info');
			}else{
				$(this).removeClass('departmen-hovered');
				$(this).addClass('active-departmen');
				$(this).find('div').addClass('show-info');
			}
		});
	
	});
	
</script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
	 var myLatlng = new google.maps.LatLng(-34.397, 150.644);
    var myOptions = {
        zoom: 8,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions); 
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
				<?php if($_SESSION['activate']==0&&$_SESSION['id']):?>
				<div class="warning" id="non-activate">Ваш профіль не активований. Ви не зможете брати участь у голосуванні. Активуйте його за допомогою телефону.</div>
				<?php endif;?>
				<div id="wrap-darlings-photos">
					<div id="darling-half1">
						<div class="darling-foto" id="df1"></div>
						<div class="darling" id="d1">
							<div id="darling-foto">
								<center><img src="img/back.jpg" height="120" width="120"></center>
							</div>
							<div class="darling-name">Едж Под</div>
						</div>
					</div>
					<div id="darling-half2"/>
						<div class="darling-foto" id="df2"></div>
						<div class="darling" id="d2">
							<div id="darling-foto">
								<center><img src="img/AVA.jpg" height="120" width="120"></center>
							</div>
							<div class="darling-name">Евеліна Саксаганьська</div>
						</div>
					</div>
					<div class="border-bottom"></div>
				</div>
				<div class="tech"></div>
				<div class="menu">
						<ul>
							<li class="menu-elem">Блог</li>
							<li class="menu-elem">Фотографії</li>
							<li class="menu-elem">Відео</li>
							<li class="menu-elem">Карта</li>
							<li class="menu-elem">Обговорення</li>
							<li class="like-darlings">Голосувати за цю пару</li>
						</ul>
				</div>
				<div id="map_canvas"></div>
				

				<?php if($_SESSION['username']==$_GET['username']):?>	
				<?php else:?>
					<?php#temp_user_page?>
				<?php endif;?>
				</div>
				<div id="footer">Ties © 2014</div>
			</div>
			</div>
</body>
</html>