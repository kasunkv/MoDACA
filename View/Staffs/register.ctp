<?php $this->layout = 'defaultLayout'; ?>

<div class="row">
    <div class="col-md-12">
        <h2>Staff Registration | MoDACA</h2>
        <h5>Register to login to MoDACA. You will be notified via email after verification of your details</h5>
    </div>
</div>
<!-- /. ROW  -->
<hr />
<div class="row">
    <div class="col-md-1">
    </div>
    <div class="col-md-10">
        <?php echo $this->Session->flash(); ?>
        <h3>Create Profile - Staff</h3>
        <!--<form role="form">-->
        <?php echo $this->Form->create('Staff', array(
            'inputDefaults' => array(
                'label' => false,
            ),
            'enctype' => 'multipart/form-data',
        ));
        ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Details
                </div>
                <div class="panel-body">
                    <div class="col-md-6">                         
                        <!-- First Name -->
                        <?php 
                            echo $this->Form->input('first_name', array(
                                'class' => 'form-control',
                                'placeholder' => 'First Name', 
                                'type' => 'text',                    
                                'div' => array (
                                    'class' => 'form-group input-group-lg'
                                )
                            ));
                        ?>
                        
                        <!-- Last Name -->
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
                        
                        <!-- Designation -->
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
                        
                        <!-- Gender -->
                        <?php 
                            $options = array('' => 'Select Gender...',  'Male' => 'Male', 'Female' => 'Female');

                            echo $this->Form->input('gender', array(
                                'class' => 'form-control',
                                'placeholder' => 'Select Gender...',
                                'type' => 'select',
                                'div' => array (
                                    'class' => 'form-group input-group-lg'
                                ),
                                'options' => $options
                            ));
                        ?>    
                        
                        <!-- Email -->
                        <?php 
                            echo $this->Form->input('email', array(
                                'class' => 'form-control',
                                'placeholder' => 'Email', 
                                'type' => 'email',                    
                                'div' => array (
                                    'class' => 'form-group input-group-lg'
                                )
                            ));
                        ?>
                      
                        <!-- Contact No -->
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
                        
                        <!-- Address -->
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
                    <!-- Colum Right  -->
                    <div class="col-md-6">
                        <div class="form-group input-group-lg">
                            <label>Upload Photo</label>
                            <?php echo $this->Form->file('profile_photo', array('multiple' => false)); ?>
                        </div>
                        <div class="form-group">
                            <label>Biography</label>                            
                            <!-- Bio -->
                            <?php 
                                echo $this->Form->input('bio', array(
                                    'class' => 'form-control',
                                    'placeholder' => 'Enter your biography here...', 
                                    'type' => 'textarea',
                                    'rows' => '17',                          
                                    'div' => array (
                                        'class' => 'form-group'
                                    )
                                ));
                            ?> 
                        </div> 
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
    $("#StaffProfilePhoto").fileinput({
        showUpload: false,
        showCaption: true,
	showRemove: false,
        browseClass: "btn btn-success",
	browseLabel: " Pick Image",
        browseIcon: '<i class="glyphicon glyphicon-picture"></i>',
        allowedFileTypes: ['image']
    });    
</script>