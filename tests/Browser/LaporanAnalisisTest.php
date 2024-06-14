<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LaporanAnalisisTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8000/')
                    ->assertSee('AKSES')
                    ->clickLink('Login')
                    ->type('user_email', 'admin@mail.com')
                    ->type('user_password', 'admin123')
                    ->press('Login')
                    ->waitForLocation('/dashboard', 10)
                    ->assertPathIs('/dashboard');
        });
    }
}
