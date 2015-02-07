<!-- Profile Image -->
<li class="text-center">
    <?php
        if(!empty($student['Student']['profile_photo'])) {
            echo $this->Html->image('../uploads/students/'.$student['Student']['profile_photo'], array(
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

<!-- Dashboard -->
<li>
    <a class="" href="<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'index')); ?>"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>     
</li>

<!-- Field Groups -->
<li>
    <a href="#"><i class="fa fa-users fa-3x"></i> Field Group<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        
        <li>
            <a href="<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'viewGroupMembers', $student['Student']['field_group_id'])); ?>"> Group Members</a>
        </li>
        <li>
            <a href="<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'viewGroupProgress')); ?>"> Group Progress</a>
        </li>  
    </ul>
</li>

<!-- Group Tasks -->
<li>    
    <a href="#"><i class="fa fa-tasks fa-3x"></i> Group Tasks<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">                
        <li>
            <a href="<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'setFieldCommunityArea')); ?>"> Field Community Area</a>
        </li>
        <li><a href="#">Initial Data<span class="fa arrow"></span></a>
            <ul class="nav nav-third-level">
                <li>
                    <a href="<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'addPopulationDistribution')); ?>"> Population Distribution</a>
                </li>
                <li>
                    <a href="<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'addAgeDistribution')); ?>"> Age Distribution</a>
                </li>
                <li>
                    <a href="<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'addEducationLevel')); ?>"> Education Level</a>
                </li>
                <li>
                    <a href="<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'addFamilyIncome')); ?>"> Family Income</a>
                </li>
                <li>
                    <a href="<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'addOccupationDistribution')); ?>"> Occupation Distribution</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'addHealthIssues')); ?>"> Health Issues</a>
        </li>
        
        <li><a href="#">Community Objectives<span class="fa arrow"></span></a>
            <ul class="nav nav-third-level">
                <li>
                    <a href="<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'addGeneralObjectives')); ?>"> General Objectives</a>
                </li>
                <li>
                    <a href="<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'addSpecificObjectives')); ?>"> Specific Objectives</a>
                </li>
            </ul>
        </li>
        <li><a href="#">Determinants & Indicators<span class="fa arrow"></span></a>
            <ul class="nav nav-third-level">
                <li>
                    <a href="<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'addDeterminants')); ?>"> Determinants</a>
                </li>
                <li>
                    <a href="<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'addInputIndicators')); ?>"> Input Indicators</a>
                </li>
                <li>
                    <a href="<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'addProcessIndicators')); ?>"> Process Indicators</a>
                </li>
                <li>
                    <a href="<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'addOutputIndicators')); ?>"> Output Indicators</a>
                </li>
                <li>
                    <a href="<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'addOutcomeIndicators')); ?>"> Outcome Indicators</a>
                </li>
            </ul>
        </li>        
        <li>
            <a href="<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'createQuestionnaires')); ?>"> Create Questionnaires</a>
        </li>
    </ul>
</li>
<!-- Field Community -->
<li><a href="#">&nbsp;&nbsp;<i class="fa fa-map-marker fa-3x"></i> &nbsp;&nbsp;&nbsp;Field Community<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li>
            <a href="<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'fieldCommunityOverview', $student['FieldGroup']['field_community_id'])); ?>"> Overview</a>
        </li>
        <li>
            <a href="<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'viewFieldCommunity', $student['FieldGroup']['field_community_id'])); ?>"> Community Details</a>
        </li>
        <li>
            <a href="<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'viewCommunityProgress')); ?>"> Community Progress</a>
        </li>
    </ul>
</li>

<!-- Field Visits -->
<li>
    <a href="#"><i class="fa fa-bus fa-3x"></i> Field Visits<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">        
        <li>
            <a href="<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'planFieldVisit')); ?>"> Plan Field Visit</a>
        </li>
        <li><a href="#">Attendance<span class="fa arrow"></span></a>
            <ul class="nav nav-third-level">
                <li>
                    <a href="<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'markYourAttendance')); ?>"> Mark Your Attendance</a>
                </li>
                <li>
                    <a href="<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'confirmMembersAttendance')); ?>"> Confirm Members Attendance</a>
                </li>
            </ul>
        </li>         
    </ul>
</li>


<!-- Program Evaluation -->
<li>
    <a href="#"><i class="fa fa-check-square-o fa-3x"></i> Program Evaluation<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li><a href="#">Evaluation Setup<span class="fa arrow"></span></a>
            <ul class="nav nav-third-level">
                <li>
                    <a href="<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'addEvaluationCheckpoints')); ?>"> Add Evaluation Checkpoints</a>
                </li>
                <li>
                    <a href="<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'addEvaluationIndicatorGroups')); ?>"> Add Evaluation Indicators Groups</a>
                </li> 
                <li>
                    <a href="<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'addEvaluationIndicators')); ?>"> Add Evaluation Indicators</a>
                </li> 
            </ul>
        </li>   
        <li>
            <a href="<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'evaluateProgram')); ?>"> Evaluate Program</a>
        </li>          
    </ul>
</li>

<!-- Community Activities -->
<li>
    <a href="#"><i class="fa fa-calendar fa-3x"></i> Community Activities<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li>
            <a href="<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'createActivity')); ?>"> Create Activity</a>
        </li>
        <li>
            <a href="<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'allActivity')); ?>"> All Activities</a>
        </li>
    </ul>
</li>

<!-- Individual Progress -->
<li>
    <a href="#"><i class="fa fa-signal fa-3x"></i> Individual Progress<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li>
            <a href="<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'progressOverview')); ?>"> Overview</a>
        </li>
        <li>
            <a href="<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'viewPeerReviewProgress', $student['Student']['field_group_id'], $student['Student']['id'])); ?>"> Peer Assessment</a>     
        </li>
        <li>
            <a href="<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'viewAttendanceProgress')); ?>"> Attendance</a>     
        </li>
    </ul>
</li>
 