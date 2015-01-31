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
        <h2>Field Community Overview</h2>
        <h4 class="page-subheader">A quick overview of all the Health Issues, Objectives, Determinants and Indicators for your particular Field Community</h4>
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
        <h3>Community Health Issues</h3>
        <br />
        <?php if(!empty($healthIssues)): ?>
            <?php foreach($healthIssues as $issue): ?>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="activity-noti panel-shadow">
                        <div class="activity-noti-header">    
                            <a href="#">
                                <h3 class="title blue"><?php echo $issue['HealthIssue']['issue_name']; ?></h3>
                            </a>
                        </div>
                        <p class="activity-noti-desc text-muted"><?php echo $issue['HealthIssue']['description']; ?></p>                        
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-muted" style="margin-top: -30px; margin-left: 20px;">No Health Issues Added.</p>            
        <?php endif; ?>
    </div>
</div>
<hr />
<div class="row">
    <div class="col-md-12">
        <h3>Health Promotion Objectives</h3>
        <br />
        <!--<h4>General Objectives</h4>-->
        <?php if(!empty($generalObjectives)): ?>
                        
                <div class="panel-group" id="accordion">
                    <?php $i = 1; ?>
                    <?php foreach($generalObjectives as $generalObjective): ?>
                    <div class="panel panel-success panel-shadow">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>" class=""><strong class="text-success"><?php echo $generalObjective['GeneralObjective']['objective']; ?></strong></a>
                            </h4>
                        </div>
                        <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse <?php echo $i == 1 ? 'in' : ''; ?>" style="height: auto;">
                            <div class="panel-body">
                                <h4>Specific Objectives</h4>
                                <ul class="list-group">
                                <?php foreach($specificObjectives as $specificObjective): ?>
                                    <?php if($specificObjective['SpecificObjective']['general_objective_id'] == $generalObjective['GeneralObjective']['id']): ?>
                                    <li class="list-group-item"><p class="text-muted" style="margin: -10px auto 0px auto;"><?php echo $specificObjective['SpecificObjective']['objective']; ?></p></li>
                                    <?php endif; ?>                                
                                <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </div>                
        <?php else: ?>
        <p class="text-muted" style="margin-top: -30px; margin-left: 20px;">No Objectives Added Yet</p>            
        <?php endif; ?>
    </div>
</div>

<div id="chart-container" class="row">    
    <?php //echo var_dump($ageGroups); ?>
</div>

<script>
    
   
</script>