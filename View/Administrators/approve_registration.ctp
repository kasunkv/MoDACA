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
        <h2>Administrator | Registration Approval</h2>
        <h5>Approve user requests made to use MoDACA</h5>
    </div>
</div>
<!-- /. ROW  -->
<hr />

<div class="row">
    <div class="col-md-12">
        <?php echo var_dump($results); ?>
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
                                    <th>Photo</th>
                                    <th>Full Name</th>
                                    <th>Role</th>
                                    <th>Profile</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Kasun</td>
                                    <td>Kodagoda</td>
                                    <td>Student</td>
                                    <td><a href="admin-view-profile.html" target="_blank">View</a></td>
                                    <td>
                                        <a href="#" title="approve" class="btn btn-success btn-xs">Approve</a>
                                        <a href="#" title="approve" class="btn btn-danger btn-xs">Decline</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Kaushal</td>
                                    <td>Nihathamana</td>
                                    <td>Student</td>
                                    <td><a href="admin-view-profile.html" target="_blank">View</a></td>
                                    <td>
                                        <a href="#" title="approve" class="btn btn-success btn-xs">Approve</a>
                                        <a href="#" title="approve" class="btn btn-danger btn-xs">Decline</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Saman</td>
                                    <td>Gammanpila</td>
                                    <td>Lecturer</td>
                                    <td><a href="admin-view-profile.html" target="_blank">View</a></td>
                                    <td>
                                        <a href="#" title="approve" class="btn btn-success btn-xs">Approve</a>
                                        <a href="#" title="approve" class="btn btn-danger btn-xs">Decline</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Nadeesha</td>
                                    <td>Thilakerathne</td>
                                    <td>Student</td>
                                    <td><a href="admin-view-profile.html" target="_blank">View</a></td>
                                    <td>
                                        <a href="#" title="approve" class="btn btn-success btn-xs">Approve</a>
                                        <a href="#" title="approve" class="btn btn-danger btn-xs">Decline</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Shifan</td>
                                    <td>Mohamed</td>
                                    <td>Student</td>
                                    <td><a href="admin-view-profile.html" target="_blank">View</a></td>
                                    <td>
                                        <a href="#" title="approve" class="btn btn-success btn-xs">Approve</a>
                                        <a href="#" title="approve" class="btn btn-danger btn-xs">Decline</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> 
    </div>
</div>