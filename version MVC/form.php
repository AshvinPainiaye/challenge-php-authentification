<?php

class Form{
  public function startForm($action='',$method=''){
    echo "<form action=\"$action\" method=\"$method\" class=\"text-left\">";
  }
public function input($class='', $name='', $type, $value=''){
echo "    <div class=\"form-group $class\">
      <label for=\"$name\" class=\"control-label\">$name</label>
<input type=\"$type\" name=\"$name\" class=\"form-control\" value=\"$value\">
</div>"
;

}
  public function difficulty($class='', $name, $valeur1, $valeur2, $valeur3, $valeur4, $valeur5){
    echo "
      <div class=\"form-group $class\">
    <label for=\"$name\" class=\"control-label\">$name</label>
    <select name=\"$name\" class=\"form-control\">
          <option value=\"$valeur1\">$valeur1</option>
          <option value=\"$valeur2\">$valeur2</option>
          <option value=\"$valeur3\">$valeur3</option>
          <option value=\"$valeur4\">$valeur4</option>
          <option value=\"$valeur5\">$valeur5</option>
    </select>
    </div>";
  }
public function select2($class='', $name, $valeur1, $valeur2){
  echo "
        <div class=\"form-group $class\">
  <label for=\"$name\" class=\"control-label\">$name</label>
  <select name=\"$name\" class=\"form-control\"><option value=\"$valeur1\">$valeur1</option><option value=\"$valeur2\">$valeur2</option></select>
  </div>";
}
  public function boutonEnvoie($class='', $valeur){
    echo "<div class=\"form-group $class\"> <button type=\"submit\" class=\"btn btn-primary\" name=\"button\">$valeur</button> </div>";
  }
  public function endForm(){
    echo "</form>";
  }
}

 ?>
