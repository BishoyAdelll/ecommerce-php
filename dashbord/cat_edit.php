<?php
include('header.php');
$id= $_GET['id'];
$active= "edit_cat";
// require_once('../config.php');
include('db.php');
?>
<form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
<input type="hidden" value="<?=$id?>" name="cat_id">
<select name="size" id="">
<?php
$sql_size ="SELECT * FROM size ";
$result_size =$con-> query($sql_size);
foreach($result_size as$row_size){
    ?>
    <option value="<?=$row_size['idsize']?>"><?=$row_size['size'];?></option>
    <?php
}
?>
</select>
</form>
<?php
include('footer.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$cat_id = $_POST['cat_id'];
$size= $_POST['size'];
$update_size = "UPDATE category SET id_size ='$size' WHERE cat_id ='$id'";
$con ->query($update_size);
}
?>