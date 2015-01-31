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
        <h2>Field Community</h2>
        <h4 class="page-subheader">Add the details of your Field Community here. Set the Field Community Area in the map then add the initial data you gathered.</h4>
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
        <div class="panel panel-default panel-shadow">
            <div class="panel-heading">
                Mark Field Community Area
            </div>
            <div class="panel-body">                
                <div id="field-map" class="shadow" style="height: 450px;"></div>
                <hr />
                <div class="col-md-2 col-sm-4 col-xs-4"><h5><strong>Search Location</strong></h5></div>
                <div class="col-md-5 col-sm-6 col-xs-6">                    
                    <div class="input-group">
                        <input type="text" id="txt-location" class="form-control" placeholder="Location..." >
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-primary" id="btn-search">
                                <i class="fa fa-search"></i>
                            </button>                      
                        </div>
                    </div>                    
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-1"></div>
                <div class="col-md-1"></div>
                <div class="col-md-1"></div>
                <div class="col-md-1 col-sm-1 col-xs-1">  
                    <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal">
                        <i class="fa fa-info" ></i>
                    </button>
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title" id="myModalLabel">Marking Your Field Area</h4>
                                </div>
                                <div class="modal-body">
                                    Click on the map and add Pins to surround the field area you selected. This will create a shape that
                                    covers your field area so its easily visible to you and your inspectors. This shape will be shown on the 
                                    Field Community Details page.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr />
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default panel-shadow">
            <div class="panel-heading">
                Field Community Details
            </div>
            <div class="panel-body">
                <?php echo $this->Form->create('FieldCommunity', array(
                        'inputDefaults' => array(
                            'label' => false,
                        ),
                    ));
                ?>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <input type="hidden" id="map-points" name="data[FieldCommunity][map_points]" value="" />                        
                        <?php 
                            echo $this->Form->input('title', array(
                                'class' => 'form-control',
                                'placeholder' => 'Field Community Name', 
                                'type' => 'text',                    
                                'div' => array (
                                    'class' => 'form-group input-group-lg'
                                )
                            ));
                        ?>
                        
                        <?php 
                            echo $this->Form->input('village_name', array(
                                'class' => 'form-control',
                                'placeholder' => 'Village Name', 
                                'type' => 'text',                    
                                'div' => array (
                                    'class' => 'form-group input-group-lg'
                                )
                            ));
                        ?>
                        
                        <?php 
                            echo $this->Form->input('gn_area', array(
                                'class' => 'form-control',
                                'placeholder' => 'Grama Niladhari Area', 
                                'type' => 'text',                    
                                'div' => array (
                                    'class' => 'form-group input-group-lg'
                                )
                            ));
                        ?>
                        
                        <?php 
                            echo $this->Form->input('moh_area', array(
                                'class' => 'form-control',
                                'placeholder' => 'M.O.H. Area', 
                                'type' => 'text',                    
                                'div' => array (
                                    'class' => 'form-group input-group-lg'
                                )
                            ));
                        ?>
                        
                        <?php 
                            echo $this->Form->input('phi_area', array(
                                'class' => 'form-control',
                                'placeholder' => 'P.H.I. Area', 
                                'type' => 'text',                    
                                'div' => array (
                                    'class' => 'form-group input-group-lg'
                                )
                            ));
                        ?>                       
                                           
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <?php 
                            echo $this->Form->input('phm_area', array(
                                'class' => 'form-control',
                                'placeholder' => 'P.H.M. Area', 
                                'type' => 'text',                    
                                'div' => array (
                                    'class' => 'form-group input-group-lg'
                                )
                            ));
                        ?>     
                        
                        <?php 
                            echo $this->Form->input('no_of_families', array(
                                'class' => 'form-control',
                                'placeholder' => 'No. of Families', 
                                'type' => 'number',                    
                                'div' => array (
                                    'class' => 'form-group input-group-lg'
                                )
                            ));
                        ?>
                        
                        <?php 
                            echo $this->Form->input('population', array(
                                'class' => 'form-control',
                                'placeholder' => 'Population', 
                                'type' => 'number',                    
                                'div' => array (
                                    'class' => 'form-group input-group-lg'
                                )
                            ));
                        ?>
                        
                        <?php 
                            echo $this->Form->input('no_of_formal_settings', array(
                                'class' => 'form-control',
                                'placeholder' => 'Total Formal Settings', 
                                'type' => 'number',                    
                                'div' => array (
                                    'class' => 'form-group input-group-lg'
                                )
                            ));
                        ?>
                        
                        <?php 
                            echo $this->Form->input('no_of_informal_settings', array(
                                'class' => 'form-control',
                                'placeholder' => 'Total Informal Settings', 
                                'type' => 'number',                    
                                'div' => array (
                                    'class' => 'form-group input-group-lg'
                                )
                            ));
                        ?>
                        
                    </div>
                    <hr /><br />
                    <?php 
                        $form_end_options = array(
                            'label' => 'Save Details', 
                            'class' => 'btn btn-lg btn-success ',
                            'style' => 'margin-left:16px;'
                        );
                        echo $this->Form->end($form_end_options);
                    ?>
                
                    
            </div>
        </div>
    </div>    
</div>

<div id="chart-container" class="row">    
    <?php //echo var_dump($student); ?>
</div>

<script>
    // google map    
    map = new GMaps({
        el: '#field-map',
        zoom: 15,
        lat: 8.3506144,
        lng: 80.5054307,
        mapTypeControlOptions: {
          mapTypeIds : ["hybrid", "roadmap", "satellite", "terrain"]
        },
        rotateControl: false,
        streetViewControl: false,
        panControl: true,
        overviewMapControl: false,
        zoomControl: true,
        mapTypeControl: true,
        click: function(e) {
           map.addMarker({
                lat: e.latLng.lat(),
                lng: e.latLng.lng(),
                animation: google.maps.Animation.DROP,
                draggable: true
           }); 
           $('#map-points').val(function(idx, value) {
               return value + e.latLng.lat() + ',' + e.latLng.lng() + '|';
           });
        }
        
    });
    map.setMapTypeId('roadmap');    
    
    $('#btn-search').click(function(e) {
       e.preventDefault();
       GMaps.geocode({
          address: $('#txt-location').val().trim(),
          callback: function(res, status) {
              if(status === 'OK') {
                  var latlng = res[0].geometry.location;
                  map.setCenter(latlng.lat(), latlng.lng());
//                  map.addMarker({
//                      lat: latlng.lat(),
//                      lng: latlng.lng(),
//                      animation: google.maps.Animation.DROP,
//                  });
                  console.log(map.getCenter());
              }
          }
       });
    });
    
</script>