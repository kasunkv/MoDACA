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
        <h2><?php echo $chartPopulation['title']; ?> | <?php echo $chartPopulation['village_name']; ?> Field Community</h2>
        <h4 class="page-subheader">Details about <?php echo $chartPopulation['village_name']; ?> Field Community</h4>
    </div>
</div>
<!-- /. ROW  -->
<hr />

<div class="row">
    <div class="col-md-12">
        <?php echo $this->Session->flash(); ?>        
    </div>
</div>

<!-- MAP OF AREA -->
<div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">
        <div id="area-map" class="shadow" style="height: 400px;" ></div>
    </div>
</div>
<br />
<!-- POPULATION DETAILS  -->
<div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">
        <div class="panel panel-success panel-shadow">
            <div class="panel-heading">
                <b>Population Distribution</b>
            </div>
            <div class="panel-body">
                <div class="col-md-5">
                    <div class="chart" id="donut-population"></div>
                </div>
<!--                <div class="col-md-1"></div>-->
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <h1 style="margin-bottom: -16px;"><?php echo $chartPopulation['total_population']; ?></h1>
                            <p class="text-muted">Total Population</p>
                        </div>
                        <div class="col-md-6">
                            <h1 style="margin-bottom: -16px;"><?php echo $chartPopulation['families']; ?></h1>
                            <p class="text-muted">Total Families</p>
                        </div>
                    </div>
                    <hr />
                    <!-- Progress Bar Female % -->
                    <h5><strong>Female Population (<?php echo $chartPopulation['female_pre']; ?>%)</strong></h5>
                    <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?php echo $chartPopulation['female_pre']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $chartPopulation['female_pre']; ?>%">
                            <span class="sr-only"><?php echo $chartPopulation['female_pre']; ?> % Females</span>
                        </div>
                    </div>        
                    <!-- Progress Bar Male % -->
                    <h5><strong>Male Population (<?php echo $chartPopulation['male_pre']; ?>%)</strong></h5>
                    <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo $chartPopulation['male_pre']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $chartPopulation['male_pre']; ?>%">
                            <span class="sr-only"><?php echo $chartPopulation['male_pre']; ?> % Males</span>
                        </div>
                    </div> 
                    <hr />
                    <div class="row">
                        <div class="col-md-1">
                            <h1 style="margin-bottom: -16px;"><?php echo $chartPopulation['formal_settings']; ?></h1>
                        </div>
                        <div class="col-md-2">
                            <p class="text-muted">Formal Settings</p>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-1">
                            <h1 style="margin-bottom: -16px;"><?php echo $chartPopulation['informal_settings']; ?></h1>
                        </div>
                        <div class="col-md-2">
                            <p class="text-muted">Informal Settings</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>    
</div>

<!-- AGE DISTRIBUTION -->
<div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">
        <div class="panel panel-success panel-shadow">
            <div class="panel-heading">
                <b>Age Distribution</b>
            </div>
            <div class="panel-body">
                <div class="col-md-6">
                    <div class="row">
                        <div class="chart" id="bar-age"></div>
                        <center><h5><strong>Age Distribution (Male & Female)</strong></h5></center>
                    </div>                    
                </div>
                <div class="col-md-6">
                    <div class="chart" id="donut-age"></div>
                    <center><h5><strong>Age Distribution (Total)</strong></h5></center>
                </div>                
            </div>
        </div>        
    </div>  
    
</div>

<!-- EDUCATION DISTRIBUTION -->
<div class="row">          

    <div class="col-md-12 col-xs-12 col-sm-12">
        <div class="panel panel-success panel-shadow">
            <div class="panel-heading">
                <b>Education Level Distribution</b>
            </div>
            <div class="panel-body">
                <div class="col-md-6">
                    <div class="chart" id="donut-education"></div>
                    <center><h5><strong>Education Level Distribution (Total)</strong></h5></center>
                </div> 
                <div class="col-md-6">
                     <div class="chart" id="bar-education"></div>
                     <center><h5><strong>Education Level Distribution (Male/Female)</strong></h5></center>
                </div>
            </div>
        </div>        
    </div>  
</div>

<!-- OCCUPATION DISTRIBUTION -->
<div class="row">          

    <div class="col-md-12 col-xs-12 col-sm-12">
        <div class="panel panel-success panel-shadow">
            <div class="panel-heading">
                <b>Occupation Type Distribution</b>
            </div>
            <div class="panel-body">
                <div class="col-md-6">
                     <div class="chart" id="bar-occupation"></div>
                     <center><h5><strong>Occupation Type Distribution (Male/Female)</strong></h5></center>
                </div>
                <div class="col-md-6">
                    <div class="chart" id="donut-occupation"></div>
                    <center><h5><strong>Occupation Type Distribution (Total)</strong></h5></center>
                </div>
            </div>
        </div>        
    </div>  
</div>

<!-- INCOME DISTRIBUTION -->
<div class="row">          

    <div class="col-md-6 col-xs-12 col-sm-12">
        <div class="panel panel-success panel-shadow">
            <div class="panel-heading">
                <b>Income Distribution</b>
            </div>
            <div class="panel-body">
                <div class="chart" id="donut-income"></div>
                <center><h5><strong>Income Distribution (Families)</strong></h5></center>
            </div>
        </div>        
    </div>  
</div>
<hr />
<div class="row">
    <div class="col-md-12">
        <h3>Tasks</h3>
        <button class="btn btn-md btn-primary" id="btn-save">Convert Charts to Images</button>
        <br /><br />
        <div id="save-alart" class="alert alert-info animated zoomIn hide" role="alert">
<!--            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>-->
            <h4>A Word of Warning</h4>
            <p>Once you convert the charts to images the charts will no longer be interactive. You can then right click on the charts and select <b>Save image as...</b>
                and save the image. If you want to re interact with the charts, please refresh the page.
            </p>
            <p>
                <button type="button" id="btn-continue" class="btn btn-info">Continue</button>
                <button type="button" id="btn-close-alart" class="btn btn-default">Cancel</button>
            </p>
        </div>
    </div>
    
</div>
<div class="row">
    <div class="col-md-12">
        <?php //echo var_dump($mapPoints); ?>
    </div>
</div>


<script>
    //colors: ['#428bca', '#39b3d7', '#6DD1EF', '#47a447', '#25A325', '#8CF58C', '#ed9c28', '#d58512', '#d2322d', '#ac2925']
    
    // Population Distribution Chart  
    Morris.Donut({
        element: 'donut-population',
        data: [{
            label: "Male Population",
            value: <?php echo $chartPopulation['male']; ?>
        }, {
            label: "Female Population",
            value: <?php echo $chartPopulation['female']; ?>
        }],
        resize: true,
        colors: ['#5cb85c', '#d9534f']
    });  
    
            
    // Age Distribution Chart - Donut
    var ageObj = <?php echo json_encode($ageDistribution); ?>;    
    var ageAry = jQuery.makeArray(ageObj);
    
    var ageDist = [];
    var ageDistGender = [];
    
    for(var i = 0; i < ageAry.length; i++) {
        var item = {
          label: 'Age ' + ageAry[i]['Age Group'],
          value: ageAry[i]['Total']
        };
        
        var item2 = {
            y: 'Age ' + ageAry[i]['Age Group'],
            a: ageAry[i]['Male'],
            b: ageAry[i]['Female']
        };
        
        ageDist.push(item);
        ageDistGender.push(item2);
    }
    
    Morris.Donut({
        element: 'donut-age',
        data: ageDist,
        resize: true,
        colors: ['#428bca', '#39b3d7', '#6DD1EF', '#47a447', '#25A325', '#8CF58C', '#ed9c28', '#d58512', '#d2322d', '#ac2925']
    });
    
    // Age Distribution Chart - Bar (Male/Female)
    Morris.Bar({
        element: 'bar-age',
        data: ageDistGender,
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Male', 'Female'],
        hideHover: 'auto',
        resize: true,
        barColors: ['#5cb85c', '#d9534f']
    });
    
    
    
    // Education Distribution Chart
    var eduObj = <?php echo json_encode($eduDistribution); ?>;
    var eduAry = jQuery.makeArray(eduObj);
    var eduDist = [];
    var eduDistGender = [];
    
    for(var i = 0; i < eduAry.length; i++) {
        var item = {
          label: eduAry[i]['Education Level'],
          value: eduAry[i]['Total']
        };
        
        var item2 = {
            y: eduAry[i]['Education Level'],
            a: eduAry[i]['Male'],
            b: eduAry[i]['Female']
        };
        
        eduDist.push(item);
        eduDistGender.push(item2);
    }
    
    Morris.Donut({
        element: 'donut-education',
        data: eduDist,
        resize: true,
        colors: ['#428bca', '#39b3d7', '#6DD1EF', '#47a447', '#25A325', '#8CF58C', '#ed9c28', '#d58512', '#d2322d', '#ac2925']
    });
    
    // Education Distribution Chart - Bar (Male/Female)
    Morris.Bar({
        element: 'bar-education',
        data: eduDistGender,
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Male', 'Female'],
        hideHover: 'auto',
        resize: true,
        barColors: ['#5cb85c', '#d9534f']
    });
    
    
    
    // Occupation Distribution Chart
    var occObj = <?php echo json_encode($occDistribution); ?>;
    var occAry = jQuery.makeArray(occObj);
    var occDist = [];
    var occDistGender = [];
    
    for(var i = 0; i < occAry.length; i++) {
        var item = {
          label: occAry[i]['Occupation Type'],
          value: occAry[i]['Total']
        };
        
        var item2 = {
            y: occAry[i]['Occupation Type'],
            a: occAry[i]['Male'],
            b: occAry[i]['Female']
        };
        
        occDist.push(item);
        occDistGender.push(item2);
    }
    
    Morris.Donut({
        element: 'donut-occupation',
        data: occDist,
        resize: true,
        colors: ['#428bca', '#39b3d7', '#6DD1EF', '#47a447', '#25A325', '#8CF58C', '#ed9c28', '#d58512', '#d2322d', '#ac2925']
    });
    
    // Occupation Distribution Chart - Bar (Male/Female)
    Morris.Bar({
        element: 'bar-occupation',
        data: occDistGender,
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Male', 'Female'],
        hideHover: 'auto',
        resize: true,
        barColors: ['#5cb85c', '#d9534f']
    });
    
    
    // Income Distribution Chart
    var incomeObj = <?php echo json_encode($incomeDistribution); ?>;
    var incomeAry = jQuery.makeArray(incomeObj);
    var incomeDist = [];
    
    for(var i = 0; i < incomeAry.length; i++) {
        var item = {
          label: incomeAry[i]['Income Range'],
          value: incomeAry[i]['No of Families']
        };
        
        incomeDist.push(item);
    }
    
    Morris.Donut({
        element: 'donut-income',
        data: incomeDist,
        resize: true,
        colors: ['#428bca', '#39b3d7', '#6DD1EF', '#47a447', '#25A325', '#8CF58C', '#ed9c28', '#d58512', '#d2322d', '#ac2925']
    });
    
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
//    map.addMarker({
//        lat: 8.370422,
//        lng: 80.516138,
//        title: 'Field Community Area (Click for More Information)',
//        infoWindow: {
//            content: '<p>The field area consists of <?php //echo $chartPopulation["families"]; ?> families with a population of <?php //echo $chartPopulation["total_population"]; ?> people.</p>'
//        }
//    });
    map.setMapTypeId('hybrid');
    
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
    //console.log(path);
    
    
    
    
    
    $('#btn-save').click(function (){
        $('#save-alart').removeClass('hide');
        
        
        $('#btn-continue').click(function (){
            $('.chart').each(function(i) {
                $(this).find('svg').toImage();   
            });  
            

        });
        
        $('#btn-close-alart').click(function (){
            $('#save-alart').addClass('hide');
        });
        
        
    });
    
    $('#save-alart').on('closed.bs.alert', function () {
        
    });
        
        
</script>    
