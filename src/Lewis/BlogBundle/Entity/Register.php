<?php

namespace Lewis\BlogBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Register {
    private $name;
    private $email;
    private $password;
    private $sex;
    private $birthdate;
    
    function getName() {
        return $this->name;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function getSex() {
        return $this->sex;
    }

    function getBirthdate() {
        return $this->birthdate;
    }

    function setName($name) {
        $this->name = $name;
        return $this;
    }

    function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    function setPassword($password) {
        $this->password = $password;
        return $this;
    }

    function setSex($sex) {
        $this->sex = $sex;
        return $this;
    }

    function setBirthdate($birthdate) {
        $this->birthdate = $birthdate;
        return $this;
    }
}
