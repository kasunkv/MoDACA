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
            <div class="panel-body"><!--
                <div class="col-md-6">                    
                    <p class="profile-view-heading">Gender</p>
                    <P class="profile-view-info"><?php echo $administrator['Administrator']['gender']; ?></P>
                </div> -->

                <div class="panel-body">
                    <div class="col-md-6">
                        <!-- <label>Role</label> -->
                        <?php 
                            echo $this->Form->input('', array(
                                'class' => 'form-control',
                                'placeholder' => 'Role', 
                                'type' => 'text',
                                'disabled' => 'disabled',
                                'value' =>  'Administrator' ,
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
                                'disabled' => 'disabled', 
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
                                'disabled' => 'disabled',  
                                'value' => h($administrator['Administrator']['last_name']),
                                'div' => array (
                                    'class' => 'form-group input-group-lg'
                                )
                            ));
                        ?>
                        <!-- <label>Gender</label> -->
                        <?php
                            echo $this->Form->input('', array(
                                'class' => 'form-control',
                                'placeholder' => 'Gender', 
                                'type' => 'text',
                                'disabled' => 'disabled',
                                'value' => h ($administrator['Administrator']['gender']),
                                'div' => array (
                                    'class' => 'form-group input-group-lg'
                                ),
                                //'label' => 'Gender',
                            ));                                
                         ?>
                        <!-- <label>Designation No</label> -->
                        <?php 
                            echo $this->Form->input('', array(
                                'class' => 'form-control',
                                'placeholder' => 'Designation', 
                                'type' => 'text',
                                'disabled' => 'disabled',
                                'value' => h($administrator['Administrator']['designation']), 
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
                                'disabled' => 'disabled',
                                'value' => h($administrator['Administrator']['email']),
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
                                'disabled' => 'disabled', 
                                'value' => h($administrator['Administrator']['contact_no']),
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
                                'disabled' => 'disabled',
                                'value' => h($administrator['Administrator']['address']),
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
                                    'disabled' => 'disabled', 
                                    'value' => h($administrator['Administrator']['bio']),
                                    'div' => array (
                                        'class' => 'form-group'
                                    )
                                ));
                        ?> 
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


