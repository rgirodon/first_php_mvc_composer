<?php
namespace FirstMvc\Test;

require '../vendor/autoload.php';

use \PHPUnit\Framework\TestCase as TestCase;

use \Dta\Firstmvc_composer\Model\UsersManager as UsersManager;
use Dta\Firstmvc_composer\Domain\User;

/**
 * UsersManager test case.
 */
class UsersManagerTest extends TestCase {

    private $usersManager;

    protected function setUp() {
        
        parent::setUp();
        
        $this->usersManager = new UsersManager();
    }

    protected function tearDown() {
        
        $this->usersManager = null;
        
        parent::tearDown();
    }

    public function testGetUsers() {
        
        $users = $this->usersManager->getUsers();
        
        $this->assertEquals(3, count($users));
    }
    
    public function testGetUser() {
        
        $user = $this->usersManager->getUser(1);
        
        $this->assertEquals(1, $user->id);
        
        $this->assertEquals('Bobby', $user->firstname);
        
        $this->assertEquals('Firmino', $user->lastname);
        
        $this->assertEquals('LFC', $user->password);
    }
    
    public function testCreateAndDeleteUser() {
        
        $user = new User();
        
        $user->firstname = 'Xherdan';
        
        $user->lastname = 'Shaqiri';
        
        $user->password = 'LFC';
        
        $id = $this->usersManager->createUser($user);
        
        $users = $this->usersManager->getUsers();
        
        $this->assertEquals(4, count($users));
        
        $this->usersManager->deleteUser($id);
        
        $users = $this->usersManager->getUsers();
        
        $this->assertEquals(3, count($users));
    }
    
    public function testUpdateUser() {
        
        $user = $this->usersManager->getUser(1);
        
        $user->password = 'LFC2018';
        
        $this->usersManager->updateUser($user);
        
        $user = $this->usersManager->getUser(1);
        
        $this->assertEquals(1, $user->id);
        
        $this->assertEquals('Bobby', $user->firstname);
        
        $this->assertEquals('Firmino', $user->lastname);
        
        $this->assertEquals('LFC2018', $user->password);
        
        $user->password = 'LFC';
        
        $this->usersManager->updateUser($user);
    }
}

