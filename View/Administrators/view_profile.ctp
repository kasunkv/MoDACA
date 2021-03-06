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
        <h2>Administrator | View Profile</h2>
        <h5>View selected user profile</h5>
    </div>
</div>
<!-- /. ROW  -->
<hr />
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <?php echo $this->Session->flash(); ?>
        <div class="panel panel-default shadow">
            <div class="panel-heading">
                Details
            </div>
            <div class="panel-body">
                <div class="col-md-6">
                    <p class="profile-view-heading">Name</p>
                    <P class="profile-view-info"><?php echo $administrator['Administrator']['first_name'] . " " .  $administrator['Administrator']['last_name']; ?></P>
                    
                    <p class="profile-view-heading">Gender</p>
                    <P class="profile-view-info"><?php echo $administrator['Administrator']['gender']; ?></P>
                    
                    <p class="profile-view-heading">Designation</p>
                    <P class="profile-view-info"><?php echo $administrator['Administrator']['designation']; ?></P>
                    
                    <p class="profile-view-heading">Email</p>
                    <P class="profile-view-info"><?php echo $administrator['Administrator']['email']; ?></P>
                    
                    <p class="profile-view-heading">Contact No</p>
                    <P class="profile-view-info"><?php echo $administrator['Administrator']['contact_no']; ?></P>
                    
                    <p class="profile-view-heading">Address</p>
                    <P class="profile-view-info"><?php echo $administrator['Administrator']['address']; ?></P>
                </div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <div class="form-group input-group-lg">
                            <br />
                            <?php         
                                if(!empty($administrator['Administrator']['profile_photo'])) {
                                    echo $this->Html->image('../uploads/admins/'. $administrator['Administrator']['profile_photo'], array(
                                        'alt' => 'Profile Image',
                                        'class' => 'user-image img-responsive shadow',
                                        )
                                    );         
                                } else {
                                    echo $this->Html->image('../uploads/default_user.png', array(
                                        'alt' => 'Profile Image',
                                        'class' => 'user-image img-responsive shadow',
                                        )
                                    ); 
                                }                                               
                            ?>
                        </div>

                        <p class="profile-view-heading">Biography</p>
                        <P class="profile-view-info profile-view-bio"><?php echo nl2br($administrator['Administrator']['bio']); ?></P>
                    </div>
                    <br /><br />
                </div> 
            </div>
            
        </div>
        <div class="panel panel-default shadow">
                <div class="panel-heading">
                    Tasks
                </div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <a href="editAdminProfile" class="btn btn-primary btn-sm">Edit Profile</a>   
                    </div>
                </div>
        </div>
    </div>
</div>



