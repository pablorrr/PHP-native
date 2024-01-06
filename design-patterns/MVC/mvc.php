<?php
// mvc_example.php

/**
 * MODEL:
 * - Odpowiada za logikę biznesową i zarządzanie danymi.
 * - Stosuj, gdy potrzebujesz oddzielenia
 *  logiki biznesowej od prezentacji.
 */
class UserModel {
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }
}

/**
 * VIEW:
 * - Odpowiada za wyświetlanie danych użytkownikowi.
 * - Stosuj, gdy chcesz oddzielić warstwę prezentacji od logiki biznesowej.
 */
class UserView {
    public function render(UserModel $user) {
        echo "Użytkownik: " . $user->getName();
    }
}

/**
 * CONTROLLER:
 * - Pośredniczy między Modelem a Widokiem, obsługując żądania użytkownika.
 * - Stosuj, gdy potrzebujesz obsługi użytkownika i oddzielenia interakcji od reszty systemu.
 */
class UserController {
    private $model;
    private $view;

    public function __construct(UserModel $model, UserView $view) {
        $this->model = $model;
        $this->view = $view;
    }

    public function showUser() {
        $this->view->render($this->model);
    }
}

// Użycie MVC
$userModel = new UserModel("John Doe");
$userView = new UserView();
$userController = new UserController($userModel, $userView);
$userController->showUser();
