<?php

namespace Cram\models;

class Users extends \lithium\data\Model {

    const CR_PREFIX = '$2a$10$';
    const CR_SUFFIX = '$';

    public $hasMany = array(
        'Comments' => array('key'=>array('id'=>'user')),
        'Photos' => array('key'=>array('id'=>'user')),
        'Likes' => array('key'=>array('id'=>'user')),
    );

    public $validates = array(
        'username' => array (
            array('notEmpty', 'message'=>'You must provide the user\'s PSU access account.'),
            array('alphaNumeric', 'message'=>'Access accounts may contain ONLY letters and numbers.', 'skipEmpty' => true, ),
            array('uniqueField', 'message'=>'That access account belongs to an existing user.', 'skipEmpty' => true, ),
            array('lengthBetween',
                'message'=>'The access account you entered was too long. The limit is 10 characters.',
                'max'=>10, 'skipEmpty' => true,  ),
            array('unchangable',
                'message'=>'You may not modify the access account of an existing record.',
                'skipEmpty' => true, ),
        ),
        'firstname' => array (
            array('notEmpty', 'message'=>'You must provide the user\'s first name.'),
            array('alphaOnly', 'message'=>'Only letters may be used in the first name.', 'skipEmpty' => true, ),
            array('lengthBetween',
                'message'=>'The first name you entered was too long. The limit is 255 characters.',
                'max'=>255, 'skipEmpty' => true, ),
        ),
        'lastname' => array (
            array('notEmpty', 'message'=>'You must provide the user\'s last name.'),
            array('_lastName', 'message'=>'Only letters and hyphens may be used in the last name.', 'skipEmpty' => true, ),
            array('lengthBetween',
                'message'=>'The last name you entered was too long. The limit is 255 characters.',
                'max'=>255, 'skipEmpty' => true, ),
        ),
        'email' => array (
            array('notEmpty', 'message'=>'You must provide the user\'s email address.'),
            array('email', 'message'=>'You have not entered a valid email address.', 'skipEmpty' => true, ),
            array('lengthBetween',
                'message'=>'The email address you entered was too long. The limit is 255 characters.',
                'max'=>255, 'skipEmpty' => true, ),
        ),
        'officenumber' => array (
            array('phoneNumber',
                'message'=> 'You must provide a valid phone number in the format 000-000-0000 or 000-000-0000 x0000 if there is an extension.',
                'allowExtension' => true
            ),
        ),
        'mobilenumber' => array (
            array('phoneNumber',
                'message'=> 'You must provide a valid mobile number in the format 000-000-0000 or 000-000-0000 x0000 if there is an extension.',
                'allowExtension' => true
            ),
        ),
        'faxnumber' => array (
            array('phoneNumber',
                'message'=> 'You must provide a valid fax number in the format 000-000-0000 or 000-000-0000 x0000 if there is an extension.',
                'allowExtension' => true
            ),
        ),
        'foregroundcolor' => array (
            array('notEmpty', 'message'=>'You must provide the user\'s foreground color.'),
            array('hexColor', 'message'=>'You must provide a valid hexidecimal color code.', 'skipEmpty' => true, ),
        ),
        'backgroundcolor' => array (
            array('notEmpty', 'message'=>'You must provide the user\'s background color.'),
            array('hexColor', 'message'=>'You must provide a valid hexidecimal color code.', 'skipEmpty' => true, ),
        ),
        'disabled' => array (
            array('binary', 'message'=>'The "disabled" field must be set to 1 for Disable or 0 for Enable.'),
        ),
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