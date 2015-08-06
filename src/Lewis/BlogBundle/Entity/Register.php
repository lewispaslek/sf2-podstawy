<?php

namespace Lewis\BlogBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="Registrations")
 */
class Register {
    
    /**
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     *
     * @ORM\Column(type="string", length=255)
     */
    private $name;
    
    /**
     *
     * @ORM\Column(type="string", length=255)
     */
    private $email;
    /**
     *
     * @ORM\Column(type="string", length=128)
     */
    private $password;
    /**
     *
     * @ORM\Column(type="string", length=1)
     */
    private $sex;
    /**
     *
     * @ORM\Column(type="date", nullable=true)
     */
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
