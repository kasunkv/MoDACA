<?php $this->layout = 'defaultLayout'; ?>
<div class="row">
    <div class="col-md-12">
        <h2 >Mobile Data Acquisition, Coordination & Analyzing System</h2>
    </div>
</div>
<!-- /. ROW  -->
<hr />
<div class="row">
    <div class="col-md-3">
    
    </div>
    <div class="col-md-6 signin-form">
        
        <h3>Reset Forgotten Password</h3>
        <p style="margin-top: -25px;">To reset your password enter your user name and the email address used to register in MoDACA.</p>
        <br />
        <?php echo $this->Session->flash(); ?>
        <div style="margin-bottom: -40px;"></div>    
        <?php echo $this->Form->create('User', array(
            'inputDefaults' => array(
                'label' => false,
            ),
        )); ?>
        <br />
        <h4><b>Your Username</b></h4>
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
        
        <h4><b>Your Email Address (used to register at MoDACA)</b></h4>
        <?php 
            echo $this->Form->input('email', array(
                'class' => 'form-control',
                'placeholder' => 'Email Address', 
                'type' => 'email',                    
                'div' => array (
                    'class' => 'form-group input-group-lg'
                )
            ));
        ?>
        <?php 
            $form_end_options = array(
                'label' => 'Reset My Password', 
                'class' => 'btn btn-lg btn-success',
            );
            echo $this->Form->end($form_end_options);
        ?>

        
    </div>
    <div class="col-md-3">
        
    </div>
</div>
