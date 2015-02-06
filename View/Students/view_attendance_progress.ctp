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
     @media (max-width: 480px) {
        .progressbar-text {
            font-size: 3.7em;
            margin-top: -10px;
        }
    
    }
    
</style>
<div class="row">
    <div class="col-md-12">
        <h2>Field Visit Attendance</h2>
        <h4 class="page-subheader">How you attend your Field Visits impact greatly on your performances and your group. Keep your attendance at a high percentage.</h4>
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
        <h3>Attendance Progress</h3>
        <br />
        <div class="panel panel-default panel-shadow">
            <div class="panel-heading">
                Attendance Details
            </div>
            <div class="panel-body" >
                <div class="col-md-5 col-sm-12 col-xs-12">
                    <h4><center><strong>Overall Attendance Percentage</strong></center></h4>
                    <br />
                    <div id="prog-attendance"></div>
                    <hr />
                    <!-- Completed Field Visits -->
                    <div class="col-md-6 col-sm-6 col-xs-6">           
                        <div class="panel ">
                          <div class="main-temp-back bg-color-green">
                            <div class="panel-body">
                              <div class="row">
                                <div class="col-xs-12">
                                    <i class="fa fa-check fa-3x"></i>                                    
                                    <span class="text-temp" style="padding-left: 20px;"> <?php echo $attendanceData['completed_visits']; ?> </span>
                                </div>
                                <div class="col-xs-12">
                                  <a class="notification-link-1" href="#" >Finished Visits</a>
                                </div>
                              </div>
                            </div>
                          </div>          
                        </div>
                    </div>

                    <!-- Mark Attendance -->
                    <div class="col-md-6 col-sm-6 col-xs-6">           
                        <div class="panel ">
                          <div class="main-temp-back bg-alizarin">
                            <div class="panel-body">
                              <div class="row">
                                <div class="col-xs-12">
                                    <i class="fa fa-flag-checkered fa-3x"></i>                                
                                    <span class="text-temp" style="padding-left: 20px;"> <?php echo $attendanceData['total_visits']; ?> </span>
                                </div>
                                <div class="col-xs-12">
                                  <a class="notification-link-1" href="#" >Total Field Visits</a>
                                </div>
                              </div>
                            </div>
                          </div>          
                        </div>
                    </div>
                </div>
                
                <div class="col-md-7 col-sm-12 col-xs-12">
                    <h3>Field Visit Attendance In Details</h3>
                    <br />
                    <div class="table-responsive panel-shadow">
                    <?php if(empty($attendanceData['VisitTable'])): ?>
                        <p class="text-muted">Attendance is Not Yet Marked.</p>
                    <?php else: ?>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th><h4>Visit<br> Date</h4></th>
                                    <th><h4>Your<br> Status</h4></th>
                                    <th><h4>Group<br> Attendance</h4></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($attendanceData['VisitTable'] as $attendance): ?>                                    
                                    <tr>
                                        <td><span class="text-center"><h4><strong><?php echo $attendance['date']; ?></strong></h4></span></td>
                                        <td><span class="text-success text-center"><strong><?php echo ($attendance['status'] == 'Attended') ? '<h4><strong class="text-success">'. $attendance['status'] .'</strong></h4>' : '<h4><strong class="text-danger">'. $attendance['status'] .'</strong></h4>'; ?></strong></span></td>
                                        <td><span class="text-danger text-center"><h4 class="text-primary"><strong><?php echo $attendance['group_attendance']; ?> %</strong></h4></span></td>                            
                                    </tr>                                    
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                    
                </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div id="chart-container" class="row">    
    <div class="col-md-12">
        <?php //var_dump($attendanceData); ?>
    </div>
</div>

<script>
    <?php if($attendanceData['percentage'] != 0): ?>
        <?php
            $colorAry = [
                'Dark Grren' => '#0a870f',
                'Green' => '#16c41e',
                'Yellow' => '#f2c40f',
                'Red' => '#bf3a2b'
                ];
            $colorVisit = '#bf3a2b';
            if($attendanceData['percentage'] > 75)
                $colorVisit = $colorAry['Dark Grren'];
            else if($attendanceData['percentage'] <= 75 && $attendanceData['percentage'] > 50)
                $colorVisit = $colorAry['Green'];
            else if($attendanceData['percentage'] <= 50 && $attendanceData['percentage'] > 25)
                $colorVisit = $colorAry['Yellow'];
            else
                $colorVisit = $colorAry['Red'];
                    
        ?>
        var visitsProgress = new ProgressBar.Circle('#prog-attendance', {
            color: '<?php echo $colorVisit; ?>',
            strokeWidth: 8,
            trailWidth: 8,
            duration: 3000,
            text: {
                value: '0',

            },
            step: function(state, bar) {
                bar.setText((bar.value() * 100).toFixed(1) + '%');            
            }
        });

        visitsProgress.animate(<?php echo $attendanceData['percentage'] / 100; ?>, {
            easing: "bounce",
            },function() {

            }
        );
    <?php endif; ?>
</script>