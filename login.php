<?

$c = mysqli_connect("localhost", "root", "root", "bigusshop",3306);

$email = $_POST['email'];
$pswrd=$_POST['pswd'];


if(mysqli_query($c,"SELECT * FROM users WHERE email='$email' AND password = '$pswrd' ") ){
    $data['error'] = 0;
}else{
    $data['error'] = 1;
}
$cur = mysqli_fetch_assoc(mysqli_query($c,"SELECT id FROM users WHERE email='$email' AND password = '$pswrd' ")) ;
$_SESSION["logged-user"] = $cur['id'];
echo json_encode($data);

?>