<?php
namespace cram\controllers;
use lithium\storage\Session;
use cram\models\Users;
use \Exception;

class UsersController extends \lithium\action\Controller {

    /** @var array Authless routes */
    public $publicActions = [
        'login',
        'logout',
        'land'
    ];

    /**
     * Landing page.
     * @return array|object
     */
    public function land() {
    }

    public function login() {
        $username = $this->request->get('data:username');
        if (!$username) {
            return ['error' => 'Please provide a username'];
        }

        $user = Users::find('first', ['username' => $username]);
        if (!$user) {
            return ['error' => 'Invalid login.'];
        }

        $salt = $user->salt;
        $hashed = Users::hash($this->request->get('data:password'), $salt);
        if ($hashed === $user->password) {
            Session::write('user', $user->id);
            $this->redirect('Users::home');
        } else {
            return ['error' => 'Invalid login.'];
        }
    }

    public function home() {

    }

    public function register() {
        $errors = [];
        $fields = ['username', 'firstname', 'lastname', 'email'];
        $user = Users::create();
        foreach ($fields as $field) {
            $user->$field = $this->request->get('data:' . $field);
        }
        $password = $this->request->get('data:password');
        $passwordConfirm = $this->request->get('data:password2');
        if ($password != $passwordConfirm) {
            $errors[] = 'Passwords didn\'t match.';
        }
        if (strlen($password) < 8) {
            $errors[] = 'Password must be eight characters long';
        }
        $salt = Users::salt();
        $user->password = Users::hash($password, $salt);
        $user->salt = $salt;
    }

    public function logout() {
        Session::clear();
        return $this->redirect('Users::land');
    }

    public function account() {

    }

    /**
     * @return bool|null True if logged in; False if logged in and cleared; Null if not logged in
     */
    private function checkLogin() {
        $loggedIn = Session::read('timestamp');
        if (!$loggedIn) {
            return null;
        }
        return $loggedIn - time() < self::MAX_SESSION_AGE;
    }



}