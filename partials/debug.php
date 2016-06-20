<div class="row" >
	<h2> Serveur </h2>
	<div class="col-sm-4">
		<?php var_dump($_SERVER); ?>
	</div>
	<h2> Constante </h2>
	<div class="col-sm-4">
		<?php var_dump($get_defined_constants()); ?>
	</div>
	<div class="col-sm-4">
	<h2> SEssion </h2>
		<?php var_dump($_SESSION); ?>
	</div>
</div>