<?php


abstract class Book
{

    protected $title;
    protected $author;
    protected $readCount;

    public function __construct($title, $author)
    {
        $this->title = $title;
        $this->author = $author;
        $this->readCount = 0;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function incrementReadCount()
    {
        $this->readCount++;
    }

    public function getReadCount()
    {
        return $this->readCount;
    }

    abstract public function getAccessInfo();
}

class DigitalBook extends Book
{

    private $downloadLink;

    public function __construct($title, $author, $downloadLink)
    {
        parent::__construct($title, $author);
        $this->downloadLink = $downloadLink;
    }

    public function getAccessInfo()
    {
        return "Загрузочная ссылка " . $this->downloadLink;
    }
}

class PhysicalBook extends Book
{

    private $libraryshelf;
    private $libraryAdress;

    public function __construct($title, $author, $libraryAdress, $libraryshelf)
    {
        parent::__construct($title, $author);
        $this->libraryAdress = $libraryAdress;
        $this->libraryshelf = $libraryshelf;
    }

    public function getAccessInfo()
    {
        return "Книга находится по следующему адресу библиотеки: " . $this->libraryAdress . " На полке: " . $this->libraryshelf . "\n";
    }
}

$digitalBook = new DigitalBook("PHP Программирование", "Иван Иванов", "https://example.com/download");
$physicalBook = new PhysicalBook("Изучение  PHP", "Пётр Петров", "ул.Мира, 26/2 ", "7");

$digitalBook->incrementReadCount();
$physicalBook->incrementReadCount();
$physicalBook->incrementReadCount();

echo $digitalBook->getTitle() . " - Автор: " . $digitalBook->getAuthor() . " - " . $digitalBook->getAccessInfo() . " Счётчик прочтения: " . $digitalBook->getReadCount() . "\n";
echo $physicalBook->getTitle() . " - Автор: " . $physicalBook->getAuthor() . " - " . $physicalBook->getAccessInfo() . " Счётчик прочтения: " . $physicalBook->getReadCount() . "\n";
