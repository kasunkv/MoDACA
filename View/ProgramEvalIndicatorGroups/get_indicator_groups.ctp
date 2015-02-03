<?php if(!empty($indicatorGroups)): ?>
    <?php foreach ($indicatorGroups as $indicatorGroup): ?>
        <a class="container-link" href="<?php echo $this->Html->url(array('controller' => 'students', 'action' => 'evaluateCategory', $indicatorGroup['ProgramEvalIndicatorGroup']['health_issue_id'], $indicatorGroup['ProgramEvalIndicatorGroup']['id'], $checkpointId)) ?>">
            <h3 class="text-promary" style="margin-bottom: -5px;"><?php echo $indicatorGroup['ProgramEvalIndicatorGroup']['category']; ?></h3>            
        </a>
    <?php endforeach; ?>
<?php else: ?>
    <p class="text-muted">No Evaluation Categories Added Yet.</p>
<?php endif; ?>