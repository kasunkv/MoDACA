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
        <form role="form">
            <div class="form-group input-group-lg">
                <input class="form-control" placeholder="Username">
            </div>
            <div class="form-group input-group-lg">
                <input class="form-control" placeholder="Password">
            </div>
                <!-- <button type="submit" class="btn btn-lg btn-success btn-custom">Sign In</button> -->
                <a href="dash-admin.html" class="btn btn-lg btn-success btn-custom">Sign In</a>
                <button type="reset" class="btn btn-lg btn-danger btn-custom">Clear</button>
            <div class="form-group">
            <br />
                <a href="#">Forgot password?</a>
            </div>
        </form>                    
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
        <?php echo $this->Html->image('find_user1.jpg'); ?>
    </div>
    <div class="col-md-3">
        
    </div>
</div>