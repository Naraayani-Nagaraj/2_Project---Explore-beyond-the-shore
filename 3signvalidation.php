<?php
session_start();

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'explore beyond the shore');
$username = $_POST['uname'];
$email = $_POST['email'];
$paswd = $_POST['pwd'];

$s = "select * from usersign where email='$email';
$result= mysqli_query($con,$s);
$num=mysqli_num_rows($result);

/*if($num==1)
{
    echo "This user name is already used";
}
else*/

    $reg="insert into usersign(username,email,paswd) values ('$username','$email','$paswd')";
    mysqli_query($con,$reg);
    echo "successful";

?>