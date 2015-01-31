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
        <h2>Individual Progress Overview</h2>
        <h4 class="page-subheader">See the overview of your current progress</h4>
    </div>
</div>
<!-- /. ROW  -->
<hr />
<div class="row">
    
</div>
<div class="row">
    <div class="col-md-12">
        <?php //echo var_dump($result, $assesmentByCriteria); ?>
    </div>
</div>

<script>
    
   
</script>
    
<!-- /. ROW  -->
