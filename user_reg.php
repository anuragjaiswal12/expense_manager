<html>
<head>
    <title>Sign Up</title>
    <link rel="icon" href="favicon/budget.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        span,h2{
            padding:4px;
            justify-content: center;
            display: flex;
        }
        .signup-form ,.header{
            width: 400px;
            margin:50px auto;
            font-size: 15px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2 class="heading">Register</h2>
        <span class="alert alert-primary rounded">Create account to manage your daily expenses.</span>
    </div>
    <div class="signup-form"> 
        <form action="user_reg_exec.php" method="post" class="row g-3">
            <div class="col-md-6">
                <label class="form-label" for="firstName">First Name</label>
                <input type="text" class="form-control" name="firstName">
            </div>
            <div class="col-md-6">
                <label class="form-label" for="lastName">Last Name</label>
                <input type="text" class="form-control" name="lastName">
            </div>
            <div class="col-md-12">
                <label class="form-label" for="email">E-Mail</label>
                <div class="input-group">
                    <input type="email" class="form-control" name="email">
                    <span class="input-group-text">@xyz.com</span>
                </div>
            </div>
            <div class="col-md-12">
                <label for="pwd" class="form-label">Password</label>
                <input type="password" class="form-control" name="pwd">
            </div>
            <div class="col-md-12">
                <label for="c_pwd" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="c_pwd">
            </div>
            <div class="col-auto">
                <input type="submit" name="signup" value="Sign Up" style="margin-top:1rem;" class="btn btn-outline-dark">
                <a href="user_login.php" class="btn btn-outline-primary" style="margin-top:1rem;">Login Now</a>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>