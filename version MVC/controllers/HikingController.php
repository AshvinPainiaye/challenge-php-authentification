<?php

//controller/HikingController.php
class HikingController{
  /**
   * the read action
   * @return string the view name
   */
   public function read(){
       $hikingModel = new Hiking();
       //Tableau des randonnées
       $hikings = $hikingModel->readAll();
       //"appelle" la view
       include 'views/read.php';
     }

  /**
   * the update action
   * @return string the view name
   */
  public function update($id){
    //À compléter
    $hikingModel = new Hiking();
    $valupdate = $hikingModel->read($id);

    if(isset($_POST['button'])){
    $name = $_POST['name'];
    $difficulty = $_POST['difficulty'];
    $distance = $_POST['distance'];
    $duration = $_POST['duration'];
    $height_difference = $_POST['height_difference'];
    $available = $_POST['available'];

    $hikingModel->update($id, $name, $difficulty, $distance, $duration, $height_difference, $available);

    }

    include 'views/update.php';
  }

  /**
   * the create action
   * @return string the view name
   */
  public function create(){
    //À compléter
    if(isset($_POST['button'])){
        $name = $_POST['name'];
        $difficulty = $_POST['difficulty'];
        $distance = $_POST['distance'];
        $duration = $_POST['duration'];
        $height_difference = $_POST['height_difference'];
        $available = $_POST['available'];

        $hikingModel = new Hiking();
        $hikingModel->create($name, $difficulty, $distance, $duration, $height_difference, $available);
    }
    include 'views/create.php';
  }

  /**
   * The delete action
   */
  public function delete($id){
   //À compléter
   $hikingModel = new Hiking();
  $hikings = $hikingModel->delete($id);
  header('Location: index.php?controller=Hiking&action=read');
  }
}





 ?>
