<li class="text-center">
    <?php         
        if(!empty($staff['Staff']['profile_photo'])) {
            echo $this->Html->image('../uploads/staffs/'. $staff['Staff']['profile_photo'], array(
                'alt' => 'Profile Image',
                'class' => 'user-image img-responsive',
                )
            );         
        } else {
            echo $this->Html->image('../uploads/default_user.png', array(
                'alt' => 'Profile Image',
                'class' => 'user-image img-responsive',
                )
            ); 
        }      
    ?>
</li>
<li>
    <a class="" href="<?php echo $this->Html->url(array('controller' => 'staffs', 'action' => 'index')); ?>"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
</li>
<li>
    <a href="<?php echo $this->Html->url(array('controller' => 'staffs', 'action' => 'search')); ?>"><i class="fa fa-search fa-3x"></i> Search</a>
</li>
<li>
    <a href="#"><i class="fa fa-users fa-3x"></i>Student Groups<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li>
            <a href="<?php echo $this->Html->url(array('controller' => 'staffs', 'action' => 'viewFieldGroups')); ?>">View Groups</a>
        </li>
        <li>
            <a href="<?php echo $this->Html->url(array('controller' => 'staffs', 'action' => 'trackGroup')); ?>">Track Group</a>
        </li>  
        <li>
            <a href="<?php echo $this->Html->url(array('controller' => 'staffs', 'action' => 'setConditions')); ?>">Checkpoints & Criteria</a>
        </li>  
    </ul>
</li>
<li>
    <a href="<?php echo $this->Html->url(array('controller' => 'staffs', 'action' => 'trackStudents')); ?>"><i class="fa fa-location-arrow fa-3x"></i> &nbsp;Track Students</a>
</li>

<li>
    <a href="#"><i class="fa fa-check fa-3x"></i> Student Progress<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li>
            <a href="<?php echo $this->Html->url(array('controller' => 'staffs', 'action' => 'studentProgress')); ?>">Individual Progress</a>
        </li>
        <li>
            <a href="<?php echo $this->Html->url(array('controller' => 'staffs', 'action' => 'groupProgress')); ?>">Group Progress</a>
        </li>  
    </ul>
</li>               