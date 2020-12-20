<?php $form = new \Core\Form\Form('',"POST"); ?>
    <?php echo $form->field($model,"firstname") ?>
    <?php echo $form->field($model,"lastname") ?>
    <?php echo $form->field($model,"email","email") ?>
    <?php echo $form->field($model,"password","password") ?>
    <button type="submit">register</button>
<?php $form->end(); ?>