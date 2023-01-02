<script type="text/javascript">

  function checkForm(form)
  {
    if(form.uname.value == "") 
    {
      alert("Error: Username cannot be blank!");
      form.uname.focus();
      return false;
    }
    re = /^\w+$/;
    if(!re.test(form.uname.value)) 
    {
      alert("Error: Username must contain only letters, numbers and underscores!");
      form.uname.focus();
      return false;
    }
    if(form.pwd.value == "") 
    {
      alert("Error: Password cannot be blank!");
      form.pwd.focus();
      return false;
    }
	if(form.pwd.value.length < 6) 
    {
        alert("Error: Password must contain at least six characters!");
        form.pwd.focus();
        return false;
	}
	if(form.pwd.value == form.uname.value) 
    {
        alert("Error: Password must be different from Username!");
        form.pwd.focus();
        return false;
	}
	re = /[0-9]/;
    if(!re.test(form.pwd.value)) 
    {
        alert("Error: password must contain at least one number (0-9)!");
        form.pwd.focus();
        return false;
	}
    if(!form.checkbox.checked)
    {
        alert('You must agree to the terms and conditions first.');
        return false;
    }
  }
</script>


<html>
    <head>
        <title>Login or Sign-up</title>
        <link rel="icon" type="image/png" href="titleimg.png">
    </head>
    <body>
        <div class="c1">
            <div class="form-box">
            <img src="avatar.png" class="avatar">
                <div class="button-box">
                    <div id="btn"></div>
                    <button type="button" class="toggle-btn" onclick="login()">Log in</button>
                    <button type="button" class="toggle-btn" onclick="signup()">Sign-up</button>
                </div>
                <div class="login_icons">
                    <img src="fb.png">
                    <img src="google.png">
                </div>
                <form id="log" class="inp" action="2logvalidation.php" onsubmit="return checkForm(this);" method="post">
                    <input type="email" name="email" class="inpu" placeholder="Email id" required>
                    <input type="password" name="pwd" class="inpu" placeholder="Enter password" >
                    <input type="checkbox" class="check"><span>Remember password</span>
                    <button type="submit" class="sub" formaction="index.html">Login</button>
                </form>
                <form id="sign" class="inp" action="3signvalidation.php" onsubmit="return checkForm(this);" method="post">
                    <input type="text" name="uname" class="inpu" placeholder="User name" >
                    <input type="email" name="email" class="inpu" placeholder="Email id" required>
                    <input type="password" name="pwd" class="inpu" placeholder="Enter password" >
                    <input type="checkbox" class="check" name="checkbox"><span>I agree to the terms and conditions</span>
                    <button type="submit" class="sub" formaction="index.html">Sign-Up</button>
                </form>
            </div>
                <h1 style="font-family: cursive;text-align: center;color: #EFEEDC; text-shadow: 2px 2px 5px green; margin-top: -760px; font-size:40px;">Explore beyond the shore</h1>
        </div>
        <script>
            var x=document.getElementById("log");
            var y=document.getElementById("sign");
            var z=document.getElementById("btn");
            function login()
            {
                x.style.left="50px";
                y.style.left="450px";
                z.style.left="0";
            }
            function signup()
            {
                x.style.left="-400px";
                y.style.left="50px";
                z.style.left="110px";
            }
        </script>
    </body>
    <style>
        *
        {
            margin: 0px;
            padding: 0px;
        }
        .avatar
        {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            position: absolute;
            top: 10px;
            left: calc(50%, 50px);
            display:  block;
            margin-left: 150px;
        }
        .c1
        {
            height: 100%;
            width: 100%;
            background-image: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url("bg1.jpeg");
            background-position: center;
            background-size: cover;
            position: absolute;
        }
        .form-box
        {
            height: 580px;
            width: 380px;
            position: relative;
            margin: 6% auto;
            background: #ffffff;
            padding: 5px;
            overflow: hidden;
            border: 3px solid rgb(235, 245, 97);
            background-color: rgba(255, 255, 255,0.7);
        }
        .button-box
        {
            width: 220px;
            margin: 120px auto;
            position: relative;
            box-shadow: 0 0 20px 9px #fddd4f;
            border-radius: 30px;
            color: black;
        }
        .toggle-btn
        {
            padding: 10px 30px;
            cursor: pointer;
            background: transparent;
            border: 0;
            outline: none;
            position: relative;
        }
        #btn
        {
            top: 0;
            left:0;
            position: absolute;
            width: 110px;
            height: 100%;
            background: linear-gradient(to right,#10bbff,#ffad06);
            border-radius: 30px;
            transition: .5s;
        }
        .login_icons
        {
            margin: -50px auto;
            text-align: center;
        }
        .login_icons img
        {
            width: 30px;
            margin: 0px 12px;
            box-shadow: 0 0 20px 0 #7f7f7f3d;
            cursor: pointer;
            border-radius: 50%;
        }
        .inp
        {
            top: 300px;
            position: absolute;
            width: 280px;
            transition: .5s;
        }
        .inpu
        {
            width: 100%;
            padding: 10px 0;
            margin: 5px 0;
            border-top: 0;
            border-left: 0;
            border-right: 0;
            border-bottom: 1px solid #383737;
            outline: none;
            background: transparent;

        }
        .sub
        {
            width: 85%;
            padding: 10px 30px;
            cursor: pointer;
            display: block;
            margin: auto;
            background: linear-gradient(to right,#10bbff,#ffad06);
            border: 0;
            border-radius: 30px;
            outline: none;
        }
        .check
        {
            margin:30px 10px 30px 0;
        }
        span
        {
            color: black;
            font-size: 12px;
            bottom: 68px;
            position: absolute;
        }
        #log
        {
            left: 50px;
        }
        #sign
        {
            left: 450px;
        }
    </style>
</html>