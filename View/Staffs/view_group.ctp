<?php $this->layout = 'defaultLayout'; ?>
<?php
    $this->start('sideNav');
    echo $this->element('staffNav');
    $this->end();
?>
<?php
    $this->start('logout');
    echo $this->element('logoutBtn');
    $this->end();
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <h2><?php echo $staff['Staff']['first_name'] . ' ' . $staff['Staff']['last_name']; ?> | View Group</h2>
        <h4 class="page-subheader">All details about <?php echo $group['FieldGroup']['name']; ?></h4>
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
        <h3>Field Community</h3>
        <div class="panel panel-default panel-shadow">
            <div class="panel-heading">
                <?php echo $fieldCommunity['FieldCommunity']['title']; ?>
            </div>
            <div class="panel-body">
                <div class="col-md-8 col-xs-12 col-sm-12">
                    <div class="shadow" id="area-map" style="height: 500px;" ></div>
                </div>
                <div class="col-md-4 col-xs-12 col-sm-12">
                    <h1><?php echo $fieldCommunity['FieldCommunity']['title']; ?></h1>
                    <p class="profile-view-heading">Grama Niladhari Area</p>
                    <p class="profile-view-info"><?php echo $fieldCommunity['FieldCommunity']['gn_area']; ?></p>
                    
                    <p class="profile-view-heading">MOH Area</p>
                    <p class="profile-view-info"><?php echo $fieldCommunity['FieldCommunity']['moh_area']; ?></p>
                    
                    <p class="profile-view-heading">PHI Area</p>
                    <p class="profile-view-info"><?php echo $fieldCommunity['FieldCommunity']['phi_area']; ?></p>
                    
                    <p class="profile-view-heading">PHM Area</p>
                    <p class="profile-view-info"><?php echo $fieldCommunity['FieldCommunity']['phm_are']; ?></p>
                    
                    <p class="profile-view-heading">Village Name</p>
                    <p class="profile-view-info"><?php echo $fieldCommunity['FieldCommunity']['village_name']; ?></p>
                    
                    <br /><br />
                    <a class="btn btn-primary btn-lg" href="/MoDACA/Staffs/viewFieldCommunityStats/<?php echo $fieldCommunity['FieldCommunity']['id']; ?>">Field Community Statistics</a>
                </div>
            </div>
        </div>
        
        <h3>Group Members</h3>
        <div class="panel panel-default panel-shadow">
            <div class="panel-heading">
                Members of Field Group: <?php echo $group['FieldGroup']['name']; ?>
            </div>
            <div class="panel-body">
                <?php if(empty($groupMembers)): ?>
                    <p class="text-muted">No Group Members Currently</p>
                <?php else: ?>
                    <?php foreach ($groupMembers as $member): ?>
                        <div class="col-md-2 col-sm-6 col-xs-6">
                            <a href="/MoDACA/Staffs/viewGroupMember/<?php echo $member['Student']['field_group_id']; ?>/<?php echo $member['Student']['id']; ?>">
                                <?php 
                                    echo $this->Html->image('../uploads/students/'. $member['Student']['profile_photo'], array(
                                        'alt' => 'Profile Image',
                                        'class' => 'img-circle img-responsive shadow',
                                        )
                                    ); 
                                ?>
                            </a>
                            <h5 class="profile-image-name text-muted"><?php echo $member['Student']['first_name'] . ' ' . $member['Student']['last_name']; ?></h5>
                        </div>                
                    <?php endforeach; ?>
                <?php endif; ?>
                
                
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <h3>Community Activities Organized</h3>
        <div class="panel panel-default panel-shadow">
<!--            <div class="panel-heading">
                Community Activity Details
            </div>-->
            <br />
            <div class="panel-body">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="panel panel-default panel-shadow">
                        <div class="panel-heading">
                            Completed Community Activities
                        </div>
                        <div class="panel-body">
                            <?php if(empty($allEvents)): ?>
                                <p class="text-muted">There are no events to show.</p>
                            <?php else: ?>
                                <?php $ctr = 0; ?>
                                <?php foreach ($allEvents as $event): ?>
                                    <?php if($event['Event']['complete'] == 1): ?>
                                        <?php $ctr++; ?>
                                        <div class="activity-noti shadow">
                                            <div class="activity-noti-header">
                                                <a href="/MoDACA/Staffs/viewCompletedActivity/<?php echo $member['Student']['field_group_id']; ?>/<?php echo $event['Event']['id']; ?>" ><h3 class="title green"><?php echo $event['Event']['title']; ?></h3></a>
                                                <?php if(!empty($event['EventFeedback'])): ?>
                                                    <span class="badge badge-green">
                                                        <i class="fa fa-comment"></i>
                                                        <?php echo count($event['EventFeedback']); ?>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                            <p class="activity-noti-desc text-muted"><?php echo $event['Event']['description']; ?></p>
                                            <h5 class="activity-noti-date">
                                                <?php
                                                    $tempDate = strtotime($event['Event']['date']);
                                                    echo date('Y M d', $tempDate);
                                                ?>
                                            </h5>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <?php if($ctr == 0): ?>
                                <p class="text-muted" >No Completed Events.</p>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="panel panel-default panel-shadow">
                        <div class="panel-heading">
                            Pending Community Activities
                        </div>
                        <div class="panel-body">
                            <?php if(empty($allEvents)): ?>
                                <p class="text-muted">There are no events to show.</p>
                            <?php else: ?>
                                <?php $ctr = 0; ?>
                                <?php foreach ($allEvents as $event): ?>
                                    <?php if($event['Event']['complete'] == 0): ?>
                                        <?php $ctr++; ?>
                                        <div class="activity-noti shadow">
                                            <div class="activity-noti-header">
                                                <a href="/MoDACA/Staffs/viewPendingActivity/<?php echo $member['Student']['field_group_id']; ?>/<?php echo $event['Event']['id']; ?>" ><h3 class="title red"><?php echo $event['Event']['title']; ?></h3></a>
                                                <?php if(!empty($event['EventFeedback'])): ?>
                                                    <span class="badge badge-red">
                                                        <i class="fa fa-comment"></i>
                                                        <?php echo count($event['EventFeedback']); ?>
                                                    </span>
                                                <?php endif; ?>                                                
                                            </div>
                                            <p class="activity-noti-desc text-muted"><?php echo $event['Event']['description']; ?></p>
                                            <h5 class="activity-noti-date">
                                                <?php
                                                    $tempDate = strtotime($event['Event']['date']);
                                                    echo date('Y M d', $tempDate);
                                                ?>
                                            </h5>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <?php if($ctr == 0): ?>
                                <p class="text-muted" >No Pending Events.</p>
                                <?php endif; ?>
                            <?php endif; ?>            
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="panel panel-default panel-shadow">
                        <div class="panel-heading">
                            Community Activity Progress
                        </div>
                        <div class="panel-body">
                            <?php if(empty($participationProgress)): ?>
                                <p class="No Completed Events Yet."></p>
                            <?php else: ?>
                                <div id="area-activity-progress"></div>
                                <center><h5><strong>Community Member Participation for Activities (%)</strong></h5></center>
                            <?php endif; ?> 
                        </div>
                    </div>
                </div>
            </div>
            
            
            
        </div>
    </div>  
    
    
</div>

<div class="row">    
    <div class="col-md-6 col-sm-12 col-xs-12">
        <h3>Questionnaires Created</h3>
        <div class="panel panel-default panel-shadow">
            <div class="panel-heading">
                All Questionnaires
            </div>
            <div class="panel-body">

            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-12 col-xs-12">
        <h3>Determinants & Indicators Used</h3>
        <div class="panel panel-default panel-shadow">
            <div class="panel-heading">
                Determinants
            </div>
            <div class="panel-body">

            </div>
        </div>
    </div>
</div>
<hr />
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <h3>Group Rating</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php //echo var_dump($group, $fieldCommunity, $groupMembers, $allEvents); ?>
    </div>
</div>


<script>

    // google map
    
    map = new GMaps({
        el: '#area-map',
        zoom: 15,
        lat: 8.370422,
        lng: 80.516138,
        mapTypeControlOptions: {
          mapTypeIds : ["hybrid", "roadmap", "satellite", "terrain"]
        },
        rotateControl: false,
        streetViewControl: false,
        panControl: true,
        overviewMapControl: false,
        zoomControl: true,
        mapTypeControl: true
        
    });
    map.addMarker({
        lat: 8.370422,
        lng: 80.516138,
        title: 'Field Community Area (Click for More Information)',        
    });
    map.setMapTypeId('hybrid');
    
    
    var progAry = [];
    <?php foreach ($participationProgress as $progress): ?>
        var item = {
            activity: '<?php echo $progress['Activity']; ?>',
            presentage: <?php echo $progress['Presentage']; ?>            
        };
        progAry.push(item);        
    <?php endforeach; ?>
    
    console.log(progAry);
    
    Morris.Area({
        element: 'area-activity-progress',
        data: progAry,
        parseTime:false,
        lineColors: [ '#5cb85c'],
        xkey: 'activity',
        ykeys: ['presentage'],
        labels: ['Participation (%): '],
        pointSize: 2,
        hideHover: 'auto',
        resize: true,
        behaveLikeLine: false
    });

</script>
