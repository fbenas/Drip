<?php

namespace Drip;

/**
 * Do the call stuff for inputs
 * Magic methods, extend this to use it
 */
class Worker
{

    /**
     * Magicall call a function on this class
     * If not defined throw an exception
     *
     * @param  sting $function
     * @return mixed
     * @author Phil Burton <phil@pgburton.com>
     * @throws WorkerException if function is not defined
     */
    protected function magic($function)
    {
        if (!method_exists($this, $function)) {
            throw new WorkerException("Call to undefined function `" . $function .  "` in class `" . get_class($this) . "`");
        }
        return $this->$function();
    }

    /**
     * From an array of choices, work out if the user typed one
     * and then build a function name off the choice and run it
     *
     * @param  array $choices
     * @return mixed
     * @throws BadChoiceException if choice is invalid
     * @author Phil Burton <phil@pgburton.com>
     */
    protected function run(array $choices)
    {
        $choice = Input::factory()->getOption($choices);
        if (!$choice) {
            throw new ChoiceException("Choice `" . Input::factory()->get() . "` is not valid");
        }
        return $this->magic($this->getFunctionName($choice));
    }

    /**
     * build the function name from a choice
     *
     * @param  string $choice
     * @return string
     * @author Phil Burton <phil@pgburton.com>
     */
    protected function getFunctionName($choice)
    {
        return "do" . ucfirst($choice);
    }

    /**
     * nice wrapper for doing outputs
     *
     * @param  String $out
     * @param  string $spacer
     * @author Phil Burton <phil@pgburton.com>
     */
    protected function out($out, $spacer = " ")
    {
        Output::factory()->addOutput($out, $spacer);
    }
}
