<?php $auth = 0; ?>
<?php include('partials/includes.php'); ?>



<?php

if(isset($_POST['username']) && isset($_POST['password'])){
	$username = $db->quote($_POST['username']);
	$password = sha1($_POST['password']);
	$maRequete = $db->query("SELECT * FROM users WHERE username =$username AND password = '$password'");
	//var_dump($maRequete->rowCount());
	//die();
	if($maRequete->rowCount() > 0){
		$_SESSION['Auth'] = $maRequete->fetch();
		setFlash('vous êtes maintenent connecter','success');
		header('Location:'.WEBROOT.'admin/index.php');
		die();
	}else{
		echo "connexion à échouer :(";
	}
}
	include('partials/header.php');

?>




<form action="#" method="post">
	<div class="form-control">
		<label for="username">Nom Utilisateur</label>
		<?= input('username') ?>
	</div>
	<div class="form-control">
		<label for="password">password</label>
		<input type="password" class="form-control" id="password" name="password"/>
	</div>
	
	<button type="submit" class="btn btn-default">Se Connecter</button>
</form>

<?php include('partials/debug.php'); ?>
<?php include('partials/footer.php'); ?>