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
                    <div class="name"><?php echo $name;?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content">
        <?php 
            $sel="select * from tbl_expenses where user_id='".$_SESSION['id']."'";
            $result=mysqli_query($con,$sel);
        ?>
        <table class="table table-primary table-striped table-hover">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Expense</th>
                    <th scope="col">Date</th>
                    <th scope="col">Category</th>
                    <th scope="col" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
        <?php
            while($data=mysqli_fetch_array($result)){
        ?>
                <tr>
                    <th scope="row" class="text-center"><?php echo $data['expense_id']; ?></th>
                    <td class="text-center"><?php echo $data['expense']; ?></td>
                    <td class="text-center"><?php echo $data['expense_date']; ?></td>
                    <td class="text-center"><?php echo $data['expense_cate']; ?></td>
                    <td class="text-center"><a href="edit_expense.php?id=<?php echo $data['expense_id']; ?>" class="btn btn-outline-primary">Edit</a></td>
                    <td class="text-center"><a href="delete_expense.php?id=<?php echo $data['expense_id']; ?>" class="btn btn-outline-danger">Delete</a></td>
                </tr>
        <?php
            }
        ?>
            </tbody>
        </table>
    </div>
    <script src="js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>