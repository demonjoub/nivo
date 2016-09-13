<?php

use Phalcon\Mvc\Model;
use Phalcon\Validation;
use Phalcon\Validation\Validator\Email as EmailValidator;
use Phalcon\Validation\Validator\Uniqueness as UniquenessValidator;
// use Phalcon\Mvc\Model\Validator\Uniqueness as UniquenessValidator;

class Users extends Model
{
    public function validation()
    {
        $validator = new Validation();

        $validator->add(
            'email', //your field name
            new EmailValidator([
                'model' => $this,
                'message' => 'Please enter a correct email address'
            ])
        );

        $validator->add(
            'username',
            new UniquenessValidator([
                'model' => $this,
                'message' => 'Sorry, That username is already taken',
            ])
        );

        return $this->validate($validator);
        /*$this->validate(new EmailValidator(array(
            'field' => 'email'
        )));
        $this->validate(new UniquenessValidator(array(
            'field' => 'email',
            'message' => 'Sorry, The email was registered by another user'
        )));
        $this->validate(new UniquenessValidator(array(
            'field' => 'username',
            'message' => 'Sorry, That username is already taken'
        )));

        if ($this->validationHasFailed() == true) {
            return false;
        }*/
    }
}
