<?php
    session_start();
    if($_SESSION['id']==null){
        header("Location:user_login.php");
    }
    else{
        include 'config.php';
        $name="";
        $fname="";
        $lname="";
        $dp="";
        $sql="select * from tbl_user where email='".$_SESSION['id']."'";
        $res=mysqli_query($con,$sql);
        while($data=mysqli_fetch_array($res)){
            $name=$data['first_name']." ".$data['last_name'];
            $dp=$data['pic_path'];
            $fname=$data['first_name'];
            $lname=$data['last_name'];
        }
    }
?>
<html>
<head>
    <title>Expense Manager</title>
    <link rel="icon" href="favicon/budget.png">
    <link rel="stylesheet" href="css/styles.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        .dp{
            height: 100px;
            width: 100px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo_content">
            <div class="logo">
                <div class="name">Expense Manager</div>
            </div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav_list">
            <li>
                <a href="index.php">
                    <i class='bx bxs-home'></i>
                    <span class="link_name">Dashboard</span>
                    <span class="tooltip">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="add_expense.php">
                    <i class='bx bx-add-to-queue'></i>
                    <span class="link_name">Add Expense</span>
                    <span class="tooltip">Add Expense</span>
                </a>
            </li>
            <li>
                <a href="manage_expense.php">
                    <i class='bx bx-money-withdraw'></i>
                    <span class="link_name">Manage Expense</span>
                    <span class="tooltip">Manage Expense</span>
                </a>
            </li>
            <li>
                <a href="profile.php">
                    <i class='bx bx-user-pin'></i>
                    <span class="link_name">Profile</span>
                    <span class="tooltip">Profile</span>
                </a>
            </li>
            <li>
                <a href="logout.php">
                    <i class='bx bx-power-off'></i>
                    <span class="link_name">Logout</span>
                    <span class="tooltip">Logout</span>
                </a>
            </li>
        </ul>
        <div class="profile_content">
            <div class="profile">
                <div class="profile_details">
                    <img src="<?php echo $dp; ?>" alt="Profile Image">
                    <div class="name"><?php echo $name; ?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content">
        <div class="update_profile">
            <h3 class="heading">Update Expense</h3>
            <form action="update_profile.php" enctype="multipart/form-data" method="post" class="row-g3">
                <div class="col-md-8">
                    <img src="<?php echo $dp; ?>" alt="Profile Pic" class="text-center img img-fluid rounded-circle avatar dp">
                </div>
                <div class="col-md-8">
                    <label for="profile" class="form-label">Profile Pic:</label>
                    <input type="file" name="file" class="form-control">
                </div>
                <div class="col-md-8">
                    <label for="firstName" class="form-label">First Name:</label>
                    <input type="text" name="firstName" class="form-control" value="<?php echo $fname; ?>">
                </div> 
                <div class="col-md-8">
                    <label for="lastName" class="form-label">Last Name:</label>
                    <input type="text" name="lastName" class="form-control" value="<?php echo $lname; ?>">
                </div>
                <div class="col-md-8">
                    <label for="email" class="form-label">E-Mail:</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $_SESSION['id']; ?>" disabled>
                </div>
                <div class="col-md-8">
                    <input type="submit" name="update_profile" value="Update Profile" class="btn btn-outline-success form-control" style="margin-top: 10px;">
                </div>
            </form>
        </div>
    </div>
    <script src="js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>