<li class="text-center">   
    <?php         
        if(!empty($administrator['Administrator']['profile_photo'])) {
            echo $this->Html->image('../uploads/admins/'. $administrator['Administrator']['profile_photo'], array(
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
    <a class="" href="<?php echo $this->Html->url(array('controller' => 'administrators', 'action' => 'index')); ?>"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>    
</li>

<li>
    <a href="#"><i class="fa fa-users fa-3x"></i> User Profiles<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li>
            <a href="#">Administrators<span class="fa arrow"></span></a>
            <ul class="nav nav-third-level">
                <li><a href="<?php echo $this->Html->url(array('controller' => 'administrators', 'action' => 'addAdministrator'));?>">Add Administrator</a></li>
                <li><a href="<?php echo $this->Html->url(array('controller' => 'administrators', 'action' => 'removeAdministrator')); ?>">Remove Administrator</a></li>
                <li><a href="<?php echo $this->Html->url(array('controller' => 'administrators', 'action' => 'removeAdministrator')); ?>">Search Administrator</a></li>
            </ul>
        </li>
        <li>
            <a href="#">Staff Members<span class="fa arrow"></span></a>
            <ul class="nav nav-third-level">
                <li><a href="<?php echo $this->Html->url(array('controller' => 'administrators', 'action' => 'searchStaff')); ?>">Search Staff Member</a></li>
                <li><a href="<?php echo $this->Html->url(array('controller' => 'administrators', 'action' => 'removeStaff')); ?>">Remove Staff Members</a></li>
            </ul>
        </li>
        <li>
            <a href="#">Students<span class="fa arrow"></span></a>
            <ul class="nav nav-third-level">
                <li><a href="<?php echo $this->Html->url(array('controller' => 'administrators', 'action' => 'searchStudents')); ?>">Search Students</a></li>
                <li><a href="<?php echo $this->Html->url(array('controller' => 'administrators', 'action' => 'removeStudents')); ?>">Remove Students</a></li>
            </ul>
        </li>
<!--        <li>
            <a href="/MoDACA/Administrators/searchProfile">Search Profiles</a>
        </li>          -->
    </ul>
</li>

<li>
    <a href="#"><i class="fa fa-check-square-o fa-3x"></i> Approve Registration<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li>
            <a href="<?php echo $this->Html->url(array('controller' => 'administrators', 'action' => 'approveStudent')); ?>">Approve Students Registrations</a>
        </li>
        <li>
            <a href="<?php echo $this->Html->url(array('controller' => 'administrators', 'action' => 'approveStaff')); ?>">Approve Staff Registrations</a>
        </li>          
    </ul>
</li>
<!--<li>
    <a href="#"><i class="fa fa-tasks fa-3x"></i> Tasks<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li>
            <a href="/MoDACA/Administrators/#">Add Administrator</a>
        </li>
        <li>
            <a href="/MoDACA/Administrators/#">Remove Administrator</a>
        </li>          
    </ul>
</li>-->
     