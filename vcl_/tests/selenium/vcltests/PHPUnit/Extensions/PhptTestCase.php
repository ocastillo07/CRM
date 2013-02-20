<?php
/**
 * PHPUnit
 *
 * Copyright (c) 2002-2007, Sebastian Bergmann <sb@sebastian-bergmann.de>.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 *   * Redistributions of source code must retain the above copyright
 *     notice, this list of conditions and the following disclaimer.
 *
 *   * Redistributions in binary form must reproduce the above copyright
 *     notice, this list of conditions and the following disclaimer in
 *     the documentation and/or other materials provided with the
 *     distribution.
 *
 *   * Neither the name of Sebastian Bergmann nor the names of his
 *     contributors may be used to endorse or promote products derived
 *     from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN
 * ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @category   Testing
 * @package    PHPUnit
 * @author     Sebastian Bergmann <sb@sebastian-bergmann.de>
 * @copyright  2002-2007 Sebastian Bergmann <sb@sebastian-bergmann.de>
 * @license    http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @version    SVN: $Id: PhptTestCase.php 767 2007-07-11 07:55:34Z sb $
 * @link       http://www.phpunit.de/
 * @since      File available since Release 3.1.4
 */

require_once 'PHPUnit/Framework.php';
require_once 'PHPUnit/Extensions/PhptTestCase/Logger.php';
require_once 'PHPUnit/Util/Filter.php';

include_once 'PEAR/RunTest.php';

PHPUnit_Util_Filter::addFileToFilter(__FILE__, 'PHPUNIT');

/**
 * Wrapper to run .phpt test cases.
 *
 * @category   Testing
 * @package    PHPUnit
 * @author     Sebastian Bergmann <sb@sebastian-bergmann.de>
 * @copyright  2002-2007 Sebastian Bergmann <sb@sebastian-bergmann.de>
 * @license    http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @version    Release: 3.1.9
 * @link       http://www.phpunit.de/
 * @since      Class available since Release 3.1.4
 */
class PHPUnit_Extensions_PhptTestCase implements PHPUnit_Framework_Test
{
    /**
     * The filename of the .phpt file.
     *
     * @var    string
     * @access private
     */
    private $filename;

    /**
     * Constructs a test case with the given filename.
     *
     * @param  string $filename
     * @access public
     */
    public function __construct($filename)
    {
        if (!is_string($filename)) {
            throw new InvalidArgumentException;
        }

        if (!is_file($filename)) {
            throw new RuntimeException(
              sprintf(
                'File "%s" does not exist.',
                $filename
              )
            );
        }

        $this->filename = $filename;
    }

    /**
     * Counts the number of test cases executed by run(TestResult result).
     *
     * @return integer
     * @access public
     */
    public function count()
    {
        return 1;
    }

    /**
     * Runs a test and collects its result in a TestResult instance.
     *
     * @param  PHPUnit_Framework_TestResult $result
     * @return PHPUnit_Framework_TestResult
     * @access public
     */
    public function run(PHPUnit_Framework_TestResult $result = NULL)
    {
        if (!class_exists('PEAR_RunTest', FALSE)) {
            throw new RuntimeException('Class PEAR_RunTest not found.');
        }

        if ($result === NULL) {
            $result = new PHPUnit_Framework_TestResult;
        }

        $runner = new PEAR_RunTest(new PHPUnit_Extensions_PhptTestCase_Logger);

        $result->startTest($this);

        PHPUnit_Util_Timer::start();
        $buffer = $runner->run($this->filename);
        $time = PHPUnit_Util_Timer::stop();

        if ($buffer == 'SKIPPED') {
            $result->addFailure($this, new PHPUnit_Framework_SkippedTestError, 0);
        }

        if ($buffer != 'PASSED') {
            $base     = basename($this->filename);
            $path     = dirname($this->filename);
            $diffFile = $path . DIRECTORY_SEPARATOR . str_replace('.phpt', '.diff', $base);
            $expFile  = $path . DIRECTORY_SEPARATOR . str_replace('.phpt', '.exp', $base);
            $logFile  = $path . DIRECTORY_SEPARATOR . str_replace('.phpt', '.log', $base);
            $phpFile  = $path . DIRECTORY_SEPARATOR . str_replace('.phpt', '.php', $base);
            $outFile  = $path . DIRECTORY_SEPARATOR . str_replace('.phpt', '.out', $base);

            $result->addFailure(
              $this,
              PHPUnit_Framework_ComparisonFailure::diffEqual(
                file_get_contents($expFile),
                file_get_contents($outFile)
              ),
              $time
            );

            unlink($diffFile);
            unlink($expFile);
            unlink($logFile);
            unlink($phpFile);
            unlink($outFile);
        }

        $result->endTest($this, $time);

        return $result;
    }

    /**
     * Returns a string representation of the test case.
     *
     * @return string
     * @access public
     */
    public function toString()
    {
        return $this->filename;
    }
}
?>