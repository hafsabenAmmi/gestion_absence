<?php 
## La méthode __construct() est un constructeur de classe. Elle est automatiquement appelée lorsque 
##vous créez une nouvelle instance d'une classe.
## Usage : Initialiser les propriétés d'un objet ou exécuter tout code de configuration nécessaire lorsque l'objet est instancié.
## Signature : public function __construct([mixed $args [, $... ]])

class Voiture {
    public $marque;
    public $model;

    // Constructeur
    public function __construct($marque, $model) {
        $this->marque = $marque;
        $this->model = $model;
    }

    public function afficherInfos() {
        echo "Voiture : $this->marque $this->model";
    }
}

$voiture = new Voiture("Toyota", "Corolla");
$voiture->afficherInfos(); // Affiche: Voiture : Toyota Corolla



### La méthode __destruct() est un destructeur de classe. Elle est automatiquement appelée lorsqu'un objet est détruit ou que le script se termine.

## Usage : Nettoyer les ressources, comme fermer des connexions de base de données ou des fichiers ouverts.
## Signature : public function __destruct()

class Fichier {
private $handle;

    // Constructeur
    public function __construct($filename) {
        $this->handle = fopen($filename, 'w');
    }

    public function ecrire($texte) {
        fwrite($this->handle, $texte);
    }

    // Destructeur
    public function __destruct() {
        fclose($this->handle);
    }
}

$fichier = new Fichier('example.txt');
$fichier->ecrire("Bonjour, monde!");
// Le fichier sera automatiquement fermé à la fin du script ou lorsque l'objet $fichier sera détruit.
## ----------------------------------
# La méthode __call() est appelée lorsque vous essayez d'appeler une méthode d'un objet qui n'existe pas
# ou n'est pas accessible. Cette fonctionnalité permet de gérer dynamiquement les appels de méthodes.

#  Usage : Gérer dynamiquement les appels de méthodes qui n'existent pas ou ne sont pas accessibles.
## Signature : public function __call(string $name, array $arguments)

class MaClasse {
    // Propriétés pour stocker les méthodes dynamiques
    private $methods = [];

    // Ajout d'une méthode dynamique
    public function ajouterMethode($name, $callback) {
        $this->methods[$name] = $callback;
    }

    // Appel d'une méthode dynamique
    public function __call($name, $arguments) {
        if (isset($this->methods[$name])) {
            return call_user_func_array($this->methods[$name], $arguments);
        } else {
            throw new Exception("La méthode $name n'existe pas.");
        }
    }
}

$obj = new MaClasse();

// Ajouter une méthode dynamique 'saluer'
$obj->ajouterMethode('saluer', function($nom) {
    return "Bonjour, $nom!";
});

// Appeler la méthode dynamique 'saluer'
echo $obj->saluer("Alice"); // Affiche: Bonjour, Alice!

###----------------------------------------

##   __callStatic()
##  La méthode magique __callStatic() est similaire à __call(), mais elle est utilisée pour
##  intercepter les appels de méthodes statiques qui n'existent pas

class Magique {
    private static $methods = [];

    // Ajouter une méthode statique dynamique
    public static function ajouterMethode($name, $callback) {
        self::$methods[$name] = $callback;
    }

    // Méthode magique __callStatic
    public static function __callStatic($name, $arguments) {
        if (isset(self::$methods[$name])) {
            return call_user_func_array(self::$methods[$name], $arguments);
        } else {
            throw new Exception("La méthode statique $name n'existe pas.");
        }
    }
}

// Ajouter une méthode statique dynamique 'saluer'
Magique::ajouterMethode('saluer', function($nom) {
    return "Bonjour, $nom!";
});

// Appeler la méthode statique dynamique 'saluer'
echo Magique::saluer("Alice"); // Affiche: Bonjour, Alice!

##-------------------------------------------

#La méthode magique __get() est appelée lorsqu'une propriété inaccessible ou inexistante est lue.
## يتم استدعاء الأسلوب السحري __get() عند قراءة خاصية غير موجودة أو لا يمكن الوصول إليها.

class Magique {
    private $data = [];

    // Méthode magique __get
    public function __get($name) {
        return $this->data[$name] ?? null;
    }

    // Méthode magique __set
    public function __set($name, $value) {
        $this->data[$name] = $value;
    }
}

$obj = new Magique();
$obj->inconnu = "test"; // Utilise __set()
echo $obj->inconnu; // Utilise __get() et affiche: test

##-------------------------------------------------------------------

#La méthode magique __set() est appelée lorsqu'une valeur est assignée à une propriété inaccessible ou inexistante.
#
# يتم استدعاء الطريقة السحرية __set() عندما يتم تعيين قيمة لخاصية لا يمكن الوصول إليها أو غير موجودة.

class Magique {
    private $data = [];

    // Méthode magique __set
    public function __set($name, $value) {
        $this->data[$name] = $value;
    }

    // Méthode magique __get
    public function __get($name) {
        return $this->data[$name] ?? null;
    }
}

$obj = new Magique();
$obj->inconnu = "test"; // Utilise __set()
echo $obj->inconnu; // Utilise __get() et affiche: test


##---------------------------------------------------------------------
##  La méthode magique __isset() est appelée lorsque isset() ou empty() est utilisé sur une propriété inaccessible ou inexistante
##   يتم استدعاء الأسلوب السحري __isset() عند استخدام isset() أوempty() على خاصية لا يمكن الوصول إليها أو غير موجودة


class Magique {
    private $data = [];

    // Méthode magique __set
    public function __set($name, $value) {
        $this->data[$name] = $value;
    }

    // Méthode magique __get
    public function __get($name) {
        return $this->data[$name] ?? null;
    }

    // Méthode magique __isset
    public function __isset($name) {
        return isset($this->data[$name]);
    }
}

$obj = new Magique();
$obj->inconnu = "test"; // Utilise __set()
var_dump(isset($obj->inconnu)); // Utilise __isset() et affiche: bool(true)

##-------------------------------------------------------------------------
## __unset()  La méthode magique __unset() est appelée lorsque unset() est utilisé sur une propriété inaccessible 
#ou inexistante
## __unset() يتم استدعاء الطريقة السحرية __unset() عند استخدام unset() على خاصية لا يمكن الوصول إليها أو غير موجودة
##  

class Magique {
    private $data = [];

    // Méthode magique __set
    public function __set($name, $value) {
        $this->data[$name] = $value;
    }

    // Méthode magique __get
    public function __get($name) {
        return $this->data[$name] ?? null;
    }

    // Méthode magique __unset
    public function __unset($name) {
        unset($this->data[$name]);
    }
}

$obj = new Magique();
$obj->inconnu = "test"; // Utilise __set()
unset($obj->inconnu); // Utilise __unset()
var_dump(isset($obj->inconnu)); // Utilise __isset() et affiche: bool(false)

###--------------------------------------------------------------
## La méthode magique __toString() est appelée lorsqu'un objet est converti en chaîne, par exemple par echo ou print
## ## يتم استدعاء الطريقة السحرية __toString() عندما يتم تحويل كائن إلى سلسلة، على سبيل المثال عن طريق الصدى أو الطباعة
class Magique {
    private $data = "Contenu de l'objet";

    // Méthode magique __toString
    public function __toString() {
        return $this->data;
    }
}

$obj = new Magique();
echo $obj; // Utilise __toString() et affiche: Contenu de l'objet

##-------------------------------------------------------------------------
#__clone()  stinsakh
#La méthode magique __clone() est appelée lorsque l'objet est cloné avec le mot-clé clone
## # يتم استدعاء الطريقة السحرية __clone() عند استنساخ الكائن باستخدام الكلمة الأساسية clone


class Magique {
    public $data;

    // Constructeur
    public function __construct($data) {
        $this->data = $data;
    }

    // Méthode magique __clone
    public function __clone() {
        $this->data = clone $this->data; // Clonage profond
    }
}

$obj1 = new Magique(new StdClass());
$obj2 = clone $obj1; // Utilise __clone()

##------------------------------------------------------------------------
### __sleep() La méthode magique __sleep() est appelée lorsqu'un objet est sérialisé avec serialize(
## ### __sleep() يتم استدعاء الطريقة السحرية __sleep() عندما يتم إجراء تسلسل لكائن باستخدام serialize(

class Magique {
    private $data1;
    private $data2;

    // Constructeur
    public function __construct($data1, $data2) {
        $this->data1 = $data1;
        $this->data2 = $data2;
    }

    // Méthode magique __sleep
    public function __sleep() {
        return ['data1']; // Seule $data1 sera sérialisée
    }
}

$obj = new Magique("valeur1", "valeur2");
$serialized = serialize($obj); // Utilise __sleep()
echo $serialized;

###--------------------------------------------------
### La méthode magique __wakeup() est appelée lorsqu'un objet est désérialisé avec unserialize()
#يتم استدعاء الطريقة السحرية __wakeup() عندما يتم إلغاء تسلسل كائن باستخدام unserialize().


class Magique {
    private $data1;
    private $data2;

    // Constructeur
    public function __construct($data1, $data2) {
        $this->data1 = $data1;
        $this->data2 = $data2;
    }

    // Méthode magique __sleep
    public function __sleep() {
        return ['data1']; // Seule $data1 sera sérialisée
    }

    // Méthode magique __wakeup
    public function __wakeup() {
        $this->data2 = "restaurée";
    }
}

$obj = new Magique("valeur1", "valeur2");
$serialized = serialize($obj); // Utilise __sleep()
$obj2 = unserialize($serialized); // Utilise __wakeup()
echo $obj2->data2;