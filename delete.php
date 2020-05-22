<?php
include 'db.php';
include 'update_db.php';
?>

<div class="form-dodaj" class="">
	<div class="trid"> BESEDILO </div>
	<?php ?>
		<h2>Izbris podatkov</h2>
			<form method="POST" action="update_db.php">
				<div class="input-group">
					<label>Izbriši vnos Id št.</label><br>
					<input type="text" name="id" placeholder="id" value="<?= $id; ?>" readonly><br>
					<input type="text" name="tabela1" placeholder="tabela1" value="<?= $stolpec1; ?>" hidden><br>
					<input type="text" name="tabela2" placeholder="tabela2" value="<?= $stolpec2; ?>" hidden><br>
					<input type="text" name="tabela3" placeholder="tabela3" value="<?= $stolpec3; ?>" hidden><br>
					<input type="text" name="tabela4" placeholder="tabela4" value="<?= $stolpec4; ?>" hidden><br>
					<button type="submit" name="delete" class="btn btn-primary"><span class=""></span>Izbriši</button>
					<p></p>
					<a style="color:black" fontsize href="index.php"> Nazaj na izbiro</a>
				</div>
			</form>
