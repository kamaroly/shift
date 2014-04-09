<?php

namespace Tests;

use Illuminate;
use Mockery as m;
use Symfony;

class TestCase extends \Orchestra\Testbench\TestCase
{
	public function tearDown()
	{
		m::close();
	}

	protected function getPackageProviders()
	{
		return array('Tectonic\Shift\ShiftServiceProvider');
	}

	/**
	 * Define environment setup.
	 *
	 * @param  Illuminate\Foundation\Application    $app
	 * @return void
	 */
	protected function getEnvironmentSetUp($app)
	{
		// reset base path to point to our package's src directory
		$app['path.base'] = __DIR__ . '/../../';

		$app['config']->set('database.default', 'testbench');
		$app['config']->set('database.connections.testbench', array(
			'driver'   => 'sqlite',
			'database' => ':memory:',
			'prefix'   => ''
		));
	}

	public function setUp()
	{
		parent::setUp();

		$artisan = $this->app->make('artisan');

		$artisan->call('migrate', [
			'--database' => 'testbench',
			'--path'     => 'migrations'
		]);
	}
}
