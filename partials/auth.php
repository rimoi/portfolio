<?php
 session_start();
 if(!isset($auth)){
	if(!isset($_SESSION['Auth']['id'])){
		header('Location:'.WEBROOT.'login.php');
     // Toujours à mettre de die
     die();
	}
 }

if(!isset($_SESSION['csrf'])){
      $_SESSION['csrf'] = md5(time() + rand());
}
 function csrf(){
   return 'csrf=' . $_SESSION['csrf'];
 }

function csrfInput(){
    return '<input type="hidden" valeur="' .$_SESSION['csrf']. '" name="csrf">';
}

function checkCsrf(){
    if((isset($_POST['csrf']) && $_POST['csrf'] == $_SESSION['csrf']) ||
        (isset($_GET['csrf']) && $_GET['csrf'] == $_GET['csrf'])
    ){
        return true;
    }else{

       header('Location:'.WEBROOT.'csrf.php');
       die();
    }
}
 ?>