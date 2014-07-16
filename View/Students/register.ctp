<?php echo $this->layout = 'defaultLayout'; ?>
<div class="row">
    <div class="col-md-12">
        <h2>Student Registration | MoDACA</h2>
        <h5>Register to login to MoDACA. You will be notified via email after verification of your details</h5>
    </div>
</div>
<!-- /. ROW  -->
<hr />
<div class="row">
    <div class="col-md-1">
    </div>
    <div class="col-md-10">
        <h3>Create Profile - Student</h3>
        <!--<form role="form">-->
        <?php echo $this->Form->create('Administrator', array(
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

                        <!-- Registration No -->
                        <?php 
                            echo $this->Form->input('reg_no', array(
                                'class' => 'form-control',
                                'placeholder' => 'Registration No', 
                                'type' => 'text',                    
                                'div' => array (
                                    'class' => 'form-group input-group-lg'
                                )
                            ));
                        ?>
                        
                        <!-- Index No -->
                        <?php 
                            echo $this->Form->input('index_no', array(
                                'class' => 'form-control',
                                'placeholder' => 'Index No', 
                                'type' => 'text',                    
                                'div' => array (
                                    'class' => 'form-group input-group-lg'
                                )
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
                            <?php echo $this->Form->file('profile_photo'); ?>
                        </div>
                        <div class="form-group">
                            <label>Biography</label>                            
                            <!-- Bio -->
                            <?php 
                                echo $this->Form->input('bio', array(
                                    'class' => 'form-control',
                                    'placeholder' => 'Enter your biography here...', 
                                    'type' => 'textarea',
                                    'rows' => '20',                          
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
                            echo $this->Form->input('user_name', array(
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
                        <a href="" id="btn-generate-password" class="btn btn-primary btn-sm">Generate Password</a>
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

