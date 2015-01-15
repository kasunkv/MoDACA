<?php 
    $loggedUser = AuthComponent::user();
?>
<!-- Profile Image -->
<li class="text-center">
    <?php 
        echo $this->Html->image('../uploads/students/'.$student['Student']['profile_photo'], array(
            'alt' => 'Profile Image',
            'class' => 'user-image img-responsive',
            )
        );                                        
    ?>
    
</li>

<!-- Dashboard -->
<li>
    <a class="" href="/MoDACA/students/index"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>    
</li>

<!-- Profiles -->
<li>
    <a href="/MoDACA/students/view/<?php echo $loggedUser['id']; ?>"><i class="fa fa-user fa-3x"></i> Profile</a>                        
</li>

<!-- Field Groups -->
<li>
    <a href="#"><i class="fa fa-users fa-3x"></i> Field Group<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li>
            <a href="/MoDACA/students/viewFieldGroup"> Group Details</a>
        </li>
        <li>
            <a href="/MoDACA/students/viewGroupMembers/<?php echo $student['Student']['field_group_id'] ?>"> Group Members</a>
        </li>
        <li>
            <a href="/MoDACA/students/viewGroupProgress"> Group Progress</a>
        </li>  
    </ul>
</li>

<!-- Activities -->
<li>
    <a href="#"><i class="fa fa-calendar fa-3x"></i> Community Activities<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li>
            <a href="/MoDACA/students/createActivity"> Create Activity</a>
        </li>
        <li>
            <a href="/MoDACA/students/completedActivity/<?php echo $student['Student']['field_group_id'] ?>"> Completed Activity</a>
        </li>
        <li>
            <a href="/MoDACA/students/pendingActivity/<?php echo $student['Student']['field_group_id'] ?>"> Pending Activity</a>
        </li>  
    </ul>
</li>

<!-- Progress -->
<li>
    <a href="/MoDACA/students/viewProgress"><i class="fa fa-signal fa-3x"></i> Progress</a>     
</li> 

<!-- Reports -->
<li>
    <a href="#"><i class="fa fa-file fa-3x"></i> Reports</a>                        
</li>
     