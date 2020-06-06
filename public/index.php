<?php
class Product {
    public $id;
    public $name;
    public $image;
    public $price;

    public static function getAllProducts() {
    //some code
    }
    public static function getProductByID($id) {
        //$sql = "$id";
    }

}

class CartProduct extends Product {
    public $quantity;
    public function __construct($productID) {
        $cartProduct = self::getProductByID($productID);
    }

}



// 5 Дан код: Что он выведет на каждом шаге? Почему?
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new A(); // ничего не выведет, создается объект
$a2 = new A(); // ничего не выведет, создается объект
$a1->foo(); // 1. Обращение к методу foo класса A. В начале х=0, далее инкремент и вывод
$a2->foo(); // 2
$a1->foo(); // 3
$a2->foo(); // 4

// 6
class B {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class C extends B { // создали класс C, наследника класса B
}
$b1 = new B(); // ничего не выведет, создается объект
$c1 = new C(); // ничего не выведет, создается объект
$b1->foo(); // 1 x=0 далее инкремент и вывод
$c1->foo(); // 1 x=0 далее инкремент и вывод
$b1->foo(); // 2 x=1 далее инкремент и вывод
$c1->foo(); // 2 x=1 далее инкремент и вывод

// 7
class D {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class E extends D {
}
$d1 = new D; // в классе нет конструктора, поэтому новые экземпляры можно создать и без скобок,
$e1 = new E; // результат будет одинаковый
$d1->foo();
$e1->foo();
$d1->foo();
$e1->foo();