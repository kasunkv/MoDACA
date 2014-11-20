<?php $this->layout = 'defaultLayout'; ?>
<?php
    $this->start('sideNav');
    echo $this->element('studentNav');
    $this->end();
?>
<div class="row">
    <div class="col-md-12">
        <h2><?php echo $student['Student']['first_name'] . " " . $student['Student']['last_name']; ?> | View Profile</h2>
        <h4 class="page-subheader">View your current student profile.</h4>
    </div>
</div>
<!-- /. ROW  -->
<hr />
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <?php echo $this->Session->flash(); ?> 
            <div class="panel panel-default">
                <div class="panel-heading">
                    Details
                </div>
                <div class="panel-body">
                    <div class="col-md-6">  
                        <p class="profile-view-heading">Name</p>
                        <P class="profile-view-info"><?php echo $student['Student']['first_name'] . " " . $student['Student']['last_name']; ?></P>

                        <p class="profile-view-heading">Username</p>
                        <P class="profile-view-info"><?php echo $student['Student']['username']; ?></P>
                        
                        <p class="profile-view-heading">Field Group Name</p>
                        <P class="profile-view-info"><?php echo $student['FieldGroup']['name']; ?></P>
                        
                        <p class="profile-view-heading">Gender</p>
                        <P class="profile-view-info"><?php echo $student['Student']['gender']; ?></P>

                        <p class="profile-view-heading">Registration No</p>
                        <P class="profile-view-info"><?php echo $student['Student']['reg_no']; ?></P>
                        
                        <p class="profile-view-heading">Index No</p>
                        <P class="profile-view-info"><?php echo $student['Student']['index_no']; ?></P>

                        <p class="profile-view-heading">Email</p>
                        <P class="profile-view-info"><?php echo $student['Student']['email']; ?></P>

                        <p class="profile-view-heading">Contact No</p>
                        <P class="profile-view-info"><?php echo $student['Student']['contact_no']; ?></P>

                        <p class="profile-view-heading">Address</p>
                        <P class="profile-view-info"><?php echo $student['Student']['address']; ?></P>                            
                    </div>
                    <div class="col-md-6">
                        <div class="form-group input-group-lg">
                            <br />
                            <!--<label class="profile-view-heading">Photo</label>
                            <br /><br />-->
                            <?php 
                                echo $this->Html->image('../uploads/students/'.$student['Student']['profile_photo'], array(
                                    'width' => 200,
                                    'height' => 200,
                                    'class' => 'profile-image')
                                );                                        
                            ?>
                        </div>
                        <p class="profile-view-heading">Biography</p>
                        <P class="profile-view-info profile-view-bio"><?php echo $student['Student']['bio']; ?></P>
                    </div>
                </div>
            </div>  
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tasks
                </div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <?php echo $this->Html->link(__('Edit Profile'), array('controller' => 'students' , 'action' => 'editStudent', $student['Student']['id']), array('class' => 'btn btn-primary btn-sm')); ?>
                        <?php echo $this->Html->link(__('Change Password'), array('controller' => 'students' , 'action' => 'changePassword', $student['Student']['id']), array('class' => 'btn btn-primary btn-sm')); ?>
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>
            </div>  
    </div>
    <div class="col-md-2">

    </div>
</div>
<!-- /. ROW  -->
