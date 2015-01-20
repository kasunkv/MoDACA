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
                                    <?php if(!empty($event['EventFeedback'])): ?>
                                            <?php 
                                                $newComment = 0;
                                                foreach ($event['EventFeedback'] as $feedback) {
                                                    if($feedback['seen'] == 0) {
                                                        $newComment++;
                                                    }
                                                }
                                            ?>
                                            <?php if($newComment > 0): ?>
                                                <span class="badge badge-green">
                                                    <i class="fa fa-comment"></i>
                                                    <?php echo $newComment; ?>
                                                </span>
                                            <?php endif; ?>
                                            
                                        <?php endif; ?>  
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
                                        <?php if(!empty($event['EventFeedback'])): ?>
                                            <?php 
                                                $newComment = 0;
                                                foreach ($event['EventFeedback'] as $feedback) {
                                                    if($feedback['seen'] == 0) {
                                                        $newComment++;
                                                    }
                                                }
                                            ?>
                                            <?php if($newComment > 0): ?>
                                                <span class="badge badge-red">
                                                    <i class="fa fa-comment"></i>
                                                    <?php echo $newComment; ?>
                                                </span>
                                            <?php endif; ?>
                                            
                                        <?php endif; ?>   
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
    <div class="col-md-12">
        <div class="panel panel-default panel-shadow">
            <div class="panel-heading">
                Community Activity Participation Progress
            </div>
            <div class="panel-body">
                <?php if(empty($participationProgress)): ?>
                    <p class="No Completed Events Yet."></p>
                <?php else: ?>
                    <div id="area-activity-progress"></div>
                    <center><h5><strong>Community Member Participation for Activities (%)</strong></h5></center>
                <?php endif; ?>                
            </div>
        </div>
    </div>
</div>

<div class="row">
    <?php //echo var_dump($participationProgress); ?>
</div>

<script>
    
    var progAry = [];
    <?php foreach ($participationProgress as $progress): ?>
        var item = {
            activity: '<?php echo $progress['Activity']; ?>',
            presentage: <?php echo $progress['Presentage']; ?>            
        };
        progAry.push(item);        
    <?php endforeach; ?>
    
    console.log(progAry);
    
    Morris.Area({
        element: 'area-activity-progress',
        data: progAry,
        parseTime:false,
        lineColors: [ '#5cb85c'],
        xkey: 'activity',
        ykeys: ['presentage'],
        labels: ['Participation (%): '],
        pointSize: 2,
        hideHover: 'auto',
        resize: true,
        behaveLikeLine: false
    });
    

</script>