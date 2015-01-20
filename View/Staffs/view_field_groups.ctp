<?php $this->layout = 'defaultLayout'; ?>
<?php
    $this->start('sideNav');
    echo $this->element('staffNav');
    $this->end();
?>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <h2><?php echo $staff['Staff']['first_name'] . ' ' . $staff['Staff']['last_name']; ?> | Field Groups</h2>
        <h4 class="page-subheader">All the Field Groups currently doing field work.</h4>
    </div>
</div>
<!-- /. ROW  -->
<hr />

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <?php echo $this->Session->flash(); ?>    
    </div>    
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default panel-shadow">
            <div class="panel-heading">
                All Field Groups
            </div>
            <div class="panel-body">
                <ul class="list-group shadow">
                    <?php foreach($groups as $group): ?>
                        <li class="list-group-item">
                          <span class="badge custom-list-batch badge-green"><i class="fa fa-user"></i> <?php echo $group['FieldGroup']['no_of_members']; ?></span>
                          <a class="custom-list-link" href="/MoDACA/Staffs/viewGroup/<?php echo $group['FieldGroup']['id']; ?>">
                              <h4 class="custom-list-header"><?php echo $group['FieldGroup']['name']; ?></h4>
                          </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo var_dump($groups); ?>
    </div>
</div>
