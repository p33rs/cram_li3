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
        // Static page, for now.
    }

    public function login() {
        $error = false;
        $username = $this->request->get('data:username');
        if (!$username) {
            return $this->render(['data' => [
                'error' => 'You must specify a username.'
            ]]);
        }

        $user = Users::find('first', ['username' => $username]);
        if (!$user) {
            return $this->render(['data' => [
                'error' => 'User not found.'
            ]]);
        }

        $salt = $user->salt;
        $hashed = Users::hash($this->request->get('data:password'), $salt);
        if ($hashed === $user->password) {
            Session::write('user', $user->id);
            return $this->render(['data' => [
                'success' => true
            ]]);
        } else {
            return $this->render(['data' => [
                'error' => 'Invalid password.'
            ]]);
        }
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
        if (!$errors) {
            $user->save();
        }
        $errors += $user->errors();
        return $this->render([
            'data' => [
                'errors' => $errors,
                'success' => !$errors
            ]
        ]);
    }

    public function logout() {
        Session::clear();
        return $this->redirect('Users::land');
    }

    public function account() {
        $values = [];
        $errors = [];
        // if data,
        //   currentData = form data
        //   attempt the save
        // else,
        //   currentData = users::find()
        return $this->render([
            'data' => [
                'values' => $values,
                'errors' => $errors,
            ]
        ]);
    }

}