<?php $this->layout = 'defaultLayout'; ?>
<?php
    $this->start('sideNav');
    echo $this->element('sideNavStdApprove');
    $this->end();
?>
<div class="row">
    <div class="col-md-12">
        <h2>Administrator | Student Registration Approval</h2>
        <h5>Approve student registration requests made to use MoDACA</h5>
    </div>
</div>
<!-- /. ROW  -->
<hr />

<div class="row">
    <div class="col-md-12">
        <?php echo $this->Session->flash(); ?>
        <div class="panel panel-default">
                <div class="panel-heading">
                    Pending Approvals
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fisrt Name</th>
                                    <th>Last Name</th>
                                    <th>Index No</th>
                                    <th>Profile</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
<!--                                <tr>
                                    <td>1</td>
                                    <td>Kasun</td>
                                    <td>Kodagoda</td>
                                    <td>Student</td>
                                    <td><a href="admin-view-profile.html" target="_blank">View</a></td>
                                    <td>
                                        <a href="#" title="approve" class="btn btn-success btn-xs">Approve</a>
                                        <a href="#" title="approve" class="btn btn-danger btn-xs">Decline</a>
                                    </td>
                                </tr>-->
                                <?php foreach ($students as $student): ?>
                                <tr>
                                    <td><?php echo h($student['Student']['id']);  ?></td>
                                    <td><?php echo h($student['Student']['first_name']);  ?></td>
                                    <td><?php echo h($student['Student']['last_name']);  ?></td>
                                    <td><?php echo h($student['Student']['index_no']);  ?></td>
                                    <td>
                                        <?php echo $this->Html->link(__('View'),
                                            array(
                                                'action' => 'view', $student['Student']['id'],                                            
                                            ),
                                            array(
                                                'class' => 'btn btn-primary btn-xs'
                                            ));
                                        ?>
                                    </td>
                                    <td>
                                        <!-- Approve -->
                                        <?php echo $this->Html->link(__('Approve'),
                                            array(
                                                'action' => 'regApprove', $student['Student']['id'],                                            
                                            ),
                                            array(
                                                'class' => 'btn btn-success btn-xs'
                                            ));
                                        ?>
                                        <!-- Decline -->
                                        <?php echo $this->Html->link(__('Decline'),
                                            array(
                                                'action' => 'regDecline', $student['Student']['id'],                                            
                                            ),
                                            array(
                                                'class' => 'btn btn-danger btn-xs'
                                            ));
                                        ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> 
    </div>
</div>
<!-- /. ROW  -->
<div class="row">


</div>
<!-- /. ROW  -->
<div class="row">

</div>
<!-- /. ROW  -->
<div class="row">
</div>
<!-- /. ROW  -->