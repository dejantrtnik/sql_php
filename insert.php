<?php

include 'update_db.php';
?>
<html>
<head>
</head>
<body>
	<div class="">
		<div class="">PRIMER NASLOVA </div>
			<h2>Sprememba podatkov</h2>
				<form method="POST" action="update_db.php">
		      <div class="input-group">
		        <label>Id</label><br>
		        <input type="text" name="id" placeholder="id" value="NULL" readonly><br>
						<label>stolpec1</label><br>
						<input type="text" name="tabela1" placeholder="tabela1" value="" required><br>
						<label>stolpec2</label><br>
						<input type="text" name="tabela2" placeholder="tabela2" value="" required><br>
						<label>stolpec3</label><br>
						<input type="text" name="tabela3" placeholder="tabela3" value="" required><br>
	          <label>stolpec4</label><br>
	           <input type="text" name="tabela4" placeholder="tabela4" value="" required><br>
		        <button type="submit" name="insert" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span>Vnesi podatek</button>
		        <p></p>
		        <a style="color:black" fontsize href="index.php"> Nazaj na izbiro</a>
					</div>
				</form>
	</div>
</body>
</html>
