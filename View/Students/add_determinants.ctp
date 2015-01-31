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
        <h2>Add Determinants</h2>
        <h4 class="page-subheader">Add determinants you identified for each of the health issues.</h4>
    </div>
</div>
<!-- /. ROW  -->
<hr />
<div class="row">
    <div class="col-md-12">
        <h3>Prioritized Determinants</h3>
        <h4 class="page-subheader text-muted">
            Add the determinants you identified during your initial field visits for each of the health issues your group
            picked to intervene.
        </h4>
        <br />
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <?php echo $this->Session->flash(); ?>    
            </div>    
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="panel panel-default panel-shadow">
                <div class="panel-heading">
                    Add Determinants
                </div>
                <div class="panel-body" >
                    <?php if(empty($healthIssues)): ?>
                    <p class="text-muted"> No <strong>Health Issues</strong> are added. You need to add identified <strong>Health Issues</strong> before you add Determinants for them.</p>
                    <?php else: ?>
                        <?php echo $this->Form->create('Determinant', array(
                            'inputDefaults' => array(
                                'label' => false,
                            ),
                        ));
                        ?>
                        

                        <div class="multiple-input-wrapper">
                            <div class="multiple-item-box">
                                <div class="form-group input-group-lg">
                                    <select name="data[Determinants][0][Determinant][health_issue_id]" class="form-control">
                                        <option value="" selected="">Select Health Issue...</option> 
                                        <?php foreach ($healthIssues as $issue): ?>
                                            <option value="<?php echo $issue['HealthIssue']['id']; ?>"><?php echo $issue['HealthIssue']['issue_name']; ?></option>  
                                        <?php endforeach; ?>
                                    </select>                                
                                </div>
                                <div class="form-group input-group-lg">
                                    <input type="text" name="data[Determinants][0][Determinant][title]" class="form-control" placeholder="Determinant" >                                    
                                </div>
                                <div class="form-group">
                                    <textarea name="data[Determinants][0][Determinant][description]" class="form-control" placeholder="Description..." rows="4" cols="30" ></textarea>
                                </div> 
                                <div class="form-add-more">
                                    <button class="btn btn-success btn-sm" id="btn-add-field">
                                        <i class="fa fa-plus"></i> Add More...
                                    </button>
                                    <!--<hr/>-->
                                </div>
                            </div>   
                        </div>
                        <hr />                    
                        <?php 
                            $form_end_options = array(
                                'label' => 'Add Determinant', 
                                'class' => 'btn btn-lg btn-primary ',                                
                            );
                            echo $this->Form->end($form_end_options);
                        ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12">
            <h3>Current Determinants</h3>
            <?php if(empty($determinants)): ?>
                <p class="text-muted">No Determinants Added Yet.</p>
            <?php else: ?>  
                <div class="panel-group" id="accordion">
                <?php $i = 1; ?>
                <?php foreach($healthIssues as $healthIssue): ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>" class=""><strong class="text-primary"><?php echo $healthIssue['HealthIssue']['issue_name']; ?></strong></a>
                            </h4>
                        </div>
                        <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse <?php echo $i == 1 ? 'in' : ''; ?>" style="height: auto;">
                            <div class="panel-body">
                                <?php foreach($determinants as $determinant): ?>
                                    <?php if($determinant['Determinant']['health_issue_id'] == $healthIssue['HealthIssue']['id']): ?>
                                        <div class="activity-noti panel-shadow">
                                            <h3 class="title green"><strong class="text-danger"><?php echo $determinant['Determinant']['title']; ?></strong></h3>
                                            <p class="activity-noti-desc text-muted" style="overflow: auto; height: auto;"><?php echo  $determinant['Determinant']['description']; ?></p>                                                                    
                                        </div>
                                    <?php endif; ?>                                
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <?php $i++; ?>
                <?php endforeach; ?>
                </div>
            <?php endif; ?>             
            
        </div>
        
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php //echo var_dump($specificObjectives); ?>
    </div>
</div>

<script>
    
    var max_fields      = 5; //maximum input boxes allowed
    
    var x = 1; //initlal text box count
    $('#btn-add-field').click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed           
            $('.multiple-input-wrapper').append('<div class="multiple-item-box animated zoomIn"><hr /><div class="form-group input-group-lg"><select name="data[Determinants]['+ x +'][Determinant][health_issue_id]" class="form-control"><option value="" selected="">Select Health Issue...</option><?php foreach ($healthIssues as $issue): ?><option value="<?php echo $issue['HealthIssue']['id']; ?>"><?php echo $issue['HealthIssue']['issue_name']; ?></option><?php endforeach; ?></select></div><div class="form-group input-group-lg"><input type="text" name="data[Determinants]['+ x +'][Determinant][title]" class="form-control" placeholder="Determinant" ></div><div class="form-group"><textarea name="data[Determinants]['+ x +'][Determinant][description]" class="form-control" placeholder="Description..." rows="4" cols="30" ></textarea></div><button href="" class="btn btn-danger btn-xs btn-remove-field"><i class="fa fa-minus"></i> &nbsp; Remove</button></div>'); //add input box
            x++; //text box increment
        }
    });
    
    $('.multiple-input-wrapper').on("click",".btn-remove-field", function(e){ //user click on remove text
        e.preventDefault(); 
        $(this).parent('div').remove();
        x--;
        
    });
   
</script>

