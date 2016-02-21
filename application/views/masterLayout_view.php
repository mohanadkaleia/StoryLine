<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{title}</title>

        <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Droid+Serif|Open+Sans:400,700' rel='stylesheet' type='text/css'>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">    
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/reset.css">
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/time-line.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/navigation.css">
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/event-form.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker3.min.css">
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->


        <!-- jQuery 2.1.4 -->
        <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>         
        <!-- Bootstrap 3.3.5 -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/nav-min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/modernizr.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/velocity.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/morphing-window.js"></script>  
        <script src="<?php echo base_url(); ?>assets/js/contact-form.js"></script>  

    </head>
    <body>
        <header>
            <h1>{pageTitle}</h1>
            <nav class="main-nav">		
		<ul>
                    <li><a href="<?php echo base_url();?>story" class="active"><i class="fa fa-home"></i></a></li>
                    <li><a href="#0" ><i class="fa fa-bookmark-o"></i></a></li>
                    <li><a href="#0" ><i class="fa fa-info"></i></a></li>
                    <li><a href="#0"><i class="fa fa-sign-out"></i></a></li>
		</ul>		
            </nav>
        </header>
        
        <section id="cd-timeline" class="cd-container cd-section">
        {content}
        
        {addEvent}
        </section>
    </body>
</html>