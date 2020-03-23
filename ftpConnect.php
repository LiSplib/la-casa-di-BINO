<?php

$ftp_server = "files.000webhost.com";
$ftp_user_name = "lacasadibino";
$ftp_user_pass = "chezBino61011";
$destination_file = "public_html/img/";
$source_file = $_FILES['file']['tmp_name'];

$conn_id = ftp_connect($ftp_server);

$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
session_start();
if((!$conn_id) || ($login_result)){
    $_SESSION['flash']['danger'] = 'FTP connexion a échouée !';
    exit;
}else{
    $_SESSION['flash']['success'] = 'Connexion réussi !';
}

$upload = ftp_put($conn_id, $destination_file, $source_file, FTP_BINARY);

if(!$upload){
    $_SESSION['flash']['danger'] = 'L\'envoi a échoué !';
}else{
    $_SESSION['flash']['success'] = 'Transfert effectué !';
}

ftp_close($conn_id);
?>