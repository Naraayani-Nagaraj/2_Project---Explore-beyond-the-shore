<?php

$connect=new PDO('mysql:host=localhost;
                dbname=explore beyond the shore', 'root', '');

$error='';
$comment_name='';
$comment_content='';

if(empty($_POST["comment_name"]))
{
    $error .= '<p class="text_danger">Name is required</p>';
}
else
{
    $comment_name=$_POST["comment_name"];
}
if(empty($_POST["comment_content"]))
{
    $error .= '<p class="text_danger">Please!!!Comment your views before clicking submit!!!</p>';
}
else
{
    $comment_content=$_POST["comment_content"];
}

if($error=='')
{
    $query="INSERT INTO tbl_comment (parent_comment_id,comment,comment_sender_name) VALUES (:parent_comment_id, :comment, :comment_sender_name)";
    $statement=$connect->prepare($query);
    $statement->execute(
        array(
            ':parent_comment_id'    => $_POST["comment_id"],
            ':comment'              => $comment_content,
            ':comment_sender_name'  => $comment_name
        )
    );
    $error= '<label class="text-success">Comment added</label>';
}

$data = array(
    'error'     => $error
);

echo json_encode($data);

?>