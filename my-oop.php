<!-- Diventiamo grandi. Programmazione ad oggetti.
repo/cartella: php-oop-1
Creare una o più classi a vostro piacimento, che rappresentino degli oggetti comuni.
Dichiarate le sue proprietà e quindi il costruttore per istruire la classe su come, appunto, creare l'oggetto.
Instanziare almeno 3 oggetti per ciascuna classe.
Bonus: Provare a far interagire due oggetti. Per esempio, come abbiamo visto in classe, dove nella Biblioteca aggiungevamo il libro (oggetto Book).
Quindi nel bonus, il consiglio è quello di creare una classe che "contenga" un'altra. Es: Il Frigorifero con il Cibo, Il Concessionario con l'Automobile, Il Giradischi con il Vinile... etc..
Buon lavoro!
E buon divertimento!
A domani branco!
:)))) -->

<?php
$current_year = date('Y');

class Persona {

public $name;
public $surname;
private $age;
public $email;
// public $maggiorenne;
public function __construct($name,$surname,$age,$email){
 $this->name = $name;
 $this->surname = $surname;
 $this->age = $age;
 $this->email = $email;
}

// public function getName(){
//   return $this->name;
// }
public function getAge(){
    return $this->age;
}
public function isMaggiorenne(){
  return $this->age >= 18;
}
// public function setMaggiorenne($current_year){
//   if($current_year - $this->getAge() > 2003){
//     $this->maggiorenne = false;
//   } else{
//     $this->maggiorenne = true;
//   }
// }
}


$Marco = new Persona('Marco','Pietrini',17,'marcopietrini@hotmail.it');
// $Marco->setMaggiorenne($current_year);
// var_dump($Marco->maggiorenne);
// var_dump($Marco->isMaggiorenne());

// var_dump($Marco);
// $Pietro = new Persona('Pietro','Donadio',22,'pietrodonadio@hotmail.it');
// $Leonardo = new Persona('Leonardo','Apicella',31,'leonardoapicella@hotmail.it');
//
// $persona=[$Marco,$Pietro,$Leonardo];
// print_r ($persona);

$ragazzi=[["name"=>"Marco","surname"=>"Pietrini","age"=>31,"email"=>"marcopietrini@outlook.it"],["name"=>"Pietro","surname"=>"Donadio","age"=>34,"email"=>"pietrodonadio@outlook.it"],["name"=>"Leonardo","surname"=>"Apicella","age"=>20,"email"=>"leonardoapicella@outlook.it"]];

// $oggettiragazzi=[];
// foreach ($ragazzi as $key => $value) {
//   $oggettiragazzi[] = new Persona($value["name"],$value["surname"],$value["age"],$value["email"]);
// }
//
// print_r($oggettiragazzi);

// function myfunction($persona)
// {return new Persona($persona["name"],$persona["surname"],$persona["age"],$persona["email"]);
// }
// $oggettiragazzi= array_map("myfunction",$ragazzi);

$oggettiragazzi= array_map(function($persona) {return new Persona($persona["name"],$persona["surname"],$persona["age"],$persona["email"]);}, $ragazzi);

class Stanza {
public $tipologia;
private $persone =[];
public $metriquadri;

public function __construct($tipologia,$metriquadri,$persone){
 $this->metriquadri = $metriquadri;
 $this->persone = $persone;
 $this->tipologia = $tipologia;
}

public function addPersona($persona){
try{
  if(get_class($persona) == Persona){
  if($persona->isMaggiorenne()){
    $this->persone[] = $persona;
  }}
else{
$error = 'Possono entrare solo persone(e maggiorenni).'.$persona.' non lo è';
throw new Exception($error);}}
  catch (Exception $e) {
        echo 'Errore: ',  $e->getMessage(), "\n";
}
}


public function showPersone(){
  return $this->persone;
}
}
$salotto= new Stanza('salotto',20,$oggettiragazzi);

$pippoBaudo= new Persona('Pippo','Baudo',18,'pippobaudo@hotmail.it');
$salotto->addPersona($pippoBaudo);
// $salotto->addPersona('Alfredo');
$salotto->addPersona('Leone','Ferragni',5,'leone@hotmail.it')
// var_dump($salotto);
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
 	<head>
 		<meta charset="utf-8">
 		<title></title>
 	</head>
 	<body>
    <h1>All'inizio nel salotto c'erano:</h1>
<?php foreach ($oggettiragazzi as $value){ ?>
<p><?php echo $value->name ?></p>
<?php } ?>
<h1>Ora nel salotto ci sono:</h1>
<p><?php foreach($salotto->showPersone() as $persona) {?></p>
  <p><?php echo $persona->name ?></p>
<?php } ?>
 	</body>
 </html>
