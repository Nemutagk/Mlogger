<?php
namespace Nemutagk\Mlogger;

use Illuminate\Support\ServiceProvider;

class MloggerServiceProvider extends ServiceProvider
{
	public function boot() {
		
	}

	public function register() {
		$this->app->bind('Logger', function() {
            return new Mlogger();
        });
	}
}