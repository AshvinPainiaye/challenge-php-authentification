<?php


//model/Hiking.php
class Hiking{
  /**
  * Référence à la base de données
  */
  protected $bdd;

  /**
  * Constructeur
  */
  public function __construct(){
    //Connexion à la base de données
    try {
      $this->bdd = new PDO('mysql:host=localhost;dbname=reunion_island;charset=utf8', 'root', 'scaleop974');
    }catch(Exception $e){
      echo $e->getMessage();
    }
  }

  /**
   * retourner toutes les randonnées
   * @return Array Tableau des données
   */
   public function readAll(){
       return $this->bdd->query('SELECT  * FROM hiking')->fetchAll();
    }

public function read($id){
  $req = $this->bdd->query('SELECT  * FROM hiking WHERE id ='.$id)->fetchAll();
  return $req[0];
}
  /**
   * Créer une randonnée
   * @param  string $name              nom de la randonnée
   * @param  string $difficulty        difficulté de la randonnée
   * @param  int $distance             distance à parcourir
   * @param  string $duration          durée de la randonné
   * @param  int $height_difference    dénivelé
   * @return bool
   */
  public function create($name, $difficulty, $distance, $duration, $height_difference, $available){
    //À compléter
 $req = $this->bdd->prepare('INSERT INTO hiking(name, difficulty, distance, duration, height_difference, available) VALUES(:name, :difficulty, :distance, :duration, :height_difference, :available)');

  $state = $req->execute(array(
 	   'name' => $name,
 	   'difficulty' => $difficulty,
 	   'distance' => $distance,
 	   'duration' => $duration,
 	   'height_difference' => $height_difference,
     'available' => $available
 	));

  if($state == true){

  echo '<p class="text-center">La randonnée a été ajoutée avec succès.</p>';
  }else{
      echo '<p class="text-center">Une erreur s\'est produit lors de l\'envoie.</p>';
  }

  }

  /**
   * Mettre à jour une randonnée
   * @param  string $name              nom de la randonnée
   * @param  string $difficulty        difficulté de la randonnée
   * @param  int $distance             distance à parcourir
   * @param  string $duration          durée de la randonné
   * @param  int $height_difference    dénivelé
   * @return bool
   */
  public function update($id, $name, $difficulty, $distance, $duration, $height_difference, $available){
    //À compléter

    $req = $this->bdd->prepare('UPDATE hiking SET name = :name, difficulty = :difficulty, distance = :distance, duration = :duration, height_difference = :height_difference, available = :available WHERE id ='.$id);

    $state = $req->execute(array(
      'name' => $name,
      'difficulty' => $difficulty,
      'distance' => $distance,
      'duration' => $duration,
      'height_difference' => $height_difference,
      'available' => $available,
   ));
$req->closeCursor();

   if($state == true){

     echo '<p class="text-center">La randonnée a été modifié avec succès.</p>';
     }else{
         echo '<p class="text-center">Une erreur s\'est produit lors de l\'envoie.</p>';
     }
   }




  /**
   * Supprimer une randonnée
   * @param  int $id identifiant de la randonnée
   * @return bool
   */
  public function delete($id){
    //À compléter

    $id = $_GET['id'];

   $req = $this->bdd->prepare('DELETE FROM hiking  WHERE id = ? ');

   $req->execute(array(
 $id
   ));

  }
}




 ?>
