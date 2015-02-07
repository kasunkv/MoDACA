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
    .main-chart .progressbar-text {
        font-size: 5.8em;
        margin-top: -10px;
    }
    
    .progressbar-text {
        font-size: 3em;
        margin-top: -10px;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <h2>Group Progress</h2>
        <h4 class="page-subheader">View your Groups Progress</h4>
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
        <div class="col-md-3 col-sm-12 col-xs-12"></div>
        <div class="col-md-6 col-sm-12 col-xs-12 main-chart">
            <h3><center><strong>Final Group Performance</strong></center></h3>
            <br />
            <div id="prog-final-perf" ></div>
            <br />
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12"></div>            
    </div>
</div>
<div class="row">
    <div class="col-md-12">       
        <hr />       
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php $i = 1; ?>
        <?php foreach($groupProgressData['Final Scores'] as $key => $value): ?>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <br />
                <div id="chart-<?php echo $i; ?>" ></div>
                <h5><center><strong><?php echo $key; ?></strong></center></h5>
                <br />
            </div> 
            <?php $i++; ?>
        <?php endforeach; ?>         
    </div>
</div>
<div class="row">
    <div class="col-md-12">       
        <hr />       
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h3><stron>Your Group Member's Performance During Your Field Work</stron></h3>
        <p class="text-muted" style="margin-top: -30px;">&nbsp;&nbsp;This is how your group members have performed during the field visits.</p>
        <br />
        <?php $ctr = 1; ?>
        <?php foreach ($groupProgressData['Members'] as $member): ?>
            <div class="col-md-3 col-sm-6 col-xs-6 line-progress">
                <?php 
                    echo $this->Html->image('../uploads/students/'. $member['Student Photo'], array(
                        'alt' => 'Profile Image',
                        'class' => 'img-responsive img-circle shadow',
                        )
                    );
                ?>
                <h5 class="profile-image-name text-muted"><?php echo $member['Student Name']; ?></h5>
                <hr />     
                <?php foreach($member['Scores'] as $key => $value): ?>
                <h5 style="margin-top: 15px;"><strong><?php echo $key; ?></strong></h5>
                    <div id="member-prog<?php echo $ctr; ?>"></div>
                    <?php $ctr++; ?>
                <?php endforeach; ?>
                <br /><br />
            </div>        
        <?php endforeach; ?>        
    </div>
</div>

<div id="chart-container" class="row">    
    <div class="col-md-12">
        <?php //var_dump($groupProgressData); ?>
    </div>
</div>

<script>
    <?php
        $colorAry = [
            'Dark Grren' => '#0a870f',
            'Green' => '#16c41e',
            'Yellow' => '#f2c40f',
            'Red' => '#bf3a2b'
            ];
    ?>
       <?php    
                            
                $mainChartColor = '#bf3a2b';
                if($groupProgressData['Score'] > 75)
                    $mainChartColor = $colorAry['Dark Grren'];
                else if($groupProgressData['Score'] <= 75 && $groupProgressData['Score'] > 50)
                    $mainChartColor = $colorAry['Green'];
                else if($groupProgressData['Score'] <= 50 && $groupProgressData['Score'] > 25)
                    $mainChartColor = $colorAry['Yellow'];
                else
                    $mainChartColor = $colorAry['Red'];

            ?>
       
       var finalScore = new ProgressBar.Circle('#prog-final-perf', {
            color: '<?php echo $mainChartColor; ?>',
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

        finalScore.animate(<?php echo $groupProgressData['Score'] / 100; ?>, {
            easing: "bounce",
            },function() {

            }
        );
       
       
       
        <?php $i = 1; ?>
        <?php foreach($groupProgressData['Final Scores'] as $key => $value): ?>
            <?php    
                
                $chartColor = '#bf3a2b';
                if($value > 75)
                    $chartColor = $colorAry['Dark Grren'];
                else if($value <= 75 && $value > 50)
                    $chartColor = $colorAry['Green'];
                else if($value <= 50 && $value > 25)
                    $chartColor = $colorAry['Yellow'];
                else
                    $chartColor = $colorAry['Red'];

            ?>
                var indiScore<?php echo $i; ?> = new ProgressBar.Circle('#chart-<?php echo $i; ?>', {
                    color: '<?php echo $chartColor; ?>',
                    strokeWidth: 6,
                    trailWidth: 6,
                    duration: 3000,
                    text: {
                        value: '0',

                    },
                    step: function(state, bar) {
                        bar.setText((bar.value() * 100).toFixed(1) + '%');            
                    }
                });

                indiScore<?php echo $i; ?>.animate(<?php echo $value / 100; ?>, {
                    easing: "bounce",
                    },function() {

                    }
                );
            <?php $i++; ?>
        <?php endforeach; ?>
            
        <?php $a = 1; ?>
        <?php foreach($groupProgressData['Members'] as $grpMember): ?>
            <?php foreach($grpMember['Scores'] as $key => $value): ?>
                
                <?php    
                
                    $chColor = '#bf3a2b';
                    if($value > 75)
                        $chColor = $colorAry['Dark Grren'];
                    else if($value <= 75 && $value > 50)
                        $chColor = $colorAry['Green'];
                    else if($value <= 50 && $value > 25)
                        $chColor = $colorAry['Yellow'];
                    else
                        $chColor = $colorAry['Red'];

                ?>
                
                var line<?php echo $a; ?> = new ProgressBar.Line('#member-prog<?php echo $a; ?>', {
                    color: '<?php echo $chColor; ?>',
                    strokeWidth: 9,
                    trailWidth: 9,
                    duration: 3000,
                    text: {
                        value: '0',

                    },
                    step: function(state, bar) {
                        bar.setText((bar.value() * 100).toFixed(1) + '%');            
                    }
                });

                line<?php echo $a; ?>.animate(<?php echo $value / 100; ?>, {
                    easing: "bounce",
                    },function() {

                    }
                );
                    
                <?php $a++; ?>
            <?php endforeach; ?>
        <?php endforeach; ?>
            
</script>