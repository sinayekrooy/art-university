<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fa">
<head>
<?php
if(isset($_POST['title']))
{
?>
	<table>
<?php 
    foreach ($_POST as $key => $value) {
        echo "<tr>";
        echo "<td>";
        echo $key;
        echo "</td>";
        echo "<td>";
        echo var_dump($value);
        echo "</td>";
        echo "</tr>";
    }


?>
</table>
<?php
}
?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Free HTML5 Bootstrap Admin Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
	<meta name="author" content="Muhammad Usman">

	<!-- The styles -->
	<link id="bs-css" href="css/bootstrap-cerulean.css" rel="stylesheet">
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>
	<link href="css/bootstrap-cerulean.css" rel="stylesheet">
	<link type="text/css" href="styles/jquery-ui-1.8.14.css" rel="stylesheet" />

    <script type="text/javascript" src="scripts/jquery-1.6.2.min.js"></script>
	<script type="text/javascript" src="scripts/jquery.ui.core.js"></script>
    <script type="text/javascript" src="scripts/jquery.ui.datepicker-cc.js"></script>
    <script type="text/javascript" src="scripts/calendar.js"></script>
    <script type="text/javascript" src="scripts/jquery.ui.datepicker-cc-ar.js"></script>
    <script type="text/javascript" src="scripts/jquery.ui.datepicker-cc-fa.js"></script>
    <script type="text/javascript">
	$(function() {
	$("#datepicker2").datepicker({
	            dateFormat: 'dd/mm/yy',
	            altField: '#alternate2',
	            altFormat: 'DD، d MM yy'
	        });
	});
	</script>

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- The fav icon -->
	<link rel="shortcut icon" href="img/favicon.ico">
		
</head>

<body>
		<!-- topbar starts -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="index.html"><span>دانشگاه هنر تبریز</span></a>
				
				
				
				<!-- user dropdown starts -->
				<div class="btn-group pull-right" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i><span class="hidden-phone"> مدیریت</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="#">مشخصات</a></li>
						<li class="divider"></li>
						<li><a href="login.html">خروج</a></li>
					</ul>
				</div>
				<!-- user dropdown ends -->
				
				<div class="top-nav nav-collapse">
					<ul class="nav">
						<li><a href="#" target="_blank">مشاهده سایت</a></li>
						<li>
							<form class="navbar-search pull-left">
								<input placeholder="جستجو" class="search-query span2" name="query" type="text">
							</form>
						</li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>
	</div>
	<!-- topbar ends -->
		<div class="container-fluid">
		<div class="row-fluid">
				
			<?php
			require_once('side_menu.php');
			?>
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<div id="content" class="span10">
			<!-- content starts -->
			

			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider"></span>
					</li>
				</ul>
			</div>

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-th-list"></i> اضافه کردن منو </h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form action="" method="post" name="newsform" >
							<div class="control-group">
								<label class="control-label" for="focusedInput"> عنوان منو </label>
								<div class="controls">
								  <input class="input-xlarge focused" name="title" id="focusedInput" type="text" placeholder="عنوان منو را در اینجا وارد کنید...">
								</div>
							</div>
                            <div class="control-group">
								<label class="control-label" for="selectError">مربوط به صفحه : </label>
								<div class="controls">
								  <select id="selectError" data-rel="chosen">
									<option>Option 1</option>
									<option>Option 2</option>
									<option>Option 3</option>
									<option>Option 4</option>
									<option>Option 5</option>
								  </select>
								</div>
							 </div>
							<input type="submit" class="btn btn-primary" value="ثبت منو"  />
                            <button type="reset" class="btn">انصراف</button>
						</form>
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

    
					<!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
				
		<hr>

		<div class="modal hide fade" id="myModal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Settings</h3>
			</div>
			<div class="modal-body">
				<p>Here settings can be configured...</p>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal">Close</a>
				<a href="#" class="btn btn-primary">Save changes</a>
			</div>
		</div>

		<footer>
			<p class="pull-left">&copy; <a href="http://usman.it" target="_blank">کلیه حقوق مادی و معنوی وب سایت متعلق به دانشگاه هنر می باشد</a> 2014</p>
			<p class="pull-right">Powered by: <a href="http://usman.it/free-responsive-admin-template">GAMA DEV</a></p>
		</footer>
		
	</div><!--/.fluid-container-->

	<!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->

	<!-- jQuery -->
	<script src="js/jquery-1.7.2.min.js"></script>
	<!-- jQuery UI -->
	<script src="js/jquery-ui-1.8.21.custom.min.js"></script>
	<!-- transition / effect library -->
	<script src="js/bootstrap-transition.js"></script>
	<!-- alert enhancer library -->
	<script src="js/bootstrap-alert.js"></script>
	<!-- modal / dialog library -->
	<script src="js/bootstrap-modal.js"></script>
	<!-- custom dropdown library -->
	<script src="js/bootstrap-dropdown.js"></script>
	<!-- scrolspy library -->
	<script src="js/bootstrap-scrollspy.js"></script>
	<!-- library for creating tabs -->
	<script src="js/bootstrap-tab.js"></script>
	<!-- library for advanced tooltip -->
	<script src="js/bootstrap-tooltip.js"></script>
	<!-- popover effect library ---->
	<script src="js/bootstrap-popover.js"></script>
	<!-- button enhancer library ---->
	<script src="js/bootstrap-button.js"></script>
	<!-- accordion library (optional, not used in demo) ---->
	<script src="js/bootstrap-collapse.js"></script>
	<!-- carousel slideshow library (optional, not used in demo) ---->
	<script src="js/bootstrap-carousel.js"></script>
	<!-- autocomplete library ---->
	<script src="js/bootstrap-typeahead.js"></script>
	<!-- tour library ---->
	<script src="js/bootstrap-tour.js"></script>
	<!-- library for cookie management ---->
	<script src="js/jquery.cookie.js"></script>
	<!-- calander plugin ---->
	<script src='js/fullcalendar.min.js'></script>
	<!-- data table plugin ---->
	<script src='js/jquery.dataTables.min.js'></script>

	<!-- chart libraries start -->
	<script src="js/excanvas.js"></script>
	<script src="js/jquery.flot.min.js"></script>
	<script src="js/jquery.flot.pie.min.js"></script>
	<script src="js/jquery.flot.stack.js"></script>
	<script src="js/jquery.flot.resize.min.js"></script>
	<!-- chart libraries end -->

	<!-- select or dropdown enhancer ---->
	<script src="js/jquery.chosen.min.js"></script>
	<!-- checkbox, radio, and file input styler ---->
	<script src="js/jquery.uniform.min.js"></script>
	<!-- plugin for gallery image view ---->
	<script src="js/jquery.colorbox.min.js"></script>
	<!-- rich text editor library ---->
	<script src="js/jquery.cleditor.min.js"></script>
	<!-- notification plugin ---->
	<script src="js/jquery.noty.js"></script>
	<!-- file manager library ---->
	<script src="js/jquery.elfinder.min.js"></script>
	<!-- star rating plugin ---->
	<script src="js/jquery.raty.min.js"></script>
	<!-- for iOS style toggle switch ---->
	<script src="js/jquery.iphone.toggle.js"></script>
	<!-- autogrowing textarea plugin ---->
	<script src="js/jquery.autogrow-textarea.js"></script>
	<!-- multiple file upload plugin ---->
	<script src="js/jquery.uploadify-3.1.min.js"></script>
	<!-- history.js for cross-browser state change on ajax ---->
	<script src="js/jquery.history.js"></script>
	<!-- application script for Charisma demo -->
	<script src="js/charisma.js"></script>
	
		
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-43924505-1', 'templatehat.com');
  ga('send', 'pageview');

</script>
</body>
</html>
