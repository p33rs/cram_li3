<?php

namespace cram\models;

class Photos extends \lithium\data\Model {

    const STORAGE_DIR = '/photos';

    public $hasMany = array(
        'Comments' => array('key'=>array('id'=>'user')),
        'Photos' => array('key'=>array('id'=>'user')),
        'Likes' => array('key'=>array('id'=>'user')),
    );

    public static function path($filename ) {
        return dirname(LITHIUM_APP_PATH) . self::STORAGE_DIR . '/' . $filename;
    }

}