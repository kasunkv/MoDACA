<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MoDACA | Welcome</title>
    <!-- BOOTSTRAP STYLES-->
    <?php echo $this->Html->css(array('bootstrap', 'font-awesome', 'custom', 'morris-0.4.3.min', 'bootstrap-datetimepicker.min', 'fileinput.min', 'star-rating.min')); ?>
    
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- GOOGLE MAPS API -->
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <!-- SCRIPTS -->
    <?php echo $this->Html->script(array('jquery-1.10.2', 'moment.min', 'bootstrap.min', 'jquery.metisMenu', 'custom', 'morris', 'raphael-2.1.0.min', 'gmaps', 'canvg', 'rgbcolor', 'StackBlur', 'canvas2image', 'script', 'bootstrap-datetimepicker', 'fileinput.min', 'star-rating.min')); ?>
        
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>                
                <?php echo $this->Html->link('MoDACA', array('controller' => 'users', 'action' => 'login'), array(
                    'title' => 'MoDACA',
                    'class' => 'navbar-brand',
                )); ?>
            </div>
            <div style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;">
                <?php //echo $this->fetch('topNavLogout');
                    $user = AuthComponent::user();
                    if (isset($user)) {
                        echo $this->Form->postLink(__('Log Out'),
                            array(
                                'controller' => 'users',
                                'action' => 'logout',                                            
                            ),
                            array(
                                'class' => 'btn btn-primary square-btn-adjust'
                        ));
                    }
                    
                ?>
            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">                    
                    <?php
                        //echo $this->element('sideNavTest');
                        echo $this->fetch('sideNav');
                    ?>
                </ul>
            </div>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">            
                <?php echo $this->fetch('content'); ?>
                
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->


</body>
</html>
