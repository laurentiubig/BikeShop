<?
session_start();

$c = mysqli_connect("localhost", "root", "root", "bigusshop",3306);

$p_id = $_POST['product_id'];
$usr_id = $_POST['logged_usr'];


mysqli_query($c, "INSERT INTO purchases(user_id) VALUES($usr_id)");
$w = mysqli_fetch_array(mysqli_query($c, "SELECT id FROM purchases WHERE user_id = $usr_id"));
mysqli_query($c, "INSERT INTO purchase_items(id,product_id) VALUES(".$w['id']." , $p_id)");

$data['error'] =0;
echo json_encode($data);

?>