<?php $this->layout = 'defaultLayout'; ?>
<?php
    $this->start('sideNav');
    echo $this->element('studentNav');
    $this->end();
?>
<div class="row">
    <div class="col-md-12">
        <h2><?php echo $student['Student']['first_name'] . " " . $student['Student']['last_name']; ?> | Group Members</h2>
        <h4 class="page-subheader">View your field group members</h4>
    </div>
</div>
<!-- /. ROW  -->
<hr />
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
                <div class="panel-heading">
                    Results
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>  
                                    <th>Index</th>
                                    <th>Profile</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($grpStudents as $student): ?>
                                <tr>
                                    <td><?php echo h($i);  ?></td>
                                    <td><?php echo h($student['Student']['first_name']) . ' ' . h($student['Student']['last_name']); ?></td>
                                    <td><?php echo h($student['Student']['index_no']);  ?></td>
                                    <td>
                                        <?php echo $this->Html->link(__('View'),
                                            array(
                                                'action' => 'viewMemberProfile', $student['Student']['id'],                                            
                                            ),
                                            array(
                                                'class' => 'btn btn-success btn-xs'
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

</div>
<!-- /. ROW  -->