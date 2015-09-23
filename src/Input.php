<?php

namespace Drip;

/**
 * Handle all getting of inputs
 */
class Input
{
    /**
     * The raw input array
     * @var array
     */
    protected $args;

    /**
     * teh instance of this class
     * @var Input
     */
    protected static $instance = false;

    /**
     * Constructor to intialise input
     *
     * @author Phil Burton <phil@phgburton.com>
     */
    public function __construct()
    {
        // Process cli args
        global $argv;
        if (!array_key_exists(1, $argv)) {
            throw new InputException("Pleaes provide username as first argument");
        }
        array_shift($argv);
        $this->args = $argv;

        // Process stdin
        fopen("php://stdin", "r");
        $this->in = preg_replace('/[\s\t\r\n].*$/', "", fgets(STDIN));
    }

    /**
     * Factory to create singleton
     *
     * @return Input instance of this class
     * @author Phil Burton <phil@phgburton.com>
     */
    public static function factory()
    {
        if (!self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * dump the raw input
     * Debugging only
     *
     * @author Phil Burton <phil@phgburton.com>
     */
    public function dumpArgs()
    {
        trigger_error("Debugging function used");
        var_dump($this->in);
    }

    /**
     * Get the first input from the raw array
     *
     * @return string get the first argument
     * @author Phil Burton <phil@phgburton.com>
     */
    public function get()
    {
        return $this->in;
    }

    /**
     * From a list of options as an assoc array we see if the user enteted a
     * valid choice and then return the key of the choice
     * otherwise return false
     *
     * @param array $choices
     * @return mixed false or sting
     * @author Phil Burton <phil@phgburton.com>1
     */
    public function getOption(array $choices)
    {
        return array_search($this->get(), $choices);
    }
}
