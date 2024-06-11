<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TestShare extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8001/education/1')
                ->scrollTo('#copyUrlButton')
                ->pause(1000)
                ->click('#copyUrlButton')
                ->pause(1000)
                ->assertDialogOpened('URL copied to clipboard: http://127.0.0.1:8001/education/1')
                ->acceptDialog();
        });
    }
}
