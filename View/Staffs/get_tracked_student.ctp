<?php if(empty($result)): ?>
    <p class="text-muted" style="margin-left: 10px; margin-top: -20px;">No Matching Results</p>
<?php else: ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th><h4>Student Name</h4></th>
                    <th><h4>Index No.</h4></th>
                    <th><h4>Actions</h4></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($result as $res): ?>
                    <tr>
                        <td><strong><?php echo $res['Student']['first_name'] . ' ' . $res['Student']['last_name'];  ?></strong></td>
                        <td><?php echo $res['Student']['index_no'];  ?></td>
                        <td>
                            <button class="locate btn btn-xs btn-info">
                                <i class="fa fa-map-marker"></i> &nbsp;&nbsp;Locate
                                <input type="hidden" class="std-id" value="<?php echo $res['Student']['id']; ?>" />
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>

