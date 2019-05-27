<?php
namespace Stackout\Twilio\Tests;

use Stackout\Twilio\Commands\TwilioCallCommand;
use PHPUnit_Framework_TestCase;

class TwilioCallCommandTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test the name of the command
     */
    public function testName()
    {
        // Arrange
        $stub = $this->getMock('Stackout\Twilio\TwilioInterface');
        $command = new TwilioCallCommand($stub);

        // Act
        $name = $command->getName();

        // Assert
        $this->assertEquals('twilio:call', $name);
    }
}
