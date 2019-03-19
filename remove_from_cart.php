<?
session_start();

$c = mysqli_connect("localhost", "root", "root", "bigusshop",3306);

$p_id = $_POST['product_id'];
$usr_id = $_SESSION['logged-user'];

mysqli_query($c,"DELETE FROM purchase_items WHERE id = $p_id ");
mysqli_query($c,"DELETE FROM purchases WHERE id = $p_id AND user_id = $usr_id" );




$data['error'] =0;
echo json_encode($data);

?>