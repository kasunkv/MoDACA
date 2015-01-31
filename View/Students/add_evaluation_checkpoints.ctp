<?php $this->layout = 'defaultLayout'; ?>
<?php
    $this->start('sideNav');
    echo $this->element('studentNav');
    $this->end();
?>
<?php
    $this->start('logout');
    echo $this->element('logoutBtn');
    $this->end();
?>
<div class="row">
    <div class="col-md-12">
        <h2>Program Evaluation Checkpoints</h2>
        <h4 class="page-subheader">Add Evaluation Checkpoints to evaluate your Health Promotion Programs progress.</h4>
    </div>
</div>
<!-- /. ROW  -->
<hr />

<div class="row">
    <div class="col-md-12">
        <?php echo $this->Session->flash(); ?>        
    </div>
</div>
<!-- /. ROW  -->
<div class="row">
    
</div>


<div class="row">

</div>
