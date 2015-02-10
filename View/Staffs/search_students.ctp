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
        <h2>Search Students</h2>
        <h4 class="page-subheader">Quick Search to find students and view their progress.</h4>
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
<!--        <h4><Strong>Search Results</Strong></h4>
        <br />-->
        <div class="" id="search-result">
            <p class="text-muted" style="margin-left: 10px; margin-top: 0px;">No Searches Yet.</p>
            
        </div>
    </div> 
</div>


<script>
    
    
   

    $("#StudentName").bind("keyup", function (event) {
        $.ajax({
            async:true,
            data:$("form").serialize(),
            dataType:"html",
            success:function (data, textStatus) {
                $("#search-result").html(data);
            },
            type:"post",
            url:"/MoDACA/Staffs/searchStudentsByType"}
        );
        return false;
    });

</script>

