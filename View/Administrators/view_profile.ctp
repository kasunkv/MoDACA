<?php $this->layout = 'defaultLayout'; ?>
<?php
    $this->start('sideNav');
    echo $this->element('adminNav');
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
        <div class="panel panel-default">
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
<<<<<<< HEAD
                <div class="panel-body">
                    <div class="col-md-6">
                        <!-- <label>Role</label> -->
                        <?php 
                            echo $this->Form->input('', array(
                                'class' => 'form-control',
                                'placeholder' => 'Role', 
                                'type' => 'text',                    
                                'div' => array (
                                    'class' => 'form-group input-group-lg'
                                )
                            ));
                        ?>
                        <!-- <label>First Name</label> -->
                        <?php 
                            echo $this->Form->input('', array(
                                'class' => 'form-control',
                                'placeholder' => 'First Name', 
                                'type' => 'text',  
                                'value' => h($administrator['Administrator']['first_name']),
                                'div' => array (
                                    'class' => 'form-group input-group-lg'
                                )
                            ));
                        ?>
                        <!-- <label>Last Name</label> -->
                        <?php 
                            echo $this->Form->input('', array(
                                'class' => 'form-control',
                                'placeholder' => 'Last Name', 
                                'type' => 'text',   
                                'value' => h($administrator['Administrator']['last_name']),
                                'div' => array (
                                    'class' => 'form-group input-group-lg'
                                )
                            ));
                        ?>
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
                        <!-- <label>Designation No</label> -->
                        <?php 
                            echo $this->Form->input('', array(
                                'class' => 'form-control',
                                'placeholder' => 'Designation', 
                                'type' => 'text',                    
                                'div' => array (
                                    'class' => 'form-group input-group-lg'
                                )
                            ));
                        ?>
                        <!-- <label>Email</label> -->
                        <?php 
                            echo $this->Form->input('', array(
                                'class' => 'form-control',
                                'placeholder' => 'Email', 
                                'type' => 'text',                    
                                'div' => array (
                                    'class' => 'form-group input-group-lg'
                                )
                            ));
                        ?>
                        <!-- <label>Contact No</label> -->
                        <?php 
                            echo $this->Form->input('', array(
                                'class' => 'form-control',
                                'placeholder' => 'Contact No', 
                                'type' => 'text',                    
                                'div' => array (
                                    'class' => 'form-group input-group-lg'
                                )
                            ));
                        ?>
                        <!-- <label>Address</label> -->
                        <?php 
                            echo $this->Form->input('', array(
                                'class' => 'form-control',
                                'placeholder' => 'Address', 
                                'type' => 'textarea',
                                'rows' => '4',
                                'div' => array (
                                    'class' => 'form-group'
                                )
                            ));
                        ?>    
                    </div>
                    <div class="col-md-6">
                        <div class="form-group input-group-lg">
                            <label>Photo</label>
                            <br /><br />
                            <img src="assets/img/find_user1.png" height="128" width="128">
                        </div>
                        <!--Bio-->
                        <?php 
                                echo $this->Form->input('biography', array(
                                    'class' => 'form-control',
                                    'placeholder' => 'Enter your biography here...', 
                                    'type' => 'textarea',
                                    'rows' => '22',                          
                                    'div' => array (
                                        'class' => 'form-group'
                                    )
                                ));
                        ?> 
                    </div>
=======
                <div class="col-md-6">
                    <p class="profile-view-heading">Profile Photo</p>
                    <img class="profile-view-img" src="../webroot/img/find_user.png" height="128" width="128">
                    
                    <p class="profile-view-heading">Biography</p>
                    <P class="profile-view-info profile-view-bio"><?php echo $administrator['Administrator']['bio']; ?></P>
>>>>>>> bd1b8ff66ee5ed3cca3419ab6ddf95f356eb964f
                </div>
                <br /><br />
            </div> 
        </div>
        
        <div class="panel panel-default">
                <div class="panel-heading">
                    Tasks
                </div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <a href="editAdminProfile" class="btn btn-primary btn-sm">Edit Profile</a>   
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
            </div>
    </div>
    <div class="col-md-1"></div>
</div>


