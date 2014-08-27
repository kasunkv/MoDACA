<?php echo $this->layout = 'defaultLayout'; ?>
<div class="row">
    <div class="col-md-12">
        <h2 >Mobile Data Acquisition, Coordination & Analyzing System</h2>
        <h5>Welcome to MoDACA, Please login.</h5>

    </div>
</div>
<!-- /. ROW  -->
<hr />
<div class="row">
    <div class="col-md-3">
    
    </div>
    <div class="col-md-6 signin-form">
        <?php echo $this->Session->flash(); ?>
        <h3>Welcome</h3>
        <?php echo $this->Form->create('User', array(
            'inputDefaults' => array(
                'label' => false,
            ),
        )); ?>

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
        <?php 
            $form_end_options = array(
                'label' => 'Sign In', 
                'class' => 'btn btn-lg btn-success btn-custom',
            );
            echo $this->Form->end($form_end_options);
        ?>

        <div class="form-group">
            <br />
            <a href="#">Forgot password?</a>
        </div>
        
    </div>
    <div class="col-md-3">
        
    </div>
</div>
<hr />
<div class="row">
    <div class="col-md-3">
        
    </div>
    <div class="col-md-6">
        <h3>Not a Registerd User?</h3>
        <h5>Please Sign up to use MoDACA.</h5>
        <!--<a href="create-profile.html" title="Signup Button." class="btn btn-lg btn-primary btn-signup">Sign Up</a>-->
        <?php echo $this->Html->link('Student Sign Up', array('controller' => 'students', 'action' => 'register'), array(
            'class' => 'btn btn-lg btn-primary btn-signup',
            'title' => 'Signup Button.',
        )); ?>
        <?php echo $this->Html->link('Staff Sign Up', array('controller' => 'staffs', 'action' => 'register'), array(
            'class' => 'btn btn-lg btn-primary btn-signup',
            'title' => 'Signup Button.',
        )); ?>
       
    </div>
    <div class="col-md-3">
        
    </div>
</div>