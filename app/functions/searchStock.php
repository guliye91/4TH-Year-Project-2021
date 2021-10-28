<?php
require_once("../../incs/conn.php");
if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM stock WHERE stockName like '%" . $_POST["keyword"] . "%' ";
$result = mysqli_query($dbc,$query);
if(!empty($result)) {
?>
<ul id="stock-list">
<?php
foreach($result as $country) {
?>
<li class="teal-text" onClick="selectCountry('<?php echo $country["stockName"]; ?>');"><?php echo $country["stockName"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>