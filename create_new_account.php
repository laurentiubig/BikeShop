<?

$c = mysqli_connect("localhost", "root", "root", "bigusshop",3306);

$n =$_POST['new_usern'];
$email = $_POST['email'];
$pswrd=$_POST['new_pswd'];

if(mysqli_query($c,"insert into users(name,email,password) values('$n', '$email', '$pswrd')") ){
    $data['error'] = 0;
}else{
    $data['error'] = 1;
}
echo json_encode($data);

?>