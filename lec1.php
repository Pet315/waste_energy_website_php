<h2>-- Основи/Приведення типів</h2>

<?php
    echo "Welcome to PHP";
    echo "<br>", (int) 97.4;
    $across = 25;
//?>

<h2>-- Розіменування</h2>

<?php
    echo "$across<br>";
    $inside = 'across';
    echo $$inside;
?>

<h2>-- Конкатенація</h2>

<?php
    $inside = ' - half of fifty';
    echo "$across.$inside<br>";
?>

<h2>-- Порівняння</h2>

<?php
    if (null==0) {
        echo 'true';
    } else {
        echo 'false';
    }

    if (null===0) {
        echo '<br>true';
    } else {
        echo '<br>false';
    }
?>

<h2>-- Foreach</h2>
<?php
    $random_passw=[25, 54, 10, 56, 39];
    foreach ($random_passw as $numb) {
        echo $numb;
    }
    echo "<br>";
    foreach ($random_passw as $new_numbs) {
        echo $new_numbs-5+6*4;
    }
?>

<h2>-- Hash-масиви</h2>
<?php
    $insect=[''=>'Red fire ant', 'Kingdom'=>'Animalia', 'Class'=>'Insecta', 'Family'=>'Formicidae'];
    foreach ($insect as $key=>$value) {
        if (!$key) {
            echo "$value - ";
        } else {
            echo "$value ";
        }
    }
?>

<h2>-- Explode/implode</h2>
<?php
    echo implode($random_passw), "<br>";
    foreach (explode(' ', $insect['']) as $word) {
        echo "$word;";
    }
?>

<h2>-- OOП</h2>
<?php
    class Dishware {
        private $name, $color;
        public function __construct($name, $color)
        {
            $this->name = $name;
            $this->color = $color;
        }
        public function str() {
            return "$this->name, $this->color";
        }
    }

    class Plate extends Dishware {
        private $diameter, $capacity;
        public function __construct($name, $color, $diameter, $capacity)
        {
            $this->diameter = $diameter;
            $this->capacity = $capacity;
            parent::__construct($name, $color);
        }
        public function str() {
            $base = parent::str();
            return "$base, $this->diameter, $this->capacity";
        }
    }

    $obj1 = new Plate("plate1","white", 21, 6);
    echo $obj1->str();
?>

<h2>-- Singleton</h2>
<?php
    class Singleton {
        private static $number=5;
        protected function __construct() { }
        protected function __clone() { }
        public function __wakeup() {
            echo "Error 1";
        }
        public static function getInstance() {
            if (!isset(self::$number)) {
                self::$number = new static();
            }
            return self::$number;
        }

        public static function adds()
        {
            return self::$number+=5;
        }

    }

    if (Singleton::getInstance()) {
        echo "No errors";
    } else {
        echo "Error 2";
    }

    $a=0;
    while($a<3) {
        echo "<br>", Singleton::adds();
        $a++;
    }
?>