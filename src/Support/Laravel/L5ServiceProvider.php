<?php
namespace Stackout\Twilio\Support\Laravel;

use Stackout\Twilio\Commands\TwilioCallCommand;
use Stackout\Twilio\Commands\TwilioSmsCommand;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class L5ServiceProvider extends LaravelServiceProvider
{
    use ServiceProviderTrait;

    /**
     * Boot method.
     */
    public function boot()
    {
        $this->commands([
            TwilioCallCommand::class,
            TwilioSmsCommand::class,
        ]);
    }

}
