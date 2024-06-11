<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CommentTest extends DuskTestCase
{
    public function testCreateComment(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8000/')
                    ->assertSee('AKSES')
                    ->clickLink('Halaman Edukasi') 
                    ->pause('1000')
                    ->visit('http://127.0.0.1:8000/education')
                    ->assertSee('Manajemen Data Edukasi')
                    ->visit('http://127.0.0.1:8000/education/2')
                    ->scrollTo('#publish')
                    ->type('username', 'Bramas')
                    ->type('message', 'Thank you, informasinya sangat bermanfaat')
                    ->click('#publish')
                    ->waitForLocation('/education/2')
                    ->scrollIntoView('.parents')
                    ->pause('10000');

        });
    }

   
}
