<?php

namespace Drip;

require_once(__DIR__ . '/../vendor/autoload.php');

class Test extends Worker
{
    public function test()
    {
        $this->run(["one" => "one", "two" => "two"]);
    }

    public function doOne()
    {
        Output::factory()->addOutput("you have done one!\n");
    }

    public function doTwo()
    {
        Output::factory()->addOutput("you have done two!");
    }
}

try {
    $test = new Test();
    $test->test();
} catch (WorkerException $e) {
    Output::factory()->addError($e->getMessage());
} catch (InputException $e) {
    Output::factory()->addError($e->getMessage());
} catch (ChoiceException $e) {
    Output::factory()->addError($e->getMessage());
}
Output::factory()->stdOut();
Output::factory()->stdErr();
