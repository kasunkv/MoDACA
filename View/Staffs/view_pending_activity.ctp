<?php $this->layout = 'defaultLayout'; ?>
<?php
    $this->start('sideNav');
    echo $this->element('staffNav');
    $this->end();
?>

<div class="row">
    <div class="col-md-12">
        <h2><?php echo $event['FieldGroup']['name']; ?> | <?php echo $event['Event']['title']; ?></h2>
        <h4 class="page-subheader">Provide Feedback to Improve Pending Community Activity.</h4>
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
                <hr />
                <div class="row" id="feedback-area">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <h3>Feedback</h3>                        
                        <h4 class="page-subheader">Evaluate the current details of the Community Activity and provide Feedback to improve the Activity.</h4>
                        <br />
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <?php echo $this->Session->flash(); ?>    
                            </div>    
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-12 col-xs-12">
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
                    <div class="col-md-5 col-sm-12 col-xs-12">
                        <div class="col-md-12">                                
                            <h4>Your Feedback</h4>
                            <?php echo $this->Form->create('EventFeedback', array(
                                'inputDefaults' => array(
                                    'label' => false,
                                ),
                            ));
                            ?>
                            <!-- Address -->
                            <?php 
                                echo $this->Form->input('comment', array(
                                    'class' => 'form-control',
                                    'placeholder' => 'Your feedback here...', 
                                    'type' => 'textarea',
                                    'rows' => '6',                          
                                    'div' => array (
                                        'class' => 'form-group'
                                    )
                                ));
                            ?>    
                            <input type="hidden" name="data[EventFeedback][event_id]" value="<?php echo $event['Event']['id'] ?>" />
                            <input type="hidden" name="data[EventFeedback][staff_id]" value="<?php echo $staff['Staff']['id'] ?>" />
                            <?php 
                                $form_end_options = array(
                                    'label' => 'Submit Feedback', 
                                    'class' => 'btn btn-md btn-primary',                                
                                );
                                echo $this->Form->end($form_end_options);
                            ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

<div class="row">
    <?php //echo var_dump($student); ?>
</div>

<script>
    
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