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
        <h2>Field Visits</h2>
        <h4 class="page-subheader">Add Field Visits you plan on to the Event Calender. It will notify you when Field Visits are coming up and help you with keeping track of your Groups Attendance.</h4>
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
    <div class="col-md-12">       
        <div class="col-md-6 col-sm-12 col-xs-12">
            <h3>Plan Field Visit</h3>
            <br />
            <div class="panel panel-default panel-shadow">
                <div class="panel-heading">
                    Field Visit Details
                </div>
                <div class="panel-body" >
                    
                        <?php echo $this->Form->create('FieldVisit', array(
                            'inputDefaults' => array(
                                //'label' => false,
                            ),
                        ));
                        ?>
                        <div class="multiple-input-wrapper">
                            <div class="multi-item-wrapper">
                                <input type="hidden" name="data[0][FieldVisit][field_group_id]" value="<?php echo $student['FieldGroup']['id']; ?>" />
                                <input type="hidden" name="data[0][FieldVisit][field_community_id]" value="<?php echo $student['FieldGroup']['field_community_id']; ?>" />                                
                                <div class="form-group">
                                    <textarea name="data[0][FieldVisit][main_objective]" class="form-control" placeholder="Main Objective..." rows="3" cols="30" id="SpecificObjectiveObjective1"></textarea>
                                </div>                                
                                <div class="form-group">
                                    <textarea name="data[0][FieldVisit][other_objective]" class="form-control" placeholder="Other Objectives (optional)" rows="3" cols="30" id="SpecificObjectiveObjective1"></textarea>
                                </div> 
                                <div class="form-group input-group-lg">
                                    <input name="data[0][FieldVisit][date]" data-date-format="YYYY-MM-DD" class="form-control custom-date" placeholder="YYYY-MM-DD" type="text">                                
                                </div>                                
                                <div class="form-add-more">
                                    <button class="btn btn-success btn-sm" id="btn-add-field" style="margin-left: 10px;">
                                        <i class="fa fa-plus"></i> Add More...
                                    </button>
                                    <hr />
                                </div>
                            </div>                             
                        </div>                                              
                        <?php 
                            $form_end_options = array(
                                'label' => 'Add Field Visits', 
                                'class' => 'btn btn-lg btn-primary ',                                
                            );
                            echo $this->Form->end($form_end_options);
                        ?>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12">
            <h3>Added Field Visits</h3>
            <br />
            <?php if(empty($visitsAry['Completed']) && empty($visitsAry['Coming'])): ?>
                <p class="text-muted">No Field Visits Added Yet.</p>
            <?php else: ?>  
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class=""><strong class="text-primary">Up Coming Field Visits</strong></a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" style="height: auto;">
                            <div class="panel-body">
                                <?php if(empty($visitsAry['Coming'])): ?>
                                    <p class="text-muted">No Coming Field Visits Planned.</p>
                                <?php else: ?>
                                    <?php foreach($visitsAry['Coming'] as $comingVisit): ?>
                                        <div class="">
                                            <h3 class="title green" style=""><strong class="text-success">Field Visit on <?php echo $comingVisit['FieldVisit']['date']; ?></strong></h3>
                                            <p class="activity-noti-desc text-muted" style="margin-bottom: -10px;"><?php echo $comingVisit['FieldVisit']['main_objective']; ?></p>                                                                    
                                            <hr />
                                        </div>                                    
                                    <?php endforeach; ?>
                                <?php endif; ?>                                
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class=""><strong class="text-primary">Completed Field Visits</strong></a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" style="height: auto;">
                            <div class="panel-body">
                                <?php if(empty($visitsAry['Completed'])): ?>
                                    <p class="text-muted">No Completed Field Visits.</p>
                                <?php else: ?>
                                    <?php foreach($visitsAry['Completed'] as $completedVisit): ?>
                                        <div class="">
                                            <h3 class="title green"><strong class="text-success">Field Visit on <?php echo $completedVisit['FieldVisit']['date']; ?></strong></h3>
                                            <p class="activity-noti-desc text-muted" style="margin-bottom: -10px;"><?php echo $completedVisit['FieldVisit']['main_objective']; ?></p>                                                                    
                                            <hr />
                                        </div>                                    
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>             
            
        </div> 
    </div>
</div>

<div id="chart-container" class="row">    
    <?php //echo var_dump($ageGroups); ?>
</div>

<script>
     $('.custom-date').datetimepicker();
    
    var max_fields      = 5; //maximum input boxes allowed
    
    var x = 1; //initlal text box count
    $('#btn-add-field').click(function(e){ //on add input button click
        e.preventDefault();        
        if(x < max_fields){ //max input box allowed           
            $('.multiple-input-wrapper').append('<div class="multi-item-wrapper animated zoomIn">\
                                <input type="hidden" name="data[' + x + '][FieldVisit][field_group_id]" value="<?php echo $student['FieldGroup']['id']; ?>" />\
                                <input type="hidden" name="data[' + x + '][FieldVisit][field_community_id]" value="<?php echo $student['FieldGroup']['field_community_id']; ?>" />\
                                <div class="form-group">\
                                    <textarea name="data[' + x + '][FieldVisit][main_objective]" class="form-control" placeholder="Main Objective..." rows="3" cols="30" id="SpecificObjectiveObjective1"></textarea>\
                                </div>                                \
                                <div class="form-group">\
                                    <textarea name="data[' + x + '][FieldVisit][other_objective]" class="form-control" placeholder="Other Objectives (optional)" rows="3" cols="30" id="SpecificObjectiveObjective1"></textarea>\
                                </div> \
                                <div class="form-group input-group-lg">\
                                    <input name="data[' + x + '][FieldVisit][date]" data-date-format="YYYY-MM-DD" class="form-control custom-date" placeholder="YYYY-MM-DD" type="text">                                \
                                </div>                                \
                                <div class="col-md-12">\
                                    <button class="btn btn-danger btn-xs btn-remove-field">\
                                        <i class="fa fa-minus"></i> &nbsp; Remove\
                                    </button>  \
                                    <hr />\
                                </div> \
                            </div>     '); //add input box
            x++; //text box increment
            $('.custom-date').datetimepicker();
        }
        
    });
    
    $('.multiple-input-wrapper').on("click",".btn-remove-field", function(e){ //user click on remove text
        e.preventDefault(); 
        $(this).parent('div').parent('div').remove();
        x--;
        
    });
   
</script>