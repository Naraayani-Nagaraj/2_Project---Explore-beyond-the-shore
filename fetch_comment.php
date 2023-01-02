<?php

$connect=new PDO('mysql:host=localhost;
                dbname=explore beyond the shore', 'root', '');

$query = "SELECT * FROM tbl_comment WHERE parent_comment_id = '0' ORDER BY comment_id DESC";

$statement = $connect->prepare($query);
$statement->execute();
$result=$statement->fetchAll();
$output='';

foreach($result as $row)
{
    $output .= '<div class="panel panel-default" style="border-style:solid; border-color:#598971;">
                    <div class="panel-heading">  <b>'.$row["comment_sender_name"].'</b> Commented:
                    [ <i>'.$row["date"].'</i>]</div>
                    <div class="panel-body">'.$row["comment"].'</div>
                    <div class="panel-footer" align="right"><button type="button" class="btn btn-default reply" id="'.$row["comment_id"].'" style="background-color: #F0ECEC; /* Green */
                    color: black;
                    padding: 10px 20px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                    font-size: 13px;
                    border: 3px solid #000000;
                    margin-bottom:5px;
                    margin-right:5px; ">Reply</button>
                    </div>
                </div><br>
    ';
    $output .= get_reply_comment($connect, $row["comment_id"]);
}

echo $output;

function get_reply_comment($connect, $parent_id=0, $marginleft=0)
{
    $query="SELECT * FROM tbl_comment WHERE parent_comment_id='".$parent_id."'
    ";

    $statement=$connect->prepare($query);
    $statement->execute();
    $result=$statement->fetchAll();
    $count=$statement->rowCount();
    $output=''; //
    if($parent_id==0)
    {
        $marginleft=0;
    }
    else
    {
        $marginleft=$marginleft+48;
    }
    if($count>0)
    {
        foreach($result as $row)
        {
            $output .= '
            <div class="panel panel-default" style="margin-left:'.$marginleft.'px ">
                <div class="panel-heading">Replied By <b>'.$row["comment_sender_name"].'</b> [ <i>'.$row["date"].'</i>]</div>
                <div class="panel-body">'.$row["comment"].'</div>
                <div class="panel-footer" align="right"><button type="button" class="btn btn-default reply" id="'.$row["comment_id"].'" style="background-color: #F0ECEC; /* Green */
                color: black;
                padding: 10px 20px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 13px;
                border: 3px solid #000000;
                margin-bottom:5px;
                margin-right:5px; ">Reply</button></div>
            </div>
            ';
            $output .= get_reply_comment($connect, $row["comment_id"], $marginleft);
        }
    }
    return $output;
}



?>