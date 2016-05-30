<?php
  include './form.php';
        $form = new Form;
 ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">
            <div class="well">
              <h1 style="margin-bottom:50px;">Ajouter</h1>
              <a href="index.php?controller=Hiking&amp;action=read" class="btn btn-primary">Voir liste des randonnée</a>

                <?php  $form->startForm('','post'); ?>
                        <?php  $form->input('label-floating','name','text'); ?>

                        <?php  $form->difficulty('','difficulty','très facile','facile','moyen','difficile','très difficile'); ?>

                        <?php  $form->input('label-floating','distance','text'); ?>

                        <?php  $form->input('label-floating','duration','time'); ?>

                        <?php  $form->input('label-floating','height_difference','text'); ?>

                        <?php  $form->select2('','available','Ouvert','Fermer'); ?>

                        <?php  $form->boutonEnvoie('text-center','Envoyer'); ?>
                <?php  $form->endForm() ?>
            </div>
        </div>
    </div>
</div>
