<!-- <?php 
    include("adminFunc.php");
    ?> -->
<!doctype html>
<html lang="en">

<head>
<title>ETS Banking</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Oculux Bootstrap 4x admin is super flexible, powerful, clean &amp; modern responsive admin dashboard with unlimited possibilities.">
<meta name="keywords" content="admin template, Oculux admin template, dashboard template, flat admin template, responsive admin template, web app, Light Dark version">
<meta name="author" content="GetBootstrap, design by: puffintheme.com">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="../assets/vendor/animate-css/vivify.min.css">

<link rel="stylesheet" href="../assets/vendor/fullcalendar/fullcalendar.min.css">

<!-- MAIN CSS -->
<link rel="stylesheet" href="../html/assets/css/site.min.css">

</head>
<body class="theme-cyan font-montserrat light_version">

<!-- Page Loader -->
<!-- <div class="page-loader-wrapper">
    <div class="loader">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
        <div class="bar4"></div>
        <div class="bar5"></div>
    </div>
</div> -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<div id="wrapper">

    <nav class="navbar top-navbar">
        <div class="container-fluid">

            <div class="navbar-left">
                <div class="navbar-btn">
                    <a href="index.html"><img src="../assets/images/icon.svg" alt="Oculux Logo" class="img-fluid logo"></a>
                    <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
                </div>
                   
            </div>
            
            <div class="navbar-right">
                <div id="navbar-menu">
                    <ul class="nav navbar-nav">
                        <li><a href="../html/page-login.php" class="icon-menu"><i class="icon-power"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="progress-container"><div class="progress-bar" id="myBar"></div></div>
    </nav>

    
        
    </div>

    <div id="left-sidebar" class="sidebar">
        <div class="navbar-brand">
            <a href="index.html"><img src="../assets/images/icon.svg" alt="Oculux Logo" class="img-fluid logo"><span>ETS Banking</span></a>
            <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="lnr lnr-menu icon-close"></i></button>
        </div>
        <div class="sidebar-scroll">
            <div class="user-account">
                <div class="user_div">
                    <img src="../assets/images/user.png" class="user-photo" alt="User Profile Picture">
                </div>
                <div class="dropdown">
                    <span>Welcome,</span>
                    <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>Admin</strong></a>
                    <ul class="dropdown-menu dropdown-menu-right account vivify flipInY">
                        <li><a href="../html/page-login.php"><i class="icon-power"></i>Logout</a></li>
                    </ul>
                </div>                
            </div>  
            <nav id="left-sidebar-nav" class="sidebar-nav">
                <ul id="main-menu" class="metismenu">
                    <li><a href="../html/index.html"><i class="icon-speedometer"></i><span>Dashboard</span></a></li>
                <li><a href="../hrms/users.php"><i class="icon-diamond"></i><span>cheque Book Request</span></a></li>
                <li><a href="../hrms/accounts.php"><i class="icon-wallet"></i><span>Accounts</span></a></li>
                 
                </ul>
            </nav>     
        </div>
    </div>

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1>Accounts</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Accounts</li>
                            </ol>
                        </nav>
                    </div>            
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <ul class="nav nav-tabs3 table-nav">
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Expenses">Expenses</a></li>                
                        </ul>
                        <div class="tab-content mt-0">
                            <div class="tab-pane show active" id="Expenses">
                                <div class="table-responsive">
                                    <table class="table table-hover table-custom spacing8">
                                        <thead>
                                            <tr>
                                                <th>Account No</th>
                                                <th>User Name</th>
                                                <th>IBN</th>
                                                <th>CNIC</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $result = getAcc($db);
                                            
                                            // output data of each row
                                            $i=0;
                                            while($row = $result->fetch_assoc())  {
                                                $i++;
                                                ?>
                                                <tr>
                                            
                                             <td scope="row"><?php echo $row['account_no']; ?></td> 
                                            <td><?php echo $row['userName'];?></td>
                                            <td><?php echo $row['IBN'];?></td>
                                            <td><?php echo $row['cnic'];?></td>
                                            <td><?php echo $row['date'];?></td>
                                            <?php if($row['status'] == "Approved" ){?>
                                            <td><span class="badge badge-success"><?php echo $row['status'];?></span></td>
                                            <?php
                                            }else{
                                                ?>
                                                <td><span class="badge badge-danger"><?php echo $row['status'];?></span></td>
                                                <?php
                                            }
                                            ?>
                                            <td> PKR <?php echo $row['Amount']; ?></td>    
                                        </tr>
                                                <?php
                                            }  
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>            
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

<!-- Javascript -->
<script src="../html/assets/bundles/libscripts.bundle.js"></script>
<script src="../html/assets/bundles/vendorscripts.bundle.js"></script>

<script src="../html/assets/bundles/mainscripts.bundle.js"></script>
</body>
</html>
