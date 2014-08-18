<?php $this->layout = 'defaultLayout'; ?>
<?php
    $this->start('sideNav');
    echo $this->element('studentNav');
    $this->end();
?>
<div class="row">
    <div class="col-md-12">
        <h2>Student | Dashboard</h2>
        <h5>Welcome Username</h5>
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
                <p class="text-muted">Field Area</p>
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
                  