<?php include('../core/init.inc.php');?>
<?php
// get value of id that sent from address bar
$id = $_GET['id'];

// Delete data in mysql from row that has this id
$sql = "DELETE FROM `event_system` WHERE `event_id` = '$id'";
$result = mysql_query($sql);

$sql2 = "DELETE FROM `rsvp_system` WHERE `event_id` = '$id'";
$result2 = mysql_query($sql2);

// if successfully deleted

if($result){
echo "Deleted Successfully";
echo "<BR>";
header('Location: http://'.$host.'/'.$base.'/templates/admin.php');
} else {
echo "ERROR";
}
?>