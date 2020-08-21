<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
    <meta http-equiv="refresh" content="600" >
	<title>TRACKER | MAPS</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link href="assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="assets/css/animate.min.css" rel="stylesheet" />
	<link href="assets/css/style.min.css" rel="stylesheet" />
	<link href="assets/css/style-responsive.min.css" rel="stylesheet" />
	<link href="assets/css/theme/default.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
	      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/maptalks/dist/maptalks.css">
  <script type="text/javascript" src="assets/js/maptalks.min.js"></script>
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
    <style>
       .tablekecil {
        font-size:8.5px !important;
    }
 .tablesedang {
        font-size:10px !important;
    }
    .mt-0 {
  padding-left: 0.35rem !important;
  padding-right: 0.35rem !important;
  padding-top: 0.35rem !important;
  padding-bottom: 0.35rem !important;
}
.stats-number2 {
    font-size: 20px;
    font-weight: 300;
    margin-bottom: 2px;
}
stats-title2 {
    color: #fff;
 
}
    </style>
</head>
     
<?php
include 'connect.php';
?>
<?php

$sqlcenter = "SELECT lat, `long` FROM(
  SELECT username, MAX(DATETIME),lat,`long` FROM log_location GROUP BY username) a LIMIT 1";
$center=mysqli_query($koneksi,$sqlcenter);
?>
<?php

$sql2 = "SELECT username, MAX(DATETIME),lat,`long` FROM log_location GROUP BY username";
$result2=mysqli_query($koneksi,$sql2);
?>

<?php

$sqltab = "SELECT username,company, MAX(DATETIME) as datetime,lat,`long` FROM log_location GROUP BY username";
$resulttab=mysqli_query($koneksi,$sqltab);
?>


<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-minified page-sidebar-fixed page-header-fixed">
		<!-- begin #header -->
		<div id="header" class="header navbar navbar-inverse navbar-fixed-top">
			<!-- begin container-fluid -->
			<div class="container-fluid">
				<!-- begin mobile sidebar expand / collapse button -->
				<div class="navbar-header">
					<a href="index.html" class="navbar-brand">TRACKER MAPS</a>
					<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- end mobile sidebar expand / collapse button -->
				
				<!-- begin header navigation right -->
				<ul class="nav navbar-nav navbar-right">
					<li>
					<h5>
				</h5>	
					</li>
					
					
				</ul>
				<!-- end header navigation right -->
			</div>
			<!-- end container-fluid -->
		</div>
		<!-- end #header -->
		
		<!-- begin #sidebar -->
		<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				<ul class="nav">
					<li class="nav-header">Navigation</li>
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-laptop"></i>
						    <span>Dashboard</span>
					    </a>
						<ul class="sub-menu">
						    <li><a href="index.php">DASHBOARD DETAIL</a></li>
						    

						</ul>
					</li>
					
					
			        <!-- begin sidebar minify button -->
					<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
			        <!-- end sidebar minify button -->
				</ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<div class="sidebar-bg"></div>
		
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content content-full-width">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">

				
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h3 class="page-header"> </h3>
			<!-- end page-header -->
        
			<div class="map">
                
                <div id="map2" class="height-full width-full">
                </div>
                <script>
      var map = new maptalks.Map('map2', {
        <?php
while($rows=mysqli_fetch_assoc($center)){
?>
        center: [<?php echo $rows['lat']  ?>,<?php echo $rows['long']  ?>],
        <?php
}
?>
        zoom: 9,
        baseLayer: new maptalks.TileLayer('base', {
          urlTemplate: 'https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}.png',
          subdomains: ['a','b','c','d']
        })
      });

     

     var layer = new maptalks.VectorLayer('vector').addTo(map);
 <?php
while($rows=mysqli_fetch_assoc($result2)){
?>
      var marker = new maptalks.Marker([<?php echo $rows['lat']  ?>,<?php echo $rows['long']  ?>], {
        symbol:{
            'textName' :  '<?php echo $rows['username']  ?>',
            'textDy' : -20,
            'textFaceName' : 'arial',
            'textSize' : 12,
            'textFill' : 'white',
'textHaloFill' : '#fff',
          'markerType': 'ellipse',

          'markerFill' : '#ACFA19',
          'markerLineColor' : '#ACFA19',

          'markerWidth'  : 9,
           'markerHeight' : 9
        }
      }).addTo(layer);
             		<?php
}
?>
 

    </script>
                
                <div class="map-float-table2 width-sm hidden-xs p-15">
                    <h4 class="m-t-0 text-primary"><i class="fa fa-map-marker text-danger m-r-5"></i> Users List</h4>
    
                    <div data-scrollbar="true" class="height-md"><br><br>
                        <table class="table tablesedang table-inverse">
                            <thead>
                                <tr>
                                    <th>USER </th>
                                 
                                    <th>TIME</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php
while($rows=mysqli_fetch_assoc($resulttab)){
?>
                                <tr>
                                    <td><?php echo strtoupper($rows['username'])  ?></td>
                                  
                                    <td><span class="text-success"><?php echo $rows['datetime']  ?></span></td>
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
		<!-- end #content -->
		
        <!-- begin theme-panel -->
        
        <!-- end theme-panel -->
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
       
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/plugins/jquery/jquery-1.9.1.min.js"></script>
	<script src="assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
	<script src="assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!--[if lt IE 9]>
		<script src="assets/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/crossbrowserjs/respond.min.js"></script>
		<script src="assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/plugins/jquery-cookie/jquery.cookie.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
	<script src="assets/js/map-google.demo.min.js"></script>
	<script src="assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
		
		});
	</script>

</body>
</html>
