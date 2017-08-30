<?php
session_start();
if($_SESSION['id']){
	header("Location: ../".$_SESSION['username']);
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>Увійти | Ties</title>
<meta charset="utf-8">
<link rel="stylesheet" href="../css/auth.css" type="text/css">
<link rel="stylesheet" href="../css/style.css" type="text/css">
<script type="text/javascript" src="../js/jquery.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script>
$(document).ready(function(){
		$(document).keyup(function(event){
  		  if (event.keyCode == 13) {
       		$('#submit-reg').trigger('click');
   		  }
		});
		var w=$(window).width();
		var h=$(window).height();
		$(window).resize(function(){
			$("body").css({"width":w,"height":h});
		});
		$("#email").blur(function(){
			var r = /^\w+@\w+\.\w{2,6}$/i;
			if (!r.test($(this).val())) {
				$(this).addClass('empty-field');
			}else{
				$(this).removeClass('empty-field');
			}
			
		});
		$("#password").blur(function(){
			if($(this).val()==""){
				$(this).addClass('empty-field');
			}else{
				$(this).removeClass('empty-field');
			}
		});

		$("#submit-reg").click(function(){
			error=false;
			$("#form-reg input").each(function(){
				if($(this).val()==""){
					error=true;
				}
			});
			if(!error){
				$.ajax({
					url: '../php/Auth.class.php',
					type: 'post',
					dataType: 'json',
					data: {email: $("#email").val(),password: $("#password").val(),action: "auth"},
					beforeSend: function(){
						$("#submit-reg").html('<img src="../img/load.gif" height="20" width="20">');
					},
					success: function(data){
						if(data['error']){
							$("#submit-reg").html(data['error']).addClass('error-but');
						}else{
							window.location.href="/"+data['username'];
						}	
					},
					error: function(xhr,aj,text){
						alert(text);
					}
				});
			}
		});
		$("#email").focus();
		$("#submit-reg").mousedown(function(){
			$(this).css("background-color","#1861A3");
		});
		$("#submit-reg").mouseup(function(){
			$(this).css("background-color","#16568f");
		});
		$("#enter").click(function(){
			event.stopPropagation();
			window.location.href = "../login/";
		});
		$("#enter").mousedown(function(){
			$(this).css("background-color","rgba(0,0,0,0.2)");
		});
		$("#enter").mouseup(function(){
			$(this).css("background-color","rgba(255,255,255,0.5)");
		});
		$("#search").focus(function(){
			$("#wrap-search").css("opacity","1");	
		});
		
});
</script>
</head>
<body>		
	<div id="back"></div>
	<div id="wrap-page">
		<div id="wrap-page2">
			<div id="header">
				<div id="wrap-search">
					<input type="text" id="search" placeholder="Пошук в Ties" autocomplete="off"/>
				</div>
			</div>
			<div id="main-body">
				<div id="main-block">
					<div id="logo">
						<span onmousedown="return false" onselectstart="return false">Ties</span>
						<div>
							Дякуємо за те, що ти з нами ;)
						</div>
					</div>
					<div id="form-reg">
						<input id="email" name="email" type="text" autocomplete="off" placeholder="Ел. пошта"/>
						<input id="password" name="password" type="password" autocomplete="off" placeholder="Пароль"/>
						<div id="errors"></div>
						<button id="submit-reg">Увійти</button>
					</div>
				</div>
			</div>
			<div id="footer">
				<div id="left-section">
					<div id="into-left-section">
						<button id="enter">Зареєструватися</button>
						<div id="wrap-terms">
							<a href="#">Умови</a>
							<a href="#">Конфіденційність</a>
						</div>
					</div>
				</div>
				<div id="center-section">
					<div id="into-center-section">
						<div>
							<center><span class="number">2</span></center>
							<div class="description">тисячі нових користувачів</div>
						</div>
						<div>
							<center><span class="number">34</span></center>
							<div class="description">нових історій кохання</div>
						</div>
						<div>
						<center><span class="number">10</span></center>
							<div class="description">секунд для входу</div>
						</div>
					</div>
				</div>
				<div id="right-section">
					<div id="into-right-section">
						<div>Фото користувача <span>ololocyka</span> з сайту <a href="http://tumblr.com">tumblr.</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>