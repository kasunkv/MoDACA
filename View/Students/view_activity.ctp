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
        <h2><?php echo $student['Student']['first_name'] . " " . $student['Student']['last_name']; ?> | Community Activities</h2>
        <h4 class="page-subheader">View details about the completed Community Activity.</h4>
    </div>
</div>
<!-- /. ROW  -->
<hr />

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-success panel-shadow">
            <div class="panel-heading">
                Community Activity Details
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div id="event-map" class="shadow" style="height: 400px;"></div>                        
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <p class="profile-view-heading">Expected Attendance</p>
                                <h1 style="margin-bottom: -16px;"><?php echo $event['Event']['expected_attendance'] ?></h1>                            
                            </div> 
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <p class="profile-view-heading">Participated Attendance</p>
                                <h1 style="margin-bottom: -16px;"><?php echo $event['Event']['participated_attendance'] ?></h1>                            
                            </div> 
                        </div>
                        <br />

                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <p class="profile-view-heading">Title</p>
                        <h1 style="margin-bottom: -16px;"><?php echo $event['Event']['title'] ?></h1>
                        <p style="font-weight: bolder; margin-top: -20px;">
                            <?php
                                $tempDate = strtotime($event['Event']['date']);
                                echo date('Y M d', $tempDate);
                            ?>
                        </p>
                        <p class="profile-view-heading">Activity Description</p>
                        <p class="profile-view-bio"><?php echo $event['Event']['description'] ?></p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <p class="profile-view-heading">Post Event Summary</p>
                        <p class="profile-view-bio"><?php echo $event['Event']['post_event_summary'] ?></p>                            
                    </div> 
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <p class="profile-view-heading">Conclusion</p>
                        <p class="profile-view-bio"><?php echo $event['Event']['observation'] ?></p>                            
                    </div> 
                </div>
                <hr />
                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <h3>Photographs at the Community Activity</h3>
                        <?php $ctr = 0; ?>
                        <?php foreach($event['EventPhoto'] as $photo): ?>
                            <div class="col-xs-6 col-md-4">
                                <a href="#" class="thumbnail"  data-toggle="modal" data-target="#myModal<?php echo $ctr; ?>">
                                    <img src="/MoDACA/uploads/event_photos/<?php echo $photo['image'] ?>" alt="...">
                                </a>
                            </div>           
                            <!-- IMAGE MODAL -->
                            <div class="modal fade" id="myModal<?php echo $ctr; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button> 
                                            <h3 style="margin: -5px 5px;"><?php echo $event['Event']['title'] ?></h3>
                                        </div>
                                        <div class="modal-body">
                                            <img class="img-responsive" src="/MoDACA/uploads/event_photos/<?php echo $photo['image'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $ctr++; ?>
                        <?php endforeach; ?>        
                    </div>
                    
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <br />
                        <h5><strong>Community Member Participation</strong></h5>
                        <div class="progress progress-striped active">
                            <?php 
                                $exp = intval($event['Event']['expected_attendance']);
                                $par = intval($event['Event']['participated_attendance']);
                                
                                $presentage = round(($par / $exp) * 100, 2);
                                $class = '';
                                if($presentage < 50)
                                    $class = 'danger';
                                elseif($presentage >= 50 && $presentage < 80)
                                    $class = 'warning';
                                else
                                    $class = 'success';
                            ?>
                            <div class="progress-bar progress-bar-<?php echo $class ?>" role="progressbar" aria-valuenow="<?php echo $presentage; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $presentage; ?>%">
                                <?php echo $presentage; ?> %
                                <span class="sr-only"><?php echo $presentage; ?> % Participation</span>
                            </div>                            
                        </div>
                        <p class="text-muted" style="margin-top: -35px;"><?php echo $presentage; ?> % Participation</p>
                        
                        <h3>Lecturer's Rating</h3>
                        <?php if(empty($event['Score'])): ?>
                            <p class="text-muted" style="margin-top: -25px;">Not Rated Yet.</p>
                        <?php else: ?>
                            <?php 
                                echo $this->Form->input('', array(
                                    'class' => 'rating',
                                    'id' => 'ScoreMark',
                                    'type' => 'number',
                                    'readonly' => 'readonly',
                                    'min' => 0,
                                    'max' => 100,
                                    'step' => 1,
                                    'data-size' => 'md',
                                    'value' => $event['Score']['mark'],
                                    'div' => array (
                                        'class' => 'form-group input-group-lg',
                                        'style' => 'margin-top: -25px;',
                                    )
                                ));
                            ?>
                        <?php endif; ?>
                    </div>
                </div>
                
                <hr />
                
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <h3>Lecturer's Feedback</h3>                        
                        <h4 class="page-subheader">Feedback from your lecturers to improve your community activities.</h4>
                        <br />
                        
                        <!-- FEEDBACK BOX -->
                        <div class="chat-panel panel panel-info chat-boder chat-panel-head panel-shadow">
                            <div class="panel-heading">
                                <i class="fa fa-comments fa-fw"></i>
                                Activity Feedback
                            </div>

                            <div class="panel-body">
                                <ul class="chat-box">
                                    <?php if(empty($eventFeedbacks)): ?>
                                        <p class="text-muted">No Feedback Given Yet.</p>
                                    <?php else: ?>
                                        <?php foreach ($eventFeedbacks as $feedback): ?>
                                            <li class="left clearfix" style="padding: 15px 0px; /*border-radius: 10px;*/">
                                                <span class="chat-img pull-left">
                                                    <?php 
                                                        if(!empty($feedback['Staff']['profile_photo'])) {
                                                            echo $this->Html->image('../uploads/staffs/'. $feedback['Staff']['profile_photo'], array(
                                                                'alt' => 'Lecturer',
                                                                'class' => 'img-circle panel-shadow feedback-user-image',
                                                                'height' => 60,
                                                                'width' => 60,
                                                                )
                                                            ); 
                                                        } else {
                                                            echo $this->Html->image('../uploads/default_user.png', array(
                                                                'alt' => 'Lecturer',
                                                                'class' => 'img-circle panel-shadow feedback-user-image',
                                                                'height' => 60,
                                                                'width' => 60,
                                                                )
                                                            );
                                                        }
                                                    ?>
                                                </span>
                                                <div class="chat-body">                                        
                                                        <strong><?php echo $feedback['Staff']['first_name'] . ' ' .$feedback['Staff']['last_name']; ?></strong>
                                                        <small class="pull-right text-muted">
                                                            <i class="fa fa-clock-o fa-fw"></i><?php echo $feedback['EventFeedback']['created'] ?>
                                                        </small>                                      
                                                    <p><?php echo $feedback['EventFeedback']['comment']; ?></p>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </ul>
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
        <?php 
            //echo var_dump($event);
        ?>
    </div>
</div>

<script>
    $("#ScoreMark").rating({
        starCaptions: function (val) {
            return val + '/100';
        },
        starCaptionClasses : function (val) {
            if(val < 20) {
                return 'label label-red';
            } else if(val >= 20 && val < 40) {
                return 'label label-orange';
            } else if(val >= 40 && val < 60) {
                return 'label label-yellow';
            } else if(val >= 60 && val < 80) {
                return 'label label-light-green';
            } else {
                return 'label label-green';
            }
        }
    });
    
 
   // google map
    map = new GMaps({
        el: '#event-map',
        zoom: 18,
        lat: <?php echo $event['Event']['latitude'] ?>,
        lng: <?php echo $event['Event']['longitude'] ?>,
        mapTypeControlOptions: {
          mapTypeIds : ["hybrid", "roadmap", "satellite", "terrain"]
        },
        rotateControl: false,
        streetViewControl: false,
        panControl: true,
        overviewMapControl: false,
        zoomControl: true,
        mapTypeControl: true
        
    });  
    
    map.addMarker({
        lat: <?php echo $event['Event']['latitude'] ?>,
        lng: <?php echo $event['Event']['longitude'] ?>        
     });
    
    map.setMapTypeId('hybrid');
</script>