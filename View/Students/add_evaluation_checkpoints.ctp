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
        <h2>Program Evaluation Checkpoints</h2>
        <h4 class="page-subheader">Add Evaluation Checkpoints to evaluate your Health Promotion Programs progress.</h4>
    </div>
</div>
<!-- /. ROW  -->
<hr />

<div class="row">
    <div class="col-md-12">
        <?php echo $this->Session->flash(); ?>        
    </div>
</div>

<div class="row">
    <div class="col-md-12">        
        <div class="col-md-6 col-sm-12 col-xs-12">
            <h3>Add Evaluation Checkpoints</h3>
            <br />
            <div class="panel panel-default panel-shadow">
                <div class="panel-heading">
                    Add Evaluation Checkpoints
                </div>
                <div class="panel-body">
                    <?php echo $this->Form->create('ProgramEvalCheckpoint', array(
                        'inputDefaults' => array(
                            'label' => false,
                        ),
                    ));
                    ?>
                    
                    <div class="multiple-input-wrapper">
                        <div class="multiple-item-box">                                                        
                            <div class="form-group input-group-lg">
                                <select name="data[0][ProgramEvalCheckpoint][health_issue_id]" class="form-control" id="ProgramEvalCheckpointDeterminantId0">
                                    <option value="" selected="">Select Health Issue...</option>
                                    <?php foreach ($healthIssues as $issue): ?>
                                        <option value="<?php echo $issue['HealthIssue']['id']; ?>"><?php echo $issue['HealthIssue']['issue_name']; ?></option>  
                                    <?php endforeach; ?>
                                </select>                                
                            </div>
                            <input type="hidden" name="data[0][ProgramEvalCheckpoint][field_group_id]" value="<?php echo $student['FieldGroup']['id']; ?>" />
                            <div class="form-group input-group-lg">
                                <input name="data[0][ProgramEvalCheckpoint][checkpoint]" class="form-control" placeholder="Checkpoint Name..." type="text">
                            </div>
                            <div class="form-group input-group-lg">
                                <input name="data[0][ProgramEvalCheckpoint][date]" data-date-format="YYYY-MM-DD" class="form-control custom-date" placeholder="YYYY-MM-DD" type="text">                                
                            </div>                            
                        </div>
                        
                        <div class="form-add-more">
                            <button class="btn btn-success btn-sm" id="btn-add-field" style="margin-left: 12px; margin-top: -20px;">
                                <i class="fa fa-plus"></i> Add More...
                            </button>
                        </div>
                    </div>
                    <hr />
                    
                    <?php 
                        $form_end_options = array(
                            'label' => 'Add Checkpoints', 
                            'class' => 'btn btn-lg btn-primary ',                                
                        );
                        echo $this->Form->end($form_end_options);
                    ?>
                    
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12">
            <h3>Current Evaluation Checkpoints</h3>
            <br />
            <?php if(!empty($healthIssues)): ?>                        
                <div class="panel-group" id="accordion">
                    <?php $i = 1; ?>
                    <?php foreach($healthIssues as $healthIssue): ?>
                    <div class="panel panel-default panel-shadow">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>" class=""><strong class="text-primary"><?php echo $healthIssue['HealthIssue']['issue_name']; ?></strong></a>
                            </h4>
                        </div>
                        <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse <?php echo $i == 1 ? 'in' : ''; ?>" style="height: auto;">
                            <div class="panel-body">
                                <div class="panel-group" id="accordion">
                                    <?php if(empty($checkPoints)): ?>
                                        <p class="text-muted">No Program Evaluation Checkpoints Added Yet.</p>
                                    <?php else: ?> 
                                        <?php foreach($checkPoints as $checkPoint): ?>
                                            <?php if($checkPoint['ProgramEvalCheckpoint']['health_issue_id'] == $healthIssue['HealthIssue']['id']): ?>
                                            <div class="activity-noti panel-shadow">
                                                <div class="activity-noti-header">  
                                                    <h3 class="title blue"><?php echo $checkPoint['ProgramEvalCheckpoint']['checkpoint']; ?></h3>
                                                </div>
                                                <h5><strong><?php echo $checkPoint['ProgramEvalCheckpoint']['date']; ?></strong></h5>
                                            </div>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?> 
                                </div>
                            </div>
                        </div>
                    </div>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </div>                
            <?php else: ?>
                <p class="text-muted" style="margin-top: -30px; margin-left: 20px;">No Health Issues Added Yet</p>            
            <?php endif; ?>
        </div>
    
        
    </div>
    
</div>
<div class="row">
    <div class="col-md-12">
        <?php //echo var_dump($student); ?>
    </div>
</div>

<script>
    
    
    
    
    $('.custom-date').datetimepicker();    

    var max_fields      = 5; //maximum input boxes allowed
    
    var x = 1; //initlal text box count
    $('#btn-add-field').click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed           
            $('.multiple-input-wrapper').append('<div class="multiple-item-box animated zoomIn"><hr />\
                            <div class="form-group input-group-lg">\
                                <select name="data[' + x + '][ProgramEvalCheckpoint][health_issue_id]" class="form-control">\
                                    <option value="" selected="">Select Health Issue...</option>\
                                    <?php foreach ($healthIssues as $issue): ?>\
                                        <option value="<?php echo $issue['HealthIssue']['id']; ?>"><?php echo $issue['HealthIssue']['issue_name']; ?></option>\
                                    <?php endforeach; ?>\
                                </select>\
                            </div>\
                            <input type="hidden" name="data[' + x + '][ProgramEvalCheckpoint][field_group_id]" value="<?php echo $student['FieldGroup']['id']; ?>" />\
                            <div class="form-group input-group-lg">\
                                <input name="data[' + x + '][ProgramEvalCheckpoint][checkpoint]" class="form-control" placeholder="Checkpoint Name..." type="text">\
                            </div>\
                            <div class="form-group input-group-lg">\
                                <input name="data[' + x + '][ProgramEvalCheckpoint][date]" data-date-format="YYYY-MM-DD" class="form-control custom-date" placeholder="YYYY-MM-DD" type="text" >\
                            </div><button href="" class="btn btn-danger btn-xs btn-remove-field"><i class="fa fa-minus"></i> &nbsp; Remove</button>\
                        </div>'); //add input box
            x++; //text box increment
        }
        $('.custom-date').datetimepicker();    
    });
    
    $('.multiple-input-wrapper').on("click",".btn-remove-field", function(e){ //user click on remove text
        e.preventDefault(); 
        $(this).parent('div').remove();
        x--;
        
    });

</script>
