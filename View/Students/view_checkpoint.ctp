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
        <h2><?php echo $checkpoint['AssesmentCheckpoint']['checkpoint']; ?> | Peer Assessment Criteria</h2>
        <h4 class="page-subheader">Use the following criteria to assess your group members.</h4>
    </div>
</div>
<!-- /. ROW  -->
<hr />


<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <h3>Peer Assessment Criteria</h3>
            <h4 class="page-subheader">Listed bellow are the criteria you need to assess your group members. Click on the criteria and evaluate your group members.</h4>
            <br />
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <?php echo $this->Session->flash(); ?>    
                </div>    
            </div>
        </div>
        
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default panel-shadow">
                <div class="panel-heading">
                    Peer Assessment Criteria
                </div>
                <div class="panel-body">
                    <?php if(empty($criterias)): ?>
                    <p class="text-muted" style="margin-bottom: -15px;">No Checkpoints Added Yet.</p>
                    <?php else: ?>
                        <?php foreach($criterias as $criteria): ?>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="activity-noti panel-shadow">
                            <div class="activity-noti-header">                            
                                <a href="<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'reviewGroupMembers', $grpId, $checkId, $criteria['AssesmentCriteria']['id'])); ?>">
                                    <h3 class="title green"><?php echo $criteria['AssesmentCriteria']['criteria']; ?></h3>
                                </a>
                            </div>
                            <p class="activity-noti-desc text-muted"><?php echo $criteria['AssesmentCriteria']['description']; ?></p>                        
                        </div>
                    </div>
                        <?php endforeach; ?>
                    <?php endif; ?>                 
                    
                </div>
            </div>
        </div>  
        <div class="row">
            <div class="col-md-12">
                <a href="<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'viewGroupMembers', $student['Student']['field_group_id'])); ?>" class="back-link">
                    <i class="fa fa-reply back-link-icon"></i>
                    Back to Group Members
                </a>
            </div>
        </div>
    </div>
</div>