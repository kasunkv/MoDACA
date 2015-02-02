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
        <h2>Program Evaluation Indicators</h2>
        <h4 class="page-subheader">Add Evaluation Indicators as a guideline to evaluate your Health Promotion Programs progress.</h4>
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
        <div class="col-md-6 col-sm-12 col-xs-12">
            <h3>Evaluation Indicators</h3>
            <br />
            <div class="panel panel-default panel-shadow">
                <div class="panel-heading">
                    Add Evaluation Indicator
                </div>
                
                <div class="panel-body">
                    <?php echo $this->Form->create('ProgramEvalIndicator', array(
                        'inputDefaults' => array(
                            'label' => false,
                        ),
                    ));
                    ?>
                    
                    <div class="multiple-input-wrapper">
                        <div class="multiple-item-box">                                                        
                            <div class="form-group input-group-lg">
                                <select name="data[ProgramEvalIndicator][health_issue_id]" class="form-control" id="ProgramEvalIndicatorHealthIssueId">
                                    <option value="" selected="">Select Health Issue...</option>
                                    <?php foreach ($healthIssues as $issue): ?>
                                        <option value="<?php echo $issue['HealthIssue']['id']; ?>"><?php echo $issue['HealthIssue']['issue_name']; ?></option>  
                                    <?php endforeach; ?>
                                </select>                                
                            </div> 
                            <div class="form-group input-group-lg ">
                                <select name="data[ProgramEvalIndicator][program_eval_indicator_group_id]" class="form-control category">
                                    <option value="" selected="">Select Indicator Category...</option>
                                </select>                  
                            </div> 
                            <input type="hidden" name="data[ProgramEvalIndicator][field_group_id]" value="<?php echo $student['FieldGroup']['id']; ?>" />
                            <div class="form-group input-group-lg">
                                <input name="data[ProgramEvalIndicator][indicator]" class="form-control" placeholder="Indicator" type="text">
                            </div> 
                            <div class="row">
                                <div class="form-group input-group-lg col-md-6 col-sm-6 col-xs-6" style="margin-left: 0px;">
                                    <input name="data[ProgramEvalIndicator][base_value]" class="form-control" placeholder="Base Value" type="number">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="margin-top: -15px;" />
                    
                    <?php 
                        $form_end_options = array(
                            'label' => 'Add Indicators', 
                            'class' => 'btn btn-lg btn-primary ', 
                            'style' => 'margin-left: 15px;'
                        );
                        echo $this->Form->end($form_end_options);
                    ?>
                    
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12">
            <h3>Current Evaluation Indicators</h3>
            <br />
            <?php if(!empty($healthIssues)): ?>                        
                <div class="panel-group" id="accordion">
                    <?php $i = 1; ?>
                    <?php foreach($healthIssues as $healthIssue): ?>
                    <div class="panel panel-default panel-shadow">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>" class=""><strong class="text-primary" style="font-size: 1.5em;"><?php echo $healthIssue['HealthIssue']['issue_name']; ?></strong></a>
                            </h4>
                        </div>
                        <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse <?php echo $i == 1 ? 'in' : ''; ?>" style="height: auto;">
                            <div class="panel-body">
                                <div class="panel-group" id="accordion">
                                    <?php if(empty($categories)): ?>
                                        <p class="text-muted">No Evaluation Indicators Added Yet.</p>
                                    <?php else: ?>                                         
                                        <?php foreach($categories as $category): ?>
                                            <?php if($category['ProgramEvalIndicatorGroup']['health_issue_id'] == $healthIssue['HealthIssue']['id']): ?>
                                                <h4><strong><?php echo $category['ProgramEvalIndicatorGroup']['category']; ?></strong></h4>  
                                                <?php if(empty($indicators)): ?>
                                                    <p class="text-muted" style="margin-top: -30px; margin-left: 20px;">No Indicators Added Yet.</p>
                                                <?php else: ?>
                                                    <ul>
                                                        <?php foreach($indicators as $indicator): ?>
                                                            <?php if($category['ProgramEvalIndicatorGroup']['id'] == $indicator['ProgramEvalIndicator']['program_eval_indicator_group_id']): ?>
                                                                <li><?php echo $indicator['ProgramEvalIndicator']['indicator']; ?></li>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                <?php endif; ?>
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
        <?php //echo var_dump($healthIssues, $categories, $indicators) ?>
    </div>
</div>
<script>


    $("#ProgramEvalIndicatorHealthIssueId").bind("change", function (event) {
        $.ajax({
            async:true,
            data:$("#ProgramEvalIndicatorHealthIssueId").serialize(),
            dataType:"html",
            success:function (data, textStatus) {
                $(".category").html(data);
            },
            type:"post",
            url:"/MoDACA/ProgramEvalIndicatorGroups/getGroupsByHealthIssueId"}
        );
        return false;
    });

</script>

