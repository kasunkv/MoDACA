<?php $this->layout = 'defaultLayout'; ?>
<?php
    $this->start('sideNav');
    echo $this->element('studentNav');
    $this->end();
?>

<div class="row">
    <div class="col-md-12">
        <h2><?php echo $student['Student']['first_name'] . " " . $student['Student']['last_name']; ?> | Community Activities</h2>
        <h4 class="page-subheader">All Community Activities created by your group.</h4>
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
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="panel panel-success panel-shadow">
                <div class="panel-heading">
                    Completed Community Activities
                </div>
                <div class="panel-body">
                <?php if(empty($allEvents)): ?>
                    <p class="text-muted">There are no events to show.</p>
                <?php else: ?>
                    <?php $ctr = 0; ?>
                    <?php foreach ($allEvents as $event): ?>
                        <?php if($event['Event']['complete'] == 1): ?>
                            <?php $ctr++; ?>
                            <div class="activity-noti shadow">
                                <div class="activity-noti-header">
                                    <a href="/MoDACA/students/viewActivity/<?php echo $event['Event']['id']; ?>" ><h3 class="title green"><?php echo $event['Event']['title']; ?></h3></a>
                                    <span class="badge badge-green">
                                        <i class="fa fa-comment"></i>
                                        5
                                    </span>
                                </div>
                                <p class="activity-noti-desc text-muted"><?php echo $event['Event']['description']; ?></p>
                                <h5 class="activity-noti-date">
                                    <?php
                                        $tempDate = strtotime($event['Event']['date']);
                                        echo date('Y M d', $tempDate);
                                    ?>
                                </h5>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <?php if($ctr == 0): ?>
                    <p class="text-muted" >No Completed Events.</p>
                    <?php endif; ?>
                <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="panel panel-danger panel-shadow">
                <div class="panel-heading">
                    Pending Community Activities
                </div>
                <div class="panel-body">
                    <?php if(empty($allEvents)): ?>
                        <p class="text-muted">There are no events to show.</p>
                    <?php else: ?>
                        <?php $ctr = 0; ?>
                        <?php foreach ($allEvents as $event): ?>
                            <?php if($event['Event']['complete'] == 0): ?>
                                <?php $ctr++; ?>
                                <div class="activity-noti shadow">
                                    <div class="activity-noti-header">
                                        <a href="/MoDACA/students/completeActivity/<?php echo $event['Event']['id']; ?>" ><h3 class="title red"><?php echo $event['Event']['title']; ?></h3></a>
                                        <span class="badge badge-red">
                                            <i class="fa fa-comment"></i>
                                            5
                                        </span>
                                    </div>
                                    <p class="activity-noti-desc text-muted"><?php echo $event['Event']['description']; ?></p>
                                    <h5 class="activity-noti-date">
                                        <?php
                                            $tempDate = strtotime($event['Event']['date']);
                                            echo date('Y M d', $tempDate);
                                        ?>
                                    </h5>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <?php if($ctr == 0): ?>
                        <p class="text-muted" >No Pending Events.</p>
                        <?php endif; ?>
                    <?php endif; ?>                  
                    
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <?php //echo var_dump($allEvents); ?>
</div>

<script>
   
</script>