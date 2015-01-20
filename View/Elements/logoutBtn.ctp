<div style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;">    
    <?php $user = AuthComponent::user(); ?>
    <?php if (isset($user)): ?>
        <div class="btn-group">
            <button type="button" class="btn btn-primary dropdown-toggle square-btn-adjust" data-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-user"></i> 
                &nbsp;
                <?php echo $user['username'] ?> <span class="caret"></span>
            </button>
            <ul class="dropdown-menu square-btn-adjust"  role="menu">
                <!-- VIEW PROFILE BUTTON -->
                <!--<li><a href="#" class="square-btn-adjust "><i class="fa fa-user-md"></i> View Profile</a></li>-->
                <?php if($user['role'] == 'Student'): ?>
                    <li><a href="/MoDACA/students/view/<?php echo $student['Student']['id']; ?>" class="square-btn-adjust "><i class="fa fa-user-md"></i> View Profile</a></li>
                <?php elseif ($user['role'] == 'Staff'): ?>
                    <li><a href="/MoDACA/Staffs/viewProfile" class="square-btn-adjust "><i class="fa fa-user-md"></i> View Profile</a></li>
                <?php elseif ($user['role'] == 'Admin'): ?>
                    <li><a href="/MoDACA/Administrators/viewProfile" class="square-btn-adjust "><i class="fa fa-user-md"></i> View Profile</a></li>
                <?php endif; ?>
                
                <!-- EDIT PROFILE BUTTON -->    
                <!--<li><a href="#" class="square-btn-adjust"><i class="fa fa-edit"></i> Edit Profile</a></li>-->
                <?php if($user['role'] == 'Student'): ?>
                    <li><a href="/MoDACA/students/editStudent/<?php echo $student['Student']['id']; ?>" class="square-btn-adjust "><i class="fa fa-edit"></i> Edit Profile</a></li>
                <?php elseif ($user['role'] == 'Staff'): ?>
                    <li><a href="/MoDACA/Staffs/editProfile" class="square-btn-adjust "><i class="fa fa-edit"></i> Edit Profile</a></li>
                <?php elseif ($user['role'] == 'Admin'): ?>
                    <li><a href="/MoDACA/Administrators/editAdminProfile" class="square-btn-adjust "><i class="fa fa-edit"></i> Edit Profile</a></li>
                <?php endif; ?>
                <li class="divider"></li>
                
                <!-- LOGOUT BUTTON -->
                <li>
                    <?php
                        echo $this->Form->postLink(__('Logout'),
                            array(
                                'controller' => 'users',
                                'action' => 'logout',                                            
                            ),
                            array(
                                'class' => 'square-btn-adjust'
                            )
                        );

                    ?>                                
                    <!--<a href="#" class="square-btn-adjust"><i class="fa fa-lock"></i> Logout</a>-->
                </li>
            </ul>
        </div>
    <?php endif; ?>
</div>