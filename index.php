<!DOCTYPE html>
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
        $exp_amt_dc = mysqli_query($con, "SELECT SUM(expense),expense_cate FROM tbl_expenses WHERE user_id = '".$_SESSION['id']."' GROUP BY expense_cate");
        $exp_amt_line = mysqli_query($con, "SELECT expense_date,SUM(expense) FROM tbl_expenses WHERE user_id = '".$_SESSION['id']."' GROUP BY expense_date");
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
        <div class="container-fluid">
            <h3 class="mt-4">Dashboard</h3>
            <p>All your expenses in one place</p>
            <div class="row">
                <div class="col-lg-11 col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col text-center">
                                    <a href="add_expense.php">
                                        <img src="logo/add_expense.png">
                                        <p>Add Expenses</p>
                                    </a>
                                </div>
                                <div class="col text-center">
                                    <a href="manage_expense.php">
                                        <img src="logo/manage_expense.png">
                                        <p>Manage Expense</p>
                                    </a>
                                </div>
                                <div class="col text-center">
                                    <a href="profile.php">
                                        <img src="logo/edit_profile.png">
                                        <p>Edit Profile</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h3 class="mt-4">Expense Report</h3>
            <p>Get your full expense report</p>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Yearly Expenses</h5>
                        </div>
                        <div class="card-body" id="bar">
                            
                        </div>
                    </div>
                </div>
                <div class=" col-xl-4 ol-lg-4 col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Expense Category</h5>
                        </div>
                        <div class="card-body" id="pie">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        // pie chart
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart(){
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Category');
            data.addColumn('number', 'Expense');
            <?php while($data=mysqli_fetch_array($exp_amt_dc)){
                $cate=$data['expense_cate'];
                $ex=$data['SUM(expense)'];?>
                var x="<?php echo $cate; ?>"
                var y="<?php echo $ex;?>"
                var z=Number(y)
            data.addRows([
               [x,z]
            ]); 
            <?php } ?> 
            var options = {'title':'Expense by category',
                   'width':400,
                   'height':300};
            var chart = new google.visualization.PieChart(document.getElementById('pie'));
            chart.draw(data, options);
        }
        //bar chart
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(barChart);
        function barChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Category');
            data.addColumn('number', 'Expense');
            var year=new Array();
            var exp=new Array();
            <?php while($data=mysqli_fetch_array($exp_amt_line)){
                $date=$data['expense_date'];
                $ex=$data['SUM(expense)'];?>
                var x="<?php echo $date; ?>"
                var y="<?php echo $ex;?>"
                var z=Number(y)
                year.push(x);
                exp.push(z);
            
            <?php } ?> 
            for (i=0;i<year.length;i++){
                data.addRow([year[i],exp[i]])
            }
            var options = {
                chart: {
                    title: 'Expense Analysis',
                    subtitle: 'Expense by date',
                },
                'width':300,
                'height':300
            };
            var chart = new google.charts.Bar(document.getElementById('bar'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }


    </script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>