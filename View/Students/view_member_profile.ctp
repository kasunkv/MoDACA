<?php $this->layout = 'defaultLayout'; ?>
<?php
    $this->start('sideNav');
    echo $this->element('studentNav');
    $this->end();
?>
<?php
    $this->start('logout');
    echo $this->element('logoutBtn');
    $this->end();
?>
<div class="row">
    <div class="col-md-12">
        <h2>View Member Profile</h2>
        <h4>View your group member <i><?php echo $groupStudent['Student']['first_name'] . " " . $groupStudent['Student']['last_name'] . "'s"; ?></i> profile.</h4>
    </div>
</div>
<!-- /. ROW  -->
<hr />
<div class="row">
    <div class="col-md-1">

    </div>
    <div class="col-md-10">
        <h3>Group Member Profile</h3>
        <?php echo $this->Form->create('Student', array(
            'inputDefaults' => array(
                //'label' => false,
            ),
        ));
        ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Details
                </div>
                <div class="panel-body">
                    <div class="col-md-6">  
                        <p class="profile-view-heading">Name</p>
                        <P class="profile-view-info"><?php echo $groupStudent['Student']['first_name'] . " " .  $groupStudent['Student']['last_name']; ?></P>

                        <p class="profile-view-heading">Gender</p>
                        <P class="profile-view-info"><?php echo $groupStudent['Student']['gender']; ?></P>

                        <p class="profile-view-heading">Registration No</p>
                        <P class="profile-view-info"><?php echo $groupStudent['Student']['reg_no']; ?></P>
                        
                        <p class="profile-view-heading">Index No</p>
                        <P class="profile-view-info"><?php echo $groupStudent['Student']['index_no']; ?></P>

                        <p class="profile-view-heading">Email</p>
                        <P class="profile-view-info"><?php echo $groupStudent['Student']['email']; ?></P>

                        <p class="profile-view-heading">Contact No</p>
                        <P class="profile-view-info"><?php echo $groupStudent['Student']['contact_no']; ?></P>

                        <p class="profile-view-heading">Address</p>
                        <P class="profile-view-info"><?php echo $groupStudent['Student']['address']; ?></P>                                   
                    </div>
                    <div class="col-md-6">
                        <div class="form-group input-group-lg">
                            <br />
                             <?php 
                                echo $this->Html->image('../uploads/students/'.$groupStudent['Student']['profile_photo'], array(
                                    'width' => 200,
                                    'height' => 200,
                                    'class' => 'profile-image')
                                );                                        
                            ?>
                        </div>
                        <p class="profile-view-heading">Biography</p>
                        <P class="profile-view-info profile-view-bio"><?php echo nl2br($groupStudent['Student']['bio']); ?></P>
                    </div>
                </div>
            </div>             
            <?php echo $this->Form->end(); ?>       
    </div>
    <div class="col-md-2">

    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <a href="<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'viewGroupMembers', $student['Student']['field_group_id'])); ?>" class="back-link">
            <i class="fa fa-reply back-link-icon"></i>
            Back to Group Members
        </a>
    </div>
</div>
<br /><br />
<!-- /. ROW  -->
