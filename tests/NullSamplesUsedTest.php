<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use RipLogChecker\RipLogChecker;
use RipLogChecker\Scorers\EacScorer;

class NullSamplesUsedTest extends TestCase
{
    public function testNullSamplesUsedCheck()
    {
        /* Load log file */
        $testLog = file_get_contents('tests/logs/null_samples_used_test.log');

        /* Construct RipLogChecker object */
        $log_checker = new RipLogChecker($testLog);

        /* Retrieve the errors array */
        $errors = $log_checker->getScorer()->getErrors();

        /* Assert that we get the NULL_SAMPLES_NOT_USED error */
        $this->assertEquals($errors[EacScorer::NULL_SAMPLES_NOT_USED], true);

        /* Verify that the score is equals the score that a log with only this error would have */
        $this->assertEquals(95, $log_checker->getScore());
    }
}
