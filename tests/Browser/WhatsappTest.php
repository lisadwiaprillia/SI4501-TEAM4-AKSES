<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class WhatsappTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->clickLink('Hubungi Kami')
                ->pause(1000)
                ->switchToWindow(function ($driver) {
                    return strpos($driver->getCurrentURL(), 'https://api.whatsapp.com/send?phone=6282158204550') !== false;
                });
        });
    }
}
