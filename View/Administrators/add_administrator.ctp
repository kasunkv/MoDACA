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
        <h2>Administrator | Edit Profile</h2>
        <h5>Edit your profile information</h5>
    </div>
</div>
<!-- /. ROW  -->
<hr />
<div class="row">
    <div class="col-md-1">

    </div>
    <div class="col-md-10">
        <h3>Edit Profile</h3>
        <?php echo $this->Session->flash(); ?>
        <?php 
            echo $this->Form->create('Administrator', array(
                'inputDefaults' => array(
                    //'label' => false,
                ),
                'enctype' => 'multipart/form-data',                
                'type' => 'file',
            ));
        ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Details
                </div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <!-- <label>First Name</label> -->
                        <?php 
                            echo $this->Form->input('first_name', array(
                                'class' => 'form-control',
                                'placeholder' => 'First Name', 
                                'type' => 'text',   
                                'type' => 'text',
                                'div' => array (
                                    'class' => 'form-group input-group-lg'
                                )
                            ));
                        ?>
                        <!-- <label>Last Name</label> -->
                        <?php 
                            echo $this->Form->input('last_name', array(
                                'class' => 'form-control',
                                'placeholder' => 'Last Name', 
                                'type' => 'text',  
                                'div' => array (
                                    'class' => 'form-group input-group-lg'
                                )
                            ));
                        ?>
                        
                        <!-- Gender -->
                        <div class="form-group input-group-lg">
                            <lable>Select Gender</lable>
                            <?php 
                                $options = array('Male' => 'Male', 'Female' => 'Female');
                                $attributes = array(
                                    'class' => 'form-group',
                                    ); 
                                echo $this->Form->select('gender', $options, $attributes);
                            ?>                           
                        </div>                 
                        
                        <!-- <label>Designation No</label> -->
                        <?php 
                            echo $this->Form->input('designation', array(
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
                            echo $this->Form->input('email', array(
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
                            echo $this->Form->input('contact_no', array(
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
                            echo $this->Form->input('address', array(
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
                            <br />
                            
                            <br /><br />
                            <?php echo $this->Form->file('profile_photo', array('multiple' => false)); ?>
                        </div>
                        <!--Bio-->
                        <?php 
                                echo $this->Form->input('bio', array(
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
                </div>
            </div>
        
            <div class="panel panel-default">
                <div class="panel-heading">
                    Credentials
                </div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <!-- User Name -->
                        <?php 
                            echo $this->Form->input('username', array(
                                'class' => 'form-control',
                                'placeholder' => 'Username', 
                                'type' => 'text',                    
                                'div' => array (
                                    'class' => 'form-group input-group-lg'
                                )
                            ));
                        ?>   
                        
                        <!-- Password -->
                        <?php 
                            echo $this->Form->input('password', array(
                                'class' => 'form-control',
                                'placeholder' => 'Password', 
                                'type' => 'password',                    
                                'div' => array (
                                    'class' => 'form-group input-group-lg'
                                )
                            ));
                        ?>  
                        
                        <!-- Retype Password -->
                        <?php 
                            echo $this->Form->input('', array(
                                'class' => 'form-control',
                                'placeholder' => 'Retype Password', 
                                'id' => 'AdministratorRetypePassword',
                                'type' => 'password',                    
                                'div' => array (
                                    'class' => 'form-group input-group-lg'
                                )
                            ));
                        ?>  
                    </div>
                    <div class="col-md-6">
<!--                        <a href="" id="btn-generate-password" class="btn btn-primary btn-sm">Generate Password</a>-->
                        <?php echo $this->Html->link(__('Generate Password'), array('controller' => 'utilities' , 'action' => 'generatePassword'), array('class' => 'btn btn-primary btn-sm')); ?>
                    </div>
                </div>
            </div>
        
        <?php 
            $form_end_options = array(
                'label' => 'Create Profile', 
                'class' => 'btn btn-lg btn-success btn-custom',                                
            );
            echo $this->Form->end($form_end_options);
        ?>                                    
    </div>
    <div class="col-md-2">

    </div>
</div>
<script>
    $("#AdministratorProfilePhoto").fileinput({
        showUpload: false,
        showCaption: true,
	showRemove: false,
        browseClass: "btn btn-success",
	browseLabel: " Pick Image",
        browseIcon: '<i class="glyphicon glyphicon-picture"></i>',
        allowedFileTypes: ['image']
    });    
</script>