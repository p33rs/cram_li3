<?php
namespace cram\controllers;
use lithium\storage\Session;
use cram\models\Users;
use cram\models\Photos;
use \Exception;

class UsersController extends \lithium\action\Controller {

    const PER_PAGE = 20;

    public function view() {
        $id = $this->request->get('params:id');
        if (!$id) {
            throw new Exception('Didn\'t specify photo.');
        }
        $photo = Photos::find('first', [
            'conditions' => ['id' => $id],
            'with' => 'comments'
        ]);
        if (!$photo) {
            throw new Exception('Photo not found');
        }
        return $photo;
    }

    public function index() {
        $id = $this->request->get('params:id');
        $page = $this->request->get('query:page') ? : 0;
        $photos = Photos::find('all', [
            'limit' => self::PER_PAGE,
            'page' => $page,
            'order' => 'datetime DESC'
        ]);
        return [
            'page' => $page,
            'photos' => $photos
        ];
    }

    public function add() {

    }

    public function delete() {
        $id = $this->request->get('params:id');
        $photo = Photos::find('first', [ 'id' => $id ]);
        // Photo is ours?
        if ($photo && $photo->user === Session::read('user')) {
            $photo->delete();
            unlink(Photos::path($photo->filename));
        } else {
            throw new Exception('Photo not found');
        }
        $this->redirect('Photos::index', ['id' => Session::read('user')]);
    }

}