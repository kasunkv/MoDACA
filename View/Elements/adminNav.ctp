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
    <a class="" href="/MoDACA/Administrators/index"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>    
</li>

<li>
    <a href="#"><i class="fa fa-users fa-3x"></i> User Profiles<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li>
            <a href="/MoDACA/Administrators/#">View Profiles</a>
        </li>
        <li>
            <a href="/MoDACA/Administrators/searchProfile">Search Profiles</a>
        </li>          
    </ul>
</li>
<!--li>
    <a href="#"><i class="fa fa-users fa-3x"></i> Field Group<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li>
            <a href="/MoDACA/Students/viewGroupMembers">Group Members</a>
        </li>
        <li>
            <a href="/MoDACA/Students/viewGroupProgress">Group Progress</a>
        </li>  
    </ul>
</li-->
<li>
    <a href="#"><i class="fa fa-check-square-o fa-3x"></i> Approve Registration<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li>
            <a href="/MoDACA/Administrators/approveStudent">Approve Students Registrations</a>
        </li>
        <li>
            <a href="/MoDACA/Administrators/approveStaff">Approve Staff Registrations</a>
        </li>          
    </ul>
</li>
<!--<li>
    <a href="/MoDACA/Administrators/approveRegistration"><i class="fa fa-check-square-o fa-3x"></i> Approve Registration</a>                       
</li>   -->
<li>
    <a href="#"><i class="fa fa-user fa-3x"></i> Admin Profile<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li>
            <a href="/MoDACA/Administrators/viewProfile">View Profile</a>
        </li>
        <li>
            <a href="/MoDACA/Administrators/editAdminProfile">Edit Profile</a>
        </li>  
        <li>
            <a href="/MoDACA/Administrators/#">Change Password</a>
        </li>
    </ul>
</li>

<li>
    <a href="#"><i class="fa fa-tasks fa-3x"></i> Tasks<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li>
            <a href="/MoDACA/Administrators/#">Add Administrator</a>
        </li>
        <li>
            <a href="/MoDACA/Administrators/#">Remove Administrator</a>
        </li>          
    </ul>
</li>
     