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
<style>
    .main-dash-noti-box-title {
        font-size: 2.5em;
        overflow: none;
        white-space: none;
        height: auto;
    }
</style>
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

<!-- Field Groups -->
<div class="row">
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="dash-box border-dark-blue">  
            <div class="dash-box-header">
                <i class="fa fa-group fa-2x"></i>
                <span class="dash-box-header-text">Field Groups</span>            
            </div>
            <!-- Total Students -->
            <div class="col-md-6 col-sm-6 col-xs-6">           
                <div class="panel ">
                  <div class="main-temp-back bg-color-lightblue-1">
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-xs-12">
                            <i class="fa fa-user fa-3x"></i>
                            <span class="text-temp" style="padding-left: 20px;"> <?php echo $indexData['student_count']; ?> </span>
                        </div>
                        <div class="col-xs-12">
                          <a class="notification-link-1" href="<?php echo $this->Html->url(array('controller' => 'staffs', 'action' => 'searchStudents')) ?>" >Students</a>
                        </div>
                      </div>
                    </div>
                  </div>          
                </div>
            </div>

            <!-- Field Groups -->
            <div class="col-md-6 col-sm-6 col-xs-6">           
                <div class="panel ">
                  <div class="main-temp-back bg-color-lightblue-2">
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-xs-12">
                            <i class="fa fa-users fa-3x"></i>
                            <span class="text-temp" style="padding-left: 20px;"> <?php echo $indexData['group_count']; ?> </span>
                        </div>
                        <div class="col-xs-12">
                          <a class="notification-link-1" href="<?php echo $this->Html->url(array('controller' => 'staffs', 'action' => 'viewFieldGroups')) ?>" >Field Groups</a>
                        </div>
                      </div>
                    </div>
                  </div>          
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="dash-box border-dark-red">  
            <div class="dash-box-header">
                <i class="fa fa-calendar fa-2x"></i>
                <span class="dash-box-header-text">Community Activities</span>            
            </div>
            
            <!-- All Activities -->
            <div class="col-md-3 col-sm-6 col-xs-6">           
                <div class="panel ">
                  <div class="main-temp-back bg-carrot">
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-xs-12">
                            <i class="fa fa-newspaper-o fa-3x"></i>
                            <span class="text-temp" style="padding-left: 20px;"> <?php echo $indexData['event_count']; ?> </span>
                        </div>
                        <div class="col-xs-12">
                          <a class="notification-link-1" href="#" >Total Activities</a>
                        </div>
                      </div>
                    </div>
                  </div>          
                </div>
            </div>
            
            <!-- Completed Events -->
            <div class="col-md-3 col-sm-6 col-xs-6">           
                <div class="panel ">
                  <div class="main-temp-back bg-color-green">
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-xs-12">
                            <i class="fa fa-flag-checkered fa-3x"></i>
                            <span class="text-temp" style="padding-left: 20px;"> <?php echo $indexData['event_completed']; ?> </span>
                        </div>
                        <div class="col-xs-12">
                          <a class="notification-link-1" href="#" >Completed</a>
                        </div>
                      </div>
                    </div>
                  </div>          
                </div>
            </div>
            
            <!-- Commented Activities -->
            <div class="col-md-3 col-sm-6 col-xs-6">           
                <div class="panel ">
                  <div class="main-temp-back bg-peter-river">
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-xs-12">
                            <i class="fa fa-comments fa-3x"></i>
                            <span class="text-temp" style="padding-left: 20px;"> <?php echo $indexData['event_feedback_given']; ?> </span>
                        </div>
                        <div class="col-xs-12">
                          <a class="notification-link-1" href="#" >Feedback Given</a>
                        </div>
                      </div>
                    </div>
                  </div>          
                </div>
            </div>
            
            <!-- Uncomment -->
            <div class="col-md-3 col-sm-6 col-xs-6">           
                <div class="panel ">
                  <div class="main-temp-back bg-wet-asphalt">
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-xs-12">
                            <i class="fa fa-comments-o fa-3x"></i>
                            <span class="text-temp" style="padding-left: 20px;"> <?php echo $indexData['event_feedback_pending']; ?> </span>
                        </div>
                        <div class="col-xs-12">
                          <a class="notification-link-1" href="#" >Pending Feedback</a>
                        </div>
                      </div>
                    </div>
                  </div>          
                </div>
            </div>
            
            <!-- Evaluated -->
            <div class="col-md-3 col-sm-6 col-xs-6">           
                <div class="panel ">
                  <div class="main-temp-back bg-nephritis">
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-xs-12">
                            <i class="fa fa-star fa-3x"></i>
                            <span class="text-temp" style="padding-left: 20px;"> <?php echo $indexData['event_evaluated']; ?> </span>
                        </div>
                        <div class="col-xs-12">
                          <a class="notification-link-1" href="#" >Evaluated</a>
                        </div>
                      </div>
                    </div>
                  </div>          
                </div>
            </div>
            
            <!-- Pending Evaluated -->
            <div class="col-md-3 col-sm-6 col-xs-6">           
                <div class="panel ">
                  <div class="main-temp-back bg-color-red">
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-xs-12">
                            <i class="fa fa-star-o fa-3x"></i>
                            <span class="text-temp" style="padding-left: 20px;"> <?php echo $indexData['event_evaluate_pending']; ?> </span>
                        </div>
                        <div class="col-xs-12">
                          <a class="notification-link-1" href="#" >Pending Eval.</a>
                        </div>
                      </div>
                    </div>
                  </div>          
                </div>
            </div>
            
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?php //var_dump($indexData); ?>
    </div>
</div>