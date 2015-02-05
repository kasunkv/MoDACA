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
  .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 30px; margin-left: 35px; margin-top: 10px; margin-bottom: 20px; }
  .toggle.ios .toggle-handle { border-radius: 30px; width: 70px; }
</style>
<div class="row">
    <div class="col-md-12">
        <h2>Confirm Field Visit Attendance</h2>
        <h4 class="page-subheader">Confirm your group members Field Visit Attendance.</h4>
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
        <div class="panel panel-default panel-shadow">
            <div class="panel-heading">
                Participation Details
            </div>
            <div class="panel-body">
                <?php if(empty($visits)): ?>
                    <p class="text-muted">No Field Visits Added Yet.</p>
                <?php else: ?>
                    <?php echo $this->Form->create('FieldVisitConfirm', array(
                            'inputDefaults' => array(
                                'label' => false,
                            ),
                        ));
                    ?>
                    <?php $count = 0; ?>
                    <?php foreach ($visits as $visit): ?>
                    <?php if(empty($needsConfirming)) {
                        echo '<p class="text-muted">No Group Members Marked Their Participation Yet.</p>';
                        break;
                    } ;
                    ?>
                    <div class="row">                
                        <div class="col-md-12">
                            <?php $d = 0; ?>
                            <?php foreach($needsConfirming as $confirm): ?>                            
                                <?php if($visit['FieldVisit']['id'] === $confirm['FieldVisitAttendance']['field_visit_id']): ?>
                                    <?php if($confirm['Student']['id'] === $student['Student']['id'] || (empty($confirm['FieldVisitConfirm']['confirmer']) ? false : $confirm['FieldVisitConfirm']['confirmer'] === $student['Student']['id'])) continue; ?>                                        
                                        <?php if($d == 0): ?>
                                            <br />
                                            <h3 class="text-primary" style="margin-bottom: 20px; font-size: 2.5em;"><strong>Field Visit on <?php echo $visit['FieldVisit']['date']; ?></strong></h3>
                                            <br />
                                        <?php endif; ?>
                                        <div class="col-md-3 col-sm-6 col-xs-6">
                                            <?php 
                                                echo $this->Html->image('../uploads/students/'. $confirm['Student']['profile_photo'], array(
                                                    'alt' => 'Profile Image',
                                                    'class' => 'img-responsive img-circle shadow',
                                                    )
                                                );
                                            ?>
                                            <input type="text" name="data[<?php echo $count; ?>][FieldVisitConfirm][field_visit_attendance_id]" hidden="hidden" value="<?php echo $confirm['FieldVisitAttendance']['id']; ?>" /> 
                                            <input type="text" name="data[<?php echo $count; ?>][FieldVisitConfirm][field_visit_id]" hidden="hidden" value="<?php echo $confirm['FieldVisit']['id']; ?>" /> 
                                            <input type="text" name="data[<?php echo $count; ?>][FieldVisitConfirm][field_group_id]" hidden="hidden" value="<?php echo $student['Student']['field_group_id']; ?>" /> <!-- Field Group ID -->
                                            <input type="text" name="data[<?php echo $count; ?>][FieldVisitConfirm][confirmer]" hidden="hidden" value="<?php echo $student['Student']['id']; ?>" />
                                            <input type="text" name="data[<?php echo $count; ?>][FieldVisitConfirm][confirmee]" hidden="hidden" value="<?php echo $confirm['Student']['id']; ?>" />

                                            <h5 class="profile-image-name text-muted"><?php echo $confirm['Student']['first_name'] . ' ' . $confirm['Student']['last_name']; ?></h5>
                                            <hr />
                                            <h4>Status: <?php echo $confirm['FieldVisitAttendance']['attended'] == 1 ? '<span class="text-success"><b>Present</b></span>' : '<span class="text-danger"><b>Absent</b></span>'; ?></span></h4>
                                            <h5><strong>Is the above claim true?</strong></h5>
                                            <input type="checkbox" id="toggle" class="custom-checkbox" name="data[<?php echo $count; ?>][FieldVisitConfirm][correct]" data-style="ios" data-width="100" data-height="50" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="<strong>Yes</strong>" data-off="<strong> &nbsp;&nbsp;No</strong>">
                                        </div>
                                        <?php $d++; ?>
                                    <?php $count++; ?>
                                <?php endif; ?>                            
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php if($count != 0): ?>
                    <?php 
                        $form_end_options = array(
                            'label' => 'Submit Confirmation', 
                            'class' => 'btn btn-lg btn-success',
                            'style' => 'margin-top: 30px; margin-bottom: 20px;',
                            'div' => array(
                                'class' => 'col-md-12 text-center',
                            ),
                        );
                        echo $this->Form->end($form_end_options);
                    ?>
                    <?php else: ?>
                        <p class="text-muted">No Attendance to Confirm For Now.</p>
                    <?php endif; ?>
                <?php endif; ?>
                
            </div>
        </div>
    </div>
</div>

<div id="chart-container" class="row">    
    <div class="col-md-12">
        <?php //echo var_dump($visits, $needsConfirming, $count); ?>
    </div>
</div>

<script>
    $('.custom-checkbox').bootstrapToggle();
</script>