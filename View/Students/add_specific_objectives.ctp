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
        <h2>Add Specific Objectives</h2>
        <h4 class="page-subheader">Add your Specific Objectives for your Health Promotion Process</h4>
    </div>
</div>
<!-- /. ROW  -->
<hr />
<div class="row">
    <div class="col-md-12">
        <h3>Specific Objectives</h3>
        <h4 class="page-subheader text-muted">
            Add your specific objectives that describe your general objectives. Your specific objectives belong to a general
            objective. Select the general objective from the list and add specific objectives with expected goal.
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
                    Add Specific Objective
                </div>
                <div class="panel-body" >
                    <?php if(empty($generalObjectives)): ?>
                        <p class="text-muted"> No General Objectives added for the community. You need to add General Objectives first before adding Specific Objectives.</p>
                    <?php else: ?>
                        <?php echo $this->Form->create('SpecificObjective', array(
                            'inputDefaults' => array(
                                'label' => false,
                            ),
                        ));
                        ?>
                        
                        <div class="multiple-input-wrapper">
                            <div class="multiple-item-box">
                                <div class="form-group input-group-lg">
                                    <select name="data[SpecificObjectives][0][SpecificObjective][general_objective_id]" class="form-control"id="SpecificObjectiveId1">
                                        <option value="" selected="">Select General Objective...</option> 
                                        <?php foreach ($generalObjectives as $objective): ?>
                                            <option value="<?php echo $objective['GeneralObjective']['id']; ?>"><?php echo $objective['GeneralObjective']['objective']; ?></option>  
                                        <?php endforeach; ?>
                                    </select>                                
                                </div>
                                <div class="form-group">
                                    <textarea name="data[SpecificObjectives][0][SpecificObjective][objective]" class="form-control" placeholder="Specific Objective..." rows="3" cols="30" id="SpecificObjectiveObjective1"></textarea>
                                </div> 
                                <div class="form-group input-group">
                                    <input type="text" name="data[SpecificObjectives][0][SpecificObjective][percentage]" class="form-control" placeholder="Expected Goal"id="SpecificObjectivePercentage1" >
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
            <h3>Current Specific Objectives</h3>
            <?php if(empty($specificObjectives)): ?>
                <p class="text-muted">No Specific Objectives Added Yet.</p>
            <?php else: ?>  
                <div class="panel-group" id="accordion">
                <?php $i = 1; ?>
                <?php foreach($generalObjectives as $generalObj): ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>" class=""><strong class="text-primary"><?php echo $generalObj['GeneralObjective']['objective']; ?></strong></a>
                            </h4>
                        </div>
                        <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse <?php echo $i == 1 ? 'in' : ''; ?>" style="height: auto;">
                            <div class="panel-body">
                                <?php foreach($specificObjectives as $specficicObjective): ?>
                                    <?php if($specficicObjective['SpecificObjective']['general_objective_id'] == $generalObj['GeneralObjective']['id']): ?>
                                        <div class="activity-noti panel-shadow">
                                            <p class="activity-noti-desc" style="font-size: 1.1em; overflow: auto; height: auto;"><?php echo  $specficicObjective['SpecificObjective']['objective']; ?></p>                        
                                            <h5><strong class="text-danger">Goal: <?php echo $specficicObjective['SpecificObjective']['percentage']; ?>%</strong></h5>
                                        </div>
                                    <?php endif; ?>                                
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <?php $i++; ?>
                <?php endforeach; ?>
                </div>
            <?php endif; ?>
                
            
        </div>
        
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php //echo var_dump($specificObjectives); ?>
    </div>
</div>

<script>
    
    var max_fields      = 5; //maximum input boxes allowed
    
    var x = 1; //initlal text box count
    $('#btn-add-field').click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed           
            $('.multiple-input-wrapper').append('<div class="multiple-item-box animated zoomIn"><hr /><div class="form-group input-group-lg"><select name="data[SpecificObjectives]['+ x +'][SpecificObjective][general_objective_id]" class="form-control"id="SpecificObjectiveId'+ x +'"><option value="" selected="">Select General Objective...</option><?php foreach ($generalObjectives as $objective): ?><option value="<?php echo $objective['GeneralObjective']['id']; ?>"><?php echo $objective['GeneralObjective']['objective']; ?></option><?php endforeach; ?></select></div><div class="form-group"><textarea name="data[SpecificObjectives]['+ x +'][SpecificObjective][objective]" class="form-control" placeholder="Specific Objective..." rows="3" cols="30" id="SpecificObjectiveObjective'+ x +'"></textarea></div><div class="form-group input-group"><input type="text" name="data[SpecificObjectives]['+ x +'][SpecificObjective][percentage]" class="form-control" placeholder="Expected Goal"id="SpecificObjectivePercentage'+ x +'" ><span class="input-group-addon"><b>%</b></span></div><button href="" class="btn btn-danger btn-xs btn-remove-field"><i class="fa fa-minus"></i> &nbsp; Remove</button></div>'); //add input box
            x++; //text box increment
        }
    });
    
    $('.multiple-input-wrapper').on("click",".btn-remove-field", function(e){ //user click on remove text
        e.preventDefault(); 
        $(this).parent('div').remove();
        x--;
        
    });
   
</script>

