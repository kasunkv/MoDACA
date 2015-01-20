<?php $this->layout = 'defaultLayout'; ?>
<?php
    $this->start('logout');
    echo $this->element('logoutBtn');
    $this->end();
?>
<div class="row">
    <div class="col-md-12">
        <h2>Administrator | Edit Profile</h2>
        <h4 class="page-subheader">Edit current student's profile information.</h4>
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
            <div class="panel panel-default panel-shadow">
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
                                'div' => array (
                                    'class' => 'form-group input-group-lg'
                                ),
                                'label' => 'Username',
                            ));
                        ?>                         
                        
                        <!-- Group Name -->
                        <?php 
                            echo $this->Form->input('group_id', array(
                                'class' => 'form-control',
                                'placeholder' => 'Group Name', 
                                'type' => 'text',                    
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
                            <br /><br />
                            <?php echo $this->Form->file('profile_photo'); ?>
                        </div>
                        <div class="form-group">                          
                            <!-- Bio -->
                            <?php 
                                echo $this->Form->input('bio', array(
                                    'class' => 'form-control',
                                    'placeholder' => 'Enter your biography here...', 
                                    'type' => 'textarea',
                                    'rows' => '30',                          
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
<!--            <div class="panel panel-default">
                <div class="panel-heading">
                    Tasks
                </div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <?php //echo $this->Html->link(__('Suspend Account'), array('controller' => 'student' , 'action' => 'suspendAccount'), array('class' => 'btn btn-danger btn-sm')); ?>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
            </div>-->
            <?php 
                $form_end_options = array(
                    'label' => 'Save Changes', 
                    'class' => 'btn btn-lg btn-success btn-custom',                                
                );
                echo $this->Form->end($form_end_options);
            ?>       
    </div>
    <div class="col-md-2">

    </div>
</div>
<!-- /. ROW  -->





	<?php
            /*
            echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Student.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Student.id')));
            echo $this->Html->link(__('List Students'), array('action' => 'index'));
            echo $this->Html->link(__('List Field Groups'), array('controller' => 'field_groups', 'action' => 'index'));
            echo $this->Html->link(__('New Field Group'), array('controller' => 'field_groups', 'action' => 'add')); 
            echo $this->Html->link(__('List Student Progresses'), array('controller' => 'student_progresses', 'action' => 'index'));
            echo $this->Html->link(__('New Student Progress'), array('controller' => 'student_progresses', 'action' => 'add'));
            echo $this->Html->link(__('List Task Assigners'), array('controller' => 'task_assigners', 'action' => 'index')); 
            echo $this->Html->link(__('New Task Assigner'), array('controller' => 'task_assigners', 'action' => 'add'));
             */
        ?>
