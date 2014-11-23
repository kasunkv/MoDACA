<?php $this->layout = 'defaultMapLayout'; ?>
<div class="row">
    <div class="col-md-12">
        <h2>Administrator | Track Students</h2>
        <h4 class="page-subheader">Track the current location of the students</h4>
    </div>
</div>
<!-- /. ROW  -->
<hr />
<div class="row">
    <div class="col-md-1">

    </div>
    <div class="col-md-10">
        <h3>Track Students</h3>

            <div class="panel panel-default">
                <div class="panel-heading">
                    Track
                </div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <form role="form">  
                            <div class="form-group input-group-lg">
                                <label>Mode</label>
                                <select class="form-control" required>
                                    <option>Individual</option>
                                    <option>All</option>
                                </select>
                            </div>
                            <div class="form-group input-group-lg">
                                <input class="form-control" placeholder="Student Index" required>
                            </div>

                        </form>                             
                    </div>
                    <div class="col-md-6">
                        <br /><br /><br /><br />
                        <button type="submit" class="btn btn-lg btn-success btn-custom">Find</button>
                    </div>
                </div>
            </div>  
            <div class="panel panel-default">
                <div class="panel-heading">
                    Map
                </div>
                <div class="panel-body">
                    <div>
                        <div id="map_canvas"></div>
                    </div>
                </div>
            </div>             
    </div>
    <div class="col-md-2">

    </div>
</div>
<!-- /. ROW  -->