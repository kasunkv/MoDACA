<?php $this->layout = 'defaultLayout'; ?>
<?php
    $this->start('sideNav');
    echo $this->element('adminNav');
    $this->end();
?>
<div class="row">
    <div class="col-md-12">
        <h2>Administrator | Dashboard</h2>
        <h5>Welcome Username</h5>
    </div>
</div>
<!-- /. ROW  -->
<hr />
<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="panel panel-back noti-box">
            <span class="icon-box bg-color-blue-1 set-icon">
                <i class="fa fa-users"></i>
            </span>
            <div class="text-box">
                <p class="main-text">5 Pending</p>
                <p class="text-muted"><a href="admin-approve.html" title="Pending approvals.">Approval</a></p>
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
                <p class="text-muted">Students</p>
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
                <p class="text-muted">Lecturers</p>
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
    <?php  
        $user = AuthComponent::user();
        echo var_dump($user);        
    ?>
    <br />
    <?php echo var_dump($administrator); ?>
    
</div>