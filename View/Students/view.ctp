<?php echo $this->layout = 'defaultLayout'; ?>
<?php
    $this->start('sideNav');
    echo $this->element('studentNav');
    $this->end();
?>
<div class="row">
    <div class="col-md-12">
        <h2>Student | View Profile</h2>
        <h5>View your current student profile.</h5>
    </div>
</div>
<!-- /. ROW  -->
<hr />
<div class="row">
    <div class="col-md-1">

    </div>
    <div class="col-md-10">
        <h3>Edit Profile</h3>
        <?php echo $this->Form->create('Student', array(
            'inputDefaults' => array(
                //'label' => false,
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
                                'disabled' => 'disabled',
                                'value' => $student['Student']['first_name'],
                                'div' => array (
                                    'class' => 'form-group input-group-lg'
                                ),
                                'label' => 'First Name',
                            ));
                        ?>
                        <!-- Last Name -->
                        <?php 
                            echo $this->Form->input('last_name', array(
                                'class' => 'form-control',
                                'placeholder' => 'Last Name', 
                                'type' => 'text',   
                                'disabled' => 'disabled',
                                'value' => $student['Student']['last_name'],
                                'div' => array (
                                    'class' => 'form-group input-group-lg'
                                ),
                                'label' => 'Last Name',
                                
                            ));
                        ?>
                        <!-- Gender -->
                        <div class="form-group input-group-lg">
                            <lable><b>Gender</b></lable>
                            <br />
                            <?php 
                                $options = array('Male' => 'Male', 'Female' => 'Female');
                                $attributes = array(
                                    'class' => 'form-group',
                                    'disabled' => 'disabled',
                                    'value' => $student['Student']['gender'],
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
                                'disabled' => 'disabled',
                                'value' => $student['Student']['reg_no'],
                                'div' => array (
                                    'class' => 'form-group input-group-lg'
                                ),
                                'label' => 'Registration No',
                            ));
                        ?>
                        
                        <!-- Index No -->
                        <?php 
                            echo $this->Form->input('index_no', array(
                                'class' => 'form-control',
                                'placeholder' => 'Index No', 
                                'type' => 'text',   
                                'disabled' => 'disabled',
                                'value' => $student['Student']['index_no'],
                                'div' => array (
                                    'class' => 'form-group input-group-lg'
                                ),
                                'label' => 'Index No',
                            ));
                        ?> 
                        
                        <!-- User Name -->
                        <?php 
                            echo $this->Form->input('username', array(
                                'class' => 'form-control',
                                'placeholder' => 'Username', 
                                'type' => 'text', 
                                'disabled' => 'disabled',
                                'value' => h($student['Student']['username']),
                                'div' => array (
                                    'class' => 'form-group input-group-lg'
                                ),
                                'label' => 'Username',
                            ));
                        ?>                         
                        
                        <!-- Group Name -->
                        <?php 
                            echo $this->Form->input('', array(
                                'class' => 'form-control',
                                'placeholder' => 'Group Name', 
                                'type' => 'text', 
                                'disabled' => 'disabled',
                                'div' => array (
                                    'class' => 'form-group input-group-lg'
                                ),
                                'label' => 'Group Name',
                            ));
                        ?> 
                        
                        <!-- Email -->
                        <?php 
                            echo $this->Form->input('email', array(
                                'class' => 'form-control',
                                'placeholder' => 'Email', 
                                'type' => 'email',
                                'disabled' => 'disabled',
                                'value' => $student['Student']['email'],
                                'div' => array (
                                    'class' => 'form-group input-group-lg'
                                ),
                                'label' => 'Email',
                            ));
                        ?>
                      
                        <!-- Contact No -->
                        <?php 
                            echo $this->Form->input('contact_no', array(
                                'class' => 'form-control',
                                'placeholder' => 'Contact No', 
                                'type' => 'text',   
                                'disabled' => 'disabled',
                                'value' => $student['Student']['contact_no'],
                                'div' => array (
                                    'class' => 'form-group input-group-lg'
                                ),
                                'label' => 'Contact No',
                            ));
                        ?>
                        
                        <!-- Address -->
                        <?php 
                            echo $this->Form->input('address', array(
                                'class' => 'form-control',
                                'placeholder' => 'Address', 
                                'type' => 'textarea',
                                'rows' => '4',    
                                'disabled' => 'disabled',
                                'value' => $student['Student']['address'],
                                'div' => array (
                                    'class' => 'form-group'
                                ),
                                'label' => 'Address',
                            ));
                        ?>                                   
                    </div>
                    <div class="col-md-6">
                        <div class="form-group input-group-lg">
                            <label>Photo</label>
                            <br /><br />
                            <img src="assets/img/find_user1.png" height="128" width="128">                           
                        </div>
                        <div class="form-group">                          
                            <!-- Bio -->
                            <?php 
                                echo $this->Form->input('bio', array(
                                    'class' => 'form-control',
                                    'placeholder' => 'Enter your biography here...', 
                                    'type' => 'textarea',
                                    'rows' => '32',
                                    'disabled' => 'disabled',
                                    'value' => $student['Student']['bio'],
                                    'div' => array (
                                        'class' => 'form-group'
                                    ),
                                    'label' => 'Biography',
                                ));
                            ?> 
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
                        <?php echo $this->Html->link(__('Edit Profile'), array('controller' => 'students' , 'action' => 'editStudent', $student['Student']['id']), array('class' => 'btn btn-primary btn-sm')); ?>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
            </div>
            <?php echo $this->Form->end(); ?>       
    </div>
    <div class="col-md-2">

    </div>
</div>
<!-- /. ROW  -->
