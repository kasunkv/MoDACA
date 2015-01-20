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
        <h2><?php echo $student['Student']['first_name'] . " " . $student['Student']['last_name']; ?> | Group Progress</h2>
        <h4 class="page-subheader">Inspect your group progress here</h4>
    </div>
</div>
<!-- /. ROW  -->
<hr />
<div class="row">

</div>
<!-- /. ROW  -->
