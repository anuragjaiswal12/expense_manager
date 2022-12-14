<?php
    session_start();
    if($_SESSION['id']==null){
        header("Location:user_login.php");
    }
    else{
        include 'config.php';
        $name="";
        $dp="";
        $sql="select * from tbl_user where email='".$_SESSION['id']."'";
        $res=mysqli_query($con,$sql);
        while($data=mysqli_fetch_array($res)){
            $name=$data['first_name']." ".$data['last_name'];
            $dp=$data['pic_path'];
        }
        $fetch="select * from tbl_expenses where expense_id=".$_GET['id']."";
        $expense=0;
        $date="";
        $cate="";
        $result=mysqli_query($con,$fetch);
        while($fetched_data=mysqli_fetch_array($result)){
            $expense=$fetched_data['expense'];
            $date=$fetched_data['expense_date'];
            $cate=$fetched_data['expense_cate'];
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
        <div class="add-expense">
            <h3 class="heading">Update Expense</h3>
            <form action="edit_expense_exec.php" method="post" class="row-g3">
                <div class="col-md-8">
                    <label for="expense" class="form-label">Add Expense(INR ???):</label>
                    <div class="input-group">
                        <input type="number" class="form-control" name="expense" value="<?php echo $expense; ?>">
                        <span class="input-group-text">???</span>
                    </div>
                </div>
                <div class="col-md-8">
                    <label for="date" class="form-label">Date:</label>
                    <input type="hidden" name="e_id" value="<?php echo $_GET['id']; ?>">
                    <input type="date" name="date" class="form-control" value="<?php echo $date; ?>">
                </div>
                <div class="col-md-8">
                    <label for="category" class="form-label">Expense Category:</label>
                    <select class="form-control" name="cate">
                        <option value="Food" <?php if($cate=="Food"){echo "selected";}?>>Food</option>
                        <option value="Medicine" <?php if($cate=="Medicine"){echo "selected";}?>>Medicine</option>
                        <option value="Bill" <?php if($cate=="Bill & Recharge"){echo "selected";}?>>Bill & Recharge</option>
                        <option value="Entertaintment" <?php if($cate=="Entertaintment"){echo "selected";}?>>Entertaintment</option>
                        <option value="Clothing" <?php if($cate=="Clothing"){echo "selected";}?>>Clothing</option>
                        <option value="Rent" <?php if($cate=="Rent"){echo "selected";}?>>Rent</option>
                        <option value="House hold items" <?php if($cate=="House hold items"){echo "selected";}?>>House hold items</option>
                        <option value="Other" <?php if($cate=="Other"){echo "selected";}?>>Other</option>
                    </select>
                </div>
                <div class="col-md-8">
                    <input type="submit" class="btn btn-success form-control" style="margin-top: 10px;"  name="update" value="Update Expense">
                </div>
            </form>
        </div>
    </div>
    <script src="js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>