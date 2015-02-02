<?php if(!empty($checkPoints)): ?>
    <?php foreach ($checkPoints as $checkPoint): ?>
        <a class="container-link" href="<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'evaluateCheckpoint', $checkPoint['ProgramEvalCheckpoint']['id'], $checkPoint['ProgramEvalCheckpoint']['health_issue_id'])) ?>">
            <h3 class="text-success" style="margin-bottom: -5px;"><?php echo $checkPoint['ProgramEvalCheckpoint']['checkpoint']; ?></h3>
            <h5><strong style="color: black;"><?php echo $checkPoint['ProgramEvalCheckpoint']['date']; ?></strong></h5>
        </a>
    <?php endforeach; ?>
<?php else: ?>
    <p class="text-muted">No Checkpoints Added Yet.</p>
<?php endif; ?>


