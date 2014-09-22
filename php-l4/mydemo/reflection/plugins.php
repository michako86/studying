<?php
//Все должно быть в разных файлах
interface IPlugin {
//    function getMenuItems();
//    function getArticles();
//    function getSideBars();
}

class VasinPlagin implements IPlugin {
    
    function getName() {
        return "Васин Плагин";
    }
    public function getArticles() {
        
    }

    public function getMenuItems() {
        return array(
            "description"=>"Плагин Васи",
            "link"=> "some link"
        );
    }

    public function getSideBars() {
        return array(
            "one"=>"ONE",
            "two"=>"TWO"
        );
    }

}

class PetyaPlagin implements IPlugin {
    
    function getName() {
        return "Петин Плагин";
    }
    public function getArticles() {
        return array(
            "title"=>"Super post",
            "text"=>"Ololo",
            "link" => "...."
        );
    }

    public function getMenuItems() {
        return array(
            "description"=>"Плагин Пети",
            "link"=> "some link"
        );
    }

    public function getSideBars() {
        return array(
            "one"=>"ONE",
            "two"=>"TWO"
        );
    }

}


