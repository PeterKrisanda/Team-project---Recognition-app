<?php
session_start();
include('session.php');
include('../config.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" type="text/css" href="table.css">

    <title>Recognition app</title>
  

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.js"></script>
    <!-- jQuery -->
    <script src="../js/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>


    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

 

</head>

<body>

    <div id="wrapper"> 

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php">Recognition_app</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">

           
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Admin <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>
            
            <!-- Sidebar Menu Items  -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">

                    <li class="active">
                        <a href="menu.php"><i class="fa fa-fw fa-bar-chart-o"></i> Log</a>
                    </li>

                     <li>
                        <a href="export.php"><i class="fa fa-file"></i> Export</a>
                    </li>
                    
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            History
                        </h1>
                       
                    </div>
                </div>

                  <div class="row">

                <div class="col-lg-12">
  

<?php


$sql = "SELECT r.date, CONCAT(e.first_name,' ',e.last_name) as recogto, CONCAT(e2.first_name,' ',e2.last_name) as recogfrom, b.name, b.value FROM record as r RIGHT JOIN badges as b USING (badge_id) JOIN employees as e ON r.emp_id=e.emp_id LEFT JOIN employees as e2 ON r.recognition_from=e2.emp_id ORDER BY date DESC";
$result = mysqli_query($db,$sql);

        echo '<table cellpadding="0" cellspacing="0" class="db-table">';
        echo '<tr><th>Date</th><th>To</th><th>From</th><th>Recognition</th><th>Value</tr>';
        while($row2 = mysqli_fetch_row($result)) {
            echo '<tr>';
            foreach($row2 as $key=>$value) {
                echo '<td>',$value,'</td>';
            }
            echo '</tr>';
        }

?>

                   
                

                    
            
    </div>

 
</body>

</html>
