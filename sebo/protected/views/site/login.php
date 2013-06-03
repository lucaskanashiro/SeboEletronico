<?php

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/Login.css" type="text/css" media="all">

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	
        <form  name="Insere Dados" action="<?php echo Yii::app()->request->baseUrl; ?>/index.php/usuario/cadastrar" method="post" class="formu">
        
                <table class='insr'>

                <tr>
                    <th class='titlein' > <h1>Login</h1></th>
                </tr>
                
                <tr>
                    <th > <p class="note">Campos com <span class="required">*</span> são obrigatórios.</p></th>
                </tr>

                
                <tr> 
                    <td>
                        
                        <div class="row">
                            <h2><?php echo $form->labelEx($model,'username'); ?></h2>
                            <?php echo $form->textField($model,'username'); ?>
                            <?php echo $form->error($model,'username'); ?>
                        </div> 
                    </td>
                </tr>
        

                <tr>              
                    <td>
                        <div class="row">
                            <h2><?php echo $form->labelEx($model,'password'); ?></h2>
                            <?php echo $form->passwordField($model,'password'); ?>
                            <?php echo $form->error($model,'password'); ?>

                        </div><p>
                    </td>    
                </tr>

                <tr>              
                    <td>
                        <div class="row rememberMe">
                            <?php echo $form->checkBox($model,'rememberMe'); ?>
                            <?php echo $form->label($model,'rememberMe'); ?>
                            <?php echo $form->error($model,'rememberMe'); ?>
                        </div>
                    </td>    
                </tr>

                <tr>              
                    <td>
                        <div class="row buttons">
                            <?php echo CHtml::submitButton('Login'); ?>
                        </div>
                        </div><p>
                    </td>    
                </tr>
                
                </table>    
        
    </form>
            
        
<?php $this->endWidget(); ?>
</div>
