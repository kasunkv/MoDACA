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
                                'value' => $administrator['Administrator']['first_name'],
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
                                'value' => $administrator['Administrator']['last_name'],
                                'div' => array (
                                    'class' => 'form-group input-group-lg'
                                )
                            ));
                        ?>
                        
                        <?php
                            echo $this->Form->hidden('gender', array(                                
                                'type' => 'text',                                                    
                                'label' => 'Gender',
                                'value' => $administrator['Administrator']['gender'],
                            ));
                        ?>                    
                        
                        <!-- <label>Designation No</label> -->
                        <?php 
                            echo $this->Form->input('designation', array(
                                'class' => 'form-control',
                                'placeholder' => 'Designation', 
                                'type' => 'text',                    
                                'value' => $administrator['Administrator']['designation'],
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
                                'value' => $administrator['Administrator']['email'],
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
                                'value' => $administrator['Administrator']['contact_no'],
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
                                'value' => $administrator['Administrator']['address'],
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
                            <?php 
                                echo $this->Html->image('../uploads/admins/'. $administrator['Administrator']['profile_photo'], array(
                                    'width' => 200,
                                    'height' => 200,
                                    'class' => 'profile-image')
                                );                                        
                            ?>
                            <br /><br />
                            <?php echo $this->Form->file('profile_photo'); ?>
                        </div>
                        <!--Bio-->
                        <?php 
                                echo $this->Form->input('bio', array(
                                    'class' => 'form-control',
                                    'placeholder' => 'Enter your biography here...', 
                                    'type' => 'textarea',
                                    'value' => $administrator['Administrator']['bio'],
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
                    Tasks
                </div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <a href="#" class="btn btn-primary btn-sm">Delete Profile</a>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
            </div>
            <!--<button type="submit" class="btn btn-lg btn-success btn-custom">Save</button>-->
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