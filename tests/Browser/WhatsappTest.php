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
        // $this->browse(function (Browser $browser) {
        //     $browser->visit('/')
        //         ->clickLink('Hubungi Kami')
        //         ->pause(1000)
        //         ->switchToWindow(function ($driver) {
        //             return strpos($driver->getCurrentURL(), 'https://api.whatsapp.com/send?phone=6282158204550') !== false;
        //         });
        // });

        // $this->browse(function (Browser $browser) {
        //     $browser->visit('/')
        //         ->script('window.open("https://api.whatsapp.com/send?phone=6282158204550");');
        //     ->pause(1000) 
        //     ->switchToWindow(collect($browser->driver->getWindowHandles())->last()) 
        //     ->assertUrlIs('https://api.whatsapp.com/send?phone=6282158204550');
        // });


        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->clickLink('Hubungi Kami')
                ->pause(1000) // Pause to allow time for the new tab to open
                ->switchToWindow(collect($browser->driver->getWindowHandles())->last())
                ->assertUrlIs('https://api.whatsapp.com/send?phone=6282158204550');
        });
    }
}
