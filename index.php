<?php
ini_set('display_errors', 0); error_reporting(-1); //debug
session_start();
require_once('config.php');

if(!isset($_SESSION['id1']) || !isset($_SESSION['id2']) || !isset($_SESSION['firstname1']) || !isset($_SESSION['firstname2']) || !isset($_SESSION['lastname1']) || !isset($_SESSION['lastname2'])){
    echo "Session has ended. Please use the link on Orgchart to access this page";
    exit();
}


//hodnotiaci
$id1 = $_SESSION['id1'];
$firstname1 = $_SESSION['firstname1'];
$lastname1 = $_SESSION['lastname1'];

//hodnoteny
$id2 = $_SESSION['id2'];
$firstname2 = $_SESSION['firstname2'];
$lastname2 = $_SESSION['lastname2'];


$data = require('recoghistory.php');

for($i = 0; $i < 5; $i++){
    if (!(isset($data['date'][$i])))
    {
        $data['date'][$i] = "";
        $data['id'][$i] = "";
        $data['name'][$i] = "";
        $data['badge'][$i] = "";

    }
}



$sql = "SELECT badge_id, name, sum(value) as total_score, count(*) as badgecount from badges LEFT JOIN record as r USING (badge_id) LEFT JOIN employees as e USING (emp_id) WHERE emp_id = '$id2' GROUP BY badge_id";

$result = mysqli_query($db, $sql);

$_SESSION['Ownership'] = 0;
$_SESSION['Cooperation'] = 0;
$_SESSION['Proffesionalism'] = 0;
$_SESSION['Leadership'] = 0;
$_SESSION['Innovation'] = 0;
$_SESSION['Skills'] = 0;
$_SESSION['Special'] = 0;


while($row = mysqli_fetch_assoc($result)) {

	$recognition = $row['name'];
	$badgecount = $row['badgecount'];

	$_SESSION[$recognition] = $badgecount;

 
}


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
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>


    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>



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
        <!-- Sidebar Menu Items -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li class="active">
                    <a href="index.php"><i class="fa fa-fw fa-user" ></i> UserProfile</a>
                </li>
                <li>
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
                        UserProfile <small> Recognition </small>
                    </h1>


                </div>
            </div>
            <!-- /.row -->


            <div class="row">

                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">

                            <h3 class="panel-title"><i class=" fa fa-user fa-fw"></i> Profile</h3>
                        </div>
                        <div class="panel-body">


                            <div class="row">
                                <div class="col-lg-7 ">



                                    <div class="odsek2">
                                    	<p><?php echo "User: $firstname2 $lastname2"?></p>
                                        <img src="img/person.gif" width="203" height="212" alt="badge"/>
                                        

                                    </div>


                                </div>











                                <div class="col-lg-5 ">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Recent Awards</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="list-group">
                                                <a class="list-group-item" id="awards0">                                       
                                                    <span class="badge"><?php if (isset($data['date'][0])) echo $data['date'][0];?></span>
                                                    <?php if(!($data['id'][0] == "")) echo '<img src="img/badge'.$data['id'][0].'.png" width="20" height="20" alt="badge">' .' <b>'.$data['badge'][0].'</b>' . ' from ' 
                                                    . '<i>' .$data['name'][0] . '</i>'?>
                                                </a>
                                                <a class="list-group-item" id="awards1">
                                                    <span class="badge"><?php if (isset($data['date'][1])) echo $data['date'][1];?></span>
                                                    <?php if(!($data['id'][1] == "")) echo '<img src="img/badge'.$data['id'][1].'.png" width="20" height="20" alt="badge">' .' <b>'.$data['badge'][1].'</b>' . ' from ' 
                                                    . '<i>' .$data['name'][1] . '</i>'?>
                                                </a>
                                                <a class="list-group-item" id="awards2">
                                                    <span class="badge"><?php if (isset($data['date'][2])) echo $data['date'][2];?></span>
                                                    <?php if(!($data['id'][2] == "")) echo '<img src="img/badge'.$data['id'][2].'.png" width="20" height="20" alt="badge">' .' <b>'.$data['badge'][2].'</b>' . ' from ' 
                                                    . '<i>' .$data['name'][2] . '</i>'?>
                                                </a>
                                                <a class="list-group-item" id="awards3">
                                                     <span class="badge"><?php if (isset($data['date'][3])) echo $data['date'][3];?></span>
                                                    <?php if(!($data['id'][3] == "")) echo '<img src="img/badge'.$data['id'][3].'.png" width="20" height="20" alt="badge">' .' <b>'.$data['badge'][3].'</b>' . ' from ' 
                                                    . '<i>' .$data['name'][3] . '</i>'?>
                                                </a>
                                                <a class="list-group-item" id="awards4">
                                                     <span class="badge"><?php if (isset($data['date'][4])) echo $data['date'][4];?></span>
                                                    <?php if(!($data['id'][4] == "")) echo '<img src="img/badge'.$data['id'][4].'.png" width="20" height="20" alt="badge">' .' <b>'.$data['badge'][4].'</b>' . ' from ' 
                                                    . '<i>' .$data['name'][4] . '</i>'?>
                                                </a>

                                            </div>
    
                                        </div>
                                    </div>
                                </div>









                            </div>




                            <div class="row">

                                <div class="col-lg-3">
                                    <p>
                                        <img src="img/badge1.png" width="15%" height="15%" alt="badge" class="odsek"/>
                                        Ownership:
                                        <span id="pown"> 
                                        <?php echo $_SESSION['Ownership'];?> 
                                        </span>

                                    </p>
                                    <p>
                                        <img src="img/badge2.png" width="15%" height="15%" alt="badge" class="odsek"/>
                                        Cooperation: <span id="pcoo">
                                        	<?php echo $_SESSION['Cooperation'];?> 
                                        </span>
                                    </p>
                                    <p>
                                        <img src="img/badge3.png" width="15%" height="15%" alt="badge" class="odsek"/>
                                        Proffesionalism: <span id="ppro">
                                        	<?php echo $_SESSION['Proffesionalism'];?> 
                                        </span>
                                    </p>
                                    <p>
                                        <img src="img/badge4.png" width="15%" height="15%" alt="badge" class="odsek"/>
                                        Leadership: <span id="plea">
                                        	<?php echo $_SESSION['Leadership'];?> 
                                        </span>
                                    </p>

                                </div>
                                <div class="col-lg-3">
                                    <p>
                                        <img src="img/badge5.png" width="15%" height="15%" alt="badge" class="odsek"/>
                                        Innovation: <span id="pino">
                                        	<?php echo $_SESSION['Innovation'];?> 
                                        </span>
                                    </p>
                                    <p>
                                        <img src="img/badge6.png" width="15%" height="15%" alt="badge" class="odsek"/>
                                        Skills: <span id="pski">
                                        	<?php echo $_SESSION['Skills'];?> 
                                        </span>
                                    </p>
                                    <p>
                                        <img src="img/badge7.png" width="15%" height="15%" alt="badge" class="odsek"/>
                                        Special: <span id="pspe">
                                        	<?php echo $_SESSION['Special'];?> 
                                        </span>
                                    </p>
                                   <script>
                                            $(document).ready(function () {
                                                var user="<?php echo $firstname2 .' '. $lastname2; ?>";

                                                $('#ownershipbutton').click(function() {
                                                
                                                	if(window.confirm("Prajete si odoslať hodnotenie za kategóriu Ownership pre zamestnanca "+user+" ?")){
                                                  			
                                                  			$.ajax({
														        url: 'recognition.php',
														        type: 'POST',
														        data: {'id': '1'},
														        success: function(data) {	
														        	window.alert(data);	
														        	location.reload();											            
													        	}
													    });													
													}
												});


												$('#cooperationbutton').click(function() {
                                                
                                                	if(window.confirm("Prajete si odoslať hodnotenie za kategóriu Cooperation pre zamestnanca "+user+" ?")){
                                                  			
                                                  			$.ajax({
														        url: 'recognition.php',
														        type: 'POST',
														        data: {'id': '2'},
														        success: function(data) {
														            window.alert(data);	
														        	location.reload();	
													        	}
													    });													
													}
												});

												$('#proffesionalismbutton').click(function() {
                                                
                                                	if(window.confirm("Prajete si odoslať hodnotenie za kategóriu Proffesionalism pre zamestnanca "+user+" ?")){
                                                  			
                                                  			$.ajax({
														        url: 'recognition.php',
														        type: 'POST',
														        data: {'id': '3'},
														        success: function(data) {
														            window.alert(data);	
														        	location.reload();	
													        	}
													    });													
													}
												});


												$('#leadershipbutton').click(function() {
                                                
                                                	if(window.confirm("Prajete si odoslať hodnotenie za kategóriu Leadership pre zamestnanca "+user+" ?")){
                                                  			
                                                  			$.ajax({
														        url: 'recognition.php',
														        type: 'POST',
														        data: {'id': '4'},
														        success: function(data) {
														            window.alert(data);	
														        	location.reload();	
													        	}
													    });													
													}
												});



												$('#inovationbutton').click(function() {
                                                
                                                	if(window.confirm("Prajete si odoslať hodnotenie za kategóriu Innovation pre zamestnanca "+user+" ?")){
                                                  			
                                                  			$.ajax({
														        url: 'recognition.php',
														        type: 'POST',
														        data: {'id': '5'},
														        success: function(data) {
														           window.alert(data);	
														        	location.reload();	
													        	}
													    });													
													}
												});



												$('#skillsbutton').click(function() {
                                                
                                                	if(window.confirm("Prajete si odoslať hodnotenie za kategóriu Skills pre zamestnanca "+user+" ?")){
                                                  			
                                                  			$.ajax({
														        url: 'recognition.php',
														        type: 'POST',
														        data: {'id': '6'},
														        success: function(data) {
														            window.alert(data);	
														        	location.reload();	
													        	}
													    });													
													}
												});


												$('#specialbutton').click(function() {
                                                
                                                	if(window.confirm("Prajete si odoslať hodnotenie za kategóriu Special pre zamestnanca "+user+" ?")){
                                                  			
                                                  			$.ajax({
														        url: 'recognition.php',
														        type: 'POST',
														        data: {'id': '7'},
														        success: function(data) {
														            window.alert(data);	
														        	location.reload();	
													        	}
													    });													
													}
												});


											});

	

												
                                         
                                        </script>
                                </div>



                            </div>



                        </div>
                    </div>
                </div>


                <!-- /.row -->
                <div class="row">   <br>  </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-3 col-md-3 ">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-7">

                                        <i ><img src="img/badge1.png" width="103" height="112" alt="badge"
                                        />
                                        </i>
                                        <div class="col-xs-10">
                                            <label>Ownership</label>
                                        </div>
                                    </div>
                                    <div class="pull-left">

                                        <div class="form-group">



                                            <div class="radio">
                                                <label class="ex1">
                                                    Drive
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label class="ex1">
                                                   Attitude
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label class="ex1">
                                                   Empowerment
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label class="ex1">
                                                    Engagement
                                                </label>
                                            </div>
                                        </div>

                                    </div>


                                </div>
                            </div>

                            <div class="panel-footer">
                                <span class="pull-right">
                                    
                                <button type="button" id="ownershipbutton"  class="btn  btn-default">Recognize</button>
                                </span>
                                <div class="clearfix"></div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-3 col-md-7">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-7">

                                        <i ><img src="img/badge2.png" width="103" height="112" alt="badge"
                                        />
                                        </i>
                                        <div class="col-xs-10">
                                            <label>Cooperation</label>
                                        </div>

                                    </div>
                                    <div class="pull-left">

                                        <div class="form-group">



                                            <div class="radio">

                                                <label class="ex1">
                                                    Team spirit
                                                </label>

                                            </div>
                                            <div class="radio">
                                                <label class="ex1">
                                                    Be helpful
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label class="ex1">
                                                    Mentor
                                                </label>
                                            </div>

                                        </div>

                                    </div>


                                </div>
                            </div>

                            <div class="panel-footer">
                                <span class="pull-right"><button type="button" id="cooperationbutton" class="btn  btn-default">Recognize</button></span>

                                <div class="clearfix"></div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-7">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-7">

                                        <i ><img src="img/badge3.png" width="103" height="112" alt="badge"
                                        />
                                        </i>
                                        <div class="col-xs-10">
                                            <label>Proffesionalism</label>
                                        </div>


                                    </div>


                                    <div class="form-group">


                                        <div class="radio">
                                            <label class="ex1">

                                                Communication<br>skills
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label class="ex1">
                                               Negotiation<br>skills
                                            </label>
                                        </div>


                                    </div>




                                </div>
                            </div>

                            <div class="panel-footer">
                                <span class="pull-right"><button type="button" id="proffesionalismbutton" class="btn  btn-default">Recognize</button></span>

                                <div class="clearfix"></div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-7">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-7">

                                        <i ><img src="img/badge4.png" width="103" height="112" alt="badge"
                                        />
                                        </i>
                                        <div class="col-xs-10">
                                            <label>Leadership</label>
                                        </div>


                                    </div>


                                    <div class="form-group">



                                        <div class="radio">
                                            <label class="ex1">
                                                Leadership
                                            </label>
                                        </div>



                                    </div>




                                </div>
                            </div>

                            <div class="panel-footer">
                                <span class="pull-right"><button type="button" id="leadershipbutton" class="btn  btn-default">Recognize</button></span>

                                <div class="clearfix"></div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-7">

                                        <i ><img src="img/badge5.png" width="103" height="112" alt="badge"
                                        />
                                        </i>
                                        <div class="col-xs-10">
                                            <label>Innovation</label>
                                        </div>


                                    </div>


                                    <div class="form-group">



                                        <div class="radio">
                                            <label class="ex1">
                                                Innovation
                                            </label>
                                        </div>



                                    </div>




                                </div>
                            </div>

                            <div class="panel-footer">
                                <span class="pull-right"><button type="button" id="inovationbutton" class="btn  btn-default">Recognize</button></span>

                                <div class="clearfix"></div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-7">

                                        <i ><img src="img/badge6.png" width="103" height="112" alt="badge"
                                        />
                                        </i>
                                        <div class="col-xs-10">
                                            <label>Skills</label>
                                        </div>


                                    </div>


                                    <div class="form-group">



                                        <div class="radio">
                                            <label class="ex1">
                                                Technical skills
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label class="ex1">
                                               Technical <br>background
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label class="ex1">
                                                Personal skills
                                            </label>
                                        </div>



                                    </div>




                                </div>
                            </div>

                            <div class="panel-footer">
                                <span class="pull-right"><button type="button" id="skillsbutton" class="btn  btn-default">Recognize</button></span>

                                <div class="clearfix"></div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-7">

                                        <i ><img src="img/badge7.png" width="103" height="112" alt="badge"
                                        />
                                        </i>
                                        <div class="col-xs-10">
                                            <label>Special</label>
                                        </div>


                                    </div>


                                    <div class="form-group">



                                        <div class="radio">
                                            <label class="ex1">
                                                Project
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label class="ex1">
                                                Task
                                            </label>
                                        </div>




                                    </div>




                                </div>
                            </div>

                            <div class="panel-footer">
                                <span class="pull-right">
                                
                                <button type="button" id="specialbutton" class="btn  btn-default">Recognize</button>
                                
                                </span>

                                <div class="clearfix"></div>
                            </div>

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

<?php
unset($data);
?>
