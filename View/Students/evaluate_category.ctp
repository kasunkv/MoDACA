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
        <h2>Evaluate | <?php echo $healthIssue['HealthIssue']['issue_name']; ?></h2>
        <h4 class="page-subheader">Fill out gathered data to evaluate the Health Promotion Program.</h4>
    </div>
</div>
<!-- /. ROW  -->
<hr />

<div class="row">
    <div class="col-md-12">
        <?php echo $this->Session->flash(); ?>        
    </div>
</div>
<!-- /. ROW  -->
<div class="row">
    <div class="col-md-12">
        <h3><?php echo $category['ProgramEvalIndicatorGroup']['category']; ?> - <?php echo $checkpoint['ProgramEvalCheckpoint']['checkpoint']; ?></h3>
        <br />
        <div class="panel panel-default panel-shadow">
            <div class="panel-heading">
                Indicators
            </div>
            <div class="panel-body" >
                    <?php echo $this->Form->create('ProgramEvalIndicatorValue', array(
                        'inputDefaults' => array(
                            //'label' => false,
                        ),
                    ));
                    ?>
                    <div class="row">
                        <?php if(empty($indicators)): ?>
                            <p class="text-muted">No Indicators Found</p>
                        <?php else: ?>
                            <?php $i = 0; ?>
                            <?php foreach($indicators as $indicator): ?>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                        <label><?php echo $indicator['ProgramEvalIndicator']['indicator']; ?></label>
                                    </div>
                                    <input name="data[<?php echo $i; ?>][ProgramEvalIndicatorValue][program_eval_checkpoint_id]" type="hidden" value="<?php echo $checkpoint['ProgramEvalCheckpoint']['id']; ?>" />
                                    <input name="data[<?php echo $i; ?>][ProgramEvalIndicatorValue][program_eval_indicator_id]" type="hidden" value="<?php echo $indicator['ProgramEvalIndicator']['id']; ?>" />
                                    <input name="data[<?php echo $i; ?>][ProgramEvalIndicatorValue][health_issue_id]" type="hidden" value="<?php echo $indicator['ProgramEvalIndicator']['health_issue_id']; ?>" />

                                    <div class="col-md-3 col-sm-3 col-xs-3">
                                        <?php 
                                            echo $this->Form->input('value', array(
                                                'class' => 'form-control',
                                                'placeholder' => '', 
                                                'type' => 'number',   
                                                'name' => 'data['. $i .'][ProgramEvalIndicatorValue][value]',
                                                'div' => array (
                                                    'class' => 'form-group input-group-lg'
                                                ),         
                                                'label' => false,
                                            ));
                                        ?>
                                    </div>
                                </div>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>  
                            <div class="col-md-12"><hr /></div>
                        </div>
                    <?php 
                        $form_end_options = array(
                            'label' => 'Complete Evaluation', 
                            'class' => 'btn btn-lg btn-primary ',                                
                        );
                        echo $this->Form->end($form_end_options);
                    ?>
            </div>
        </div>
    </div>
    
</div>

<script>
    
    

</script>