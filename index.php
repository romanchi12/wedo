<?php
	if(isset($_SESSION['username'])){
		header("Location: ".$_SESSION['username']);
	}else{
		header("Location: auth");
	}
?>