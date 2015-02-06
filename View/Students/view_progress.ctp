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
<style>
    @media (max-width: 767px) {
        .progressbar-text {
            font-size: 3.7em;
            margin-top: -10px;
        }
    
    }
    
    
</style>
<div class="row">
    <div class="col-md-12">
        <h2>Peer Assessment</h2>
        <h4 class="page-subheader">Your individual Peer Assessment score can be used to evaluate your strengths and weaknesses on Field Visits and Community Activities.</h4>
    </div>
</div>
<!-- /. ROW  -->
<hr />
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <!--<h3>Peer Assessment</h3>-->
        <h4 class="page-subheader text-muted">
            The evaluation of your performance, contribution and behavior in the community done by your group members.
            The evaluation criteria is set by the lecturers and measured by set time intervals predefined by the lecturers.
        </h4>
        <br />
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default panel-shadow" id="overview-panel">
                    <div class="panel-heading">
                        Peer Assessment Overview
                    </div>
                    <div class="panel-body">
                        <div class="col-md-5 col-sm-12 col-xs-12">                            
                            <div id="overview"></div>
                            <center><h4><b>Final Cumulative Score</b></h4></center>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-6 col-sm-12 col-xs-12 line-progress">
                            <?php $id = 1; ?>
                            <?php foreach($criterias as $criteria): ?>
                                <h5><?php echo $criteria['AssesmentCriteria']['criteria']; ?></h5>
                                <div id="prog-line-<?php echo $id; ?>" ></div>      
                                <!--<hr />-->
                                <?php $id++; ?>
                            <?php endforeach; ?>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr />
        <?php if(empty($criterias)): ?>
            <p class="text-muted">No Assessment Criteria Available at this Point</p>
        <?php else: ?>
            <?php $id = 1; ?>
            <?php foreach($criterias as $criteria): ?>
                <div class="panel panel-default panel-shadow">
                    <div class="panel-heading">
                        <?php echo $criteria['AssesmentCriteria']['criteria']; ?>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div id="area-<?php echo $id; ?>"></div>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-5 col-sm-12 col-xs-12">
                                <div id="prog-<?php echo $id; ?>"></div>
                                <center><h4>Final Score</h4></center>
                            </div>   
                        </div>
                    </div>
                </div>        
                <hr />
                <?php $id++; ?>
            <?php endforeach; ?>
        <?php endif; ?>
        
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php //echo var_dump($result, $criterias,  $assesmentByCriteria, $avgScore, $finalAverage); ?>
    </div>
</div>

<script>
    <?php 
        $grandTotal = 0;
        $finalAverage = 0;
        $colorArray = ['#19bd9b', '#3598dc', '#f2c40f', '#8f44ad', '#34495e', '#e84c3d', '#2ecd71', '#d58512', '#d2322d', '#ac2925'];
    ?>
        
    <?php $i = 1; ?>
    <?php foreach ($assesmentByCriteria as $assesment): ?>
        <?php 
            $avgScore = 0;
            $total = 0;
            
        ?>
        Morris.Area({
            element: 'area-<?php echo $i; ?>',
            data: [
                <?php foreach($assesment as $as): ?>
                    <?php $total += $as['Score']; ?>
                {
                    checkpoint: '<?php echo $as['Checkpoint']; ?>',
                    score: <?php echo $as['Score']; ?>                         
                },
                <?php endforeach; ?> 
                <?php
                    $avgScore = $total / count($assesment);
                    $grandTotal += $avgScore;
                ?>
            ],
            parseTime: false,
            lineColors: ['<?php echo $colorArray[$i]; ?>'],
            xkey: 'checkpoint',
            ykeys: ['score'],
            labels: ['Score: '],
            pointSize: 2,
            hideHover: 'auto',
            resize: true,
            behaveLikeLine: false
        });
        
        var circle<?php echo $i; ?> = new ProgressBar.Circle('#prog-<?php echo $i; ?>', {
            color: '<?php echo $colorArray[$i]; ?>',
            strokeWidth: 10,
            trailWidth: 10,
            duration: 3000,
            text: {
                value: '0',

            },
            step: function(state, bar) {
                bar.setText((bar.value() * 100).toFixed(1) + '%');            
            }
        });

        circle<?php echo $i; ?>.animate(<?php echo $avgScore / 100; ?>, {
            easing: "bounce",
            },function() {
        
            }
        );

        var line<?php echo $i; ?> = new ProgressBar.Line('#prog-line-<?php echo $i; ?>', {
            color: '<?php echo $colorArray[$i]; ?>',
            strokeWidth: 4,
            trailWidth: 4,
            duration: 3000,
            text: {
                value: '0',

            },
            step: function(state, bar) {
                bar.setText((bar.value() * 100).toFixed(1) + '%');            
            }
        });

        line<?php echo $i; ?>.animate(<?php echo $avgScore / 100; ?>, {
            easing: "bounce",
            },function() {
        
            }
        );
        
        <?php $i++; ?>
    <?php endforeach; ?>
    <?php
        $finalAverage = $grandTotal / count($assesmentByCriteria);
    ?>
    
    var finalScore = new ProgressBar.Circle('#overview', {
            color: '#16c41e',
            strokeWidth: 14,
            trailWidth: 14,
            duration: 3000,
            text: {
                value: '0',

            },
            step: function(state, bar) {
                bar.setText((bar.value() * 100).toFixed(1) + '%');            
            }
        });

        finalScore.animate(<?php echo $finalAverage / 100; ?>, {
            easing: "bounce",
            },function() {
        
            }
        );
   
</script>
    
<!-- /. ROW  -->
