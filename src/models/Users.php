<?php

namespace Cram\models;

class Users extends \lithium\data\Model {

    const CR_PREFIX = '$2a$10$';
    const CR_SUFFIX = '$';

    public $hasMany = array(
        'Comments' => array('key'=>array('id'=>'user')),
        'Photos' => array('key'=>array('id'=>'user')),
    );

    public $validates = array(

    );

    public static function hash($password, $salt) {
        if (!$password || !is_string($password)) throw new Exception ('You didn\'t provide a password.');
        if (!$salt || !is_string($salt)) throw new Exception ('You didn\'t provide a password salt.');
        return substr(crypt($password, (self::CR_PREFIX.$salt.self::CR_SUFFIX)), strlen(self::CR_PREFIX.'.'.$salt));
    }

    /**
     * @return a completely random salt for bluefish.
     */
    public static function salt() {
        $alphabet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789/.";
        $salt = '';
        for ($x = 0; $x < 21; $x++) {
            $salt .= $alphabet[mt_rand(0, 63)];
        }
        return $salt;
    }

}