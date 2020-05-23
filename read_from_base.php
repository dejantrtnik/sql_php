<?php
include_once 'db_conn.php';

$query = "SELECT * FROM testno";
$result = mysqli_query($conn, $query);
$array = mysqli_fetch_all($result);
?>
<?php if(isset($_GET['vec']) && $_GET['vec'] >= 0):?>
<table class="">
<tr>
  <td>id:</td>
  <td><?= $array[$_GET['vec']]['0']; ?></td>
</tr>
<tr>
  <td>stolpec1:</td>
  <td><?= $array[$_GET['vec']]['1']; ?></td>
</tr>
<tr>
  <td>stolpec2:</td>
  <td><?= $array[$_GET['vec']]['2']; ?></td>
</tr>
<tr>
  <td>stolpec3:</td>
  <td><?= $array[$_GET['vec']]['3']; ?></td>
</tr>
<tr>
  <td>stolpec4:</td>
  <td><?= $array[$_GET['vec']]['4']; ?></td>
</tr>


</table><br>
<div style="text-align:center;" class="">
<a href="edit.php?edit=<?= $array[$_GET['vec']]['0'] ?>"><i class="fa fa-edit">&nbsp;Uredi</i></a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="delete.php?edit=<?= $array[$_GET['vec']]['0'] ?>"><i class="fa fa-trash">&nbsp;Zbriši</i></a>
</div>
</div>
<?php else:?>
<h2>PRIMER NASLOVA</h2>
<h1 class="head1">Primer tabele</h1>
<table class="seznam">
<tr class="tabhead">
  <th class="hash">#</th>
  <th>ID</th>
  <th>stolpec1</th>
  <th>stolpec2</th>
  <th>stolpec3</th>
  <th>stolpec4</th>
  <th class="opravila">more</th>
  <th class="opravila">edit</th>
  <th class="opravila">delete</th>
</tr>
  <?php foreach ($array as $index => $array):
    // /print_r($array);
    ?>
  <tr>
    <th><?= $index + 1; ?></th>
    <th><?= $array['0']; ?></th>
    <th><?= $array['1']; ?></th>
    <th><?= $array['2']; ?></th>
    <th><?= $array['3']; ?></th>
    <th><?= $array['4']; ?></th>
    <td><a class="" href="index.php?vec=<?= $index; ?>">Več</a></td>
    <td><a class="" href="uredi.php?edit=<?= $array['0']; ?>">Uredi</a></td>
    <td><a class="" href="delete.php?edit=<?= $array['0']; ?>">Briši</a></td>
  </tr>
  <?php endforeach; ?>
</table>
</div>
<?php endif; ?>
<a class="" href="insert.php?edit=<?= $array['0']; ?>">insert</a>
