<?php 
    $loggedUser = AuthComponent::user();

//    if ($loggedUser['role'] == 'Student') {
//        $options = array('conditions' => array('Student.user_id' => $id));
//        $loggedstudent = $this->Student->find('first', $options);            
//    }

?>

<li class="text-center">
    <!--<img src="/img/find_user1.png" class="user-image img-responsive" />-->
    <?php 
        echo $this->Html->image('../uploads/students/'.$student['Student']['profile_photo'], array(
//            'width' => 160,
//            'height' => 160,
            'alt' => 'Profile Image',
            'class' => 'user-image img-responsive',
            )
        );                                        
    ?>
    
</li>
<li>
    <a class="" href="/MoDACA/students/index"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>    
</li>

<li>
    <a href="/MoDACA/students/view/<?php echo $loggedUser['id']; ?>"><i class="fa fa-user fa-3x"></i> Profile</a>                        
</li>
<li>
    <a href="#"><i class="fa fa-users fa-3x"></i> Field Group<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li>
            <a href="/MoDACA/students/viewGroupMembers/<?php echo $student['Student']['field_group_id'] ?>">Group Members</a>
        </li>
        <li>
            <a href="/MoDACA/students/viewGroupProgress">Group Progress</a>
        </li>  
    </ul>
</li>

<li>
    <a href="/MoDACA/students/viewMyProgress"><i class="fa fa-signal fa-3x"></i> My Progress</a>                       
</li>   
<li>
    <a href="#"><i class="fa fa-file fa-3x"></i> Reports</a>                        
</li>
     