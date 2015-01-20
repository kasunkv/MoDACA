<?php $this->layout = 'defaultLayout'; ?>
<?php
    $this->start('sideNav');
    echo $this->element('adminNav');
    $this->end();
?>
<?php
    $this->start('logout');
    echo $this->element('logoutBtn');
    $this->end();
?>
<div class="row">
    <div class="col-md-12">
        <h2>Administrator | Student Registration Approval</h2>
        <h4 class="page-subheader">Approve pending student registration requests</h4>
    </div>
</div>
<!-- /. ROW  -->
<hr />

<div class="row">
    <div class="col-md-12">
         <?php echo $this->Session->flash(); ?> 
        <div class="panel panel-default">
                <div class="panel-heading">
                    Results
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <?php if(!empty($students)): ?>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="table-header-style">#</th>
                                    <th class="table-header-style">Photo</th>
                                    <th class="table-header-style">Full Name</th>
                                    <th class="table-header-style">Username</th>
                                    <th class="table-header-style">Profile</th>
                                    <th class="table-header-style">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($students as $student): ?>
                                
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td>
                                        <?php 
                                            echo $this->Html->image('../uploads/students/'.$student['Student']['profile_photo'], array(
                                                'width' => 60,
                                                'height' => 60,
                                                'class' => 'profile-image-approve')
                                            );                                        
                                        ?>
                                    </td>
                                    <td class="approve-request-name"><?php echo $student['Student']['first_name'] . " " . $student['Student']['last_name']; ?></td>
                                    <td class="approve-request-name"><?php echo $student['Student']['username']; ?></td>
                                    <td><?php echo $this->Html->link(__('View Profile'), array('controller' => 'administrators' , 'action' => 'viewStudentProfile', $student['Student']['id']), array('class' => 'btn btn-info btn-sm')); ?></td>
                                    <td>
                                        <!--<a href="#" title="approve" class="btn btn-success btn-xs">Approve</a>-->
                                        <?php echo $this->Html->link(__('Approve'), array('controller' => 'administrators' , 'action' => 'requestApprove', $student['Student']['user_id']), array('class' => 'btn btn-success btn-sm')); ?>
                                        <!--<a href="#" title="approve" class="btn btn-danger btn-xs">Decline</a>-->
                                        <?php echo $this->Html->link(__('Decline'), array('controller' => 'administrators' , 'action' => 'requestDecline', $student['Student']['user_id']), array('class' => 'btn btn-danger btn-sm')); ?>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php else: ?>
                            <h4>No Pending Approvals</h4>                        
                        <?php endif; ?>
                    </div>
                </div>
            </div> 
    </div>
</div>