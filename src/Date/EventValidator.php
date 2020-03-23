<?php

namespace Date;

use App\Validator;

class EventValidator extends Validator{

    public function validates(array $data){

        parent::validates($data);
        $this->validate('title', 'minlength', 3);
        $this->validate('date', 'date');
        $this->validate('start', 'beforeTime', 'end');

        return $this->errors;
    }
}