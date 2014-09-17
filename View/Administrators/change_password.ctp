<?php $this->layout = 'defaultLayout'; ?>
<?php
    $this->start('sideNav');
    echo $this->element('adminNav');
    $this->end();
?>
<div class="row">
    <div class="col-md-12">
        <h2>Administrator | Profiles</h2>
        <h5>Change the current password</h5>
    </div>
</div>
<!-- /. ROW  -->
<hr />
<div class="col-md-3">

</div>
<div class="col-md-6 signin-form">
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        Incorrect current password
        <!-- <a href="#" class="alert-link">Alert Link</a>. -->
    </div>
    <h3>Change Password</h3>
    <form role="form">
        <div class="panel panel-default">
            <div class="panel-heading">
                New Password
            </div>
            <div class="panel-body">
                <!--Current Password-->
                <?php 
                    echo $this->Form->input('', array(
                        'class' => 'form-control',
                        'placeholder' => 'Current Password', 
                        'type' => 'text',                    
                        'div' => array (
                            'class' => 'form-group input-group-lg'
                        )
                    ));
                ?>
                <!--New Password-->
                <?php 
                    echo $this->Form->input('', array(
                        'class' => 'form-control',
                        'placeholder' => 'New Password', 
                        'type' => 'text',                    
                        'div' => array (
                            'class' => 'form-group input-group-lg'
                        )
                    ));
                ?>
                <!--Re-type Password-->
                <?php 
                    echo $this->Form->input('', array(
                        'class' => 'form-control',
                        'placeholder' => 'Re-type Password', 
                        'type' => 'text',                    
                        'div' => array (
                            'class' => 'form-group input-group-lg'
                        )
                    ));
                ?>
                <button type="submit" class="btn btn-lg btn-success btn-custom">Save</button>
                <!-- <button type="reset" class="btn btn-lg btn-danger btn-custom">Cancle</button> -->
                <a href="view-profile.html" class="btn btn-lg btn-danger btn-custom">Cancle</a>
            </div>
        </div>
    </form>                    
</div>
<div class="col-md-3">

</div>