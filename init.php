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

function checkIfValid(Customer $customer, array $books): bool {
    return $customer->getAmountToBorrow() >= count($books);
}

$customer1 = new Basic(5, 'John', 'Doe', 'johndoe@mail.com');
var_dump(checkIfValid($customer1, [$book1])); // ok
$customer2 = new Customer(7, 'James', 'Bond', 'james@bond.com');
var_dump(checkIfValid($customer2, [$book1])); // fails

?>