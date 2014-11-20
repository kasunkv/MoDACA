<?php $this->layout = 'defaultLayout'; ?>
<?php
    $this->start('sideNav');
    echo $this->element('studentNav');
    $this->end();
?>
<div class="row">
    <div class="col-md-12">
        <h2><?php echo $student['Student']['first_name'] . " " . $student['Student']['last_name']; ?> | My Progress</h2>
        <h4 class="page-subheader">Inspect your progress here</h4>
    </div>
</div>
<!-- /. ROW  -->
<hr />
<div class="row">

</div>