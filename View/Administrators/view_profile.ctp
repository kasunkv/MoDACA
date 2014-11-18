<?php $this->layout = 'defaultLayout'; ?>
<?php
    $this->start('sideNav');
    echo $this->element('adminNav');
    $this->end();
?>
<div class="row">
                    <div class="col-md-12">
                        <h2>Administrator | View Profiles</h2>
                        <h5>View selected user profile</h5>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <div class="col-md-1">
                                
                    </div>
                    <div class="col-md-10">
                        <h3>View Profile</h3>
                        <form role="form">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Details
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-6">
                                        <div class="form-group input-group-lg">
                                            <!-- <label>Role</label> -->
                                            <input class="form-control" placeholder="Role" required>
                                        </div>
                                        <div class="form-group input-group-lg">
                                            <!-- <label>Name</label> -->
                                            <input class="form-control" placeholder="First Name" required value="<?php echo h($administrator['Administrator']['first_name']); ?>">
                                        </div>
                                        <div class="form-group input-group-lg">
                                            <!-- <label>Name</label> -->
                                            <input class="form-control" placeholder="Last Name" required>
                                        </div>
                                        <div class="form-group input-group-lg">
                                            <!-- <label>Gender</label> -->
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="gender" id="radGenderMale" value="male" checked>
                                                    Male
                                                </label>                                                
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="gender" id="radGenderMale" value="female">
                                                    Female
                                                </label>                                                
                                            </div>
                                        </div>
                                        <div class="form-group input-group-lg">
                                            <!-- <label>Registration No</label> -->
                                            <input class="form-control" placeholder="Registration No" required>
                                        </div>
                                        <div class="form-group input-group-lg">
                                            <!-- <label>Index No"</label> -->
                                            <input class="form-control" placeholder="Index No" required>
                                        </div>
                                        <div class="form-group input-group-lg">
                                            <!-- <label>Group No</label> -->
                                            <input class="form-control" placeholder="Group No" required>
                                        </div>
                                        <div class="form-group input-group-lg">
                                            <!-- <label>Email</label> -->
                                            <input class="form-control" placeholder="Email" required>
                                        </div>
                                        <div class="form-group input-group-lg">
                                            <!-- <label>Contact No</label> -->
                                            <input class="form-control" placeholder="Contact No" required>
                                        </div>
                                        <div class="form-group">
                                            <!-- <label>Address</label> -->
                                            <textarea class="form-control" rows="4" placeholder="Address"></textarea>
                                        </div>                               
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group input-group-lg">
                                            <label>Photo</label>
                                            <br /><br />
                                            <img src="assets/img/find_user1.png" height="128" width="128">
                                        </div>
                                        <div class="form-group">
                                            <label>Bio</label>
                                            <textarea class="form-control" rows="21" placeholder="Enter bio here"></textarea>
                                        </div> 
                                    </div>
                                </div>
                            </div>  
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Tasks
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-6">
                                        <a href="admin-edit-profile.html" class="btn btn-primary btn-sm">Edit Profile</a>                                        
                                    </div>
                                    <div class="col-md-6">
                                        
                                    </div>
                                </div>
                            </div>
                        </form>                                 
                    </div>
                    <div class="col-md-2">
                        
                    </div>
                </div>
