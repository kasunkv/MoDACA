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
        <h2><?php echo $familyMember['FamilyMember']['first_name'] . " " . $familyMember['FamilyMember']['last_name']; ?> | Progress</h2>
        <h4 class="page-subheader">Inspect the progress of <?php echo $familyMember['FamilyMember']['first_name'] . " " . $familyMember['FamilyMember']['last_name']; ?></h4>
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
                <b>Basic Details</b>
            </div>
            <div class="panel-body">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <p class="profile-view-heading">Name</p>
                    <p class="profile-view-info"><?php echo $familyMember['FamilyMember']['first_name'] . " " . $familyMember['FamilyMember']['last_name']; ?></p>

                    <p class="profile-view-heading">Age</p>
                    <p class="profile-view-info"><?php echo $familyMember['FamilyMember']['age']; ?></p>        

                    <p class="profile-view-heading">Gender</p>
                    <p class="profile-view-info"><?php echo $familyMember['FamilyMember']['gender']; ?></p>

                    <p class="profile-view-heading">Occupation</p>
                    <p class="profile-view-info"><?php echo $familyMember['FamilyMember']['occupation']; ?></p>

                    <p class="profile-view-heading">Education Level</p>
                    <p class="profile-view-info"><?php echo $familyMember['FamilyMember']['educational_level']; ?></p>

                    <p class="profile-view-heading">Special Notes</p>
                    <p class="profile-view-info"><?php echo $familyMember['FamilyMember']['note']; ?></p>


                </div>
                <div class="col-md-6 col-sm-12 col-xs-12"> 
                    <p class="profile-view-heading">Sleep Hours</p>
                    <p class="profile-view-info"><?php echo $familyMember['FamilyMember']['sleeping_hour']; ?> hrs</p>

                    <p class="profile-view-heading">Exercise Hours</p>
                    <p class="profile-view-info"><?php echo $familyMember['FamilyMember']['exercise_hour']; ?> hrs</p>

                    <p class="profile-view-heading">Health Issue</p>
                    <p class="profile-view-info"><?php echo $familyMember['HealthIssue']['issue_name']; ?></p>

                    <p class="profile-view-heading">Description</p>
                    <p class="profile-view-info"><?php echo $familyMember['HealthIssue']['description']; ?></p>

                    <p class="profile-view-heading">Starting BMI</p>
                    <p class="profile-view-info"><?php echo $familyMember['FamilyMember']['bmi']; ?></p>
                    
                    <p class="profile-view-heading">Starting WHR</p>
                    <p class="profile-view-info"><?php echo $familyMember['FamilyMember']['whr']; ?></p>
                </div>
            </div>
        </div>
    </div>
    
</div>

<div class="row">
    <div class="col-md-8 col-sm-12 col-xs-12">
        <div class="panel panel-success panel-shadow">
            <div class="panel-heading">
                <b><?php echo $familyMember['FamilyMember']['first_name'] . "'s"; ?> BMI Change</b>
            </div>
            <div class="panel-body">
                <div id="bmi-area"></div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 col-sm-12 col-xs-12">
        <h1 class="display-value"><?php echo array_values($familyMemberBmi)[0]['BMI']['value']; ?> </h1>
        <p class="profile-view-info">(<?php echo $firstBmiCat; ?>)</p>
        <p class="profile-view-heading">Starting BMI Category</p>
        
        <?php $temp = array_values($familyMemberBmi); ?>
        <h1 class="display-value"><?php echo end($temp)['BMI']['value']; ?> </h1>
        <p class="profile-view-info">(<?php echo $lastBmiCat; ?>) </p>
        <p class="profile-view-heading">Current BMI Category</p>
    </div>
</div>

<div class="row">
    <div class="col-md-8 col-sm-12 col-xs-12">        
        <div class="panel panel-success panel-shadow">
            <div class="panel-heading">
                <b><?php echo $familyMember['FamilyMember']['first_name'] . "'s"; ?> WHR Change</b>
            </div>
            <div class="panel-body">
                <div id="whr-area"></div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12 col-xs-12">
            <h1 class="display-value"><?php //echo array_values($familyMemberBmi)[0]['BMI']['value']; ?> (<?php //echo $firstBmiCat; ?>) </h1>
            <p class="profile-view-heading">Starting WHR Category</p>
            <?php //$temp = array_values($familyMemberBmi); ?>
            <h1 class="display-value"><?php //echo end($temp)['BMI']['value']; ?> (<?php //echo $lastBmiCat; ?>) </h1>
            <p class="profile-view-heading">Current WHR Category</p>
    </div>
    
</div>


<script>
    
    
    
    
    /***************** MORRIS CHARTS *******************/
    
    var bmiAry = [];
    <?php foreach ($familyMemberBmi as $bmi): ?>
        var item = {
            date: '<?php echo $bmi['BMI']['date']; ?>',
            value: <?php echo $bmi['BMI']['value']; ?>            
        };
        bmiAry.push(item);        
    <?php endforeach; ?>
    
            
    Morris.Area({
        element: 'bmi-area',
        data: bmiAry,
        parseTime:true,
        lineColors: [ '#5cb85c'],
        xkey: 'date',
        ykeys: ['value'],
        labels: ['BMI Value: '],
        pointSize: 2,
        hideHover: 'auto',
        resize: true,
        behaveLikeLine: false
    });
    
    var whrAry = [];
    <?php foreach ($familyMemberWhr as $whr): ?>
        var item = {
            date: '<?php echo $whr['WHR']['date']; ?>',
            value: <?php echo $whr['WHR']['value']; ?>            
        };
        whrAry.push(item);        
    <?php endforeach; ?>
    
        
    Morris.Area({
        element: 'whr-area',
        data: whrAry,
        parseTime: true,
        lineColors: ['#d9534f'],
        xkey: 'date',
        ykeys: ['value'],
        labels: ['WHR Value: '],
        pointSize: 2,
        hideHover: 'auto',
        resize: true,
        behaveLikeLine: false
    });

</script>
