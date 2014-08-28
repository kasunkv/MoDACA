<li class="text-center">
    <!--<img src="/img/find_user1.png" class="user-image img-responsive" />-->
    <?php echo $this->Html->image('find_user1.png', array(
            'alt' => 'Profile Image',
            'class' => 'user-image img-responsive',
        ));
    ?>
</li>
<li>
    <a class="" href="/MoDACA/Administrators/index"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>    
</li>

<li>
    <a href="#"><i class="fa fa-user fa-3x"></i> Profile<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li>
            <a href="/MoDACA/Administrators/viewProfile">View Profile</a>
        </li>
        <li>
            <a href="/MoDACA/Administrators/searchProfile">Search Profile</a>
        </li>  
    </ul>
</li>
<li>
    <a href="#"><i class="fa fa-users fa-3x"></i> Field Group<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li>
            <a href="/MoDACA/Students/viewGroupMembers">Group Members</a>
        </li>
        <li>
            <a href="/MoDACA/Students/viewGroupProgress">Group Progress</a>
        </li>  
    </ul>
</li>

<li>
    <a href="/MoDACA/Administrators/approveRegistration"><i class="fa fa-signal fa-3x"></i> Approve Registration</a>                       
</li>   
<li>
    <a href="/MoDACA/Administrators/changePassword"><i class="fa fa-file fa-3x"></i> Change Password</a>                        
</li>
     