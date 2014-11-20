<?php $this->layout = 'defaultLayout'; ?>
<?php
    $this->start('sideNav');
    echo $this->element('adminNav');
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
        <form role="form">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Details
                </div>
                <div class="panel-body">
                    <div class="col-md-6">
<!--                        <div class="form-group input-group-lg">
                            <label>Role</label>
                            <!--select class="form-control" required>
                                <option>Administrator</option>
                                <option>Student</option>
                                <option>Lecturer</option>
                            </select>
                        </div>
                        <?php 
                            $options = array('Administrator' => 'Administrator', 'Lecturer' => 'Lecturer');
                            $attributes = array(
                                'class' => 'form-control',
                                ); 
                            echo $this->Form->select('Role', $options, $attributes);
                        ?>
-->
                        <!-- <label>First Name</label> -->
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
                        <div class="form-group input-group-lg">
                            <label>Gender</label>
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
                            <br /><br />
                            <img src="../../webroot/img/find_user.png" height="128" width="128">
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
            <button type="submit" class="btn btn-lg btn-success btn-custom">Save</button>
        </form>                                 
    </div>
    <div class="col-md-2">

    </div>
</div>