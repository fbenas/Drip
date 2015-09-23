<?php

namespace Drip;

/**
 * Handle all the output
 */
class Output
{
    /**
     * instance of this class
     * @var boolean|Output
     */
    protected static $instance = false;

    /**
     * string for holding errors
     * @var boolean|string
     */
    protected $err = false;

    /**
     * Output string
     * @var string
     */
    protected $out;

    /**
     * factory for creating/getting intance of this class
     *
     * @return Output
     * @author Phil Burton <phil@pgburton.com>
     */
    public static function factory()
    {
        if (!self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * dump the buffered output to stdout
     *
     * @author Phil Burton <phil@pgburton.com>
     */
    public function stdOut()
    {
        if ($this->out) {
            fwrite(STDOUT, $this->out . "\n");
        }
    }

    /**
     * dump the buffered error to stderr
     *
     * @author Phil Burton <phil@pgburton.com>
     */
    public function stdErr()
    {
        if ($this->err) {
            fwrite(STDERR, $this->err . "\n");
        }
    }

    /**
     * Add a string to the error
     *
     * @param  string $string
     * @param  string $spacer
     * @author Phil Burton <phil@pgburton.com>
     */
    public function addOutput($string, $spacer = " ")
    {
        if (empty($this->out)) {
            $spacer = "";
        }

        $this->out .= $spacer . trim(preg_replace('/[\t\r\n].*$/', "", $string));
    }

    /**
     * Add an error to the buffer
     *
     * @param  string $string
     * @author Phil Burton <phil@pgburton.com>
     */
    public function addError($string)
    {
        $spacer = "";
        if (empty($this->err)) {
            $spacer = " ";
        }

        $this->err .= $spacer . trim(preg_replace('/[\t\r\n].*$/', "", $string));
    }
}
