<?php
namespace cram\controllers;
use lithium\storage\Session;
class UsersController extends \lithium\action\Controller {

    public function land() {
        if (Session::read(''))
    }

    public function login() {

    }

    public function home() {

    }

    public function register() {

    }

    public function logout() {
        Session::clear();
        return $this->redirect('User::land');
    }

}