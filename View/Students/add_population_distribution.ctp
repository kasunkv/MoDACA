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
        <h2>Community Population Distribution</h2>
        <h4 class="page-subheader">Add the population distribution details for your Field Community</h4>
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
    <div class="col-md-12">       
        <div class="col-md-6 col-sm-12 col-xs-12">
            <h3><?php echo $fieldCommunity['FieldCommunity']['title']; ?> | <?php echo $fieldCommunity['FieldCommunity']['village_name']; ?></h3>
            <br />
            <div class="panel panel-default panel-shadow">
                <div class="panel-heading">
                    Add Population Distribution
                </div>
                <div class="panel-body" > 
                                            
                        <?php echo $this->Form->create('InitPopulation', array(
                            'inputDefaults' => array(
                                //'label' => false,
                            ),
                        ));
                        ?>
                        <?php echo  $this->Form->input('id', array('type' => 'hidden')); ?>
                        <input type="hidden" name="data[InitPopulation][field_community_id]" value="<?php echo $student['FieldGroup']['field_community_id']; ?>" />
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <?php 
                                echo $this->Form->input('total_population', array(
                                    'class' => 'form-control',
                                    'placeholder' => '', 
                                    'type' => 'text',                    
                                    'div' => array (
                                        'class' => 'form-group input-group-lg'
                                    ),                                
                                ));
                            ?>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <?php 
                                echo $this->Form->input('no_of_families', array(
                                    'class' => 'form-control',
                                    'placeholder' => '', 
                                    'type' => 'text',                    
                                    'div' => array (
                                        'class' => 'form-group input-group-lg'
                                    ),         
                                    'label' => 'Families'
                                ));
                            ?>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <?php 
                                echo $this->Form->input('male', array(
                                    'class' => 'form-control',
                                    'placeholder' => '', 
                                    'type' => 'text',                    
                                    'div' => array (
                                        'class' => 'form-group input-group-lg'
                                    ),                                
                                ));
                            ?>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <?php 
                                echo $this->Form->input('female', array(
                                    'class' => 'form-control',
                                    'placeholder' => '', 
                                    'type' => 'text',                    
                                    'div' => array (
                                        'class' => 'form-group input-group-lg'
                                    ),                                
                                ));
                            ?>
                        </div>
                        <div class="col-md-12">
                            <hr />
                        </div>                        
                        <?php 
                            $form_end_options = array(
                                'label' => 'Save Details', 
                                'class' => 'btn btn-lg btn-success ',                                
                            );
                            echo $this->Form->end($form_end_options);
                        ?>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="shadow" id="map" style="height: 400px;"></div>
        </div>
        
    </div>
</div>

<div id="chart-container" class="row">    
    <?php //echo var_dump($student); ?>
</div>

<script>
    // google map
    
    map = new GMaps({
        el: '#map',
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
    map.setMapTypeId('hybrid');
    
    var path = [];
    <?php foreach ($mapPoints as $point): ?>
        var temp = [];
        temp.push(parseFloat(<?php echo $point['FieldMapPoint']['point_lat']; ?>));
        temp.push(parseFloat(<?php echo $point['FieldMapPoint']['point_lng']; ?>));
        path.push(temp);
    <?php endforeach; ?>
        
    map.setCenter(path[0][0], path[0][1]);
    
    map.drawPolygon({
        paths: path,
        strokeColor: '#39b3d7',
        strokeOpacity: 0.5,
        strokeWeight: 2,
        fillColor: '#39b3d7',
        fillOpacity: 0.2,
        geodesic: true,
        
    });   
</script>