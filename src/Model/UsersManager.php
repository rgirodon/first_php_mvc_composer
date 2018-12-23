<?php
namespace Dta\Firstmvc_composer\Model;

use \Dta\Firstmvc_composer\Domain\User as User;

class UsersManager extends Manager {
    
    public function getUsers() {
        
        $users = [];
        
        $bdd = $this->dbConnect();
        
        $req = $bdd->query('SELECT id, firstname, lastname FROM user order by id');
        
        while ($userRow = $req->fetch()) {
            
            $user = new User();
            
            $user->id = $userRow['id'];
            
            $user->firstname = $userRow['firstname'];
            
            $user->lastname = $userRow['lastname'];
            
            array_push($users, $user);
        }
        
        return $users;
    }
    
    public function getUser($id) {
        
        $user = null;
        
        $bdd = $this->dbConnect();
        
        $req = $bdd->prepare('SELECT id, firstname, lastname, password FROM user where id = :id');
        
        $req->bindParam(":id", $id);
        
        if ($req->execute()) {
            
            if ($userRow = $req->fetch()) {
                
                $user = new User();
                
                $user->id = $userRow['id'];
                
                $user->firstname = $userRow['firstname'];
                
                $user->lastname = $userRow['lastname'];
 
                $user->password = $userRow['password'];
            }
        }
        
        return $user;
    }
    
    public function deleteUser($id) {
        
        $bdd = $this->dbConnect();
        
        $req = $bdd->prepare('DELETE FROM user where id = :id');
        
        $req->bindParam(":id", $id);
        
        $req->execute();
    }
    
    public function createUser($user) {
        
        $bdd = $this->dbConnect();
        
        $req = $bdd->prepare("INSERT INTO user (firstname, lastname, password) VALUES (:firstname, :lastname, :password)");
        
        $req->bindParam(":firstname", $user->firstname);
        
        $req->bindParam(":lastname", $user->lastname);
        
        $req->bindParam(":password", $user->password);
        
        $req->execute();
        
        $id = $bdd->lastInsertId();
        
        $user->id = $id;
        
        return $id;
    }
    
    public function updateUser($user) {
        
        $bdd = $this->dbConnect();
        
        $req = $bdd->prepare("UPDATE user SET firstname = :firstname, lastname = :lastname, password = :password WHERE id = :id");
        
        $req->bindParam(":id", $user->id);
        
        $req->bindParam(":firstname", $user->firstname);
        
        $req->bindParam(":lastname", $user->lastname);
        
        $req->bindParam(":password", $user->password);
        
        $req->execute();        
    }
}