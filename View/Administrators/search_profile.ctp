<?php $this->layout = 'defaultLayout'; ?>
<?php
    $this->start('sideNav');
    echo $this->element('adminNav');
    $this->end();
?>
<div class="row">
    <div class="col-md-12">
        <h2>Administrator | Search Profiles</h2>
        <h5>Search existing user profiles</h5>
    </div>
</div>
<!-- /. ROW  -->
<hr />
<div class="row">
    <div class="col-md-1">

    </div>
    <div class="col-md-10">
        <h3>Search Profile</h3>
        <div class="panel panel-default">
            <div class="panel-heading">
                Details
            </div>
            <div class="panel-body">
                <div class="col-md-6">
                    <form role="form">  
                        <div class="form-group input-group-lg">
                            <label>Search By</label>
                            <!--select class="form-control" required>
                                <option>Username</option>
                                <option>Index No</option>
                            </select-->
                            <?php 
                                $options = array('Username' => 'Username', 'Index No' => 'Index No');
                                $attributes = array(
                                    'class' => 'form-control',
                                    ); 
                                echo $this->Form->select('Search By', $options, $attributes);
                            ?>
                        </div>
                        <?php 
                            echo $this->Form->input('', array(
                                'class' => 'form-control',
                                'placeholder' => 'Search Term', 
                                'type' => 'text',                    
                                'div' => array (
                                    'class' => 'form-group input-group-lg'
                                )
                            ));
                        ?>
                    </form>                             
                </div>
                <div class="col-md-6">
                    <br /><br /><br /><br />
                    <button type="submit" class="btn btn-lg btn-success btn-custom">Search</button>
                </div>

            </div>
        </div>  
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
                                <th>Fisrt Name</th>
                                <th>Last Name</th>
                                <th>Username</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Kasun</td>
                                <td>Kodagoda</td>
                                <td><a href="admin-view-profile.html" >kasunkv</a></td>
                                <td>
                                    <a href="admin-view-profile.html" title="admin-view profile" class="btn btn-success btn-xs">View</a>
                                    <a href="admin-edit-profile.html" title="edit" class="btn btn-primary btn-xs">Edit</a>
                                    <a href="#" title="delete profile" class="btn btn-danger btn-xs">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Kaushal</td>
                                <td>Nihathamana</td>
                                <td><a href="admin-view-profile.html" >kdkn</a></td>
                                <td>
                                    <a href="admin-view-profile.html" title="admin-view profile" class="btn btn-success btn-xs">View</a>
                                    <a href="admin-edit-profile.html" title="edit" class="btn btn-primary btn-xs">Edit</a>
                                    <a href="#" title="delete profile" class="btn btn-danger btn-xs">Delete</a>
                                </td>
                            </tr>                                                
                            <tr>
                                <td>4</td>
                                <td>Nadeesha</td>
                                <td>Thilakerathne</td>
                                <td><a href="admin-view-profile.html" >nadeesha</a></td>
                                <td>
                                    <a href="admin-view-profile.html" title="admin-view profile" class="btn btn-success btn-xs">View</a>
                                    <a href="admin-edit-profile.html" title="edit" class="btn btn-primary btn-xs">Edit</a>
                                    <a href="#" title="delete profile" class="btn btn-danger btn-xs">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Shifan</td>
                                <td>Mohamed</td>
                                <td><a href="admin-view-profile.html" >imshifan</a></td>
                                <td>
                                    <a href="admin-view-profile.html" title="admin-view profile" class="btn btn-success btn-xs">View</a>
                                    <a href="admin-edit-profile.html" title="edit" class="btn btn-primary btn-xs">Edit</a>
                                    <a href="#" title="delete profile" class="btn btn-danger btn-xs">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>                                                     
    </div>
    <div class="col-md-2">

    </div>
</div>
