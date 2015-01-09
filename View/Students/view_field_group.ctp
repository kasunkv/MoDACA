<?php $this->layout = 'defaultLayout'; ?>
<?php
    $this->start('sideNav');
    echo $this->element('studentNav');
    $this->end();
?>
<div class="row">
    <div class="col-md-12">
        <h2><?php echo $student['Student']['first_name'] . " " . $student['Student']['last_name']; ?> | Field Group</h2>
        <h4 class="page-subheader">Manage details about your Field Group</h4>
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
    <div class="col-md-6 col-xs-12 col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Field Area Map
            </div>
            <div class="panel-body">
                <iframe src="https://www.google.com/maps/embed/v1/view?key=AIzaSyCLNQUy728sA_6OUDcJqFYhJgdbBaFTnGc&center=8.3500199,80.5090785&zoom=13&maptype=roadmap"
                        width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" style="border: solid 2px white;"></iframe>
            </div>
        </div>
    </div>
</div>

</div>
<!-- /. ROW  -->
<div class="row">

</div>
<!-- /. ROW  -->
<div class="row">
</div>
<!-- /. ROW  -->