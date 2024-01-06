Oto przykładowy kod w PHP z wykorzystaniem serializacji bezpośrednio do formatu PHP i formatu JSON, wraz z odpowiednimi komentarzami:

```php
<?php

/**
 * Class UserData - Przykładowa klasa reprezentująca dane użytkownika.
 */
class UserData {
    public $name;
    public $age;
    public $city;

    public function __construct($name, $age, $city) {
        $this->name = $name;
        $this->age = $age;
        $this->city = $city;
    }
}

// Tworzenie obiektu UserData
$userData = new UserData("John Doe", 30, "New York");

// ----------------------------------------------
// Serializacja danych do formatu PHP (bezpośrednia)
// ----------------------------------------------

// Serializacja do formatu PHP
$serializedDataPHP = serialize($userData);

echo "Serializowane dane (bezpośrednia serializacja PHP): \n";
echo $serializedDataPHP . "\n";

// Deserializacja do obiektu
$unserializedDataPHP = unserialize($serializedDataPHP);
echo "\nOdtworzone dane (bezpośrednia deserializacja PHP): \n";
print_r($unserializedDataPHP);
echo "\n";

// ----------------------------------------------
// Serializacja danych do formatu JSON
// ----------------------------------------------

// Serializacja do formatu JSON
$serializedDataJSON = json_encode($userData);

echo "Serializowane dane (JSON): \n";
echo $serializedDataJSON . "\n";

// Deserializacja do obiektu
$unserializedDataJSON = json_decode($serializedDataJSON);

echo "\nOdtworzone dane (JSON): \n";
print_r($unserializedDataJSON);
echo "\n";


/**
W powyższym kodzie:

- Tworzony jest obiekt klasy `UserData`
 * reprezentujący dane użytkownika.
- Następnie dane są serializowane dwukrotnie:
 * raz do formatu PHP (`serialize()`) i
 * raz do formatu JSON (`json_encode()`).
- W obu przypadkach dane są wyświetlane w postaci
 * zserializowanej, a następnie odtwarzane
 * (deserializowane) i wyświetlane w postaci odtworzonej.

Komentarze w kodzie objaśniają, co dzieje się w
 * poszczególnych etapach.
 * W przypadku deserializacji, pamiętaj, że
 * deserializacja bezpieczna dla użytkownika
 * wymaga dodatkowych
 * środków ostrożności, zwłaszcza w przypadku
 * danych zewnętrznych (np. przesyłanych przez użytkownika).
 */