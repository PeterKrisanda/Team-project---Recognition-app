<?php
session_start();
require_once('config.php');
$firstname1 = $_SESSION['firstname1'];
$lastname1 = $_SESSION['lastname1'];

$highscore = require('highscore.php');
$statistics = require('statistics.php');
?>


<!DOCTYPE html>
<html lang="en">
    
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Recognition app</title>
  

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.js"></script>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>


    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script src="js/requestpage.js"></script>
    
  <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width 100%;
      margin: auto;
      margin-top: 5%;
      margin-bottom: 2%;  
  }
  
  .slsh{
    text-align: left;  
    
  }
  </style>


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
                <a class="navbar-brand" href="index.php">Recognition_app</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
            
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo "$firstname1 $lastname1"?> <b class="caret"></b></a>
                                  <ul class="dropdown-menu">
                    <li>
                        <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                    </li>
     
                    <li>
                        <a href="admin/login.php"><i class="fa fa-fw fa-gear"></i> Admin Panel</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>
            
            <!-- Sidebar Menu Items  -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-user"></i> UserProfile</a>
                    </li>
                    <li class="active">
                        <a href="charts.php"><i class="fa fa-fw fa-bar-chart-o"></i> Charts</a>
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
                            Statistics
                        </h1>
                       
                    </div>
                </div>
   <div class="row">    <br>  </div>
               <!-- /.row -->
                 <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <h3 class="panel-title"><i class=" fa fa-trophy  fa-fw"></i> Global statistics</h3>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#All" data-toggle="tab">All</a>
                                </li>
                                
                                <li><a href="#Ownership" data-toggle="tab">Ownership</a>
                                </li>
                                
                                <li><a href="#Cooperation" data-toggle="tab">Cooperation</a>
                                </li>
                                
                                <li><a href="#Proffesionalism" data-toggle="tab">Proffesionalism</a>
                                </li>
                                
                                <li><a href="#Leadership" data-toggle="tab">Leadership</a>
                                </li>
                               
                                <li><a href="#Innovation" data-toggle="tab">Innovation</a>
                                </li>
                                
                                <li><a href="#Skills" data-toggle="tab">Skills</a>
                                </li>
                                
                                <li><a href="#Special" data-toggle="tab">Special</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="All">
                                   
                                    
                                        <div class="table-responsive table-bordered">
                                            
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                            <td>1</td>
                                            <td><?php echo $highscore['highscore']['firstname'][0]?></td>
                                            <td><?php echo $highscore['highscore']['lastname'][0]?></td>
                                            <td><?php echo $highscore['highscore']['count'][0]?></td>
                                            
                                          
                                        </tr>
                                        <tr>
                                           <td>2</td>
                                            <td><?php echo $highscore['highscore']['firstname'][1]?></td>
                                            <td><?php echo $highscore['highscore']['lastname'][1]?></td>
                                            <td><?php echo $highscore['highscore']['count'][1]?></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td><?php echo $highscore['highscore']['firstname'][2]?></td>
                                            <td><?php echo $highscore['highscore']['lastname'][2]?></td>
                                            <td><?php echo $highscore['highscore']['count'][2]?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                            </div>
                            
                                </div>
                                <div class="tab-pane fade" id="Ownership">
                                    
           <div class="table-responsive table-bordered">
                               <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td><?php echo $highscore['Ownership']['firstname'][0]?></td>
                                            <td><?php echo $highscore['Ownership']['lastname'][0]?></td>
                                            <td><?php echo $highscore['Ownership']['count'][0]?></td>
                                            
                                          
                                        </tr>
                                        <tr>
                                           <td>2</td>
                                            <td><?php echo $highscore['Ownership']['firstname'][1]?></td>
                                            <td><?php echo $highscore['Ownership']['lastname'][1]?></td>
                                            <td><?php echo $highscore['Ownership']['count'][1]?></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td><?php echo $highscore['Ownership']['firstname'][2]?></td>
                                            <td><?php echo $highscore['Ownership']['lastname'][2]?></td>
                                            <td><?php echo $highscore['Ownership']['count'][2]?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                                </div>
                                <div class="tab-pane fade" id="Cooperation">
                                    
    <div class="table-responsive table-bordered">
                               <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td><?php echo $highscore['Cooperation']['firstname'][0]?></td>
                                            <td><?php echo $highscore['Cooperation']['lastname'][0]?></td>
                                            <td><?php echo $highscore['Cooperation']['count'][0]?></td>
                                            
                                          
                                        </tr>
                                        <tr>
                                           <td>2</td>
                                            <td><?php echo $highscore['Cooperation']['firstname'][1]?></td>
                                            <td><?php echo $highscore['Cooperation']['lastname'][1]?></td>
                                            <td><?php echo $highscore['Cooperation']['count'][1]?></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td><?php echo $highscore['Cooperation']['firstname'][2]?></td>
                                            <td><?php echo $highscore['Cooperation']['lastname'][2]?></td>
                                            <td><?php echo $highscore['Cooperation']['count'][2]?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                                </div>
                                <div class="tab-pane fade" id="Proffesionalism">
                                    

    <div class="table-responsive table-bordered">
                              <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                            <td>1</td>
                                            <td><?php echo $highscore['Proffesionalism']['firstname'][0]?></td>
                                            <td><?php echo $highscore['Proffesionalism']['lastname'][0]?></td>
                                            <td><?php echo $highscore['Proffesionalism']['count'][0]?></td>
                                            
                                          
                                        </tr>
                                        <tr>
                                           <td>2</td>
                                            <td><?php echo $highscore['Proffesionalism']['firstname'][1]?></td>
                                            <td><?php echo $highscore['Proffesionalism']['lastname'][1]?></td>
                                            <td><?php echo $highscore['Proffesionalism']['count'][1]?></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td><?php echo $highscore['Proffesionalism']['firstname'][2]?></td>
                                            <td><?php echo $highscore['Proffesionalism']['lastname'][2]?></td>
                                            <td><?php echo $highscore['Proffesionalism']['count'][2]?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>                                
                                </div>
                                 <div class="tab-pane fade" id="Leadership">
                                    

    <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <tr>
                                            <td>1</td>
                                            <td><?php echo $highscore['Leadership']['firstname'][0]?></td>
                                            <td><?php echo $highscore['Leadership']['lastname'][0]?></td>
                                            <td><?php echo $highscore['Leadership']['count'][0]?></td>
                                            
                                          
                                        </tr>
                                        <tr>
                                           <td>2</td>
                                            <td><?php echo $highscore['Leadership']['firstname'][1]?></td>
                                            <td><?php echo $highscore['Leadership']['lastname'][1]?></td>
                                            <td><?php echo $highscore['Leadership']['count'][1]?></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td><?php echo $highscore['Leadership']['firstname'][2]?></td>
                                            <td><?php echo $highscore['Leadership']['lastname'][2]?></td>
                                            <td><?php echo $highscore['Leadership']['count'][2]?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>                                
                                </div>
                                 <div class="tab-pane fade" id="Innovation">
                                 

    <div class="table-responsive table-bordered">
                               <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <tr>
                                            <td>1</td>
                                            <td><?php echo $highscore['Innovation']['firstname'][0]?></td>
                                            <td><?php echo $highscore['Innovation']['lastname'][0]?></td>
                                            <td><?php echo $highscore['Innovation']['count'][0]?></td>
                                            
                                          
                                        </tr>
                                        <tr>
                                           <td>2</td>
                                            <td><?php echo $highscore['Innovation']['firstname'][1]?></td>
                                            <td><?php echo $highscore['Innovation']['lastname'][1]?></td>
                                            <td><?php echo $highscore['Innovation']['count'][1]?></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td><?php echo $highscore['Innovation']['firstname'][2]?></td>
                                            <td><?php echo $highscore['Innovation']['lastname'][2]?></td>
                                            <td><?php echo $highscore['Innovation']['count'][2]?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>                                
                                </div>
                                 <div class="tab-pane fade" id="Skills">
                                    

    <div class="table-responsive table-bordered">
                               <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                            <td>1</td>
                                            <td><?php echo $highscore['Skills']['firstname'][0]?></td>
                                            <td><?php echo $highscore['Skills']['lastname'][0]?></td>
                                            <td><?php echo $highscore['Skills']['count'][0]?></td>
                                            
                                          
                                        </tr>
                                        <tr>
                                           <td>2</td>
                                            <td><?php echo $highscore['Skills']['firstname'][1]?></td>
                                            <td><?php echo $highscore['Skills']['lastname'][1]?></td>
                                            <td><?php echo $highscore['Skills']['count'][1]?></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td><?php echo $highscore['Skills']['firstname'][2]?></td>
                                            <td><?php echo $highscore['Skills']['lastname'][2]?></td>
                                            <td><?php echo $highscore['Skills']['count'][2]?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>                                
                                </div>
                                 <div class="tab-pane fade" id="Special">
                                  

    <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td><?php echo $highscore['Special']['firstname'][0]?></td>
                                            <td><?php echo $highscore['Special']['lastname'][0]?></td>
                                            <td><?php echo $highscore['Special']['count'][0]?></td>
                                            
                                          
                                        </tr>
                                        <tr>
                                           <td>2</td>
                                            <td><?php echo $highscore['Special']['firstname'][1]?></td>
                                            <td><?php echo $highscore['Special']['lastname'][1]?></td>
                                            <td><?php echo $highscore['Special']['count'][1]?></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td><?php echo $highscore['Special']['firstname'][2]?></td>
                                            <td><?php echo $highscore['Special']['lastname'][2]?></td>
                                            <td><?php echo $highscore['Special']['count'][2]?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>                                
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
               
                <div class="col-lg-4 col-md-4">
                  <div class="panel panel-default">
                        <div class="panel-heading">

                            <h3 class="panel-title"><i class=" fa fa-user fa-fw"></i> Employees of the month <?php echo date('F')?></h3>
                        </div>
                        <div class="panel-body slsh">

                            
                            <div class="col-lg-12 col-md-12 col-xs-12">
                                <div class="table-responsive ">
                                
                                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                    
                                            <!-- Indicators -->
                                            
                                               <!--
                                            <ol class="carousel-indicators">
                                              <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                              <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                              <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                          
                                            </ol>
                                            
                                            -->
                                            
                                            <!-- Wrapper for slides -->
                                            <div class="carousel-inner" role="listbox">
                                              <div class="item active">
                                                <img src="img/person.gif" align="middle" width="203" height="212" style="border:#FFD700 4px SOLID" alt="person">
                                                <div class="col-lg-2 col-md-2 col-xs-2">    </div>
                                                <div class="col-lg-9 col-md-9 col-xs-9">
                                                <img src="img/trophy.png" width="13%" height="14%" alt="badge" /> <?php echo $highscore['highscore']['firstname'][0]. ' ' .$highscore['highscore']['lastname'][0]?><br>
                                                <b> Total Awards: <?php echo $highscore['highscore']['count'][0]?></b>
                                                
                                                </div>
                                                <div class="col-lg-1 col-md-1 col-xs-1">  </div>
                                              </div>

                                              <div class="item">
                                                <img src="img/person.gif" align="middle" width="203" height="212" style="border:#3171bb 4px SOLID" alt="person">
                                                <div class="col-lg-2 col-md-2 col-xs-2">    </div>
                                                <div class="col-lg-8 col-md-8 col-xs-8">
                                                
                                                <?php echo $highscore['Ownership']['firstname'][0]. ' ' .$highscore['Ownership']['lastname'][0] ?><br>
                                                <img src="img/badge1.png" width="13%" height="14%" alt="badge" /> Ownership: <?php echo $highscore['Ownership']['count'][0]?>
                                                
                                                                                                
                                                 
                                                </div>
                                                <div class="col-lg-1 col-md-1 col-xs-1">  </div>
                                              </div>

                                              <div class="item">
                                                <img src="img/person.gif" align="middle" width="203" height="212" style="border:#479427 4px SOLID" alt="person">
                                                <div class="col-lg-2 col-md-2 col-xs-2">    </div>
                                                <div class="col-lg-8 col-md-8 col-xs-8">
                                                
                                                 <?php echo $highscore['Cooperation']['firstname'][0]. ' ' .$highscore['Ownership']['lastname'][0] ?><br>
                                                <img src="img/badge2.png" width="13%" height="14%" alt="badge" /> Cooperation: <?php echo $highscore['Cooperation']['count'][0]?>
                                                
                                                
                                                
                                                 
                                                </div>
                                                <div class="col-lg-1 col-md-1 col-xs-1">  </div>
                                              </div>
                                              
                                              <div class="item">
                                                <img src="img/person.gif" align="middle" width="203" height="212" style="border:#7f877d 4px SOLID" alt="person">
                                                <div class="col-lg-2 col-md-2 col-xs-2">    </div>
                                                <div class="col-lg-8 col-md-8 col-xs-8">
                                                
                                                <?php echo $highscore['Proffesionalism']['firstname'][0]. ' ' .$highscore['Proffesionalism']['lastname'][0] ?><br>
                                                <img src="img/badge3.png" width="13%" height="14%" alt="badge" /> Proffesionalism: <?php echo $highscore['Proffesionalism']['count'][0]?>
                                                 
                                                </div>
                                                <div class="col-lg-1 col-md-1 col-xs-1">  </div>
                                              </div>
                                              
                                              <div class="item">
                                                <img src="img/person.gif" align="middle" width="203" height="212" style="border:#664687 4px SOLID" alt="person">
                                                <div class="col-lg-2 col-md-2 col-xs-2">    </div>
                                                <div class="col-lg-8 col-md-8 col-xs-8">
                                                
                                                 <?php echo $highscore['Leadership']['firstname'][0]. ' ' .$highscore['Leadership']['lastname'][0] ?><br>
                                                <img src="img/badge4.png" width="13%" height="14%" alt="badge" /> Leadership: <?php echo $highscore['Leadership']['count'][0]?>
                                                
                                                </div>
                                                <div class="col-lg-1 col-md-1 col-xs-1">  </div>
                                              </div>
                                              
                                              <div class="item">
                                                <img src="img/person.gif" align="middle" width="203" height="212" style="border:#979b10 4px SOLID" alt="person">
                                                <div class="col-lg-2 col-md-2 col-xs-2">    </div>
                                                <div class="col-lg-8 col-md-8 col-xs-8">
                                                
                                                <?php echo $highscore['Innovation']['firstname'][0]. ' ' .$highscore['Innovation']['lastname'][0] ?><br>
                                                <img src="img/badge5.png" width="13%" height="14%" alt="badge" /> Innovation: <?php echo $highscore['Innovation']['count'][0]?> 
                                                 
                                                </div>
                                                <div class="col-lg-1 col-md-1 col-xs-1">  </div>
                                              </div>
                                              
                                              <div class="item">
                                                <img src="img/person.gif" align="middle" width="203" height="212" style="border:#96210f 4px SOLID" alt="person">
                                                <div class="col-lg-2 col-md-2 col-xs-2">    </div>
                                                <div class="col-lg-8 col-md-8 col-xs-8">
                                                
                                                <?php echo $highscore['Skills']['firstname'][0]. ' ' .$highscore['Skills']['lastname'][0] ?><br>
                                                <img src="img/badge6.png" width="13%" height="14%" alt="badge" /> Skills: <?php echo $highscore['Skills']['count'][0]?>
                                                 
                                                </div>
                                                <div class="col-lg-1 col-md-1 col-xs-1">  </div>
                                              </div>
                                              
                                              <div class="item">
                                                <img src="img/person.gif" align="middle" width="203" height="212" style="border:#b97802 4px SOLID" alt="person">
                                                <div class="col-lg-2 col-md-2 col-xs-2">    </div>
                                                <div class="col-lg-8 col-md-8 col-xs-8">
                                                
                                                <?php echo $highscore['Special']['firstname'][0]. ' ' .$highscore['Special']['lastname'][0] ?><br>
                                                <img src="img/badge7.png" width="13%" height="14%" alt="badge" /> Special: <?php echo $highscore['Special']['count'][0]?> 
                                                 
                                                </div>
                                                <div class="col-lg-1 col-md-1 col-xs-1">  </div>
                                              </div>

                                            </div>
                                            
                                            <!-- Left and right controls -->
                                                <!--
                                            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                              <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                              <span class="sr-only">Next</span>
                                            </a>
                                                   -->
                                      </div>
                                </div>
                                
                            </div>
                      </div>
                
            </div>
              </div>
                    
            
                  <div class="col-lg-4 col-md-4">
                  <div class="panel panel-default">
                        <div class="panel-heading">

                            <h3 class="panel-title"><i class=" fa fa-user fa-fw"></i> My statistics</h3>
                        </div>
                        <div class="panel-body">


                            
                              
                            
                            <div class="col-lg-10 col-md-10 col-xs-10">
                                <div class="table-responsive table-bordered">
                 <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category</th>
                                            
                                            <th>Count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $statistics['all']['rank'][0]?></td>
                                            <td>All</td>
                                            
                                            <td><?php echo $statistics['all']['count'][0]?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo $statistics['Ownership']['rank'][0]?></td>
                                            <td>Ownership</td>
                                            
                                            <td><?php echo $statistics['Ownership']['count'][0]?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo $statistics['Cooperation']['rank'][0]?></td>
                                            <td>Cooperation</td>
                                            
                                            <td><?php echo $statistics['Cooperation']['count'][0]?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo $statistics['Proffesionalism']['rank'][0]?></td>
                                            <td>Proffesionalism</td>
                                            
                                            <td><?php echo $statistics['Proffesionalism']['count'][0]?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo $statistics['Leadership']['rank'][0]?></td>
                                            <td>Leadership</td>
                                            
                                            <td><?php echo $statistics['Leadership']['count'][0]?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo $statistics['Innovation']['rank'][0]?></td>
                                            <td>Innovation</td>
                                            
                                            <td><?php echo $statistics['Innovation']['count'][0]?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo $statistics['Skills']['rank'][0]?></td>
                                            <td>Skills</td>
                                            
                                            <td><?php echo $statistics['Skills']['count'][0]?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo $statistics['Special']['rank'][0]?></td>
                                            <td>Special</td>
                                            
                                            <td><?php echo $statistics['Special']['count'][0]?></td>
                                        </tr>
                                       
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

 
</body>

</html>
