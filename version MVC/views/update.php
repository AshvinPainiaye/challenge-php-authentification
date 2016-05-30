<?php
include './form.php';
$form = new Form;
 ?>
<!--/objet-->

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">
            <div class="well">
                <h1 style="margin-bottom:50px;">Modifié une randonnée</h1>
                <a href="index.php?controller=Hiking&amp;action=read" class="btn btn-primary">Voir liste des randonnée</a>

                            <?php
                            $name = NULL;
                            $distance = NULL;
                            $duration = NULL;
                            $height_difference = NULL;
                            $available = NULL;

                              $form->startForm('','post');

                                  $form->input('label-static','name','text', $valupdate['name']); ?>

                                <div class="form-group">
                                    <label for="difficulty" class="control-label">Difficulté</label>
                                    <select name="difficulty" class="form-control">
                                        <?php
                                        if($difficulty == 'très facile'){
                                            echo '<option value="très facile" selected="selected">Très facile</option>';
                                        }
                                        else{
                                            echo '<option value="très facile">Très facile</option>';
                                        }

                                        if($difficulty == 'facile'){
                                            echo '<option value="facile" selected="selected">facile</option>';
                                        }
                                        else{
                                            echo '<option value="facile">facile</option>';
                                        }

                                        if($difficulty == 'moyen'){
                                            echo '<option value="moyen" selected="selected">moyen</option>';
                                        }
                                        else{
                                            echo '<option value="moyen">moyen</option>';
                                        }

                                        if($difficulty == 'difficile'){
                                            echo '<option value="difficile" selected="selected">difficile</option>';
                                        }
                                        else{
                                            echo '<option value="difficile">difficile</option>';
                                        }

                                        if($difficulty == 'très difficile'){
                                            echo '<option value="très difficile" selected="selected">très difficile</option>';
                                        }
                                        else{
                                            echo '<option value="très difficile">très difficile</option>';
                                        }
                                    ?>
                                    </select>
                                </div>


                                    <?php  $form->input('label-static','distance','text', $valupdate['distance']); ?>

                                    <?php  $form->input('label-static','duration','text', $valupdate['duration']); ?>

                                    <?php  $form->input('label-static','height_difference','text', $valupdate['height_difference']); ?>

                                <div class="form-group">
                                    <label for="available" class="control-label">Available</label>
                                    <select name="available" class="form-control">
                                        <?php
                                        if($available == 'Ouvert'){
                                            echo '<option value="Ouvert" selected="selected">Ouvert</option>';
                                        }
                                        else{
                                            echo '<option value="Ouvert">Ouvert</option>';
                                        }
                                        if($available == 'Fermer'){
                                            echo '<option value="Fermer" selected="selected">Fermer</option>';
                                        }
                                        else{
                                            echo '<option value="Fermer">Fermer</option>';
                                        }
                                    ?>
                                    </select>
                                </div>

                                        <?php  $form->boutonEnvoie('text-center','Envoyer'); ?>

                            <?php  $form->endForm() ?>
                        </div>
                    </div>
                </div>
            </div>
