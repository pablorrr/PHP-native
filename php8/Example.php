<?php

/**
 * https://www.droptica.pl/blog/php-8-co-nowego/
 *
 *
 */

/**
 * UNIA
 *
 * Unia pozwala na definiowanie zestawu typów (dwóch lub więcej),
 * zarówno dla danych wejściowych, jak i zwracanych.
 *
 */
class Example
{
    //https://www.w3schools.com/php/php_oop_static_properties.asp
    private static string $foo;
    //private static $b='gola dupa';
    private static $b = 'litera b';
    private static $a;
    private static $r;

    public function __construct(
        public string $email,
        public string $nam,
        public int    $age,

    )
    {
        echo $this->nam;
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
    }


    public function funname(): void
    {
        return;
    }


    private int|string $id;//unia typow- moze zwrocic zarowno int jak i string

    //metoda moze przyjac zarowna int jak i string oi zwraca void
    public function setId(int|string $id): void
    {
        $this->id = $id;
    }

    //zwraca unie typow int lub string
    public function getId(): int|string
    {
        return $this->id;
    }

//https://php.org/static-methods-in-php-oop/
    static function foo(string $b)
    {
        echo self::$b;
    }

    public static function test($var)
    {
        $var = "This is static";
        return $var;
    }
}


/**
 * Argumenty nazwane
 *
 *  Named arguments pozwalają na przekazanie parametru,
 * bazując na jego nazwie a nie na kolejności.
 *
 */

//$data = new Example(
//    nam: 'name',//nam - nazwa parametru , name- wartosc parametru
//    email: 'email',
//    age: 3,
//);


//var_dump($test);


/**
 * Constructor property promotion
 *
 * Jeżeli przypisywanie wielu argumentów w konstruktorze do właściwości obiektu spędzało Ci sen z powiek, to
 * w PHP 8 możesz o tym zapomnieć.
 * Co prawda nie jest to nic więcej jak tzw. "syntatctic sugar",
 * ale z pewnością funkcjonalność ta zwiększy czytelność nie jednej
 * klasy w twojej aplikacji. Poniżej porównanie konstrukturów w PHP 7 i PHP 8.
 *
 */
//https://www.droptica.pl/blog/php-8-co-nowego/

class Foo
{
}

class Bar
{
}

// PHP 7
class Promo
{

    public Foo $foo;

    protected Bar $bar;

    public function __construct(
        Foo $foo,
        Bar $bar
    )
    {
        $this->foo = $foo;
        $this->bar = $bar;
    }

}

// PHP 8
class Promo8
{

    public function __construct(
        public Foo    $foo,
        protected Bar $bar,
    )
    {
    }

}

/**
 *
 * Atrybuty
 *
 * atrybutu to metdane  przesy;mnae od klas
 *
 * atrybuty to inaczej klasy
 *
 */


//https://php.watch/versions/8.0/attributes

//extrakcja - wyluskiwanie atrybotow - przyklad
#[ExampleAttribute('Hello world', 42)]
class Fooo
{
}

#[Attribute]
class ExampleAttribute
{
    private string $message;
    private int $answer;

    public function __construct(string $message, int $answer)
    {
        $this->message = $message;
        $this->answer = $answer;
    }
}

$reflector = new \ReflectionClass(Fooo::class);
$attrs = $reflector->getAttributes();

foreach ($attrs as $attriubute) {

    // echo $attriubute->getName(); // "My\Attributes\ExampleAttribute"
    echo '<br>';
    //print_r($attriubute->getArguments()); // ["Hello world", 42]
    echo '<br>';
    var_dump($attriubute->newInstance());
    echo '<br>';
    // object(ExampleAttribute)#1 (2) {
    //  ["message":"Foo":private]=> string(11) "Hello World"
    //  ["answer":"Foo":private]=> int(42)
    // }
}

//kopiowanie pliku z jednego miejsca na drugi przyklad z php manual

interface ActionHandler
{
    public function execute();
}

//todo rozbuduj ten atrybut
#[Attribute]
class SetUp
{
}

class CopyFile implements ActionHandler
{
    public string $fileName;
    public string $targetDirectory;

    #[SetUp]
    public function fileExists()
    {
        if (!file_exists($this->fileName)) {
            throw new Exception("File does not exist");
        }
    }

    #[SetUp]
    public function targetDirectoryExists()
    {
        if (!file_exists($this->targetDirectory)) {
            mkdir($this->targetDirectory);//utworz katalog
        } elseif (!is_dir($this->targetDirectory)) {
            throw new Exception("Target directory $this->targetDirectory is not a directory");
        }
    }

    public function execute()
    {//skopioj plik z jednego mieksc a w drugie
        copy($this->fileName, $this->targetDirectory . '/' . basename($this->fileName));
    }
}

//koniec klasy

function executeAction(ActionHandler $actionHandler)
{//instancja  wbudowanej w php klasy ktora odczyta tresc atrybutu
    $reflection = new ReflectionObject($actionHandler);

    foreach ($reflection->getMethods() as $method) {//pobranie metod atrybutu

        $attributes = $method->getAttributes(SetUp::class);//pobierze metody klasy CopyFile z przypisanymi attr jako pary

        if (count($attributes) > 0) {
            $methodName = $method->getName();
            echo $methodName;//wyjatek moze zatrzymac wywolanie nastepnego wyajtku :):)
            echo '<br>';
            $actionHandler->$methodName();// wywolanie metod fileExists i targetDirectoryExists
        }
    }

    $actionHandler->execute();
}

$copyAction = new CopyFile();
$copyAction->fileName = "/tmp/foo.jpg";
$copyAction->targetDirectory = "/home/user";

executeAction($copyAction);


//todo: https://dev.to/sensorario/i-made-a-php-router-with-attributes-b7e
//todo: https://www.youtube.com/watch?v=oSo4xbP6ZYo

/**
 * @param $a
 * @param $b
 * @param $operator
 * @return float|int|string
 *
 * match php 8 example
 */
function calculate($a, $b, $operator)
{
    return match ($operator) {
        '+' => $a + $b,
        '-' => $a - $b,
        '*' => $a * $b,
        '/' => $a / $b,
        default => "Nieznany operator: $operator",
    };
}

// Przykłady użycia
echo calculate(5, 2, '+');  // 7
echo calculate(5, 2, '-');  // 3
echo calculate(5, 2, '*');  // 10
echo calculate(5, 2, '/');  // 2.5
echo calculate(5, 2, '%');  // Nieznany operator: %

/**
 * enum
 */

enum Color {
    case RED;
    case GREEN;
    case BLUE;
}

function getColorName(Color $color): string {
    return match ($color) {
        Color::RED => "Czerwony",
        Color::GREEN => "Zielony",
        Color::BLUE => "Niebieski",
    };
}

// Przykłady użycia
$selectedColor = Color::GREEN;
echo getColorName($selectedColor);


