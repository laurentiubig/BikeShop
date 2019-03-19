<?

$c = mysqli_connect("localhost", "root", "root", "bigusshop",3306);

$email = $_POST['email'];
$pswrd=$_POST['new_pswd'];

if(mysqli_query($c,"UPDATE users SET `password` ='$pswrd' WHERE `email` = '$email'") ){
    $data['error'] = 0;
}else{
    $data['error'] = 1;
}
echo json_encode($data);

?>