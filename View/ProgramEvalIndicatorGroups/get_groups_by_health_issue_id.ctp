<?php foreach ($groups as $group): ?>
    <option value="<?php echo $group['ProgramEvalIndicatorGroup']['id']; ?>"><?php echo $group['ProgramEvalIndicatorGroup']['category']; ?></option>  
<?php endforeach; ?>