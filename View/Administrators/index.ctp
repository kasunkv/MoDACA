<?php $this->layout = 'defaultLayout'; ?>
<?php
    $this->start('sideNav');
    echo $this->element('adminNav');
    $this->end();
?>
<div class="row">
    <div class="col-md-12">
        <h2>Administrator | Dashboard</h2>
        <h5>Welcome <?php echo $administrator['Administrator']['first_name'];?></h5>
    </div>
</div>
<!-- /. ROW  -->
<hr />
<div class="row">    
    <div class="col-md-12">
        <?php echo $this->Session->flash(); ?>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="panel panel-back noti-box">
            <span class="icon-box bg-color-blue-1 set-icon">
                <i class="fa fa-users"></i>
            </span>
            <div class="text-box">
                <p class="main-text">5 Pending</p>
                <p class="text-muted"><a href="approveRegistration" title="Pending approvals.">Approval</a></p>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="panel panel-back noti-box">
            <span class="icon-box bg-color-blue-2 set-icon">
                <i class="fa fa fa-user"></i>
            </span>
            <div class="text-box">
                <p class="main-text">20 Total</p>
                <p class="text-muted"><a href="../Students/index" title="Students dashboard">Students</a></p>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="panel panel-back noti-box">
            <span class="icon-box bg-color-blue-3 set-icon">
                <i class="fa fa-location-arrow"></i>
            </span>
            <div class="text-box">
                <p class="main-text">5 Total</p>
                <p class="text-muted"><a href="../Staffs/index" title="Staffs dashboard">Lecturers</a></p>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-6">
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

</div>