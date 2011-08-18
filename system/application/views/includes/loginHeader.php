<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!-- GLOBAL CSS and Javascript -->
	    <link href="http://du.edu/display/css/global/global.css" rel="stylesheet" type="text/css" media="screen" />
		<!--[if IE 6]> -->
			<!--<link href="http://du.edu/display/css/global/ie6.css" rel="stylesheet" type="text/css" media="screen" />-->
            <!--This attaches to a certain stlye sheet specifically for internet explorer 6-->
		<!--[endif]-->
		<script src="http://du.edu/display/scripts/global/title.js" type="text/javascript"></script>
	    <link href="http://www.du.edu/common/images/favicon.ico" rel="Shortcut Icon" type="image/x-icon" />
	<!-- Template CSS -->
    <!--Please do not edit this section-->
		<!--[if IE 6]>
		    <link href="css/ie6.css" rel="stylesheet" type="text/css" media="screen" /> 
		<![endif]-->
	<!--end non-editable section-->
		<script src="<?php echo base_url();?>js/jquery-1.2.6.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>js/jquery.validate.pack.js" type="text/javascript"></script>
		<link href="<?php echo base_url();?>css/style.css" rel="stylesheet" type="text/css" media="screen" /> 
		<script type="text/javascript">
			// places the cursor on the username field of the login form / validates required fields
			$(document).ready(function() {
				$("#username").focus();
				$("#login").validate({
					rules: {
						uname: "required",
						pcode: "required"
						},
					messages: {
						uname: "required",
						pcode: "required"	
					}
				});
			});
		</script>
		<title>University of Denver | Records Management</title>
    <!--To set the title to your webpage, edit this line above-->
</head>
<!--end header section-->
<body class="red three">

<!--this is where the structure is chosen, this page is set to "white two" as can be seen above-->

<div class="skipnav"><a href="#content">Skip Navigation</a></div>
<div id="main-wrapper">
<!-- global-header -->
<!--please do not edit the standard global header on all du pages-->
	<div id="global-header">
		<div id="global-inside-header">
		    <h1><a href="http://www.du.edu/" title="University of Denver">University of Denver</a></h1>
			<!-- begin du google search -->
            <!--Do not edit this section-->
				<div id="global-search">
					<form name="g2006search" action="http://search1.du.edu/search" method="get">
						<input type="hidden" name="site" value="du_collection" />
						<input type="hidden" name="client" value="du_frontend" />
						<input type="hidden" name="proxystylesheet" value="du_frontend" />
						<input type="hidden" name="output" value="xml_no_dtd" />
						<input type="hidden" name="lr" value="" />
						<input type="hidden" name="ie" value="utf8" />
						<input type="hidden" name="oe" value="utf8" />
						<p>
							<input id="global-searchInput" class="searchinput" type="text" value="Search DU" name="q" onclick="document.g2006search.q.value = ''" maxlength="255" />
							<!--<input id="global-searchBtn" class="search-button" type="image" name="btnG" value="Search" />-->
							<button value="Search" type="submit" name="btnG" id="global-searchBtn">Go!</button>
						</p>
					</form>
				</div>
			<!-- end general du google search 2006_2007 -->
			<ul id="global-header-nav">
				<li id="global-nav_news"><a href="http://www.du.edu/today/">News</a></li>
				<li id="global-nav_events"><a href="http://www.du.edu/calendar/">Calendar</a></li>
				<li id="global-nav_directory"><a href="http://www.du.edu/Directory/servlet/DirectoryServlet">Directory</a></li>
				<li id="global-nav_az"><a href="http://www.du.edu/az/">A-Z Directory</a></li>
			</ul>
		</div>
	</div>
<!-- end global-header -->

<div id="inner-wrapper">
<div id="content-wrapper">
	<div id="masthead"><div class="header"></div></div>
	<div class="bottom-border"></div>