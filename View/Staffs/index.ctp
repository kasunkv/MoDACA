<?php $this->layout = 'defaultLayout'; ?>
<?php
    $this->start('sideNav');
    echo $this->element('staffNav');
    $this->end();
?>
<?php
    $this->start('logout');
    echo $this->element('logoutBtn');
    $this->end();
?>
<div class="row">
    <div class="col-md-12">
        <h2><?php echo $staff['Staff']['first_name'] . ' ' . $staff['Staff']['last_name']; ?> | Dashboard</h2>
        <h4 class="page-subheader">Welcome to your dashboard <?php echo $staff['Staff']['gender'] == 'Male' ? 'Mr. ' : 'Ms. '; ?> <?php echo $staff['Staff']['first_name'] . ' ' . $staff['Staff']['last_name']; ?></h4>
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
            <span class="icon-box bg-color-blue-1 set-icon">
                <i class="fa fa-users"></i>
            </span>
            <div class="text-box">
                <p class="main-text">4 Groups</p>
                <p class="text-muted">In the Field</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6 col-xs-6">
        <div class="panel panel-back noti-box">
            <span class="icon-box bg-color-blue-2 set-icon">
                <i class="fa    fa-user"></i>
            </span>
            <div class="text-box">
                <p class="main-text">20 Students</p>
                <p class="text-muted">In the Field</p>
            </div>
        </div>
    </div>
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
</div>