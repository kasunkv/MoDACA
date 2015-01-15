<?php $this->layout = 'defaultLayout'; ?>
<?php
    $this->start('sideNav');
    echo $this->element('studentNav');
    $this->end();
?>
<div class="row">
    <div class="col-md-12">
        <h2><?php echo $student['Student']['first_name'] . " " . $student['Student']['last_name']; ?> | Progress</h2>
        <h4 class="page-subheader">Inspect your progress here</h4>
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
        <div class="panel panel-success">
            <div class="panel-heading">
                <b>Location of Households</b>
            </div>
            <div class="panel-body">
                <div id="area-map" style="width: 100%; height: 400px;" ></div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12 col-xs-12">
        
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">
        <div class="panel panel-success">
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
                                <th>No of Members</th>
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
        zoom: 17,
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
    
    <?php foreach ($households as $house): ?>
        map.addMarker({
            lat: <?php echo $house['Household']['gps_latitude']; ?>,
            lng: <?php echo $house['Household']['gps_longitude']; ?>,
            title: 'Click to Navigate to Details of Household <?php echo $house["Household"]["household_identifier"]; ?>',
            infoWindow: {
                content: '<p><?php echo $house["Household"]["household_identifier"]; ?></p>'
            },
            click: function(e) {                
                window.location.href = "/MoDACA/students/viewHousehold/<?php echo $house['Household']['id']; ?>";
            }
        });
    <?php endforeach; ?>
    
       
    map.setMapTypeId('roadmap');

</script>

