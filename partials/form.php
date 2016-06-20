<?php
function input($id){
 $values = isset($_POST[$id]) ? $_POST[$id] : '';
 return "<input type='text' class='form-control' id='$id' name='$id'
			value='$values'/>";
}