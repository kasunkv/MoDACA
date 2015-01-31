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
        <h2><?php echo $criteria['AssesmentCriteria']['criteria']; ?> | Peer Assessment</h2>
        <h4 class="page-subheader">Evaluate your group members for their performance under the following criteria.</h4>
    </div>
</div>
<!-- /. ROW  -->
<hr />


<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <h3><?php echo $criteria['AssesmentCriteria']['criteria']; ?></h3>
            <h4 class="page-subheader text-muted"><?php echo $criteria['AssesmentCriteria']['description']; ?></h4>
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
                    Peer Assessment
                </div>
                <div class="panel-body">
                    <?php echo $this->Form->create('PeerAssesment', array(
                            'inputDefaults' => array(
                                'label' => false,
                            ),
                        ));
                    ?>
                    <input type="text" name="data[PeerAssesment][field_group_id]" hidden="hidden" value="<?php echo $student['Student']['field_group_id']; ?>" /> <!-- Field Group ID -->
                    <input type="text" name="data[PeerAssesment][assesment_criteria_id]" hidden="hidden" value="<?php echo $criteria['AssesmentCriteria']['id']; ?>" /> <!-- Checkpoint ID -->
                    <input type="text" name="data[PeerAssesment][assesment_checkpoint_id]" hidden="hidden" value="<?php echo $checkpoint['AssesmentCheckpoint']['id']; ?>" /> <!-- Criteria ID -->
                    <?php $count = 0; ?>
                    <?php foreach ($students as $std): ?>
                        <?php if($std['Student']['id'] === $student['Student']['id']) continue; ?>
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <?php 
                                echo $this->Html->image('../uploads/students/'. $std['Student']['profile_photo'], array(
                                    'alt' => 'Profile Image',
                                    'class' => 'img-responsive img-circle shadow',
                                    )
                                );
                            ?>
                            <h5 class="profile-image-name text-muted"><?php echo $std['Student']['first_name'] . ' ' . $std['Student']['last_name']; ?></h5>
                            <hr />
                                <input type="text" hidden="hidden" name="data[PeerAssesment][Student][<?php echo $count; ?>][id]" value="<?php echo $std['Student']['id']; ?>" />
                                <?php 
                                    echo $this->Form->input('', array(
                                        'class' => 'rating',
                                        'type' => 'number',
                                        'min' => 0,
                                        'max' => 100,
                                        'step' => 1,
                                        'data-size' => 'xs',
                                        'name' => 'data[PeerAssesment][Student][' .$count . '][score]',
                                        'div' => array (
                                            'class' => 'form-group input-group-lg'
                                        )
                                    ));
                                ?>
                        </div>
                        <?php $count++; ?>
                    <?php endforeach; ?>
                    <?php 
                        $form_end_options = array(
                            'label' => 'Complete Evaluation', 
                            'class' => 'btn btn-lg btn-success',
                            'style' => 'margin-top: 30px; margin-bottom: 20px;',
                            'div' => array(
                                'class' => 'col-md-12 text-center',
                            ),
                        );
                        echo $this->Form->end($form_end_options);
                    ?>
                </div>
            </div>
        </div>        
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php //echo var_dump($data, $student, $students, $criteria, $checkpoint, $grpId, $checkId); ?>
    </div>
</div>

<script>
 
    $(".rating").rating({
        starCaptions: function (val) {
            return val + '%';
        },
        starCaptionClasses : function (val) {
            if(val < 20) {
                return 'label label-red';
            } else if(val >= 20 && val < 40) {
                return 'label label-orange';
            } else if(val >= 40 && val < 60) {
                return 'label label-yellow';
            } else if(val >= 60 && val < 80) {
                return 'label label-light-green';
            } else {
                return 'label label-green';
            }
        }
    });
 
</script>