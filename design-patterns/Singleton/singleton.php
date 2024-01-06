<?php
// singleton_example.php

/**
 * SINGLETON:
 * - Gwarantuje, że klasa ma tylko jedną instancję i dostarcza globalny punkt dostępu do niej.
 * - Stosuj, gdy potrzebujesz jednej globalnej instancji, np. do zarządzania połączeniem baz danych.
 */
class Singleton {
    private static $instance;

    private function __construct() {
        // Prywatny konstruktor, aby uniemożliwić bezpośrednie tworzenie instancji
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function showMessage() {
        echo "Singleton instance created!";
    }
}

// Użycie Singleton
$singletonInstance = Singleton::getInstance();
$singletonInstance->showMessage();
