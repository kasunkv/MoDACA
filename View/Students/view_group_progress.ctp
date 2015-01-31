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
        <h2>Group Progress</h2>
        <h4 class="page-subheader">View your Groups Progress</h4>
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
                    
                        <?php echo $this->Form->create('InitAgeDistribution', array(
                            'inputDefaults' => array(
                                //'label' => false,
                            ),
                        ));
                        ?>
                        <div class="multiple-input-wrapper">
                            <div class="multi-item-wrapper">
                                <input type="hidden" name="data[0][InitAgeDistribution][field_community_id]" value="<?php echo $student['FieldGroup']['field_community_id']; ?>" />
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group input-group-lg">
                                        <label>Age Group</label>
                                        <input name="data[0][InitAgeDistribution][age_group]" class="form-control" type="text">
                                    </div>                        
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group input-group-lg">
                                        <label>Male</label>
                                        <input name="data[0][InitAgeDistribution][male]" class="form-control" type="text">
                                    </div>                        
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group input-group-lg">
                                        <label>Female</label>
                                        <input name="data[0][InitAgeDistribution][female]" class="form-control" type="text">
                                    </div>                        
                                </div>
                                <div class="form-add-more">
                                    <button class="btn btn-success btn-sm" id="btn-add-field" style="margin-left: 10px;">
                                        <i class="fa fa-plus"></i> Add More...
                                    </button>
                                    <hr />
                                </div>
                            </div>                             
                        </div>                                              
                        <?php 
                            $form_end_options = array(
                                'label' => 'Save Details', 
                                'class' => 'btn btn-lg btn-primary ',                                
                            );
                            echo $this->Form->end($form_end_options);
                        ?>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12">
            <h3>Current Age Groups</h3>
             <?php if(empty($ageGroups)): ?>
                <p class="text-muted">No Age Groups Added Yet.</p>
            <?php else: ?>
                <div class="table-responsive panel-shadow">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th><h4>Age Group</h4></th>
                                <th><h4>Male</h4></th>
                                <th><h4>Female</h4></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($ageGroups as $groups): ?>
                                <tr>
                                    <td><span class="text-center"><strong><?php echo $groups['InitAgeDistribution']['age_group']; ?></strong></span></td>
                                    <td><span class="text-success text-center"><strong><?php echo $groups['InitAgeDistribution']['male']; ?></strong></span></td>
                                    <td><span class="text-danger text-center"><strong><?php echo $groups['InitAgeDistribution']['female']; ?></strong></span></td>
                                </tr>
                            <?php endforeach; ?> 
                        </tbody>
                    </table>
                </div>
             <?php endif; ?>
        </div>        
    </div>
</div>

<div id="chart-container" class="row">    
    <?php //echo var_dump($ageGroups); ?>
</div>

<script>
    
    var max_fields      = 5; //maximum input boxes allowed
    
    var x = 1; //initlal text box count
    $('#btn-add-field').click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed           
            $('.multiple-input-wrapper').append('<div class="multi-item-wrapper animated zoomIn">\
                                <input type="hidden" name="data['+ x +'][InitAgeDistribution][field_community_id]" value="<?php echo $student['FieldGroup']['field_community_id']; ?>" />\
                                <div class="col-md-4 col-sm-4 col-xs-4">\
                                    <div class="form-group input-group-lg">\
                                        <label>Age Group</label>\
                                        <input name="data['+ x +'][InitAgeDistribution][age_group]" class="form-control" type="text">\
                                    </div>                        \
                                </div>\
                                <div class="col-md-4 col-sm-4 col-xs-4">\
                                    <div class="form-group input-group-lg">\
                                        <label>Male</label>\
                                        <input name="data['+ x +'][InitAgeDistribution][male]" class="form-control" type="text">\
                                    </div>                        \
                                </div>\
                                <div class="col-md-4 col-sm-4 col-xs-4">\
                                    <div class="form-group input-group-lg">\
                                        <label>Female</label>\
                                        <input name="data['+ x +'][InitAgeDistribution][female]" class="form-control" type="text">\
                                    </div>                        \
                                </div>\
                                <div class="col-md-12">\
                                    <button href="" class="btn btn-danger btn-xs btn-remove-field">\
                                        <i class="fa fa-minus"></i> &nbsp; Remove\
                                    </button>  \
                                    <hr />\
                                </div> \
                            </div>'); //add input box
            x++; //text box increment
        }
    });
    
    $('.multiple-input-wrapper').on("click",".btn-remove-field", function(e){ //user click on remove text
        e.preventDefault(); 
        $(this).parent('div').parent('div').remove();
        x--;
        
    });
   
</script>