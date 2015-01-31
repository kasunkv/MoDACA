<?php $this->layout = 'defaultLayout'; ?>
<?php
    $this->start('sideNav');
    echo $this->element('staffNav');
    $this->end();
?>
<?php
    $this->start('logout');
    echo $this->element('logoutBtn');
    $this->end();
?>
<div class="row">
    <div class="col-md-12">
        <h2><?php echo $staff['Staff']['first_name'] . ' ' . $staff['Staff']['last_name']; ?> | Checkpoints & Criteria</h2>
        <h4 class="page-subheader">Set Checkpoints, Conditions & Criteria for Student Evaluation.</h4>
    </div>
</div>
<!-- /. ROW  -->
<hr />


<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <h3>Peer Assessment</h3>
            <h4 class="page-subheader">Add Checkpoints and Evaluation Criteria for Student Peer Reviews for their final evaluation.</h4>
            <br />
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <?php echo $this->Session->flash(); ?>    
                </div>    
            </div>
        </div>
        
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="panel panel-default panel-shadow">
                <div class="panel-heading">
                    Peer Assessment Checkpoints
                </div>
                <div class="panel-body">
                    <?php if(empty($checkpoints)): ?>
                    <p class="text-muted" style="margin-bottom: -15px;">No Checkpoints Added Yet.</p>
                    <?php else: ?>
                        <?php foreach($checkpoints as $checkpoint): ?>
                            <div class="activity-noti panel-shadow">
                                <div class="activity-noti-header">                            
                                    <h3 class="title blue"><?php echo $checkpoint['AssesmentCheckpoint']['checkpoint']; ?></h3>
                                </div>
                                <p class="activity-noti-desc text-muted"><?php echo $checkpoint['AssesmentCheckpoint']['description']; ?></p>                        
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                   
                    <br />
                    <hr />
                    <div>
                        <h4>Add Checkpoint</h4>
                        <?php echo $this->Form->create('AssesmentCheckpoint', array(
                            'inputDefaults' => array(
                                'label' => false,
                            ),
                        ));
                        ?>
                         <!-- Checkpoint -->
                        <?php 
                            echo $this->Form->input('checkpoint', array(
                                'class' => 'form-control',
                                'placeholder' => 'Checkpoint', 
                                'type' => 'text',                       
                                'div' => array (
                                    'class' => 'form-group'
                                )
                            ));
                        ?>    
                        
                        <!-- Description -->
                        <?php 
                            echo $this->Form->input('description', array(
                                'class' => 'form-control',
                                'placeholder' => 'Description goes here...', 
                                'type' => 'textarea',
                                'rows' => '4',                          
                                'div' => array (
                                    'class' => 'form-group'
                                )
                            ));
                        ?>    
                        
                        <?php 
                            $form_end_options = array(
                                'label' => 'Add Checkpoint', 
                                'class' => 'btn btn-sm btn-primary',                                
                            );
                            echo $this->Form->end($form_end_options);
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="panel panel-default panel-shadow">
                <div class="panel-heading">
                    Peer Assessment Criteria
                </div>
                <div class="panel-body">
                    <?php if(empty($criterias)): ?>
                        <p class="text-muted" style="margin-bottom: -15px;">No Criteria Added Yet.</p>
                    <?php else: ?>
                        <?php foreach($criterias as $criteria): ?>
                            <div class="activity-noti panel-shadow">
                                <div class="activity-noti-header">                            
                                    <h3 class="title blue"><?php echo $criteria['AssesmentCriteria']['criteria']; ?></h3>
                                </div>
                                <p class="activity-noti-desc text-muted"><?php echo $criteria['AssesmentCriteria']['description']; ?></p>                        
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    
                    <br />
                    <hr />
                    <div>
                        <h4>Add Criteria</h4>
                        <?php echo $this->Form->create('AssesmentCriteria', array(
                            'inputDefaults' => array(
                                'label' => false,
                            ),
                        ));
                        ?>
                         <!-- Criteria -->
                        <?php 
                            echo $this->Form->input('criteria', array(
                                'class' => 'form-control',
                                'placeholder' => 'Criteria', 
                                'type' => 'text',                       
                                'div' => array (
                                    'class' => 'form-group'
                                )
                            ));
                        ?>    
                        
                        <!-- Description -->
                        <?php 
                            echo $this->Form->input('description', array(
                                'class' => 'form-control',
                                'placeholder' => 'Description goes here...', 
                                'type' => 'textarea',
                                'rows' => '4',                          
                                'div' => array (
                                    'class' => 'form-group'
                                )
                            ));
                        ?>    
                        
                        <?php 
                            $form_end_options = array(
                                'label' => 'Add Criteria', 
                                'class' => 'btn btn-sm btn-primary',                                
                            );
                            echo $this->Form->end($form_end_options);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>