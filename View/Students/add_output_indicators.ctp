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
        <h2>Output Indicators</h2>
        <h4 class="page-subheader">Add the Output Indicators for the Selected General Objective</h4>
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
            <h3><?php echo $fieldCommunity['FieldCommunity']['title']; ?> | <?php echo $fieldCommunity['FieldCommunity']['village_name']; ?></h3>
            <br />
            <div class="panel panel-default panel-shadow">
                <div class="panel-heading">
                    Add Output Indicators
                </div>
                <div class="panel-body" >                    
                        <?php echo $this->Form->create('OutputIndicator', array(
                            'inputDefaults' => array(
                                //'label' => false,
                            ),
                        ));
                        ?>
                        <div class="multiple-input-wrapper">
                            <div class="multi-item-wrapper">
                                <input type="hidden" name="data[0][OutputIndicator][field_group_id]" value="<?php echo $student['FieldGroup']['id']; ?>" />
                                <div class="form-group input-group-lg">
                                    <select name="data[0][OutputIndicator][general_objective_id]" class="form-control">
                                        <option value="" selected="">Select General Objective...</option> 
                                        <?php foreach ($generalObjectives as $obj): ?>
                                            <option value="<?php echo $obj['GeneralObjective']['id']; ?>"><?php echo $obj['GeneralObjective']['objective']; ?></option>  
                                        <?php endforeach; ?>
                                    </select>                                
                                </div>
                                <div class="form-group">
                                    <textarea name="data[0][OutputIndicator][indicator]" class="form-control" placeholder="Indicator..." rows="4" cols="30" ></textarea>
                                </div>                                
                                <div class="form-add-more">
                                    <button class="btn btn-success btn-sm" id="btn-add-field">
                                        <i class="fa fa-plus"></i> Add More...
                                    </button>
                                    <hr />
                                </div>
                            </div>                             
                        </div>                                              
                        <?php 
                            $form_end_options = array(
                                'label' => 'Add Indicators', 
                                'class' => 'btn btn-lg btn-primary ',                                
                            );
                            echo $this->Form->end($form_end_options);
                        ?>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12">
            <h3>Current Output Indicators</h3>
            <?php if(empty($indicators)): ?>
                <p class="text-muted">No Input Indicators Added Yet.</p>
            <?php else: ?>  
                <div class="panel-group" id="accordion">
                <?php $i = 1; ?>
                <?php foreach($generalObjectives as $objective): ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>" class=""><strong class="text-primary"><?php echo $objective['GeneralObjective']['objective']; ?></strong></a>
                            </h4>
                        </div>
                        <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse <?php echo $i == 1 ? 'in' : ''; ?>" style="height: auto;">
                            <div class="panel-body">
                                <?php foreach($indicators as $indicator): ?>
                                    <?php if($indicator['OutputIndicator']['general_objective_id'] == $objective['GeneralObjective']['id']): ?>
                                        <div class="activity-noti panel-shadow">
                                            <p class="activity-noti-desc text-muted" style="overflow: auto; height: auto; font-size: 1.1em;"><?php echo  $indicator['OutputIndicator']['indicator']; ?></p>                                                                    
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
<hr />
<div class="row">
    <div class="col-md-12">
        <h3 style="margin-left: 15px;">Related Tasks</h3>
        <div class="related-task-links">
                <?php echo $this->Html->link('Add Input Indicators', array(
                        'action' => 'addInputIndicators',                     
                    ));
                ?>
            <br />
                <?php echo $this->Html->link('Add Process Indicators', array(
                        'action' => 'addProcessIndicators',                     
                    ));
                ?>
            <br />
                <?php echo $this->Html->link('Add Outcome Indicators', array(
                        'action' => 'addOutcomeIndicators',                     
                    ));
                ?>
        </div>
    </div>    
</div>
<div class="row">    
    <br />
    <br />
    <?php //echo var_dump($student); ?>
</div>

<script>
    
    var max_fields      = 5; //maximum input boxes allowed
    
    var x = 1; //initlal text box count
    $('#btn-add-field').click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed           
            $('.multiple-input-wrapper').append('<div class="multi-item-wrapper animated zoomIn">\
                                <input type="hidden" name="data['+ x +'][OutputIndicator][field_group_id]" value="<?php echo $student['FieldGroup']['id']; ?>" />\
                                <div class="form-group input-group-lg">\
                                    <select name="data['+ x +'][OutputIndicator][general_objective_id]" class="form-control">\
                                        <option value="" selected="">Select General Objective...</option> \
                                        <?php foreach ($generalObjectives as $obj): ?>\
                                            <option value="<?php echo $obj['GeneralObjective']['id']; ?>"><?php echo $obj['GeneralObjective']['objective']; ?></option>  \
                                        <?php endforeach; ?>\
                                    </select>                                \
                                </div>\
                                <div class="form-group">\
                                    <textarea name="data['+ x +'][OutputIndicator][indicator]" class="form-control" placeholder="Indicator..." rows="4" cols="30" ></textarea>\
                                </div>\
                                <div class="col-md-12">\
                                    <button href="" class="btn btn-danger btn-xs btn-remove-field">\
                                        <i class="fa fa-minus"></i> &nbsp; Remove\
                                    </button>  \
                                    <hr />\
                                </div> \
                            </div>       '); //add input box
            x++; //text box increment
        }
    });
    
    $('.multiple-input-wrapper').on("click",".btn-remove-field", function(e){ //user click on remove text
        e.preventDefault(); 
        $(this).parent('div').parent('div').remove();
        x--;
        
    });
   
</script>