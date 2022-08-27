<html>
<head>
    <title>Login Form</title>
    <link rel="icon" href="favicon/budget.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        span,h2{
            padding:4px;
            justify-content: center;
            display: flex;
        }
        .login-form ,.header{
            width: 400px;
            margin:50px auto;
            font-size: 15px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Login</h2>
        <span class="alert alert-primary rounded">Login & manage your expense</span>
    </div> 
    <div class="login-form">
        <form action="user_login_exec.php" method="post" class="row g-3">
            <div class="col-md-12">
                <label for="email" class="form-label">E-Mail</label>
                <div class="input-group">
                    <input type="email" class="form-control" name="email">
                    <span class="input-group-text">@xyz.com</span>
                </div>
            </div>
            <div class="col-md-12">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="pwd">
            </div>
            <div class="col-auto">
                <input type="submit" name="login" value="Login" style="margin-top:1rem;" class="btn btn-outline-dark">
                <a href="user_reg.php" class="btn btn-outline-primary" style="margin-top:1rem;">Register Now</a>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>