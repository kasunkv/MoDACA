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
<style>
    .main-dash-noti-box-title {
        font-size: 2.5em;
        overflow: none;
        white-space: none;
        height: auto;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <h2>Track Students</h2>
        <h4 class="page-subheader">Find where the students are currently.</h4>
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
    <div class="col-md-6 col-sm-12 col-xs-12">  
        <div class="panel panel-default panel-shadow">
            <div class="panel-heading">
                Search Student
            </div>
            <div class="panel-body">
                <?php echo $this->Form->create('Student', array(
                        'inputDefaults' => array(
                            'label' => false,
                        ),
                    ));
                    ?>         
                    <div class="form-group input-group-lg">
                        <select name="data[Student][search_by]" class="form-control" id="StudentSearchBy">
                            <option value="" selected="">Select Search Option...</option>
                            <option value="name" >Name</option>
                            <option value="index">Index No</option>
                        </select>                                
                    </div> 
                    <div class="form-group input-group">
                        <input type="text" name="data[Student][term]" class="form-control" id="StudentName"/> 
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button"><i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    <?php 
                        $form_end_options = array(
                            'label' => 'Search', 
                            'class' => 'btn btn-lg btn-primary hide', 
                            'style' => 'margin-left: 0px;'
                        );
                        echo $this->Form->end($form_end_options);
                    ?>
            </div>            
        </div>
    </div> 
    
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="" id="search-result">
            <p class="text-muted" style="margin-left: 10px; margin-top: 0px;">No Searches Yet.</p>
            
        </div>
    </div> 
</div>

<div class="row">
    <div class="col-md-12">
        <div id="map" style="height: 450px;"></div>
    </div>
</div>


<script>

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

    $("#StudentName").bind("keyup", function (event) {
        $.ajax({
            async:true,
            data:$("form").serialize(),
            dataType:"html",
            success:function (data, textStatus) {
                $("#search-result").html(data);
                
                // for Locating Studnet
                $('.locate').on('click', function (evt) {
                    var data = 'student-id=' +  $(this).find('.std-id').val();
                    var init = function() {
                        $.ajax({
                            async: true,
                            data: data,
                            dataType: 'json', 
                            success: function(data, status) {

                                if (map.markers.length > 0) {            
                                    map.removeMarker(map.markers[0]);
                                }
                                console.log(data);
                                map.addMarker({
                                    lat: data.lat,
                                    lng: data.lng,
                                    title: data.timestamp,                                
                                });
                                map.setCenter(data.lat, data.lng);
                            },
                            complete: function() {
                                setTimeout(init, 5000);
                            },
                            type: 'post',
                            url: '<?php echo $this->Html->url(array('controller' => 'Staffs', 'action' => 'getLocationForStudent')); ?>'
                        });                        
                    };                    
                    init();
                    
                    
                    return false;
                });
                
            },
            type:"post",
            url:"<?php echo $this->Html->url(array('controller' => 'Staffs', 'action' => 'getTrackedStudent')); ?>"}
        );
        return false;
    });
    
    

</script>

