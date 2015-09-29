<?php

namespace DripWeb;

class IniThing
{
    protected $isLoaded = false;
    protected $jsonAttrs = [];

    protected function __construct()
    {
        // Load User attributes from ini
        $path = $this->getIniPath();

        if (!is_readable($path)) {
            throw new IniThingException("Cannot find ini file at path: '" . $path . "'");
        }
        $ini = parse_ini_file($path);
        if (!$ini) {
            throw new IniThingException("Cannot parse ini file at path: '" . $path . "'");
        }

        foreach ($ini as $key => $value) {
            if ($value == "json") {
                $this->jsonAttrs[] = $key;
            }
            $this->{$key} = null;
        }
        $this->onLoad();
    }

    protected function getIniPath()
    {
        return __DIR__ . "/" . explode("\\", get_class($this))[1] . ".ini";
    }

    public function getJson()
    {
        $jsonArray = [];
        foreach ($this->jsonAttrs as $attr) {
            $jsonArray[$attr] = $this->$attr;
        }
        return json_encode($jsonArray);
    }

    protected function onLoad()
    {
    }
}