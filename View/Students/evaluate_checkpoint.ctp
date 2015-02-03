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
            <p style="margin-top: -30px; margin-left: 15px; font-size: 1.3em;" ><strong>No Health Issues Added.</strong></p>
            <?php else: ?>
                <?php foreach($healthIssues as $issue): ?>
                    <div class="activity-noti panel-shadow">
                        <div class="activity-noti-header health-issue"> 
                            <a href="#">
                                <input type="hidden" class="ajax-data" name="data[health_issue_id]" value="<?php echo $issue['HealthIssue']['id']; ?>" />
                                <h3 class="title green"><?php echo $issue['HealthIssue']['issue_name']; ?></h3>
                            </a>
                        </div>                                                
                        <p class="activity-noti-desc text-muted"><?php echo $issue['HealthIssue']['description']; ?></p>
                    </div>
                <?php endforeach;  ?>            
            <?php endif; ?>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12">
            <h3>Available Checkpoints</h3>
            <p class="text-muted">Click on a Checkpoint to evaluate Health Promotion Program. Note that evaluation is available only after the
            date is expired.</p>
            <br />
            <div class="panel panel-default">
                <div class="panel-body" id="eval-checkpoints">
                    <p style="margin-top: 0px; margin-left: 15px; font-size: 1.3em;" ><strong>Please Select a Health Issue.</strong></p>
                </div>
            </div>
            
        </div>
    </div>
</div>

<script>

    $('.health-issue').bind('click', function (evt) {
        $.ajax({
            async: true,
            data: 'health_issue_id=' +  $(this).find('.ajax-data').val(),
            dataType: 'html', 
            success: function(data, status) {
                $('#eval-checkpoints').html(data);
            },
            type: 'post',
            url: '/MoDACA/ProgramEvalCheckpoints/getByIssueId'
        });
        return false;
    });

</script>