<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DataObatTest extends DuskTestCase
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
                    ->waitForLocation('/admin-dashboard', 10)
                    ->assertPathIs('/admin-dashboard')
                    ->visit('http://127.0.0.1:8000/drug/data')
                    ->assertSee('Manajemen Data Obat')
                    ->assertSee('Paracetamol')
                    ->press('Hapus');
                    // ->visit('http://127.0.0.1:8000/drug/7/delete')
                    // ->waitForDialog()
                    // ->acceptDialog();

                    // Klik tombol "Data Obat"
                    // ->waitFor('.DataObat', 10) // Perhatikan penamaan selector ini
                    // ->click('.DataObat')
                    
                    // // Pastikan Anda berada di halaman "Create Data Obat"
                    // ->assertPathIs('/menuobat/create')
                    // ->assertSee('Form Pembuatan Data Obat')
                    // ->type('drug_name', 'Paracetamol')
                    // ->type('dosage', '500 mg')
                    // ->type('contents', 'Paracetamol 500 mg')
                    // ->type('indication', 'Penghilang rasa sakit, penurun demam')
                    // ->type('contraindication', 'Alergi terhadap obat ini')
                    // ->type('special_precautions', 'Hindari penggunaan berlebihan')
                    // ->type('drug_interaction', 'Mual')
                    // ->type('adverse_reactions', 'apa ajaa')
                    // ->type('atc_classification', '7623yheskw' )
                    // ->select('presentation_id', '1')
                    // ->select('class_id', '3')
                    // ->select('regulatory_id', '1')
                    // ->press('Buat Data Obat')
                    // ->waitForLocation('/drugs')
                    // ->assertSee('Paracetamol');

        });
    }
}
