<?php
?>

<html>
    <head>
    <link rel="icon" type="image/png" href="titleimg.png">
        <title>Comments</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"</script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"></script>
    </head>
    <body>
    <br />
    <h2 align="center" style="  text-shadow: 2px 2px 5px green;"><img src="commentlogo.png" class="log" style="width: 30px;">Comment your views</h2>
    <br />
    <div class="container">
        <form method="POST" id="comment_form" align="center">
            <div class="form-group">
                <input type="text" name="comment_name" id="comment_name" class="form-control" placeholder="Enter your name" style="width: 50%; border: 5px groove Limegreen;" />
            </div><br>
            <div class="form-group">
                <textarea name="comment_content" id="comment_content" class="form-control" placeholder="Enter your comment" rows="5" style="width: 50%; border: 5px groove Limegreen;"></textarea>
            </div><br>
            <div class="form-group">
                <input type="hidden" name="comment_id" id="comment_id" value="0"/>
                <input type="submit" name="submit" id="submit" class="btn btn-info" val="submit" style="background-color: #4CAF50; /* Green */
                                                                                                        border: none;
                                                                                                        color: white;
                                                                                                        padding: 15px 32px;
                                                                                                        text-align: center;
                                                                                                        text-decoration: none;
                                                                                                        display: inline-block;
                                                                                                        font-size: 16px;
                                                                                                        border: 3px solid #000000; /* Green */"/>
            </div>
        </form>
        <span id="comment_message"></span>
        <br />
        <div id="display_comment"></div>
    </div>
    </body>
    <style>
    body
    {
	margin: 0;
	padding: 0;
	background-image: url("commentback2.jpg");
	background-size: cover;
	background-position: center;
	font-family: Calibri (Body);
    border-style:solid;
    }
    </style>
</html>
<script>
$(document).ready(function()
{
    $('#comment_form').on('submit', function(event)
    {
        event.preventDefault();
        var form_data = $(this).serialize();
        $.ajax(
            {
                url:"add_comment.php",
                method:"POST",
                data:form_data,
                dataType:"JSON",
                success:function(data)
                {
                    if(data.error!='')
                    {
                        $('#comment_form')[0].reset();
                        $('#comment_message').html(data.error);
                    }
                }
            }
        )
    });

    load_comment();


    function load_comment()
    {
        $.ajax
        ({
            url:"fetch_comment.php",
            method:"$_POST",
            success:function(data)
            {
                $('#display_comment').html(data); 
            }
        })
    }

    $(document).on('click','.reply',function() 
    {
        var comment_id=$(this).attr("id");
        $('#comment_id').val(comment_id);
        $('#comment_name').focus();
    });


});
</script>