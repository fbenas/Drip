<?php

namespace DripWeb;

require_once(__DIR__ . '../../../vendor/autoload.php');

use PhilDb\PhilDb;

class User extends DbIniThing
{
    // public function __construct($key = false)
    // {
    //     if ($key == false) {
    //         // create new user
    //         $this->init();
    //     } else {
    //         // load from db
    //         $this->loadUser($key);
    //     }

    // }

  

    protected function loadUser(string $key)
    {
        // sql to laod user into vars

    }

    protected function onLoad()
    {
        $this->created = date('Y-m-d H:i:s');
        $this->updated = date('Y-m-d H:i:s');
        $this->key     = uniqid();
    }


}
