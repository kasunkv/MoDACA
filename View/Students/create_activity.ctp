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
        <h2><?php echo $student['Student']['first_name'] . " " . $student['Student']['last_name']; ?> | Create Community Activity</h2>
        <h4 class="page-subheader">Create Community Activity to involve the community members in the health promotion process and interact with them.</h4>
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
        <?php echo $this->Form->create('Event', array(
            'inputDefaults' => array(
                'label' => false,
            ),
        ));
        ?>
            <div class="panel panel-default panel-shadow">
                <div class="panel-heading">
                    Community Event Details
                </div>
                <div class="panel-body">
                    <!-- Colum Left  -->
                    <div class="col-md-7 col-sm-12 col-xs-12">
                        <div id="event-map" class="shadow" style="height: 400px;"></div>
                    </div>
                    
                    <div class="col-md-5 col-sm-12 col-xs-12">   
                        <br />
                        <!-- Title -->
                        <?php 
                            echo $this->Form->input('title', array(
                                'class' => 'form-control',
                                'placeholder' => 'Event Title', 
                                'type' => 'text',                    
                                'div' => array (
                                    'class' => 'form-group input-group-lg'
                                )
                            ));
                        ?>
                        
                        <!-- Description -->
                        <?php 
                            echo $this->Form->input('description', array(
                                'class' => 'form-control',
                                'placeholder' => 'Description', 
                                'type' => 'textarea',
                                'rows' => '10',                          
                                'div' => array (
                                    'class' => 'form-group'
                                )
                            ));
                        ?>     
                                                
                        <!-- Date -->
                        <?php 
                            echo $this->Form->input('date', array(
                                'class' => 'form-control',
                                'placeholder' => 'Date', 
                                'type' => 'text',                                      
                                'data-date-format' => 'YYYY-MM-DD',
                                'div' => array (
                                    'class' => 'form-group input-group-lg date',
                                )
                            )); 
                        ?>
                        
                        <!-- Exp. Attendance -->
                       
                        <?php 
                            echo $this->Form->input('expected_attendance', array(
                                'class' => 'form-control',
                                'placeholder' => 'Attendance Expected', 
                                'type' => 'text',
                                'div' => array (
                                    'class' => 'form-group input-group-lg'
                                )
                            ));
                        ?>
                        
                        <input type="hidden" id="activity-lat" name="data[Event][latitude]" value="" />
                        <input type="hidden" id="activity-lng" name="data[Event][longitude]" value="" />
                      
                    </div>
                    
                </div>
            </div>  
            
        <?php 
            $form_end_options = array(
                'label' => 'Create Activity', 
                'class' => 'btn btn-lg btn-success btn-custom',                                
            );
            echo $this->Form->end($form_end_options);
        ?>
    </div>
</div>

<div class="row">
    <?php //echo var_dump($student); ?>
</div>

<script>
    
    $('#EventDate').datetimepicker();
    
    // google map
    map = new GMaps({
        el: '#event-map',
        zoom: 16,
        lat: 8.358512628338266,
        lng: 80.51150321960449,
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
    
    GMaps.on('click', map.map, function(evt) {
        // clear the previous marker
        if (map.markers.length > 0) {            
            map.removeMarker(map.markers[0]);
        }
        
        var title = '';
        var lat = evt.latLng.lat();
        var lng = evt.latLng.lng();
        console.log(lat + "\n" + lng);
        
        GMaps.geocode({
            latLng: evt.latLng,
            callback: function(res, status) {
                if(status == 'OK') {
                    console.log(res[0]['formatted_address']);
                    title = res[0]['formatted_address'];
                    
                    $('#activity-lat').val(lat);
                    $('#activity-lng').val(lng);        

                    map.addMarker({
                       lat: lat,
                       lng: lng,
                       infoWindow: {
                           content: '<p>' + title + '</p>'
                       }
                    });
                }
            }
        });
        
//        $('#activity-lat').val(lat);
//        $('#activity-lng').val(lng);        
//        
//        map.addMarker({
//           lat: lat,
//           lng: lng,
//           infoWindow: {
//               content: '<p>' + title + '</p>'
//           }
//        });
    });
    
    map.setMapTypeId('hybrid');
</script>