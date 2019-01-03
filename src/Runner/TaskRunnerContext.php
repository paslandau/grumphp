<?php

namespace GrumPHP\Runner;

use GrumPHP\Task\Context\ContextInterface;
use GrumPHP\TestSuite\TestSuiteInterface;

class TaskRunnerContext
{
    /**
     * @var ContextInterface
     */
    private $taskContext;

    /**
     * @var bool
     */
    private $skipSuccessOutput = false;

    /**
     * @var null|TestSuiteInterface
     */
    private $testSuite = null;

    /**
     * @var string[]
     */
    private $tasks = null;

    /**
     * TaskRunnerContext constructor.
     *
     * @param ContextInterface $taskContext
     * @param TestSuiteInterface $testSuite
     * @param string[]|null $tasks
     */
    public function __construct(ContextInterface $taskContext, TestSuiteInterface $testSuite = null, $tasks = null)
    {
        $this->taskContext = $taskContext;
        $this->testSuite = $testSuite;
        if ($tasks === null) {
            $tasks = [];
        }
        $this->tasks = $tasks;
    }

    /**
     * @return ContextInterface
     */
    public function getTaskContext()
    {
        return $this->taskContext;
    }

    /**
     * @return bool
     */
    public function skipSuccessOutput()
    {
        return $this->skipSuccessOutput;
    }

    /**
     * @param bool $skipSuccessOutput
     */
    public function setSkipSuccessOutput($skipSuccessOutput)
    {
        $this->skipSuccessOutput = (bool)$skipSuccessOutput;
    }

    /**
     * @return bool
     */
    public function hasTestSuite()
    {
        return $this->testSuite !== null;
    }

    /**
     * @return TestSuiteInterface|null
     */
    public function getTestSuite()
    {
        return $this->testSuite;
    }

    /**
     * @param TestSuiteInterface|null $testSuite
     */
    public function setTestSuite(TestSuiteInterface $testSuite)
    {
        $this->testSuite = $testSuite;
    }

    /**
     * @return string[]
     */
    public function getTasks()
    {
        return $this->tasks;
    }

    /**
     * @return bool
     */
    public function hasTasks()
    {
        return !empty($this->tasks);
    }
}
