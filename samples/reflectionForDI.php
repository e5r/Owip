<?php require __DIR__ . '/../vendor/autoload.php';

echo "<pre>";

class A {
    public $memberPublic = "Member Public #A";
    private $memberPrivate = "Member Private #A";
    protected $memberProtected = "Member protected #A";
}

class B extends A {
    public function methodPublic($pub) : string {}
    private function methodPrivate ($pri, $pub){}
    protected function methodProtected ($pro){}
}

class C extends B {
    private function __construct(A $a, B $b){

    }

    function MyMehod(){}
}

$reflectorA = new ReflectionClass(A::class);
$reflectorB = new ReflectionClass(B::class);
$reflectorC = new ReflectionClass(C::class);

$ref = $reflectorC;

foreach($ref->getMethods() as $method){
    $params = $method->getParameters();
    echo "<hr><strong>Native representation:<br></strong>" . $method;

    $modifie = Reflection::getModifierNames($method->getModifiers())[0];

    echo "<br><strong>User representation: </strong>$modifie " . $ref->name . "::" . $method->name . "(";
    for($i = 0; $i < count($params); $i++){
        $p = $params[$i];
        $t = $p->getType();
        if(trim($t)) $t .= " ";
        if($i > 0) echo ", ";
        echo $t . "$" . $p->name;
    }
    echo ") { }";
}

echo "</pre>";