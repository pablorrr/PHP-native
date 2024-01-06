<?php

/**
 * Klasa finalna - FinalClass
 * - Klasa finalna nie może być dziedziczona przez żadne inne klasy.
 * - Dodano prywatne pole $data i konstruktor, który inicjalizuje to pole podczas tworzenia obiektu.
 * - Dodano metodę finalMethod, która wyświetla informacje z prywatnego pola.
 */
final class FinalClass {
    private $data;

    // Konstruktor przyjmuje dane i inicjalizuje pole $data
    public function __construct($data) {
        $this->data = $data;
    }

    // Metoda finalna, wyświetla informacje z prywatnego pola
    public function finalMethod() {
        echo "Metoda w klasie finalnej. Dane: " . $this->data;
    }
}

// Instancja obiektu klasy finalnej
$finalObject = new FinalClass("Some data");
$finalObject->finalMethod();


/**
 * Klasa abstrakcyjna - AbstractClass
 * - Klasa abstrakcyjna to klasa, która może zawierać metody abstrakcyjne (bez implementacji) i może być dziedziczona przez inne klasy.
 * - Dodano abstrakcyjną metodę abstractMethod oraz konkretną metodę concreteMethod.
 * - Utworzono konkretną klasę ConcreteClass, która dziedziczy po AbstractClass i implementuje abstrakcyjną metodę.
 * - Utworzono instancję ConcreteClass i wywołano obie metody.
 */
abstract class AbstractClass {
    // Abstrakcyjna metoda, wymaga implementacji w klasach dziedziczących
    abstract public function abstractMethod();

    // Konkretna metoda, posiada implementację
    public function concreteMethod() {
        echo "Metoda konkretna w klasie abstrakcyjnej.";
    }
}

// Klasa dziedzicząca po klasie abstrakcyjnej
class ConcreteClass extends AbstractClass {
    // Implementacja abstrakcyjnej metody
    public function abstractMethod() {
        echo "Implementacja abstrakcyjnej metody.";
    }
}

// Instancja obiektu klasy dziedziczącej po klasie abstrakcyjnej
$abstractObject = new ConcreteClass();
$abstractObject->abstractMethod();
$abstractObject->concreteMethod();


/**
 * Interfejs - MyInterface
 * - Interfejs definiuje zestaw metod, które klasa musi zaimplementować.
 * - Utworzono klasę ImplementingClass, która implementuje interfejs MyInterface.
 * - Utworzono instancję ImplementingClass i wywołano obie metody interfejsu.
 */
interface MyInterface {
    public function method1();
    public function method2($param);
}

// Klasa implementująca interfejs
class ImplementingClass implements MyInterface {
    // Implementacja pierwszej metody interfejsu
    public function method1() {
        echo "Implementacja method1.";
    }

    // Implementacja drugiej metody interfejsu z parametrem
    public function method2($param) {
        echo "Implementacja method2 z parametrem: " . $param;
    }
}

// Instancja obiektu implementującego interfejs
$interfaceObject = new ImplementingClass();
$interfaceObject->method1();
$interfaceObject->method2("Some parameter");

