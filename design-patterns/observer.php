<?php
// observer_example.php

/**
 * OBSERVER:
 * - Definiuje zależność jeden-do-wielu między obiektami, tak że gdy jeden obiekt zmienia stan, wszystkie jego zależności są powiadamiane i automatycznie aktualizowane.
 * - Stosuj, gdy jedna część systemu musi
 * reagować na zmiany w innej części,
 * a nie chcesz tworzyć silnych powiązań między nimi.
 */
interface Observer
{
    public function update(string $message);
}

/**
 * SUBJECT (OBSERVABLE):
 * - Przechowuje listę obserwatorów i zarządza nimi.
 */
class NewsAgency
{
    private $observers = [];

    public function addObserver(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    public function sendNews(string $news)
    {
        foreach ($this->observers as $observer) {
            $observer->update($news);
        }
    }
}

/**
 * Concrete Observer
 */
class NewsChannel implements Observer
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function update(string $message)
    {
        echo "{$this->name} received news: {$message}\n";
    }
}

// Użycie Observer
$newsAgency = new NewsAgency();
$newsChannel1 = new NewsChannel("Channel 1");
$newsChannel2 = new NewsChannel("Channel 2");

$newsAgency->addObserver($newsChannel1);
$newsAgency->addObserver($newsChannel2);

$newsAgency->sendNews("Breaking News!");

