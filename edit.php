<?php
  require_once "header.php";
include 'db.php';
include 'update_db.php';
?>

<div class="form-dodaj" class="">
	<div class="trid"> BESEDILO </div>
	<?php ?>
		<h2>Sprememba podatkov</h2>
			<form method="POST" action="update_db.php">
				<div class="input-group">
					<label>Id</label><br>
					<input type="text" name="id" placeholder="id" value="<?= $id; ?>" readonly><br>
					<label>stolpec1</label><br>
					<input type="text" name="tabela1" placeholder="tabela1" value="<?= $stolpec1; ?>" required><br>
					<label>stolpec2</label><br>
					<input type="text" name="tabela2" placeholder="tabela2" value="<?= $stolpec2; ?>" required><br>
					<label>stolpec3</label><br>
					<input type="text" name="tabela3" placeholder="tabela3" value="<?= $stolpec3; ?>" required><br>
					<label>stolpec4</label><br>
					 <input type="text" name="tabela4" placeholder="tabela4" value="<?= $stolpec4; ?>" required><br>
					<button type="submit" name="update" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Potrdi spremembo</button>
					<p></p>
					<a style="color:black" fontsize href="index.php"> Nazaj na izbiro</a>
				</div>
			</form>
