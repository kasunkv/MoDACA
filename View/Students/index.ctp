<?php $this->layout = 'defaultLayout'; ?>
<?php
    $this->start('sideNav');
    echo $this->element('studentNav');
    $this->end();
?>
<?php
    //$this->start('topNavLogout');
    //echo $this->element('studentTopNav');
//    $this->end();
?>
<div class="row">
    <div class="col-md-12">
        <h2><?php echo $student['Student']['first_name'] . " " . $student['Student']['last_name']; ?> | Dashboard</h2>
        <h4 class="page-subheader">Welcome <?php echo $student['Student']['first_name'] . " " . $student['Student']['last_name']; ?> to your dashboard. Manage your profile tasks here.</h4>
    </div>
</div>
<!-- /. ROW  -->
<hr />
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <?php echo $this->Session->flash(); ?>    
    </div>    
</div>
<div class="row">
    <div class="col-md-4 col-sm-6 col-xs-6">
        <div class="panel panel-back noti-box">
            <span class="icon-box bg-color-blue-3 set-icon">
                <i class="fa fa-location-arrow"></i>
            </span>
            <div class="text-box">
                <p class="main-text">Mihintale</p>
                <p class="text-muted"><a href="#" data-toggle="modal" data-target="#myMapModal" >Field Area</a></p>
            </div>
        </div>
    </div>
    
    <!-- Map View -->
    <div class="modal fade" id="myMapModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Field Area</h4>
                </div>
                <div class="modal-body">                   
                   <iframe src="https://www.google.com/maps/embed/v1/view?key=AIzaSyCLNQUy728sA_6OUDcJqFYhJgdbBaFTnGc&center=8.3500199,80.5090785&zoom=12&maptype=roadmap" width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" style="border: solid 2px white;"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="col-md-4 col-sm-6 col-xs-6">
        <div class="panel panel-back noti-box">
            <span class="icon-box bg-color-blue-1 set-icon">
                <i class="fa fa-users"></i>
            </span>
            <div class="text-box">
                <p class="main-text">5 Members</p>
                <p class="text-muted">In the Group</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6 col-xs-6">
        <div class="panel panel-back noti-box">
            <span class="icon-box bg-color-blue-2 set-icon">
                <i class="fa fa fa-signal"></i>
            </span>
            <div class="text-box">
                <p class="main-text">50%</p>
                <p class="text-muted">Completed</p>
            </div>
        </div>
    </div>                    
</div>
<!-- /. ROW  -->
<hr />
<div class="row">
                  