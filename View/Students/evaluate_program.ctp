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
        <h2>Evaluate Program</h2>
        <h4 class="page-subheader">Evaluate your Health Promotion Program.</h4>
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
            <h3>Health Issues</h3>
            <p class="text-muted">Select a Health Issue to reveal the Program Evaluation Checkpoints for it. Then Click on
           Evaluation Checkpoints to evaluate your progress in the Field Community.</p>
            <br />
            <?php if(empty($healthIssues)): ?>
                <p class="text-muted">No Health Issues Added Yet.</p>
            <?php else: ?>  
                <div class="panel-group" id="accordion">
                <?php $i = 1; ?>
                <?php foreach($healthIssues as $healthIssue): ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>" class=""><strong class="text-primary"><?php echo $healthIssue['HealthIssue']['issue_name']; ?></strong></a>
                            </h4>
                        </div>
                        <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse <?php echo $i == 1 ? 'in' : ''; ?>" style="height: auto;">
                            <div class="panel-body">
                                <?php foreach($checkPoints as $checkPoint): ?>
                                    <?php if($checkPoint['ProgramEvalCheckpoint']['health_issue_id'] == $healthIssue['HealthIssue']['id']): ?>                                        
                                        <a class="container-link eval-checkpoint" href="#">
                                            <input type="hidden" class="ajax-data-issue" name="data[health_issue_id]" value="<?php echo $healthIssue['HealthIssue']['id']; ?>" />
                                            <input type="hidden" class="ajax-data-group" name="data[field_group_id]" value="<?php echo $student['FieldGroup']['id']; ?>" />
                                            <input type="hidden" class="ajax-data-checkpont" name="data[checkpoint_id]" value="<?php echo $checkPoint['ProgramEvalCheckpoint']['id']; ?>" />
                                            <h3 class="title green" style="margin-bottom: -10px;"><strong class="text-success"><?php echo $checkPoint['ProgramEvalCheckpoint']['checkpoint']; ?></strong></h3>                                            
                                            <h5><strong style="color: black;;"><?php echo $checkPoint['ProgramEvalCheckpoint']['date']; ?></strong></h5>
                                        </a>                                        
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
        
        
        <div class="col-md-6 col-sm-12 col-xs-12">
            <h3>Evaluation Category</h3>
            <p class="text-muted">Click on a Evaluation Category to evaluate Health Promotion Program. </p>
            <br />
            <div class="panel panel-default">
                <div class="panel-body" id="indi-groups">
                    <p style="margin-top: 0px; margin-left: 15px; font-size: 1.3em;" ><strong>Please Select a Checkpoint.</strong></p>
                </div>
            </div>
            
        </div>
    </div>
</div>

<script>

    $('.eval-checkpoint').bind('click', function (evt) {
        $.ajax({
            async: true,
            data: 'health_issue_id=' +  $(this).find('.ajax-data-issue').val() + '&field_group_id=' + $(this).find('.ajax-data-group').val() + '&checkpoint_id=' + $(this).find('.ajax-data-checkpont').val(),
            dataType: 'html', 
            success: function(data, status) {
                $('#indi-groups').html(data);
            },
            type: 'post',
            url: '/MoDACA/ProgramEvalIndicatorGroups/getIndicatorGroups'
        });
        return false;
    });

</script>