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
        <h4 class="page-subheader">Welcome <?php echo $student['Student']['first_name']; ?> to your dashboard. Manage your profile tasks here.</h4>
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
    <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="panel panel-back noti-box">
            <span class="icon-box bg-color-blue-3 set-icon">
                <i class="fa fa-location-arrow"></i>
            </span>
            <div class="text-box">
                <p class="main-text"><?php echo $fieldCommunity['FieldCommunity']['title'] ?></p>
                <p class="text-muted">
                    <?php echo $this->Html->link(__('Field Area'),
                        array( 'action' => 'viewFieldCommunity', $fieldCommunity['FieldCommunity']['id'],),
                        array( 'class' => '' ));
                    ?>                    
                </p>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="panel panel-back noti-box">
            <span class="icon-box bg-color-blue-1 set-icon">
                <i class="fa fa-users"></i>
            </span>
            <div class="text-box">
                <p class="main-text" style="font-size: 1.3em;"><?php echo $student['FieldGroup']['no_of_members']; ?> Members</p>
                <p class="text-muted">
                    <?php echo $this->Html->link(__('in Group'),
                        array( 'action' => 'viewGroupMembers', $student['Student']['field_group_id'],),
                        array( 'class' => '' ));
                    ?>
                </p>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="panel panel-back noti-box">
            <span class="icon-box bg-color-blue-2 set-icon">
                <i class="fa fa fa-group"></i>
            </span>
            <div class="text-box">
                <p class="main-text"><?php echo $student['FieldGroup']['name']; ?></p>
                <p class="text-muted">
                     <?php echo $this->Html->link(__('Field Group'),
                        array( 'action' => 'viewFieldGroup'),
                        array( 'class' => '' ));
                    ?>
                </p>
            </div>
        </div>

    </div>   
    
    <div class="col-md-3 col-sm-6 col-xs-6">
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
<div id="chart-container" class="row">    

</div>
                  