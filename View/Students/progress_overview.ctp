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
        <h2>Individual Progress Overview</h2>
        <h4 class="page-subheader">See the overview of your current progress</h4>
    </div>
</div>
<!-- /. ROW  -->
<hr />
<div class="row">
    <div class="col-md-12">
        <div class="col-md-5 col-sm-12 col-xs-12">
            <h4><center><strong>Current Individual Performance</strong></center></h4>
            <br />
            <div id="prog-perf"></div>
            <br />
        </div>
        <div class="col-md-1 col-sm-12 col-xs-12"></div>
        <div class="col-md-6 col-sm-12 col-xs-12  line-progress">
            <h4><center><strong>Current Individual Performance</strong></center></h4>
            <br />
            <?php $id = 1; ?>
            <?php foreach($attendanceData as $key => $value): ?>
                <h5><?php echo $key; ?></h5>
                <div id="prog-line-<?php echo $id; ?>" ></div>      
                <!--<hr />-->
                <?php $id++; ?>
            <?php endforeach; ?>  
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php //var_dump($attendanceData); ?>
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
    
        $catCount = count($attendanceData);
        $total = 0;
        foreach($attendanceData as $key => $value) {
            $total += $value;                    
        }
        
        $finalProgScore = round($total / $catCount,  1);
    
        $colorFinalPerf = '#bf3a2b';
        if($finalProgScore > 75)
            $colorFinalPerf = $colorAry['Dark Grren'];
        else if($finalProgScore <= 75 && $finalProgScore > 50)
            $colorFinalPerf = $colorAry['Green'];
        else if($finalProgScore <= 50 && $finalProgScore > 25)
            $colorFinalPerf = $colorAry['Yellow'];
        else
            $colorFinalPerf = $colorAry['Red'];

    ?>
        
        var indiPerf = new ProgressBar.Circle('#prog-perf', {
            color: '<?php echo $colorFinalPerf; ?>',
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

        indiPerf.animate(<?php echo $finalProgScore / 100; ?>, {
            easing: "bounce",
            },function() {

            }
        );

        <?php $ctr = 1; ?>
        <?php foreach($attendanceData as $key => $value): ?>
            
            <?php 
            
                $colorFinalCategory = '#bf3a2b';
                if($value > 75)
                    $colorFinalCategory = $colorAry['Dark Grren'];
                else if($value <= 75 && $value > 50)
                    $colorFinalCategory = $colorAry['Green'];
                else if($value <= 50 && $value > 25)
                    $colorFinalCategory = $colorAry['Yellow'];
                else
                    $colorFinalCategory = $colorAry['Red'];
            
            ?>
            
            var line<?php echo $ctr; ?> = new ProgressBar.Line('#prog-line-<?php echo $ctr; ?>', {
                color: '<?php echo $colorFinalCategory; ?>',
                strokeWidth: 5,
                trailWidth: 5,
                duration: 3000,
                text: {
                    value: '0',

                },
                step: function(state, bar) {
                    bar.setText((bar.value() * 100).toFixed(1) + '%');            
                }
            });

            line<?php echo $ctr; ?>.animate(<?php echo $value / 100; ?>, {
                easing: "bounce",
                },function() {

                }
            );
            
            <?php $ctr++; ?>
        <?php endforeach; ?>
   
</script>
    
<!-- /. ROW  -->
