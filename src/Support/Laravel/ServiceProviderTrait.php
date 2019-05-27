<?php
namespace Stackout\Twilio\Support\Laravel;

use Stackout\Twilio\Commands\TwilioCallCommand;
use Stackout\Twilio\Commands\TwilioSmsCommand;
use Stackout\Twilio\Manager;
use Stackout\Twilio\TwilioInterface;

trait ServiceProviderTrait
{
    /**
     *
     */
    public function register()
    {
        // Register manager for usage with the Facade.
        $this->app->singleton('twilio', function () {
            return new Manager();
        });

        // Define an alias.
        $this->app->alias('twilio', Manager::class);

        // Register Twilio Test SMS Command.
        $this->app->singleton('twilio.sms', TwilioSmsCommand::class);

        // Register Twilio Test Call Command.
        $this->app->singleton('twilio.call', TwilioCallCommand::class);

        // Register TwilioInterface concretion.
        $this->app->singleton(TwilioInterface::class, function () {
            return $this->app->make('twilio')->defaultConnection();
        });
    }
}
