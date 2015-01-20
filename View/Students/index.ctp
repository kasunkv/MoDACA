<?php $this->layout = 'defaultLayout'; ?>
<?php
    $this->start('sideNav');
    echo $this->element('studentNav');
    $this->end();
?>
<?php
    $this->start('logout');
    echo $this->element('logoutBtn');
    $this->end();
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
    <div class="col-md-4 col-sm-6 col-xs-6">
        <div class="panel noti-box main-dash-noti-box-bg-blue shadow">            
            <div class="main-dash-noti-box">
                <p class="main-dash-noti-box-title"><?php echo $fieldCommunity['FieldCommunity']['title'] ?></p>
                <p class="">
                    <?php echo $this->Html->link(__('Field Area'),
                        array( 'action' => 'viewFieldCommunity', $fieldCommunity['FieldCommunity']['id'],),
                        array( 'class' => 'main-dash-noti-box-link' ));
                    ?>                    
                </p>
                <span class="icon-bottom-right">
                    <i class="fa fa-location-arrow main-dash-noti-box-fa-color-blue"></i>
                </span>
            </div>
            
        </div>
    </div>
    
    <div class="col-md-4 col-sm-6 col-xs-6">
        <div class="panel noti-box main-dash-noti-box-bg-orange shadow">            
            <div class="main-dash-noti-box">
                <p class="main-dash-noti-box-title"><?php echo $student['FieldGroup']['no_of_members']; ?> Members</p>
                <p class="">
                    <?php echo $this->Html->link(__('in Group'),
                        array( 'action' => 'viewGroupMembers', $student['Student']['field_group_id'],),
                        array( 'class' => 'main-dash-noti-box-link' ));
                    ?>                  
                </p>
                <span class="icon-bottom-right">
                    <i class="fa fa-users main-dash-noti-box-fa-color-orange"></i>
                </span>
            </div>
            
        </div>
    </div>
    
    <div class="col-md-4 col-sm-6 col-xs-6">
        <div class="panel noti-box main-dash-noti-box-bg-red shadow">            
            <div class="main-dash-noti-box">
                <p class="main-dash-noti-box-title">Objective 50%</p>
                <p class="">
                    <?php echo $this->Html->link(__('Completed'),
                        array( 'action' => ''),
                        array( 'class' => 'main-dash-noti-box-link' ));
                    ?>                  
                </p>
                <span class="icon-bottom-right">
                    <i class="fa fa-signal main-dash-noti-box-fa-color-red"></i>
                </span>
            </div>
            
        </div>
    </div>
    
</div>

<hr />

<div class="row">
    
    <div class="col-md-3 col-sm-12 col-xs-12">
        <div class="panel panel-primary text-center no-boder bg-color-green">
            <div class="panel-body">
                <i class="fa fa-bar-chart-o fa-5x"></i>
                <h3>120 GB </h3>
            </div>
            <div class="panel-footer back-footer-black">
               Disk Space Available

            </div>
        </div>
    </div>
    
    <div class="col-md-4 col-sm-12 col-xs-12">           
        <div class="panel ">
          <div class="main-temp-back bg-color-lightblue-1">
            <div class="panel-body">
              <div class="row">
                  <div class="col-xs-6"> <i class="fa fa-comments fa-3x"></i><br /> Unread Lecturer Feedback </div>
                <div class="col-xs-6">
                  <div class="text-temp"> <?php echo $unseen; ?> </div>
                  <a class="notification-link-1" href="/MoDACA/students/allActivity" >Take A Look</a>
                </div>
              </div>
            </div>
          </div>
          
        </div>
    </div>
</div>

<div id="chart-container" class="row">    
    <?php echo var_dump($loggedUser); ?>
</div>