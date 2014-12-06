<?php $this->layout = 'defaultLayout'; ?>
<?php
    $this->start('sideNav');
    echo $this->element('adminNav');
    $this->end();
?>
<div class="row">
    <div class="col-md-12">
        <h2><?php echo $administrator['Administrator']['first_name'] . " " . $administrator['Administrator']['last_name'];?> | Admin Dashboard</h2>
        <h5>Welcome <?php echo $administrator['Administrator']['first_name'];?>, to your administrator dashboard. Your attention is needed bellow.</h5>
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
                <p class="main-text"><?php echo count($approvals); ?> Pending</p>
                <p class="text-muted"><a href="#" data-toggle="modal" data-target="#myModal" title="Pending approvals.">Approval</a></p>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Approve User Accounts</h4>
                </div>
                <div class="modal-body">
                    <?php echo $this->Html->link('Approve Students', array('controller' => 'administrators', 'action' => 'approveStudent'), array(
                        'title' => 'Reset forgotten password.',
                        'class' => 'btn btn-info btn-lg btn-block'
                    )); ?>
                    <?php echo $this->Html->link('Approve Lecturers', array('controller' => 'administrators', 'action' => 'approveStaff'), array(
                        'title' => 'Reset forgotten password.',
                        'class' => 'btn btn-info btn-lg btn-block'
                    )); ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="panel panel-back noti-box">
            <span class="icon-box bg-color-blue-2 set-icon">
                <i class="fa fa fa-user"></i>
            </span>
            <div class="text-box">
                <p class="main-text"><?php echo count($students); ?> Total</p>
                <p class="text-muted"><a href="../Students/index" title="Students dashboard">Students</a></p>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="panel panel-back noti-box">
            <span class="icon-box bg-color-blue-3 set-icon">
                <i class="fa fa-pencil"></i>
            </span>
            <div class="text-box">
                <p class="main-text"><?php echo count($lec); ?> Total</p>
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