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
        <h2>Evaluate Program</h2>
        <h4 class="page-subheader">Evaluate your Health Promotion Program.</h4>
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
