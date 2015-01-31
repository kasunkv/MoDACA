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
        <h2>Add Health Issues</h2>
        <h4 class="page-subheader">Add Health Issues you identified in the field community.</h4>
    </div>
</div>
<!-- /. ROW  -->
<hr />
<div class="row">
    <div class="col-md-12">
        <h3>Identify Health Issues</h3>
        <h4 class="page-subheader text-muted">
            Add the health issues you identified in your field community area that you want to address in your duration
            in the field. For these health issues you can add determinants and indicators to further refine and breakdown your effort.
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
                    Add Health Issues
                </div>
                <div class="panel-body">
                    <?php echo $this->Form->create('HealthIssue', array(
                        'inputDefaults' => array(
                            'label' => false,
                        ),
                    ));
                    ?>
                                        
                    <div class="multiple-input-wrapper">
                        <div class="multiple-item-box">
                            <div class="form-group input-group-lg">
                                <input name="data[HealthIssues][0][HealthIssue][issue_name]" class="form-control" placeholder="Health Issue" type="text" id="HealthIssueIssueName1">                                
                            </div>
                            <div class="form-group">
                                <textarea name="data[HealthIssues][0][HealthIssue][description]" class="form-control" placeholder="Description goes here..." rows="3" cols="30" id="HealthIssueDescription1"></textarea>
                            </div> 
                        </div>
                        <div class="form-add-more">
                            <button class="btn btn-success btn-sm" id="btn-add-field" style="margin-left: 12px; margin-top: -20px;">
                                <i class="fa fa-plus"></i> Add More...
                            </button>
                        </div>
                    </div>
                    <hr />
                    
                    <?php 
                        $form_end_options = array(
                            'label' => 'Add Health Issues', 
                            'class' => 'btn btn-lg btn-primary ',                                
                        );
                        echo $this->Form->end($form_end_options);
                    ?>
                    
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12">
            <h3>Existing Health Issues</h3>
            <?php if(empty($currentIssues)): ?>
                <p class="text-muted">No Health Issues Added Yet.</p>
            <?php else: ?>  
                <?php foreach($currentIssues as $issue): ?>
                    <div class="activity-noti panel-shadow">
                        <div class="activity-noti-header">  
                            <h3 class="title blue"><?php echo $issue['HealthIssue']['issue_name']; ?></h3>
                        </div>
                        <p class="activity-noti-desc text-muted"><?php echo $issue['HealthIssue']['description']; ?></p>                        
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            
            
                
        </div>
    
        
    </div>
    
</div>
<div class="row">
    <div class="col-md-12">
        <?php //echo var_dump($student); ?>
    </div>
</div>

<script>    

    var max_fields      = 5; //maximum input boxes allowed
    
    var x = 1; //initlal text box count
    $('#btn-add-field').click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed           
            $('.multiple-input-wrapper').append('<div class="multiple-item-box animated zoomIn"><hr /><div class="form-group input-group-lg required"><input name="data[HealthIssues]['+ x +'][HealthIssue][issue_name]" class="form-control" placeholder="Health Issue" required="required" type="text" id="HealthIssueIssueName'+ x +'"></div><div class="form-group required"><textarea name="data[HealthIssues]['+ x +'][HealthIssue][description]" class="form-control" placeholder="Description goes here..." rows="3" required="required" cols="30" id="HealthIssueDescription'+ x +'"></textarea></div><button href="" class="btn btn-danger btn-xs btn-remove-field"><i class="fa fa-minus"></i> &nbsp; Remove</button></div>'); //add input box
            x++; //text box increment
        }
    });
    
    $('.multiple-input-wrapper').on("click",".btn-remove-field", function(e){ //user click on remove text
        e.preventDefault(); 
        $(this).parent('div').remove();
        x--;
        
    });

</script>
    
<!-- /. ROW  -->
