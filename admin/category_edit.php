<?php include('../partials/constants.php'); ?>
<?php include('../partials/auth.php'); ?>
<?php include('../partials/session.php'); ?>
<?php include('../partials/form.php'); ?>
<?php include('../partials/connect.php');
	if(isset($_POST['name']) && isset($_POST['slug'])){
		checkCsrf();
		if(preg_match('/^[a-z\-0-9]+$/',$_POST['slug'])){
			$slug = $db->quote($_POST['slug']);
			$name = $db->quote($_POST['name']);
			if(isset($_GET['id'])){
				$id = $db->quote($_GET['id']);
				$res = $db->query("UPDATE categories SET name=$name,slug=$slug WHERE id=$id)");
			}else{
				$res = $db->query("INSERT INTO categories(name,slug) VALUES($name,$slug)");

			}
			setFlash('le catégories à bien été ajouter ! ');
			header('Location:category.php');
			die();
		}else{
			setFlash('le slug n\'est pas valide !','danger');
			die();
		}

}
?>
<?php include('../partials/admin_header.php');
// quelque chose est passer en parametres.
	if(isset($_GET['id'])){
		$id = $db->quote($_GET['id']);
		$myres = $db->query("SELECT * FROM categories WHERE id=$id");
		if($myres->rowCount() == 0){
			setFlash('il n\'a ya pas de catégories !!!','danger');
			header('Location:category.php');
			die();
		}else{
			$_POST = $myres->fetch();
		}
	}
	?>
			<h1>	Editer une Cat&eacute;gorie </h1>

<form action="#" method="post">
	<div class="form-control">
		<label for="name">Nom de la cat&eacute;gorie</label>
		<?= input('name') ?>
	</div>
	<div class="form-control">
		<label for="slug">Url de la cat&eacute;gorie</label>
		<?= input('slug') ?>
	</div>
	<?= csrfInput(); ?>
	<button type="submit" class="btn btn-default">Enregistrer</button>
</form>

<?php include('../partials/footer.php'); ?>
