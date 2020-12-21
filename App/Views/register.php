<?php $form = new \Core\Form\Form('',"POST"); ?>
    <?php echo $form->field($model,"username") ?>
    <?php echo $form->field($model,"firstname") ?>
    <?php echo $form->field($model,"lastname") ?>
    <?php echo $form->field($model,"email")->setEmailField() ?>
    <?php echo $form->field($model,"password")->setPasswordField() ?>
    <button type="submit">register</button>
<?php $form->end(); ?>