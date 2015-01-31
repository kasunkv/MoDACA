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
        <h2>Group Members</h2>
        <h4 class="page-subheader">View your field group members</h4>
    </div>
</div>
<!-- /. ROW  -->
<hr />
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default panel-shadow">
                <div class="panel-heading">
                    Field Group Members
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="table-header-style">#</th>
                                    <th class="table-header-style">Photo</th>
                                    <th class="table-header-style">Full Name</th>
                                    <th class="table-header-style">Index</th>
                                    <th class="table-header-style">Profile</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($grpStudents as $student): ?>
                                <tr>
                                    <td><?php echo h($i);  ?></td>
                                    <td>
                                        <?php 
                                            echo $this->Html->image('../uploads/students/'.$student['Student']['profile_photo'], array(
                                                'width' => 60,
                                                'height' => 60,
                                                'class' => 'profile-image-approve panel-shadow')
                                            );                                        
                                        ?>
                                    </td>
                                    <td class="approve-request-name"><?php echo h($student['Student']['first_name']) . ' ' . h($student['Student']['last_name']); ?></td>
                                    <td class="approve-request-name"><?php echo h($student['Student']['index_no']);  ?></td>
                                    <td>
                                        <?php echo $this->Html->link(__('View'),
                                            array(
                                                'action' => 'viewMemberProfile', $student['Student']['id'],                                            
                                            ),
                                            array(
                                                'class' => 'btn btn-success'
                                            ));
                                        ?>
                                    </td>                                    
                                </tr>
                                <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> 
    </div>               
</div>
<!-- /. ROW  -->
<hr />
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <h3>Peer Assessment</h3>
        <h4 class="page-subheader">
            Evaluate your group members according to th checkpoints and criteria given by the lecturers.
            Please be honest when evaluating and once you evaluate for one checkpoint don't re evaluate them later (you will not 
            be able to).
        </h4>
        <br />
        <div class="panel panel-default panel-shadow">
            <div class="panel-heading">
                Peer Assessment Checkpoints
            </div>
            <div class="panel-body">
                <?php if(empty($checkpoints)): ?>
                    <p class="text-muted" style="margin-bottom: -15px;">No Checkpoints Added Yet.</p>
                <?php else: ?>
                    <?php foreach($checkpoints as $checkpoint): ?>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="activity-noti panel-shadow">
                                <div class="activity-noti-header">    
                                    <a href="<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'viewCheckpoint', $grpStudents[0]['Student']['field_group_id'], $checkpoint['AssesmentCheckpoint']['id'])) ?>">
                                        <h3 class="title blue"><?php echo $checkpoint['AssesmentCheckpoint']['checkpoint']; ?></h3>
                                    </a>
                                </div>
                                <p class="activity-noti-desc text-muted"><?php echo $checkpoint['AssesmentCheckpoint']['description']; ?></p>                        
                            </div>
                        </div>                        
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <?php //echo var_dump($checkpoints, $grpStudents); ?>
    </div>
</div>
<!-- /. ROW  -->