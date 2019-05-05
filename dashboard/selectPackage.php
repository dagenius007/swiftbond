<?php
	require("auth.php");
	if($_SESSION['package']!="")
	{
		header("Location:index.php");
		exit;
	}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Select Package | MoneyMinds</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet">
<!-- jQuery -->
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<!-- chart -->
<script src="js/Chart.js"></script>
<!-- //chart -->
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!----webfonts--->
<link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<!---//webfonts--->
 <!-- Meters graphs -->
<script src="js/jquery-1.10.2.min.js"></script>
<!-- Placed js at the end of the document so the pages load faster -->

</head>

 <body class="sticky-header left-side-collapsed"  onload="initMap()">
    <section>
    <!-- left side start-->
		<div class="left-side sticky-left-side">

			<!--logo and iconic logo start-->
			<div class="logo">
				<h1><a href="index.html">Money Minds</a></h1>
			</div>
			<div class="logo-icon text-center">
				<a href="index.html"><i class="lnr lnr-home"></i> </a>
			</div>

<style type="text/css">
	.pricing-table {
  border-left: 1px solid #e7edee; }
  .pricing-table > .pricing-heading {
    border-bottom: 2px solid #29c75f;
    padding: 20px;
    text-align: center; }
    .pricing-table > .pricing-heading > .title {
      background-color: rgba(41, 199, 95, 0.9);
      color: #FFF;
      width: auto;
      margin: 0 auto;
      border-radius: 3px;
      padding: 2px 5px;
      display: inline-block;
      font-size: 0.9em;
      font-weight: 400; }
    .pricing-table > .pricing-heading > .price > .title {
      font-size: 4em;
      text-transform: uppercase;
      font-weight: 200; }
      .pricing-table > .pricing-heading > .price > .title .sign {
        font-size: 0.3em;
        color: #8d9293; }
    .pricing-table > .pricing-heading > .price > .subtitle {
      margin-top: -10px;
      font-size: 0.8em;
      font-weight: 400; }
  .pricing-table > .pricing-body {
    padding: 20px;
    color: #666; }
    .pricing-table > .pricing-body ul.description {
      list-style: none;
      padding: 0;
      margin: 0; }
      .pricing-table > .pricing-body ul.description > li {
        padding: 15px 0px;
        text-align: center;
        margin: 0;
        border-bottom: 1px solid #e7edee; }
        .pricing-table > .pricing-body ul.description > li .icon {
          float: left;
          min-width: 25px;
          text-align: center;
          margin-right: 8px; }
      .pricing-table > .pricing-body ul.description > li:last-child {
        border-bottom: 0; }
  .pricing-table > .pricing-footer {
    border-top: 2px solid #e7edee;
    text-align: center;
    padding: 15px; }
    .pricing-table > .pricing-footer .btn-default {
      text-transform: uppercase;
      font-weight: 400;
      color: #666; }
    .pricing-table > .pricing-footer .btn-success {
      color: #FFF; }
  .pricing-table.highlight {
    background-color: #2d9950; }
    .pricing-table.highlight > .pricing-heading {
      border-bottom: 2px solid #18aa4a;
      color: #FFF; }
      .pricing-table.highlight > .pricing-heading > .title {
        background-color: rgba(255, 255, 255, 0.9);
        color: #18aa4a; }
      .pricing-table.highlight > .pricing-heading > .price {
        color: #FFF; }
        .pricing-table.highlight > .pricing-heading > .price .sign {
          color: #FFF; }
    .pricing-table.highlight > .pricing-footer {
      border-top: 2px solid #18aa4a; }
      .pricing-table.highlight > .pricing-footer .btn-default {
        border-color: #18aa4a;
        color: #18aa4a; }
    .pricing-table.highlight > .pricing-body {
      color: #FFF; }
      .pricing-table.highlight > .pricing-body ul.description > li {
        border-bottom: 1px solid rgba(255, 255, 255, 0.2); }
      .pricing-table.highlight > .pricing-body ul.description > li:last-child {
        border-bottom: 0; }

.panel {
  margin-bottom: 30px;
  border-radius: 3px;
  border-bottom-width: 1px;
  background-color: #FFF;
  border-color: #dfe6e8; }
  .panel .panel-heading {
    padding: 20px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    background-color: #e7edee; }
  .panel .panel-body {
    padding: 20px; }

.panel.panel-primary {
  border-color: #42b4f2;
  background-color: #FFF; }
  .panel.panel-primary .panel-heading {
    background-color: #86cff7;
    border-bottom-color: #42b4f2;
    color: #043D5D; }

.panel.panel-success {
  border-color: #9df0b9;
  background-color: #FFF; }
  .panel.panel-success .panel-heading {
    background-color: #bafed1;
    border-bottom-color: #9df0b9;
    color: #18aa4a; }

.panel.panel-info {
  border-color: #93e5f3;
  background-color: #FFF; }
  .panel.panel-info .panel-heading {
    background-color: #c3f0f7;
    border-bottom-color: #93e5f3;
    color: #20a3b9; }

.panel.panel-warning {
  border-color: #fbd490;
  background-color: #FFF; }
  .panel.panel-warning .panel-heading {
    background-color: #ffe5b6;
    border-bottom-color: #fbd490;
    color: #e9aa3a; }

.panel.panel-danger {
  border-color: #f3b1ab;
  background-color: #FFF; }
  .panel.panel-danger .panel-heading {
    background-color: #fdc3bd;
    border-bottom-color: #f3b1ab;
    color: #d73727; }

.dataTables_wrapper {
  border-radius: 2px;
  overflow: hidden;
  position: static !important; }
  .dataTables_wrapper .top {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: row;
        flex-direction: row;
    -ms-flex-wrap: nowrap;
        flex-wrap: nowrap;
    -ms-flex-align: start;
        align-items: flex-start;
    -ms-flex-pack: start;
        justify-content: flex-start;
    position: absolute;
    right: 0;
    top: 0;
    padding: 20px;
    padding-right: 45px; }
    .dataTables_wrapper .top .dataTables_filter {
      width: 100%;
      -ms-flex: 1;
          flex: 1;
      margin-right: 10px; }
      .dataTables_wrapper .top .dataTables_filter label {
        width: 100%;
        display: block;
        font-weight: normal;
        margin-bottom: 0; }
      .dataTables_wrapper .top .dataTables_filter .form-control {
        width: 100%;
        min-width: 200px;
        margin-left: 0;
        color: #8d9293;
        margin-bottom: 0;
        padding: 10px 15px;
        height: 40px;
        border-radius: 20px;
        background-color: transparent; }
    .dataTables_wrapper .top .dataTables_length label {
      width: 100px;
      display: block;
      font-weight: normal;
      margin-bottom: 0; }
    .dataTables_wrapper .top .dataTables_length select {
      width: 100%;
      height: 40px; }
    .dataTables_wrapper .top .dataTables_length .select2 {
      width: 100px !important; }
      .dataTables_wrapper .top .dataTables_length .select2 span.select2-selection {
        border: 1px solid #c8d1d3;
        border-radius: 0;
        border-top-right-radius: 2px;
        border-bottom-right-radius: 2px;
        height: 43px;
        background-color: transparent; }
      .dataTables_wrapper .top .dataTables_length .select2 .select2-selection__rendered {
        color: #888;
        line-height: 43px;
        padding-left: 15px; }
      .dataTables_wrapper .top .dataTables_length .select2 .select2-selection__arrow {
        height: 46px;
        right: 5px; }
      .dataTables_wrapper .top .dataTables_length .select2 .select2-selection__single .select2-selection__arrow b {
        margin-top: 0;
        transform: translate(0, -50%); }
  .dataTables_wrapper .top::after, .dataTables_wrapper .bottom::after {
    content: '';
    position: relative;
    clear: both;
    display: block; }
  .dataTables_wrapper .bottom {
    border-top: 2px solid #dfe6e8;
    padding: 20px 30px;
    font-size: 14px; }
    .dataTables_wrapper .bottom .dataTables_info {
      float: left;
      color: #8d9293; }
    .dataTables_wrapper .bottom .dataTables_paginate {
      float: right; }
      .dataTables_wrapper .bottom .dataTables_paginate .pagination {
        display: block; }
  .dataTables_wrapper table.dataTable {
    margin-top: 0 !important;
    margin-bottom: 0 !important; }
    .dataTables_wrapper table.dataTable > thead > tr > th {
      background-color: #FFF; }
</style>


			<!--logo and iconic logo end-->
			<div class="left-side-inner">


			</div>
		</div>
		<!-- left side end-->

		<!-- main content start-->
		<div class="main-content">
			<!-- header-starts -->
			<div class="header-section">

			<!--toggle button start-->
			<a class="toggle-btn  menu-collapsed"><i class="fa fa-bars"></i></a>
			<!--toggle button end-->

		<?php include('nm.ext');?>
			</div>
		<!-- //header-ends -->
			<div id="page-wrapper">
				<div class="graphs">
					<div class="col_3">

					<h2 style="font-weight: lighter;">Select a package</h2><br><br>
						<div class="row">
    <div class="col-xs-12">
      <div class="card">
  <div class="card-body no-padding">
    <div class="row no-gap">
      <div class="col-md-3 col-sm-6">
        <div class="pricing-table no-border-left">
          <div class="pricing-heading">
            <div class="title">STARTER </div>
            <div class="price">
              <div class="title">5k<span class="sign">₦</span></div>
              <div class="subtitle">per donation</div>
            </div>
          </div>
          <div class="pricing-body">
            <ul class="description">
              <li><i class="icon ion-ios-lightbulb"></i> 1 <span class="small">Upline</span></li>
              <li><i class="icon ion-person-stalker"></i> 2 <span class="small">Downlines</span></li>
              <li><i class="icon ion-ios-chatboxes-outline"></i> ₦10,000  <span class="small">Cashback</span></li>
            </ul>
          </div>
          <div class="pricing-footer">
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal1">Select</button>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="pricing-table highlight">
          <div class="pricing-heading">
            <div class="title">SILVER</div>
            <div class="price">
              <div class="title">10k<span class="sign">₦</span></div>
              <div class="subtitle">per donation</div>
            </div>
          </div>
          <div class="pricing-body">
            <ul class="description">
              <li><i class="icon ion-ios-lightbulb"></i> 1 <span class="small">Upline</span></li>
              <li><i class="icon ion-person-stalker"></i> 2 <span class="small">Downlines</span></li>
              <li><i class="icon ion-ios-chatboxes-outline"></i> ₦20,000  <span class="small">Cashback</span></li>
            </ul>
          </div>
          <div class="pricing-footer">
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal2">Select</button>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="pricing-table">
          <div class="pricing-heading">
            <div class="title">GOLD</div>
            <div class="price">
              <div class="title">20k<span class="sign">₦</span></div>
              <div class="subtitle">per donation</div>
            </div>
          </div>
          <div class="pricing-body">
            <ul class="description">
             <li><i class="icon ion-ios-lightbulb"></i> 1 <span class="small">Upline</span></li>
              <li><i class="icon ion-person-stalker"></i> 2 <span class="small">Downlines</span></li>
              <li><i class="icon ion-ios-chatboxes-outline"></i> ₦40,000  <span class="small">Cashback</span> <span style="color:#2bbacf"> + ₦5,000 Bonus</span></li>
            </ul>
          </div>
          <div class="pricing-footer">
            <button type="button" class="btn btn-default " data-toggle="modal" data-target="#myModal3">SELECT</button>
          </div>
        </div>
      </div>


		<!-- //switches -->

		</div>
				</div>
			<!--body wrapper start-->
			</div>
			 <!--body wrapper end-->
		</div>
        <!--footer section start-->
			<footer>
			   <p>&copy 2017 MoneyGrabs. All Rights Reserved</p>
			</footer>
        <!--footer section end-->

      <!-- main content end-->
   </section>

   <div class="card-body">
          <div class="row">
  <div class="col-sm-12">

    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Confirm Selection</h4>
          </div>
          <div class="modal-body" style="font-size: 18px;font-family: calibri;">
            <p>You have selected the Starter Package. The starter package requires you to donate ₦5,000 to someone you will be matched to, and two other people will be matched to you to pay you ₦5,000 each, making a total of ₦10,000.<br>Are you sure you want to proceed?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
            <a type="button" class="btn btn-sm btn-success" href="authPackage.php?package=5k">Select Package</a>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Confirm Selection</h4>
          </div>
          <div class="modal-body" style="font-size: 18px;font-family: calibri;">
            <p>You have selected the Silver Package. The silver package requires you to donate ₦10,000 to someone you will be matched to, and two other people will be matched to you to pay you ₦10,000 each, making a total of ₦20,000.<br>Are you sure you want to proceed?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
            <a type="button" class="btn btn-sm btn-success" href="authPackage.php?package=10k">Select Package</a>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Confirm Selection</h4>
          </div>
          <div class="modal-body" style="font-size: 18px;font-family: calibri;">
            <p>You have selected the Gold Package. The Gold package requires you to donate ₦20,000 to someone you will be matched to, and two other people will be matched to you to pay you ₦20,000 each, making a total of ₦40,000.<br>Are you sure you want to proceed?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
            <a type="button" class="btn btn-sm btn-success" href="authPackage.php?package=20k">Select Package</a>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Confirm Selection</h4>
          </div>
          <div class="modal-body" style="font-size: 18px;font-family: calibri;">
            <p>You have selected the Ultimate Package. The ultimate package requires you to donate ₦100,000 to someone you will be matched to, and two other people will be matched to you to pay you ₦100,000 each, making a total of ₦200,000.<br>Are you sure you want to proceed?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
            <a type="button" class="btn btn-sm btn-success" href="authPackage.php?package=100k">Select Package</a>
          </div>
        </div>
      </div>
    </div>

 <div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Confirm Selection</h4>
          </div>
          <div class="modal-body" style="font-size: 18px;font-family: calibri;">
            <p>You have selected the Platinum Package. The ultimate package requires you to donate ₦200,000 to someone you will be matched to, and two other people will be matched to you to pay you ₦200,000 each, making a total of ₦400,000.<br>Are you sure you want to proceed?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
            <a type="button" class="btn btn-sm btn-success" href="authPackage.php?package=200k">Select Package</a>
          </div>
        </div>
      </div>
    </div>

    </div>
  </div>
</div>
        </div>

<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
</body>
</html>
