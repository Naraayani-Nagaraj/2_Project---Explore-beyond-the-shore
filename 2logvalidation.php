<?php
session_start();

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'explore beyond the shore');
$email = $_POST['email'];
$paswd = $_POST['pwd'];

$s = "select * from userlog where email='$email'";
$result= mysqli_query($con,$s);
$num=mysqli_num_rows($result);

if($num==1)
{
    echo "This email id is already registered";
}
else
{
    $reg="insert into userlog(email,paswd) values ('$email','$paswd')";
    mysqli_query($con,$reg);
    echo "successful";
}
?>