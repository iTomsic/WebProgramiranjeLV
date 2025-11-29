<?php
$adresa = array("Naziv Ulice 71, Osijek, 31000", 
"Moja Ulica 12, Vukovar, 32000", 
"Kreativno Ime 85, Zagreb, 10000", 
"Neka Tamo 552, Daruvar, 34500");

foreach ($adresa as $x) {
  echo "$x <br>";
}

echo "<br>";

$studenti = array(
    14458754 => array("JMBAG" => 1445875, "ime" => "Marko", "prezime" => "Marković", "god_rod" => 2000, "god_upisa" => 2025, "godina_ak" => 3),
    25422547 => array("JMBAG" => 25422547, "ime" => "Ana", "prezime" => "Anić", "god_rod" => 2002, "god_upisa" => 2025, "godina_ak" => 1),
    11111111 => array("JMBAG" => 11111111, "ime" => "Patrik", "prezime" => "Tomšić", "god_rod" => 2003, "god_upisa" => 2021, "godina_ak" => 3)
);

foreach ($studenti as $student) {
    echo "<ul>";
    foreach($student as $key => $value){
        echo "<li> $key : $value </li>";
    }
    echo "</ul>";   
}
echo "<br>";

echo  "Moja godina upisa je: ".$studenti[11111111]["god_upisa"];
echo "<br>";
echo "<br>";

function mnozenje($a, $b){
    return $a * $b;
}

echo 'Umnozak je: '.mnozenje(4,5);
echo "<br>";
echo "<br>";

 class Auto{

    public $proizvodjac;
    public $model;
    public $godina_proizvodnje;

    public function __construct($proizvodjac, $model, $godina_proizvodnje) {
    $this->proizvodjac = $proizvodjac;
    $this->model = $model;
    $this->godina_proizvodnje = $godina_proizvodnje;
    }

    public function set_god_proizvodnje($godina_proizvodnje) {
    $this->godina_proizvodnje = $godina_proizvodnje;
    }


    function moj_prvi_auto_je() {
        echo "Moj prvi auto je bio $this->proizvodjac $this->model iz $this->godina_proizvodnje. godine";
    }

}

$auto1 = new Auto("Ford", "Fiesta", 1999);
$auto1->set_god_proizvodnje(2009);

echo $auto1->moj_prvi_auto_je();

?>