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
        <h2>Add General Objectives</h2>
        <h4 class="page-subheader">Add your General Objectives for your Health Promotion Process</h4>
    </div>
</div>
<!-- /. ROW  -->
<hr />
<div class="row">
    <div class="col-md-12">
        <h3>General Objectives</h3>
        <h4 class="page-subheader text-muted">
            Add your general objectives for the community in your health promotion process. Add your final objective
            as a percentage in the given field. You can add multiple objectives if you prefer.
        </h4>
        <br />
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <?php echo $this->Session->flash(); ?>    
            </div>    
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="panel panel-default panel-shadow">
                <div class="panel-heading">
                    Add General Objective
                </div>
                <div class="panel-body" >
                    <?php if(empty($healthIssues)): ?>
                        <p class="text-muted"> No Health Issues added for the community. You need to add Health Issues first before setting Objectives to improve.</p>
                    <?php else: ?>
                        <?php echo $this->Form->create('GeneralObjective', array(
                            'inputDefaults' => array(
                                'label' => false,
                            ),
                        ));
                        ?>
                        
                        <div class="multiple-input-wrapper">
                            <div class="multiple-item-box">
                                <div class="form-group input-group-lg">
                                    <select name="data[GeneralObjectives][0][GeneralObjective][health_issue_id]" class="form-control"id="HealthIssueId1">
                                        <option value="" selected="">Select Health Issue...</option> 
                                        <?php foreach ($healthIssues as $issue): ?>
                                            <option value="<?php echo $issue['HealthIssue']['id']; ?>"><?php echo $issue['HealthIssue']['issue_name']; ?></option>  
                                        <?php endforeach; ?>
                                    </select>                                
                                </div>
                                <div class="form-group">
                                    <textarea name="data[GeneralObjectives][0][GeneralObjective][objective]" class="form-control" placeholder="General Objective..." rows="3" cols="30" id="HealthIssueObjective1"></textarea>
                                </div> 
                                <div class="form-group input-group">
                                    <input type="text" name="data[GeneralObjectives][0][GeneralObjective][percentage]" class="form-control" placeholder="Expected Goal"id="HealthIssuePercentage1" >
                                    <span class="input-group-addon"><b>%</b></span>
                                </div>                                
                            </div>   
                            <div class="form-add-more">
                                <button class="btn btn-success btn-sm" id="btn-add-field" style="margin-left: 10px;">
                                    <i class="fa fa-plus"></i> Add More...
                                </button>
                            </div>
                        </div>
                        <hr />                    
                        <?php 
                            $form_end_options = array(
                                'label' => 'Add Objective', 
                                'class' => 'btn btn-md btn-primary ',                                
                            );
                            echo $this->Form->end($form_end_options);
                        ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12">
            <h3>Current General Objectives</h3>
            <?php if(empty($objectives)): ?>
                <p class="text-muted">No General Objectives Added Yet.</p>
            <?php else: ?>  
                <?php foreach($objectives as $objective): ?>
                    <div class="activity-noti panel-shadow">
                        <div class="activity-noti-header">  
                            <h3 class="title blue"><?php echo $objective['GeneralObjective']['objective']; ?></h3>
                        </div>
                        <h5 style="margin-top: 15px;"><strong><?php echo $objective['HealthIssue']['issue_name']; ?></strong></h5>
                        <p class="activity-noti-desc text-success" style="font-size: 1.1em;"><?php echo  $objective['GeneralObjective']['objective']; ?></p>                        
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php //echo var_dump($healthIssues, $objectives); ?>
    </div>
</div>

<script>
    
    var max_fields      = 5; //maximum input boxes allowed
    
    var x = 1; //initlal text box count
    $('#btn-add-field').click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed           
            $('.multiple-input-wrapper').append('<div class="multiple-item-box animated zoomIn"><hr /><div class="form-group input-group-lg"><select name="data[GeneralObjectives]['+ x +'][GeneralObjective][health_issue_id]" class="form-control"id="HealthIssueId'+ x +'"><option value="" selected="">Select Health Issue...</option><?php foreach ($healthIssues as $issue): ?><option value="<?php echo $issue['HealthIssue']['id']; ?>"><?php echo $issue['HealthIssue']['issue_name']; ?></option><?php endforeach; ?></select></div><div class="form-group"><textarea name="data[GeneralObjectives]['+ x +'][GeneralObjective][objective]" class="form-control" placeholder="General Objective..." rows="3" cols="30" id="HealthIssueObjective'+ x +'"></textarea></div><div class="form-group input-group"><input type="text" name="data[GeneralObjectives]['+ x +'][GeneralObjective][percentage]" class="form-control" placeholder="Expected Goal"id="HealthIssuePercentage'+ x +'" ><span class="input-group-addon"><b>%</b></span></div><button href="" class="btn btn-danger btn-xs btn-remove-field"><i class="fa fa-minus"></i> &nbsp; Remove</button></div> '); //add input box
            x++; //text box increment
        }
    });
    
    $('.multiple-input-wrapper').on("click",".btn-remove-field", function(e){ //user click on remove text
        e.preventDefault(); 
        $(this).parent('div').remove();
        x--;
        
    });
   
</script>

