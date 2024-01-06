<?php
// factory_example.php

/**
 * FACTORY:
 * - Tworzy obiekty bez konieczności ujawniania
 * logiki tworzenia obiektów.
 * - Stosuj, gdy proces tworzenia obiektów
 * jest skomplikowany lub zależy od pewnych warunków.
 */
interface Vehicle {
    public function drive();
}

/**
 * Concrete Products
 */
class Car implements Vehicle {
    public function drive() {
        echo "Driving a car.\n";
    }
}

class Bicycle implements Vehicle {
    public function drive() {
        echo "Riding a bicycle.\n";
    }
}

/**
 * FACTORY INTERFACE:
 * - Deklaruje metodę do tworzenia obiektów.
 */
interface VehicleFactory {
    public function createVehicle(): Vehicle;
}

/**
 * Concrete Factories
 */
class CarFactory implements VehicleFactory {
    public function createVehicle(): Vehicle {
        return new Car();
    }
}

class BicycleFactory implements VehicleFactory {
    public function createVehicle(): Vehicle {
        return new Bicycle();
    }
}

// Użycie Factory
$carFactory = new CarFactory();
$car = $carFactory->createVehicle();
$car->drive();

$bicycleFactory = new BicycleFactory();
$bicycle = $bicycleFactory->createVehicle();
$bicycle->drive();

