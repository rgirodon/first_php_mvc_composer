<?php
namespace Dta\Firstmvc_composer\Model;

class Manager {

    protected function dbConnect() {
        
        return new \PDO('mysql:host=localhost;dbname=firstmvc;charset=utf8', 'root', 'rgirodon');
    }
}

