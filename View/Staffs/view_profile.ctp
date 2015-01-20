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
        <h2><?php echo $staff['Staff']['first_name'] . " " . $staff['Staff']['last_name']; ?> | View Profile</h2>
        <h4 class="page-subheader">View your current student profile.</h4>
    </div>
</div>
<!-- /. ROW  -->
<hr />
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10 col-sm-12 col-xs-12">
        <?php echo $this->Session->flash(); ?> 
            <div class="panel panel-default panel-shadow">
                <div class="panel-heading">
                    Details
                </div>
                <div class="panel-body">
                    <div class="col-md-6 col-sm-12 col-xs-12">  
                        <p class="profile-view-heading">Name</p>
                        <P class="profile-view-info"><?php echo $staff['Staff']['first_name'] . " " . $staff['Staff']['last_name']; ?></P>

                        <p class="profile-view-heading">Designation</p>
                        <P class="profile-view-info"><?php echo $staff['Staff']['designation']; ?></P>
                        
                        <p class="profile-view-heading">Username</p>
                        <P class="profile-view-info"><?php echo $staff['Staff']['username']; ?></P>
                                                
                        <p class="profile-view-heading">Gender</p>
                        <P class="profile-view-info"><?php echo $staff['Staff']['gender']; ?></P>

                        <p class="profile-view-heading">Email</p>
                        <P class="profile-view-info"><?php echo $staff['Staff']['email']; ?></P>

                        <p class="profile-view-heading">Contact No</p>
                        <P class="profile-view-info"><?php echo $staff['Staff']['contact_no']; ?></P>

                        <p class="profile-view-heading">Address</p>
                        <P class="profile-view-info"><?php echo $staff['Staff']['address']; ?></P>                            
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group input-group-lg">
                            <br />
                            <!--<label class="profile-view-heading">Photo</label>
                            <br /><br />-->
                            <?php 
                                echo $this->Html->image('../uploads/staffs/'. $staff['Staff']['profile_photo'], array(
                                    'width' => 200,
                                    'height' => 200,
                                    'class' => 'profile-image shadow')
                                );                                        
                            ?>
                        </div>
                        <p class="profile-view-heading">Biography</p>
                        <P class="profile-view-info profile-view-bio"><?php echo nl2br($staff['Staff']['bio']); ?></P>
                    </div>
                </div>
            </div>  
            <div class="panel panel-default panel-shadow">
                <div class="panel-heading">
                    Tasks
                </div>
                <div class="panel-body">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <?php echo $this->Html->link(__('Edit Profile'), array('controller' => 'Staffs' , 'action' => 'editProfile', $staff['Staff']['id']), array('class' => 'btn btn-primary btn-sm')); ?>
                        <?php echo $this->Html->link(__('Change Password'), array('controller' => 'Staffs' , 'action' => 'changePassword', $staff['Staff']['id']), array('class' => 'btn btn-primary btn-sm')); ?>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                    </div>
                </div>
            </div>  
    </div>    
    <div class="col-md-1"></div>
</div>
<!-- /. ROW  -->
