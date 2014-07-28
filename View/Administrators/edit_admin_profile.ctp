<?php $this->layout = 'defaultLayout'; ?>

<div class="row">
    <div class="col-md-12">
        <h2>Administrator | Edit Profile</h2>
        <h5>Edit an existing user profile</h5>
    </div>
</div>
<!-- /. ROW  -->
<hr />
<div class="row">
    <div class="col-md-1">

    </div>
    <div class="col-md-10">
        <h3>Edit Profile</h3>
        <form role="form">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Details
                </div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <div class="form-group input-group-lg">
                            <label>Role</label>
                            <select class="form-control" required>
                                <option>Administrator</option>
                                <option>Student</option>
                                <option>Lecturer</option>
                            </select>
                        </div>
                        <div class="form-group input-group-lg">
                            <input class="form-control" placeholder="Name" required>
                        </div>
                        <div class="form-group input-group-lg">
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
                            <input class="form-control" placeholder="Designation" required>
                        </div>
                        <!--div class="form-group input-group-lg">
                            <input class="form-control" placeholder="Index No" required>
                        </div>
                        <div class="form-group input-group-lg">
                            <input class="form-control" placeholder="Group No" required>
                        </div-->
                        <div class="form-group input-group-lg">
                            <input class="form-control" placeholder="Email" required>
                        </div>
                        <div class="form-group input-group-lg">
                            <input class="form-control" placeholder="Contact No" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="4" placeholder="Address"></textarea>
                        </div>                               
                    </div>
                    <div class="col-md-6">
                        <div class="form-group input-group-lg">
                            <label>Photo</label>
                            <br /><br />
                            <img src="../../webroot/img/find_user.png" height="128" width="128">
                        </div>
                        <div class="form-group">
                            <label>Bio</label>
                            <textarea class="form-control" rows="13" placeholder="Enter bio here"></textarea>
                            <!--textarea class="form-control" rows="19" placeholder="Enter bio here"></textarea-->
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
                        <a href="#" class="btn btn-primary btn-sm">Delete Profile</a>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-lg btn-success btn-custom">Save</button>
            <!-- <button type="reset" class="btn btn-lg btn-danger btn-custom">Cancle</button> -->
            <a href="admin-view-profile.html" class="btn btn-lg btn-danger btn-custom">Cancle</a>
        </form>                                 
    </div>
    <div class="col-md-2">

    </div>
</div>