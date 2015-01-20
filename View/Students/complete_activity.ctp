<?php $this->layout = 'defaultLayout'; ?>
<?php
    $this->start('sideNav');
    echo $this->element('studentNav');
    $this->end();
?>

<div class="row">
    <div class="col-md-12">
        <h2><?php echo $student['Student']['first_name'] . " " . $student['Student']['last_name']; ?> | Complete Community Activities</h2>
        <h4 class="page-subheader">Complete the Community Activity by adding the results of the Activity.</h4>
    </div>
</div>
<!-- /. ROW  -->
<hr />
<div class="row">
<!--    <div class="col-md-12 col-sm-12 col-xs-12">
        <?php //echo $this->Session->flash(); ?>    
    </div>    -->
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-warning panel-shadow">
            <div class="panel-heading">
                Initial Activity Details
            </div>
            <div class="panel-body">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div id="event-map" class="shadow" style="height: 400px;"></div>
                    
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <p class="profile-view-heading">Date</p>
                            <p class="profile-view-info">
                                <?php
                                    $tempDate = strtotime($event['Event']['date']);
                                    echo date('Y M d', $tempDate);
                                ?>
                            </p>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <p class="profile-view-heading"">Expected Attendance</p>
                            <p class="profile-view-info"><?php echo $event['Event']['expected_attendance'] ?></p>                            
                        </div> 
                        
                    </div>
                    <br />
                    
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <p class="profile-view-heading">Title</p>
                    <p class="profile-view-info"><?php echo $event['Event']['title'] ?></p>
                    
                    <p class="profile-view-heading">Activity Description</p>
                    <p class="profile-view-bio"><?php echo $event['Event']['description'] ?></p>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-warning panel-shadow">
            <div class="panel-heading">
                Post Activity Details
            </div>
            <div class="panel-body">
                <div class="row">
                    <?php echo $this->Form->create('EventPhoto', array(
                            'inputDefaults' => array(
                                'label' => false,
                            ),            
                            'enctype' => 'multipart/form-data',
                            'type' => 'file',
                        ));
                    ?>
                    <input type="hidden" name="data[EventPhoto][event_id]" value="<?php echo $event['Event']['id'] ?>" />
                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <?php echo $this->Session->flash(); ?>    

                        <h3>Attach photos taken at the Community Event.</h3>                              
                        <div class="form-group input-group-lg">
                            <label>Upload Photos</label>
                            <?php echo $this->Form->file('image.', array('multiple' => true)); ?>
                        </div>
                        <?php 
                            $form_end_options = array(
                                'label' => 'Upload Photos', 
                                'class' => 'btn btn-lg btn-info',                                
                            );
                            echo $this->Form->end($form_end_options);
                        ?>
                    </div>
                </div>                    
                <hr />
                <div class="row">
                    <?php echo $this->Form->create('Event', array(
                            'inputDefaults' => array(
                                'label' => false,
                            )
                        ));
                    ?>
                    <div class="col-md-6 col-sm-12 col-xs-12"                           

                        <!-- Post Event Summary -->
                        <?php 
                            echo $this->Form->input('post_event_summary', array(
                                'class' => 'form-control',
                                'placeholder' => 'Post Event Summary', 
                                'type' => 'textarea',
                                'rows' => '10',                          
                                'div' => array (
                                    'class' => 'form-group'
                                )
                            ));
                        ?>

                        <!-- Participated Attendance -->
                        <?php 
                            echo $this->Form->input('participated_attendance', array(
                                'class' => 'form-control',
                                'placeholder' => 'Participated Attendance', 
                                'type' => 'text',                    
                                'div' => array (
                                    'class' => 'form-group input-group-lg'
                                )
                            ));
                        ?>
                    </div>

                    <div class="col-md-6 col-sm-12 col-xs-12">      
                        <!-- Conclusion -->
                        <?php 
                            echo $this->Form->input('observation', array(
                                'class' => 'form-control',
                                'placeholder' => 'Conclusion', 
                                'type' => 'textarea',
                                'rows' => '10',                          
                                'div' => array (
                                    'class' => 'form-group'
                                )
                            )); 
                        ?>

                        <!-- Hidden -->
                        <input type="hidden" name="data[Event][id]" value="<?php echo $event['Event']['id'] ?>" />
                        <input type="hidden" name="data[Event][field_community_id]" value="<?php echo $event['Event']['field_community_id'] ?>" />
                        <input type="hidden" name="data[Event][field_group_id]" value="<?php echo $event['Event']['field_group_id'] ?>" />
                        <input type="hidden" name="data[Event][title]" value="<?php echo $event['Event']['title'] ?>" />
                        <input type="hidden" name="data[Event][description]" value="<?php echo $event['Event']['description'] ?>" />
                        <input type="hidden" name="data[Event][date]" value="<?php echo $event['Event']['date'] ?>" />
                        <input type="hidden" name="data[Event][expected_attendance]" value="<?php echo $event['Event']['expected_attendance'] ?>" />
                        <input type="hidden" name="data[Event][latitude]" value="<?php echo $event['Event']['latitude'] ?>" />
                        <input type="hidden" name="data[Event][longitude]" value="<?php echo $event['Event']['longitude'] ?>" />

                        <?php 
                            $form_end_options = array(
                                'label' => 'Complete Actvity', 
                                'class' => 'btn btn-lg btn-success',                                
                            );
                            echo $this->Form->end($form_end_options);
                        ?>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <?php //echo var_dump($data['EventPhoto']); ?>
    </div>
</div>

<script>
    
    $("#EventPhotoImage").fileinput({
        showUpload: false,
        showCaption: true,
	showRemove: false,
        allowedFileTypes: ['image']
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