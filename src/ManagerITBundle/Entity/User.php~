<?php

namespace ManagerITBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct() {

        parent::__construct();
    }

    /**
     * Overriding Fos User class due to impossible to set default role ROLE_USER 
     * @see User at line 138
     * @link https://github.com/FriendsOfSymfony/FOSUserBundle/blob/master/Model/User.php#L138
     * {@inheritdoc}
     */
    public function addRole($role) {
        $role = strtoupper($role);

        if (!in_array($role, $this->roles, true)) {
            $this->roles[] = $role;
        }

        return $this;
    }

}
