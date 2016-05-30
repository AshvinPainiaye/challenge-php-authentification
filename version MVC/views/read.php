<!--<h1>Read</h1>-->


<div class="container">
  <div class="well">
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center" style="margin-bottom:50px;">Liste des randonnées</h1>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="bs-component text-center">

          <table class="table table-striped table-hover text-left table-responsive">
            <thead>
              <tr>
                <th>Nom</th>
                <th>Distance</th>
                <th>Difficulté</th>
                <th>Durée</th>
                <th>Dénivelé</th>
                <th>Available</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($hikings as $hiking){
                echo '<tr>';
                echo '<td>'.'<a href="index.php?controller=Hiking&amp;action=update&id='.$hiking['id'].'">'.$hiking['name'].'</a></td>';
                echo '<td>'.$hiking['distance'].'</td>';
                echo '<td>'.$hiking['difficulty'].'</td>';
                echo '<td>'.$hiking['duration'].'</td>';
                echo '<td>'.$hiking['height_difference'].'</td>';
                echo '<td>'.$hiking['available'].'</td>';
                echo '<td><a href="index.php?controller=Hiking&amp;action=delete&id='.$hiking['id'].'">Supprimer</a></td>';
                echo '</tr>';

              }
              ?>

            </tbody>
          </table>
          <a href="index.php?controller=Hiking&amp;action=create" class="btn btn-primary">Ajouter une randonnée</a>
        </div>
      </div>
    </div>
  </div>
</div>
