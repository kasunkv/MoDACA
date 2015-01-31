<?php $this->layout = 'defaultLayout'; ?>
<?php
    $this->start('sideNav');
    echo $this->element('studentNav');
    $this->end();
?>
<?php
    $this->start('logout');
    echo $this->element('logoutBtn');
    $this->end();
?>
<div class="row">
    <div class="col-md-12">
        <h2><?php echo $house['Household']['leader_name'] . "'s House"; ?> | Progress</h2>
        <h4 class="page-subheader">Inspect the progress of <?php echo $house['Household']['leader_name'] . "'s House"; ?></h4>
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
    <div class="col-md-8 col-sm-12 col-xs-12">
        <div class="panel panel-default panel-shadow">
            <div class="panel-heading">
                <b>Location of House</b>
            </div>
            <div class="panel-body">
                <div id="area-map" class="shadow" style="width: 100%; height: 400px;" ></div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12 col-xs-12">
        <h3 style="margin-top: -5px;">Directions</h3>
        <hr />
        <div>
            <button class="btn btn-info" id="btn-get-directions">Get Directions</button>
            <div class="btn-group hide" id="btn-grp-navigate">                
                <button class="btn btn-success" id="btn-backward">
                    <i class="fa fa-caret-left"></i>
                </button>
                <button class="btn btn-success" id="btn-forward">
                    <i class="fa fa-caret-right"></i>
                </button>
            </div>
        </div>
        <br />
        <div class="navigation-details">
            <ul class="list-group" id="steps">
                
            </ul>
        </div>
    </div>
    
    
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default panel-shadow">
            <div class="panel-heading">
                <b>Basic Details</b>
            </div>
            <div class="panel-body">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <p class="profile-view-heading">House ID</p>
                    <p class="profile-view-info"><?php echo $house['Household']['household_identifier']; ?></p>

                    <p class="profile-view-heading">Owners Name</p>
                    <p class="profile-view-info"><?php echo $house['Household']['leader_name']; ?></p>        

                    <p class="profile-view-heading">Address</p>
                    <p class="profile-view-info"><?php echo $house['Household']['address']; ?></p>

                    <p class="profile-view-heading">Contact No</p>
                    <p class="profile-view-info"><?php echo $house['Household']['contact_no']; ?></p>

                    <p class="profile-view-heading">Field Area</p>
                    <p class="profile-view-info"><?php echo $house['FieldCommunity']['title']; ?></p>

                    <p class="profile-view-heading">Grama Niladhari Area</p>
                    <p class="profile-view-info"><?php echo $house['FieldCommunity']['gn_area']; ?></p>


                </div>
                <div class="col-md-6 col-sm-12 col-xs-12"> 
                    <p class="profile-view-heading">Income (Per Month)</p>
                    <p class="profile-view-info"><?php echo $house['Household']['income']; ?></p>

                    <p class="profile-view-heading">Family Members</p>
                    <p class="profile-view-info"><?php echo $house['Household']['no_of_members']; ?></p>

                    <p class="profile-view-heading">Pregnant Mothers</p>
                    <p class="profile-view-info"><?php echo $house['Household']['no_of_pregnant_mothers'] == 0 ? 'None' : $house['Household']['no_of_pregnant_mothers']; ?></p>

                    <p class="profile-view-heading">Babies</p>
                    <p class="profile-view-info"><?php echo $house['Household']['no_of_babies'] == 0 ? 'None' : $house['Household']['no_of_babies']; ?></p>

                    <p class="profile-view-heading">Special Notes</p>
                    <p class="profile-view-info"><?php echo $house['Household']['note']; ?></p>
                </div>
            </div>
        </div>
    </div>
    
</div>

<div class="row">
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="panel panel-default panel-shadow">
            <div class="panel-heading">
                <b>Family Members</b>
            </div>
            <div class="panel-body">
                <!-- ******************** ALL MEMBERS ********************  -->
                <h3>All Members</h3>
                <?php if(empty($house['FamilyMember'])): ?>
                    <p class="profile-view-heading" style="padding-top: 0px; margin-top: -10px; padding-bottom: 10px;">No Family Members</p>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover no-footer" >
                            <thead>
                                <tr role="row">
                                    <th>Full Name</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($house['FamilyMember'] as $familyMember): ?>
                                    <?php //echo var_dump($familyMember); ?>                            
                                    <tr>
                                        <td><?php echo $familyMember['first_name'] . " " . $familyMember['last_name']; ?></td>
                                        <td><?php echo $familyMember['age']; ?></td>
                                        <td><?php echo $familyMember['gender']; ?></td>
                                        <td>
                                            <?php echo $this->Html->link(__('Details'),
                                                array(
                                                    'action' => 'viewFamilyMember', $familyMember['id'],                                            
                                                ),
                                                array(
                                                    'class' => 'btn btn-success btn-xs'
                                                ));
                                            ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>   
                    </div>
                <?php endif; ?>
                    
                <!-- ******************** PREGNANT MOTHERS ********************  -->
                <h3>Pregnant Mothers</h3>
                <?php if(empty($house['PregnantMother'])): ?>
                    <p class="profile-view-heading" style="padding-top: 0px; margin-top: -10px; padding-bottom: 10px;">No Pregnant Mothers</p>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover no-footer" >
                            <thead>
                                <tr role="row">
                                    <th>Full Name</th>
                                    <th>Age</th>
                                    <th>Fetus Age</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($house['PregnantMother'] as $pregMother): ?>
                                    <?php //echo var_dump($familyMember); ?>                            
                                    <tr>
                                        <td><?php echo $pregMother['first_name'] . " " . $pregMother['last_name']; ?></td>
                                        <td><?php echo $pregMother['age']; ?></td>
                                        <td><?php echo $pregMother['fetus_age']; ?></td>
                                        <td>
                                            <?php echo $this->Html->link(__('Details'),
                                                array(
                                                    'action' => 'viewPregnantMother', $pregMother['id'],                                            
                                                ),
                                                array(
                                                    'class' => 'btn btn-success btn-xs'
                                                ));
                                            ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>   
                    </div>                        
                <?php endif; ?>
                    
                <!-- ******************** BABIES ********************  -->
                <h3>Babies</h3>
                <?php if(empty($house['Baby'])): ?>
                    <p class="profile-view-heading" style="padding-top: 0px; margin-top: -10px; padding-bottom: 10px;">No Babies</p>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover no-footer" >
                            <thead>
                                <tr role="row">
                                    <th>Full Name</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($house['Baby'] as $baby): ?>
                                    <?php //echo var_dump($familyMember); ?>                            
                                    <tr>
                                        <td><?php echo $baby['baby_name']; ?></td>
                                        <td><?php echo $baby['age']; ?></td>
                                        <td><?php echo $baby['gender']; ?></td>
                                        <td>
                                            <?php echo $this->Html->link(__('Details'),
                                                array(
                                                    'action' => 'viewPregnantMother', $baby['id'],                                            
                                                ),
                                                array(
                                                    'class' => 'btn btn-success btn-xs'
                                                ));
                                            ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>   
                    </div>    
                <?php endif; ?>
                
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="panel panel-default panel-shadow">
            <div class="panel-heading">
                <b>Sugar & Salt Consumption (g/month)</b>
            </div>
            <div class="panel-body">
                <div id="sugar-salt-area"></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="panel panel-default panel-shadow">
            <div class="panel-heading">
                <b>Oil Consumption (ml/month)</b>
            </div>
            <div class="panel-body">
                <div id="oil-area"></div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 col-sm-12 col-xs-12">
        <h3>Consumption Statistics</h3>
        <h1 class="display-value"><?php echo $sugarUsage[0]['Sugar']; ?>g </h1>
        <p class="profile-view-heading">Starting Sugar Consumption(Per Month)</p>
        
        <h1 class="display-value"><?php echo $sugarUsage[0]['Salt']; ?>g </h1>
        <p class="profile-view-heading">Starting Salt Consumption(Per Month)</p>
        
        <h1 class="display-value"><?php echo $oilUsage[0]['Oil Usage']; ?>ml </h1>
        <p class="profile-view-heading">Starting Oil Consumption(Per Month)</p>
    </div>
</div>



<script>
    
    /**************** GOOGLE MAP *******************/
    map = new GMaps({
        el: '#area-map',
        zoom: 15,
        lat: <?php echo $house['Household']['gps_latitude']; ?>,
        lng: <?php echo $house['Household']['gps_longitude']; ?>,
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
    
    // HouseHold
    map.addMarker({
        lat: <?php echo $house['Household']['gps_latitude']; ?>,
        lng: <?php echo $house['Household']['gps_longitude']; ?>,
        title: 'Click to Navigate to Household Details',
        infoWindow: {
            content: '<p><?php echo $house["Household"]["leader_name"] . "\'s Place"; ?></p>'
        },        
    });  

    //Faculty
    map.addMarker({
        lat: 8.3538938,
        lng: 80.5033636,
        title: 'Click to View Details',
        infoWindow: {
            content: '<p>Faculty of Applied Sciences</p>'
        },        
    });
    map.setMapTypeId('roadmap');
    
    
    /***************** MORRIS CHARTS *******************/
    
    // Sugar/Salt Usage Chart - Donut
    var usage1 = [];
    
    <?php foreach ($sugarUsage as $sugar): ?>
        var item = {
          date: '<?php echo $sugar['Date']; ?>',
          sugar: <?php echo $sugar['Sugar']; ?>,
          salt: <?php echo $sugar['Salt']; ?>
        };
        
        usage1.push(item);        
    <?php endforeach; ?>

            
    Morris.Area({
        element: 'sugar-salt-area',
        data: usage1,
        parseTime:true,
        lineColors: ['#5cb85c', '#d9534f'],
        xkey: 'date',
        ykeys: ['sugar', 'salt'],
        labels: ['Sugar Usage(g)', 'Salt Usage(g)'],
        pointSize: 2,
        hideHover: 'auto',
        resize: true,
        behaveLikeLine: false
    });
 
    var usage2 = [];
   
    <?php foreach ($oilUsage as $oil): ?>
        var item = {
          date: '<?php echo $oil['Date']; ?>',
          oil: <?php echo $oil['Oil Usage']; ?>
        };
        
        usage2.push(item);        
    <?php endforeach; ?>
        
    Morris.Area({
        element: 'oil-area',
        data: usage2,
        parseTime:true,
        lineColors: ['#428bca', '#39b3d7', '#6DD1EF', '#47a447', '#25A325', '#8CF58C', '#ed9c28', '#d58512', '#d2322d', '#ac2925'],
        xkey: 'date',
        ykeys: ['oil'],
        labels: ['Oil Usage(ml)'],
        pointSize: 2,
        hideHover: 'auto',
        resize: true,
        behaveLikeLine: false
    });
    
    var route;
    
    $('#btn-get-directions').click(function(e) {
        e.preventDefault();
        map.getRoutes({
            origin: [map.markers[map.markers.length - 1].getPosition().lat(), map.markers[map.markers.length - 1].getPosition().lng()],
            destination: [map.markers[0].getPosition().lat(), map.markers[0].getPosition().lng()],
            callback: function(e) {
                route = new GMaps.Route({
                    map: map, 
                    route: e[0],
                    strokeColor: '#e4201a',
                    strokeOpacity: 0.7,
                    strokeWeight: 8
                });
                $('#btn-grp-navigate').removeClass('hide');
            } 
        });
        
        $('#btn-forward').click(function(e) {
            e.preventDefault();
            route.forward();
            
            if(route.step_count < route.steps_length)
                $('#steps').append('<li class="list-group-item list-group-item-default">' + route.steps[route.step_count].instructions + '</li>');
        });
        
        $('#btn-backward').click(function(e) {
            e.preventDefault();
            route.back();
            
            if(route.step_count >= 0)
                $('#steps').find('li').last().remove();
        });
    });
    

</script>
