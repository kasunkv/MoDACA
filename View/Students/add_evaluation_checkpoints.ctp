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
                                <select name="data[0][ProgramEvalCheckpoint][health_issue_id]" class="form-control" id="ProgramEvalCheckpointHealthIssueId0">
                                    <option value="" selected="">Select Health Issue...</option> 
                                    <?php foreach ($healthIssues as $issue): ?>
                                        <option value="<?php echo $issue['HealthIssue']['id']; ?>"><?php echo $issue['HealthIssue']['issue_name']; ?></option>  
                                    <?php endforeach; ?>
                                </select>                                
                            </div>
                            <div class="form-group input-group-lg">
                                <select name="data[0][ProgramEvalCheckpoint][determinant_id]" class="form-control" id="ProgramEvalCheckpointDeterminantId0">
                                    <option value="" selected="">Select Determinant...</option>                                     
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
            <h3>Existing Evaluation Checkpoints</h3>
            <?php if(empty($currentIssues)): ?>
                <p class="text-muted">No Evaluation Checkpoints Added Yet.</p>
            <?php else: ?>  
                <?php foreach($currentIssues as $issue): ?>
                    <div class="activity-noti panel-shadow">
                        <div class="activity-noti-header">  
                            <h3 class="title blue"><?php echo $issue['HealthIssue']['issue_name']; ?></h3>
                        </div>
                        <p class="activity-noti-desc text-muted"><?php echo $issue['HealthIssue']['description']; ?></p>                        
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            
            
                
        </div>
    
        
    </div>
    
</div>
<div class="row">
    <div class="col-md-12">
        <?php //echo var_dump($student); ?>
    </div>
</div>
<?php
if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) echo $this->Js->writeBuffer();
// Writes cached scripts
?>
<?php
        $this->Js->get('#ProgramEvalCheckpointHealthIssueId0')->event('change', 
        $this->Js->request(array(
            'controller'=>'determinants',
            'action'=>'getByHealthIssue'
            ), array(
                'update'=>'#ProgramEvalCheckpointDeterminantId0',
                'async' => true,
                'method' => 'post',
                'dataExpression'=>true,
                'data'=> $this->Js->serializeForm(array(
                    'isForm' => true,
                    'inline' => true
                    )
                )
            ))
        );
    ?>
<script>
    
    
    
    
    $('.custom-date').datetimepicker();    

    var max_fields      = 5; //maximum input boxes allowed
    
    var x = 1; //initlal text box count
    $('#btn-add-field').click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed           
            $('.multiple-input-wrapper').append('<div class="multiple-item-box"><hr />\
                            <input type="hidden" name="data[0][ProgramEvalCheckpoint][determinant_id]" value="" />\
                            <input type="hidden" name="data[0][ProgramEvalCheckpoint][health_issue_id]" value="" />\
                            <input type="hidden" name="data[0][ProgramEvalCheckpoint][field_group_id]" value="<?php echo $student['FieldGroup']['id']; ?>" />\
                            <div class="form-group input-group-lg">\
                                <input name="data[0][ProgramEvalCheckpoint][checkpoint]" class="form-control" placeholder="Checkpoint Name..." type="text">\
                            </div>\
                            <div class="form-group input-group-lg">\
                                <input name="data[0][ProgramEvalCheckpoint][date]" data-date-format="YYYY-MM-DD" class="form-control custom-date" placeholder="YYYY-MM-DD" type="text">\
                            </div>\
                            <button href="" class="btn btn-danger btn-xs btn-remove-field">\
                                <i class="fa fa-minus"></i> &nbsp; Remove\
                            </button>\
                        </div>'); //add input box
            x++; //text box increment
        }
    });
    
    $('.multiple-input-wrapper').on("click",".btn-remove-field", function(e){ //user click on remove text
        e.preventDefault(); 
        $(this).parent('div').remove();
        x--;
        
    });

</script>
