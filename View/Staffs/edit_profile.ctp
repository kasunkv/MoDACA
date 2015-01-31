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
        <h2><?php echo $staff['Staff']['first_name'] . " " . $staff['Staff']['last_name']; ?> | Edit Profile</h2>
        <h4 class="page-subheader">Edit your student profile information.</h4>
    </div>
</div>
<!-- /. ROW  -->
<hr />
<div class="row">
    <div class="col-md-1">

    </div>
    <div class="col-md-10">
        <?php
            //echo var_dump($fieldGroups);
            //echo '<br />';
            //echo var_dump($student);        
        ?>
        
        <?php echo $this->Form->create('Staff', array(
            'inputDefaults' => array(
                //'label' => false,
            ),
            'enctype' => 'multipart/form-data',
            'type' => 'file',
        ));
        ?>
            <div class="panel panel-default panel-shadow">
                <div class="panel-heading">
                    Details
                </div>
                <div class="panel-body">
                    <div class="col-md-6">      
                        <!-- ID -->
                        <?php
                            echo $this->Form->hidden('id', array(                                
                                'type' => 'text',                                                    
                                'label' => 'Last Name',
                                'value' => $staff['Staff']['id'],
                            ));
                        ?>
                        
                        <!-- First Name -->
                        <?php 
                            echo $this->Form->input('first_name', array(
                                'class' => 'form-control',
                                'placeholder' => 'First Name', 
                                'type' => 'text',    
                                'value' => $staff['Staff']['first_name'],
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
                                'value' => $staff['Staff']['last_name'],
                                'div' => array (
                                    'class' => 'form-group input-group-lg'
                                ),
                                'label' => 'Last Name',
                                
                            ));
                        ?>
                        <!-- User Name -->
                        <?php 
                            echo $this->Form->input('username', array(
                                'class' => 'form-control',
                                'placeholder' => 'Username', 
                                'type' => 'text',
                                'value' => $staff['Staff']['username'],
                                'disabled' => true,
                                'div' => array (
                                    'class' => 'form-group input-group-lg'
                                ),
                                'label' => 'Username',
                            ));
                        ?>                         
                           
                        <!-- Designation -->
                        <?php 
                            echo $this->Form->input('designation', array(
                                'class' => 'form-control',
                                'placeholder' => 'Designation', 
                                'type' => 'text',    
                                'value' => $staff['Staff']['designation'],
                                'div' => array (
                                    'class' => 'form-group input-group-lg'
                                ),
                                'label' => 'Designation',
                                
                            ));
                        ?>
                        
                        <!-- Gender -->
                        <?php
                            echo $this->Form->hidden('gender', array(                                
                                'type' => 'text',                                                    
                                'label' => 'Last Name',
                                'value' => $staff['Staff']['gender'],
                            ));
                        ?>
                    
                        <!-- Email -->
                        <?php 
                            echo $this->Form->input('email', array(
                                'class' => 'form-control',
                                'placeholder' => 'Email', 
                                'type' => 'email',   
                                'value' => $staff['Staff']['email'],
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
                                'value' => $staff['Staff']['contact_no'],
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
                                'value' => $staff['Staff']['address'],
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
                            <br />
                            <?php 
                                echo $this->Html->image('../uploads/staffs/'. $staff['Staff']['profile_photo'], array(
                                    'width' => 200,
                                    'height' => 200,
                                    'class' => 'profile-image shadow')
                                );                                        
                            ?>
                            <br /><br />
                            <?php echo $this->Form->file('profile_photo', array('multiple' => false)); ?>
                        </div>
                        <div class="form-group">                          
                            <!-- Bio -->
                            <?php 
                                echo $this->Form->input('bio', array(
                                    'class' => 'form-control',
                                    'placeholder' => 'Enter your biography here...', 
                                    'type' => 'textarea',
                                    'value' => $staff['Staff']['bio'],
                                    'rows' => '24',                          
                                    'div' => array (
                                        'class' => 'form-group'
                                    ),
                                    'label' => 'Biography',
                                ));
                                
                                //546dcd75-a6f4-42f5-a4b2-2574dc306535
                                //546dcd75-a6f4-42f5-a4b2-2574dc306535
                            ?> 
                        </div> 
                    </div>
                </div>
            </div>  
            <div class="panel panel-default panel-shadow">
                <div class="panel-heading">
                    Tasks
                </div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <?php echo $this->Html->link(__('Change Password'), array('controller' => 'Staffs' , 'action' => 'changePassword'), array('class' => 'btn btn-primary btn-sm')); ?>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
            </div>
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

