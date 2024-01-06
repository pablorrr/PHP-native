<?php
// dependency_injection_example.php

/**
 * DEPENDENCY INJECTION:
 * - Przekazuje zależności obiektów podczas tworzenia,
 * zamiast tworzyć je wewnątrz klasy.
 * - Stosuj, gdy chcesz uniknąć silnych zależności
 * między obiektami i ułatwić testowanie jednostkowe.
 */
class DatabaseConnection {
    public function connect() {
        echo "Connected to the database.";
    }
}

/**
 * Klasa wymagająca wstrzykiwania zależności
 */
class UserRepository {
    private $databaseConnection;

    public function __construct(DatabaseConnection $databaseConnection) {
        $this->databaseConnection = $databaseConnection;
    }

    public function fetchData() {
        $this->databaseConnection->connect();
        echo "Fetching data from the database.";
    }
}

// Użycie Dependency Injection
$databaseConnection = new DatabaseConnection();
$userRepository = new UserRepository($databaseConnection);
$userRepository->fetchData();

