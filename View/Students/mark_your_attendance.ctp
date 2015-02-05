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
  .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20px; }
  .toggle.ios .toggle-handle { border-radius: 10px; width: 50px; }
</style>
<div class="row">
    <div class="col-md-12">
        <h2>Field Visit Attendance</h2>
        <h4 class="page-subheader">Mark your attendance for the most recently finished field visit by your group.</h4>
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
        <div class="col-md-6 col-sm-12 col-xs-12">
            <h3>Mark Attendance</h3>
            <br />
            <div class="panel panel-default panel-shadow">
                <div class="panel-heading">
                    Field Visit Details
                </div>
                <div class="panel-body" >                    
                    <h3 style="font-size: 1.8em;" class="text-success">Field Visit : <?php echo $mostRecent['FieldVisit']['date']; ?></h3>
                    <h5 style="font-size: 1.2em; margin-top: -5px;"><strong><?php echo $mostRecent['FieldCommunity']['village_name']; ?></strong></h5>
                    <br />
                    <h4 style="margin-top: -5px;" class="text-primary">Main Objective</h4>
                    <p class="text-muted" style="margin-top: -10px;"><?php echo $mostRecent['FieldVisit']['main_objective']; ?></p>
                    
                    <h4 style="margin-top: -5px;" class="text-primary">Other Objectives</h4>
                    <p class="text-muted" style="margin-top: -10px;"><?php echo $mostRecent['FieldVisit']['other_objective']; ?></p>
                      
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12">
            <h4 style="font-size: 1.5em;"><strong>Did you participate in this field visit?</strong></h4>
            <br />
            <?php echo $this->Form->create('FieldVisitAttendance', array(
                'inputDefaults' => array(
                    //'label' => false,
                ),
            ));
            ?>
            <input type="hidden" name="data[FieldVisitAttendance][field_visit_id]" value="<?php echo $mostRecent['FieldVisit']['id']; ?>" />
            <input type="hidden" name="data[FieldVisitAttendance][student_id]" value="<?php echo $student['Student']['id']; ?>" />
            <input type="hidden" name="data[FieldVisitAttendance][field_group_id]" value="<?php echo $student['FieldGroup']['id']; ?>" />
            <div class="checkbox">
                <input type="checkbox" id="toggle" name="data[FieldVisitAttendance][attended]" data-style="ios" data-width="150" data-height="75" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="<h4><strong>Yes, I Did</strong></h4>" data-off="<h4><strong> &nbsp;&nbsp;No, I Did Not</strong></h4>">
            </div>
            <div class="col-md-12">
                <hr />
            </div>
            
            <?php 
                $form_end_options = array(
                    'label' => 'Submit', 
                    'class' => 'btn btn-lg btn-primary ',
                    'style' => 'margin-left: 20px;'
                );
                echo $this->Form->end($form_end_options);
            ?>
        </div>        
    </div>
</div>

<div id="chart-container" class="row">    
    <div class="col-md-12">
        <?php echo var_dump($mostRecent, $visits); ?>
    </div>
</div>

<script>
    $('#toggle').bootstrapToggle();
</script>