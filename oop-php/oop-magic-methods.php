<?php

/**
 * Class MyClass - przykład klasy z magicznymi metodami.
 */
class MyClass {

    /**
     * Konstruktor klasy.
     */
    public function __construct() {
        echo "Obiekt został utworzony.";
    }

    /**
     * Destruktor klasy.
     */
    public function __destruct() {
        echo "Obiekt został zniszczony.";
    }

    /**
     * Metoda __toString - przedstawienie obiektu jako string.
     *
     * @return string
     */
    public function __toString() {
        return "To jest obiekt MyClass.";
    }

    /**
     * Metoda __get - pobieranie wartości prywatnej właściwości.
     *
     * @param string $name Nazwa właściwości.
     * @return mixed
     */
    public function __get($name) {
        return $this->data[$name] ?? null;
    }

    /**
     * Metoda __set - ustawianie wartości prywatnej właściwości.
     *
     * @param string $name Nazwa właściwości.
     * @param mixed $value Wartość właściwości.
     */
    public function __set($name, $value) {
        $this->data[$name] = $value;
    }

    /**
     * Metoda __call - obsługa prób wywołania niedostępnej metody.
     *
     * @param string $name Nazwa metody.
     * @param array $arguments Argumenty metody.
     */
    public function __call($name, $arguments) {
        echo "Metoda $name nie istnieje.";
    }

    /**
     * Metoda __callStatic - obsługa prób wywołania niedostępnej statycznej metody.
     *
     * @param string $name Nazwa metody.
     * @param array $arguments Argumenty metody.
     */
    public static function __callStatic($name, $arguments) {
        echo "Statyczna metoda $name nie istnieje.";
    }
}

// Przykład użycia
$obj = new MyClass();  // Wywołuje __construct() automatycznie
unset($obj);  // Wywołuje __destruct() automatycznie

echo $obj;  // Automatycznie wywołuje __toString()

$obj->property = "Wartość";  // Automatycznie wywołuje __set()
echo $obj->property;  // Automatycznie wywołuje __get()

$obj->nonExistentMethod();  // Automatycznie wywołuje __call()

MyClass::nonExistentStaticMethod();  // Automatycznie wywołuje __callStatic()

