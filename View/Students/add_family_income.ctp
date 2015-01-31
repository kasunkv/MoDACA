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
        <h2>Community Family Income</h2>
        <h4 class="page-subheader">Add the Family Income details for your Field Community</h4>
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
                    Add Family Income Levels
                </div>
                <div class="panel-body" >
                    
                        <?php echo $this->Form->create('InitIncome', array(
                            'inputDefaults' => array(
                                //'label' => false,
                            ),
                        ));
                        ?>
                        <div class="multiple-input-wrapper">
                            <div class="multi-item-wrapper">
                                <input type="hidden" name="data[0][InitIncome][field_community_id]" value="<?php echo $student['FieldGroup']['field_community_id']; ?>" />
                                <div class="col-md-8 col-sm-8 col-xs-8">
                                    <div class="form-group input-group-lg">
                                        <label>Education Level</label>
                                        <input name="data[0][InitIncome][income_range]" placeholder="eg. Rs.5000 - 7000" class="form-control" type="text">
                                    </div>                        
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="form-group input-group-lg">
                                        <label>Male</label>
                                        <input name="data[0][InitIncome][no_of_familiy]" class="form-control" type="text">
                                    </div>                        
                                </div>                                
                                <div class="col-md-12">                                   
                                    <div class="form-add-more">
                                        <button class="btn btn-success btn-sm" id="btn-add-field" style="margin-left: -5px;">
                                            <i class="fa fa-plus"></i> Add More...
                                        </button>
                                        <hr />
                                    </div>
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
            <h3>Current Family Income Ranges</h3>
             <?php if(empty($incomeRanges)): ?>
                <p class="text-muted">No Income Details Added Yet.</p>
            <?php else: ?>
                <div class="table-responsive panel-shadow">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th><h4>Income Range</h4></th>
                                <th><h4>No. of Families</h4></th>                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($incomeRanges as $range): ?>
                                <tr>
                                    <td><span class="text-center"><strong><?php echo $range['InitIncome']['income_range']; ?></strong></span></td>
                                    <td><span class="text-success text-center"><strong><?php echo $range['InitIncome']['no_of_familiy']; ?></strong></span></td>                                    
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
    <?php //echo var_dump($student); ?>
</div>

<script>
    
    var max_fields      = 5; //maximum input boxes allowed
    
    var x = 1; //initlal text box count
    $('#btn-add-field').click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed           
            $('.multiple-input-wrapper').append('<div class="multi-item-wrapper animated zoomIn">\
                                <input type="hidden" name="data['+ x +'][InitIncome][field_community_id]" value="<?php echo $student['FieldGroup']['field_community_id']; ?>" />\
                                <div class="col-md-8 col-sm-8 col-xs-8">\
                                    <div class="form-group input-group-lg">\
                                        <label>Education Level</label>\
                                        <input name="data['+ x +'][InitIncome][income_range]" class="form-control" placeholder="eg. Rs.5000 - 7000" type="text">\
                                    </div>                        \
                                </div>\
                                <div class="col-md-4 col-sm-4 col-xs-4">\
                                    <div class="form-group input-group-lg">\
                                        <label>Male</label>\
                                        <input name="data['+ x +'][InitIncome][no_of_familiy]" class="form-control" type="text">\
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