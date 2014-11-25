<?php

namespace Cram\models;

class Users extends \lithium\data\Model {

    public $hasMany = array(
        'Comments' => array('key'=>array('id'=>'user')),
        'Photos' => array('key'=>array('id'=>'user')),
        'Likes' => array('key'=>array('id'=>'user')),
    );

}