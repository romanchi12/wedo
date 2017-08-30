<?php
include 'php/htmlparser.php';
function isAuth( $data ){
	https://31.media.tumblr.com/33ec6ae88b468b25f8c46072d141a925/tumblr_n46vreqDn01qzil83o1_1280.jpg
}
function request($url,$post = 0){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url ); // отправляем на 
    curl_setopt($ch, CURLOPT_HEADER, 0); // пустые заголовки
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // возвратить то что вернул сервер
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // следовать за редиректами
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);// таймаут4
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_COOKIEJAR, dirname(__FILE__).'/cookie.txt'); // сохранять куки в файл 
    curl_setopt($ch, CURLOPT_COOKIEFILE,  dirname(__FILE__).'/cookie.txt');
    curl_setopt($ch, CURLOPT_POST, $post!==0 ); // использовать данные в post
    if($post)
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}
$auth = array(
        'ulogin'=>'romanchi_small',
        'upassword'=>'frdfhtkm12'
);
$url = 'http://lensart.ru/signin.htm';
$data = request($url,$auth);
$data=request("http://lensart.ru/");
echo $data;
?>