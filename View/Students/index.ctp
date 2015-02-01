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

<br /><br />

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <?php echo $this->Session->flash(); ?>    
    </div>    
</div>

<div class="row">
    <div class="col-md-12">
        <div class="dash-box border-dark-blue">  
            <div class="dash-box-header">
                <i class="fa fa-group fa-2x"></i>
                <span class="dash-box-header-text">Field Group</span>            
            </div>
            <div class="col-md-4 col-sm-6 col-xs-6">
                <div class="panel noti-box main-dash-noti-box-bg-blue">            
                    <div class="main-dash-noti-box">
                        <span class="icon-bottom-right">
                            <i class="fa fa-location-arrow main-dash-noti-box-fa-color-blue"></i>
                        </span>
                        <p class="main-dash-noti-box-title"><?php echo $fieldCommunity['FieldCommunity']['title'] ?></p>
                        <p class="">
                            <?php echo $this->Html->link(__('Field Area'),
                                array( 'action' => 'viewFieldCommunity', $fieldCommunity['FieldCommunity']['id'],),
                                array( 'class' => 'main-dash-noti-box-link' ));
                            ?>                    
                        </p>
                    </div>

                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-6">
                <div class="panel noti-box bg-orange">            
                    <div class="main-dash-noti-box">
                        <span class="icon-bottom-right">
                            <i class="fa fa-users main-dash-noti-box-fa-color-orange"></i>
                        </span>
                        <p class="main-dash-noti-box-title"><?php echo $student['FieldGroup']['no_of_members']; ?> Members</p>
                        <p class="">
                            <?php echo $this->Html->link(__('in Group'),
                                array( 'action' => 'viewGroupMembers', $student['Student']['field_group_id'],),
                                array( 'class' => 'main-dash-noti-box-link' ));
                            ?>                  
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-6">
                <div class="panel noti-box main-dash-noti-box-bg-red">            
                    <div class="main-dash-noti-box">
                        <span class="icon-bottom-right">
                            <i class="fa fa-signal main-dash-noti-box-fa-color-red"></i>
                        </span>
                        <p class="main-dash-noti-box-title">Objective 50%</p>
                        <p class="">
                            <?php echo $this->Html->link(__('Completed'),
                                array( 'action' => ''),
                                array( 'class' => 'main-dash-noti-box-link' ));
                            ?>                  
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<br /><br />

<div class="row">
    <div class="col-md-7 col-sm-12 col-xs-12">
        <div class="dash-box border-green">  
            <div class="dash-box-header">
                <i class="fa fa-calendar fa-2x"></i>
                <span class="dash-box-header-text">Community Activities</span>
                <a class="btn-link" href="<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'createActivity')) ?>">
                    <i class="fa fa-plus fa-2x"></i>
                </a>
            </div>
            
            <?php if(empty($activities['count']) || $activities['count'] == 0): ?>
                <p class="text-muted" style="margin-left: 20px; margin-top: -10px;">No Community Activities Created Yet.</p>
            <?php else: ?>
                <!-- Top Row -->
                <div class="row">
                    <!-- Completed Activities -->
                    <div class="col-md-4 col-sm-4 col-xs-4">           
                        <div class="panel ">
                          <div class="main-temp-back bg-color-green">
                            <div class="panel-body">
                              <div class="row">
                                  <div class="text-temp"> <?php echo $activities['completed']; ?> </div>
                                  <a class="notification-link-1" href="<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'allActivity')) ?>" >
                                      <i class="fa fa-thumbs-up fa-2x"></i>
                                  </a>                        
                              </div>
                            </div>
                          </div>

                        </div>
                    </div>

                    <!-- Incomplete Activities -->
                    <div class="col-md-4 col-sm-4 col-xs-4">           
                        <div class="panel ">
                          <div class="main-temp-back bg-color-red">
                            <div class="panel-body">
                              <div class="row">
                                  <div class="text-temp"> <?php echo $activities['uncompleted']; ?> </div>
                                  <a class="notification-link-1" href="<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'allActivity')) ?>" >
                                      <i class="fa fa-thumbs-down fa-2x"></i>
                                  </a>                        
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>

                    <!-- Chart -->
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <center>
                            <div id="activity-progress" style="margin-top: -10px;"></div>
                        </center>
                    </div> 
                </div>  

                <!-- Bottom Row -->
                <div class="row">
                    <!-- Unread Comments -->
                    <div class="col-md-6 col-sm-6 col-xs-6">           
                        <div class="panel ">
                          <div class="main-temp-back bg-color-lightblue-1">
                            <div class="panel-body">
                              <div class="row">
                                <div class="col-xs-12">
                                    <i class="fa fa-comments fa-3x"></i>
                                    <span class="text-temp" style="padding-left: 20px;"> <?php echo $activities['unread_comments']; ?> </span>
                                </div>
                                <div class="col-xs-12">
                                  <a class="notification-link-1" href="<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'allActivity')) ?>" >Unread Feedback</a>
                                </div>
                              </div>
                            </div>
                          </div>          
                        </div>
                    </div>

                    <!-- Evaluated -->
                    <div class="col-md-6 col-sm-6 col-xs-6">           
                        <div class="panel ">
                          <div class="main-temp-back bg-color-lightblue-2">
                            <div class="panel-body">
                              <div class="row">
                                <div class="col-xs-12">
                                    <i class="fa fa-star fa-3x"></i>
                                    <span class="text-temp" style="padding-left: 20px;"> <?php echo $activities['evaluated']; ?> </span>
                                </div>
                                <div class="col-xs-12">
                                  <a class="notification-link-1" href="<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'allActivity')) ?>" >Evaluated</a>
                                </div>
                              </div>
                            </div>
                          </div>          
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    
    <div class="col-md-5 col-sm-12 col-xs-12">
        <div class="dash-box border-dark-red">  
            <div class="dash-box-header">
                <i class="fa fa-line-chart fa-2x"></i>
                <span class="dash-box-header-text">Individual Progress</span>
            </div>
        </div>
    </div>
    
</div>

<div id="chart-container" class="row">    
    <div class="col-md-12">
        <?php //echo var_dump($color); ?>        
    </div>
</div>

<script>
    
    <?php if($activities['count'] != 0): ?>
        <?php
            $colorAry = [
                'Dark Grren' => '#0a870f',
                'Green' => '#16c41e',
                'Yellow' => 'f2c40f',
                'Red' => '#bf3a2b'
                ];
            $color = '#bf3a2b';
            if($activities['percentage'] > 75)
                $color = $colorAry['Dark Grren'];
            else if($activities['percentage'] <= 75 && $activities['percentage'] > 50)
                $color = $colorAry['Grren'];
            else if($activities['percentage'] <= 50 && $activities['percentage'] > 25)
                $color = $colorAry['Yellow'];
            else
                $color = $colorAry['Red'];
                    
        ?>
        var finalScore = new ProgressBar.Circle('#activity-progress', {
            color: '#<?php echo $color; ?>',
            strokeWidth: 4,
            trailWidth: 4,
            duration: 3000,
            text: {
                value: '0',

            },
            step: function(state, bar) {
                bar.setText((bar.value() * 100).toFixed(1) + '%');            
            }
        });

        finalScore.animate(<?php echo $activities['percentage'] / 100; ?>, {
            easing: "bounce",
            },function() {

            }
        );
    <?php endif; ?>
    
</script>
<style>
    .progressbar-text {
        font-size: 2em;
        margin-top: -10px;
    }
</style>