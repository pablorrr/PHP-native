<?php //https://websitecreator.cba.pl/?page_id=141

class Klasa_Przykladowa
{

    public $zmA;
    public static $zmB = "Zmienna statyczna";

    public function getA()
    {
        return $this->zmA;
    }

    public function getMethodA()
    {
        return $this->getA();
    }

    public function getSelfB()
    {
        return self::$zmB;
    }

    public function getStaticB()
    {
        return static::$zmB;
    }

    public function getStaticMethod()
    {
        return static::staticTest();
    }

    public static function staticTest()
    {
        return "test metody statycznej";
    }

}

$obiekt_klasy_przykladowej = new Klasa_Przykladowa;
$obiekt_klasy_przykladowej->zmA = "test zmiennej";

echo $obiekt_klasy_przykladowej->getA()."<br />";
echo $obiekt_klasy_przykladowej->getMethodA()."<br />";

echo $obiekt_klasy_przykladowej->getSelfB()."<br />";
echo $obiekt_klasy_przykladowej->getStaticB()."<br />";
echo $obiekt_klasy_przykladowej->getStaticMethod();
echo '<br>';
echo $obiekt_klasy_przykladowej::staticTest();

echo '<br>';


/**
 *
 * singleton
 */
class DataType
{

    private static $instancja = 'jakis string';

    /* private function __construct(){

    } */

    static public function instancja()
    {

        if (!isset(static::$instancja)) {// jesli nie istnieje statyczna zmienna instance
            static::$instancja = new self();//to samo co – self::$instancja = new DataType;

            /* tworzenie obiektu statycznego klasy DataType obiekt nazywa sie instnacja powoduje tworzenie sie instanacji klasy DataType , dzieki temu instnacja klasy DataType nie bedzie tworzyc nowego obiektu */
        }

        return static::$instancja;//zwroc inatancje klasy request bedaca statyczna zmienna
    }
}

$obiekt = DataType::instancja();//instnacja klasy request bez tworzenia nowego obiektu tej klasy uzycie metody //staycznej instance tej klasy
var_dump($obiekt);
echo '<br>';


class Nadrzedna
{
    public string $val;
    private $zmienna1;
    protected $zmienna2;

    public function __construct($val)
    {
        $this->val = $val;
    }

    public
    function getZmienna1()
    {
        return $this->zmienna1;
    }

    public
    function test()
    {
        echo '   test';
    }

    public
    function getZmienna2()
    {
        return $this->zmienna2;
    }

    public
    function getZmiennaValue()
    {
        return $this->wartosc;
    }

    public
    function test2()
    {
        echo '   z nadrzednej test2';
    }

    public
    function nastaw_wartosc_zmiennej(
        $liczba
    ) {
        $this->zmienna2 = $liczba;
    }

}


class Podrzedna extends Nadrzedna
{

    public function __construct($val)
    {
        parent::__construct($val);
        $this->val=$val;
    }
//todo zdefiniuj w dwoch klasach konstruktoryi uzyj w klasie podzrzednej  parent::constructor
    public function getZmiennaInteger()
    {
//parent oznacza odwolanie do metody klasy macierzystej
        // return "Wartość zmiennej to ".parent::getZmiennaValue();
        //wyjatkowo musi byc parent dlatego ze mwtoda ta dodoatkowa zwraca wlascisowsc klasy o nazwie
        return "Wartość zmiennej to   ".parent::getZmiennaValue();
    }

    public function test2()
    {
        echo '   z podrzednej test2';
    }

    public function test3()
    {
        parent::test2();
        echo '<br>';
        //  parent::__construct($test);

    }

// public function getStudentAlbumNameVar() {
    public function getZmiennaInteger_diffrent_way()
    {
        return "Wartość zmiennej (inny sposob dostepu do tej samej wartośći) to ".$this->wartosc;

    }

}

$obiekt_klasy_Nadrzedna = new Nadrzedna('test nadrzedna');
$obiekt_klasy_Podrzedna = new Podrzedna('test podrzedna');
$obiekt_klasy_Podrzedna->wartosc = 12345;

var_dump($obiekt_klasy_Podrzedna);
//echo "Wartość odczytana z funkcji klasy rozszerzającej(podrzednej): ".$obiekt_klasy_Podrzedna->getZmiennaInteger()."<br />";
echo '<br>';
//echo "Wartość odczytana ze zmiennej klasy rozszerzającej(podrzednej): ".$obiekt_klasy_Podrzedna->getZmiennaInteger_diffrent_way();
echo '<br>';
//echo "wywolanie  metody z klasy nadrzednej z klasy podrzednej ".$obiekt_klasy_Podrzedna->test2();
//echo $obiekt_klasy_Podrzedna->test3('string');

echo '<br>';
//echo $obiekt_klasy_Nadrzedna->test2();
echo '<br>';
echo '<br>';

class Fruit
{
    //   public $name;
    // public $color;
    //   public function __construct($name, $color) {
    //    $this->name = $name;
    //   $this->color = $color;
    //  }
    public function intro()
    {
        //   echo "The fruit is {$this->name} and the color is {$this->color}.";
        echo "The fruit is {} and the color is {}.";
    }
}

//https://www.w3schools.com/php/php_oop_inheritance.asp
// Strawberry is inherited from Fruit
class Strawberry extends Fruit
{
    public function message()
    {
        echo "Am I a fruit or a berry? ";
    }
}

//$strawberry = new Strawberry("Strawberry", "red");
$strawberry = new Strawberry;
//$strawberry->message();
echo '<br>';
//$strawberry->intro();


//parent in inherint

//https://www.phptutorial.net/php-oop/php-call-parent-constructor/


class BankAccount
{
    private $balance;

    public function __construct($balance)
    {
        $this->balance = $balance;
    }

    public function getBalance()
    {
        return $this->balance;
    }

    public function deposit($amount)
    {
        if ($amount > 0) {
            $this->balance += $amount;
        }

        return $this;
    }
}

class SavingAccount extends BankAccount
{
    private $interestRate;

    public function __construct($balance, $interestRate)
    {
        parent::__construct($balance);
        $this->interestRate = $interestRate;
    }

    public function setInterestRate($interestRate)
    {
        $this->interestRate = $interestRate;
    }

    public function addInterest()
    {
        $interest = $this->interestRate * $this->getBalance();
        $this->deposit($interest);
    }
}

$account = new SavingAccount(100, 0.05);
$account->addInterest();
echo $account->getBalance();


//traits
//https://www.phptutorial.net/php-oop/php-traits/

trait FileLogger
{
    public function log($msg)
    {
        echo 'File Logger '.date('Y-m-d h:i:s').':'.$msg.'<br/>';
    }
}

trait DatabaseLogger
{
    public function log($msg)
    {
        echo 'Database Logger '.date('Y-m-d h:i:s').':'.$msg.'<br/>';
    }
}

class Logger
{
    use FileLogger, DatabaseLogger {
        FileLogger::log insteadof DatabaseLogger;
    }
}

$logger = new Logger();
$logger->log('this is a test message #1');
$logger->log('this is a test message #2');
