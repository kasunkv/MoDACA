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
        <h2>Community Progress</h2>
        <h4 class="page-subheader">
            Inspect your Community Progress from here. Click on a house on the map or in the list bellow
            to find more about each Household.
        </h4>
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
        <div class="panel panel-success panel-shadow">
            <div class="panel-heading">
                <b>Location of Households</b>
            </div>
            <div class="panel-body">
                <div id="area-map" class="shadow" style="width: 100%; height: 400px;" ></div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12 col-xs-12">
        
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">
        <div class="panel panel-success panel-shadow">
            <div class="panel-heading">
                <b>All Households in Field Area</b>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover no-footer" >
                        <thead>
                            <tr role="row">
                                <th>House ID</th>
                                <th>Owner</th>
                                <th>Address(s)</th>
                                <th>Members</th>
                                <th>Actions</th>
                            </tr>
                        </thead> <?php $households ?>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach($households as $house): ?>
                                <tr class="<?php //($i % 2 == 0) ? echo 'odd' : echo 'even'; ?>">
                                    <td><?php echo $house['Household']['household_identifier']; ?></td>
                                    <td><?php echo $house['Household']['leader_name']; ?></td>
                                    <td><?php echo $house['Household']['address']; ?></td>
                                    <td><?php echo $house['Household']['no_of_members']; ?></td>
                                    <td>
                                        <?php echo $this->Html->link(__('Details'),
                                            array(
                                                'action' => 'viewHousehold', $house['Household']['id'],                                            
                                            ),
                                            array(
                                                'class' => 'btn btn-success btn-xs'
                                            ));
                                        ?>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>   
                </div>

            </div>
        </div>
    </div>

</div>

<script>
    // google map
    
    map = new GMaps({
        el: '#area-map',
        zoom: 16,
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
    
    <?php if(!empty($mapPoints)): ?>    
        var path = [];
        <?php foreach ($mapPoints as $point): ?>
            var temp = [];
            temp.push(parseFloat(<?php echo $point['FieldMapPoint']['point_lat']; ?>));
            temp.push(parseFloat(<?php echo $point['FieldMapPoint']['point_lng']; ?>));
            path.push(temp);
        <?php endforeach; ?>

        map.drawPolygon({
            paths: path,
            strokeColor: '#39b3d7',
            strokeOpacity: 0.5,
            strokeWeight: 2,
            fillColor: '#39b3d7',
            fillOpacity: 0.2,
            geodesic: true,

        });
    <?php endif; ?>
    
    <?php if(!empty($households)): ?> 
        <?php foreach ($households as $house): ?>
            map.addMarker({
                lat: <?php echo $house['Household']['gps_latitude']; ?>,
                lng: <?php echo $house['Household']['gps_longitude']; ?>,
                title: 'Click to Navigate to Details of Household <?php echo $house["Household"]["household_identifier"]; ?>',
                infoWindow: {
                    content: '<p><?php echo $house["Household"]["household_identifier"]; ?></p>'
                },
                click: function(e) {                
                    window.location.href = "<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'viewHousehold', $house['Household']['id'])); ?>";
                }
            });
        <?php endforeach; ?>
    <?php endif; ?>
       
    map.setMapTypeId('roadmap');

</script>

