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

class Persona {

private $name;
public $surname;
private $age;
public $email;

public function __construct($name,$surname,$age,$email){
 $this->name = $name;
 $this->surname = $surname;
 $this->age = $age;
 $this->email = $email;
}

public function getName(){
  return $this->name;
}
public function getAge(){
    return $this->anni;
}
}


$Marco = new Persona('Marco','Pietrini',30,'marcopietrini@hotmail.it');
// var_dump($Marco);
$Pietro = new Persona('Pietro','Donadio',22,'pietrodonadio@hotmail.it');
$Leonardo = new Persona('Leonardo','Apicella',31,'leonardoapicella@hotmail.it');

$persona=[$Marco,$Pietro,$Leonardo];
// print_r ($persona);

class Stanza {
public $tipologia;
private $persone;
public $metriquadri;

public function __construct($tipologia,$metriquadri,$persone){
 $this->metriquadri = $metriquadri;
 $this->persone = $persone;
 $this->tipologia = $tipologia;
}

public function addPersona(Persona $persona){
$this->persone[] = $persona;
}
}
$salotto= new Stanza('salotto',20,[$Marco,$Pietro,$Leonardo]);

$pippoBaudo= new Persona('Pippo','Baudo',87,'pippobaudo@hotmail.it');
$salotto->addPersona($pippoBaudo);

var_dump($salotto);
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
 	<head>
 		<meta charset="utf-8">
 		<title></title>
 	</head>
 	<body>
<?php foreach ($persona as $value){ ?>
<p><?php echo $value->getName() ?></p>
<p><?php echo $value->getAge() ?></p>
<?php } ?>
 	</body>
 </html>
