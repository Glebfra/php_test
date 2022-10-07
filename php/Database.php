<?php

class Database
{

    private $link;

    public function __construct()
    {
        $this->link = mysqli_connect("mysql", 'root', getenv('MYSQL_ROOT_PASSWORD'));

        if ($this->link == false){
            print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error()) . PHP_EOL;
        }
        else {
            print("Соединение установлено успешно" . PHP_EOL);
        }
    }

    public function executeSql($sql)
    {
        $result = mysqli_query($this->link, $sql);

        if ($result == false) {
            print("Произошла ошибка при выполнении запроса " . mysqli_error($this->link) . PHP_EOL);
            return null;
        }

        return $result;
    }
}