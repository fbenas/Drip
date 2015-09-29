<?php

namespace DripWeb;

class DbIniThing extends IniThing
{
    public function __construct($id = false)
    {
        parent::__construct();

        if ($id) {
            $this->findById($id);
        }
    }

    protected function findById($id)
    {
        
    }

}