<div style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;  margin-bottom: 10px;">    
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
                
                <?php if($user['role'] == 'Student'): ?>
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'view')); ?>" class="square-btn-adjust "><i class="fa fa-user-md"></i> View Profile</a></li>
                <?php elseif ($user['role'] == 'Staff'): ?>
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'staffs', 'action' => 'viewProfile')); ?>" class="square-btn-adjust "><i class="fa fa-user-md"></i> View Profile</a></li>
                <?php elseif ($user['role'] == 'Admin'): ?>
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'administrators', 'action' => 'viewProfile')); ?>" class="square-btn-adjust "><i class="fa fa-user-md"></i> View Profile</a></li>
                <?php endif; ?>
                
                <!-- EDIT PROFILE BUTTON -->    
                
                <?php if($user['role'] == 'Student'): ?>
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'editStudent', $student['Student']['id'])); ?>" class="square-btn-adjust "><i class="fa fa-edit"></i> Edit Profile</a></li>
                <?php elseif ($user['role'] == 'Staff'): ?>
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'staffs', 'action' => 'editProfile')); ?>" class="square-btn-adjust "><i class="fa fa-edit"></i> Edit Profile</a></li>
                <?php elseif ($user['role'] == 'Admin'): ?>
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'administrators', 'action' => 'editAdminProfile')); ?>" class="square-btn-adjust "><i class="fa fa-edit"></i> Edit Profile</a></li>
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
                </li>
            </ul>
        </div>
    <?php endif; ?>
</div>