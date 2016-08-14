<!DOCTYPE html>

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Cab Management Admin Login</title>

        <meta name="description" content="">
        <meta name="author" content="">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

        <!-- BEGIN CORE CSS -->
        <link rel="stylesheet" href="{$css_path}admin1.css">
        <link rel="stylesheet" href="{$css_path}elements.css">
        <!-- END CORE CSS -->

        <!-- BEGIN PLUGINS CSS -->
        <link rel="stylesheet" href="{$plugin_path}bootstrap-social/bootstrap-social.css">
        <!-- END PLUGINS CSS -->

        <!-- FIX PLUGINS -->
        <link rel="stylesheet" href="{$css_path}plugins.css">
        <!-- END FIX PLUGINS -->

        <!-- BEGIN SHORTCUT AND TOUCH ICONS -->
        <link rel="shortcut icon" href="{$image_path}icons/favicon.ico">
        <link rel="apple-touch-icon" href="{$image_path}icons/apple-touch-icon.png">
        <!-- END SHORTCUT AND TOUCH ICONS -->
        <script src="{$plugin_path}jquery/dist/jquery.min.js"></script>
        <script src="{$plugin_path}modernizr/modernizr.min.js"></script>
        <script src="{$plugin_path}parsleyjs/dist/parsley.min.js"></script>
    </head>
<body class="bg-lock-screen">
<!-- LOGIN BOX-->
        <div class="lock-screen">
		<div class="user-profile">
			<img src="{$image_path}ajoul.gif" alt="">
			<p>Admin</p>
		</div>
                <form action="" class="form-horizontal form-striped form-bordered" method="post" enctype="multipart/form-data">
		<div class="form-buttons clearfix">
			<div class="form-group pull-left">
				<div class="inputer">
					<div class="input-wrapper">
						<input id="user_password" name="user_password" type="password" class="form-control" placeholder="Enter Password">
					</div>
				</div>
			</div><!--.form-group-->
			<div class="form-group pull-left">
				<button type="submit" class="btn btn-flat" name="lock_login" id="lock_login" value="submit"><i class="fa fa-arrow-circle-right"></i></button>
			</div><!--.form-group-->
		</div><!--.form-buttons-->
                </form>
	</div><!--.lock-screen-->

<!-- LOGIN BOX-->
        <div class="bg-blur dark">
            <div class="overlay"></div><!--.overlay-->
        </div><!--.bg-blur-->

        <svg version="1.1" xmlns='http://www.w3.org/2000/svg'>
    <filter id='blur'>
        <feGaussianBlur stdDeviation='7' />
    </filter>
    </svg>

    <!-- BEGIN GLOBAL AND THEME VENDORS -->
    <script src="{$js_path}global-vendors.js"></script>
    <!-- END GLOBAL AND THEME VENDORS -->

    <!-- BEGIN PLUGINS AREA -->
    <!-- END PLUGINS AREA -->

    <!-- PLUGINS INITIALIZATION AND SETTINGS -->
    <script src="{$js_path}user-pages.js"></script>
    <!-- END PLUGINS INITIALIZATION AND SETTINGS -->

    <!-- PLEASURE Initializer -->
    <script src="{$js_path}pleasure.js"></script>
    <!-- ADMIN 1 Layout Functions -->
    <script src="{$js_path}layout.js"></script>

    <!-- PLUGINS INITIALIZATION AND SETTINGS -->
	
	<script src="{$js_path}forms-validations-parsley.js"></script>
	<!-- END PLUGINS INITIALIZATION AND SETTINGS -->
    
    <!-- BEGIN INITIALIZATION-->
    <script>
        $(document).ready(function () {
            Pleasure.init();
            Layout.init();
            UserPages.login();
            FormsValidationsParsley.init();
        });
    </script>
   
    <!-- END INITIALIZATION-->


</body>
</html>
