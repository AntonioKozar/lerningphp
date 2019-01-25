<?php
use Bookstore\Domain\Book;
use Bookstore\Domain\Customer;

function autoloader($classname) {
    $lastSlash = strpos($classname, '\\') + 1;
    $classname = substr($classname, $lastSlash);
    $directory = str_replace('\\', '/', $classname);
    $filename = __DIR__ . '/' . $directory . '.php';
    require_once($filename);
    }
spl_autoload_register('autoloader');


$book1 = new Book("1984", "George Orwell", 9785267006323, 12);

$customer1 = new Customer(5, 'John', 'Doe', 'johndoe@mail.com');

var_dump($customer1::getLastId());

?>