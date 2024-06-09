<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\DrugClass;

class DrugClassTest extends DuskTestCase
{
    public function test_fail_see_classification()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8001/login')
                ->waitForLocation('/login')
                ->assertSee('Login')
                ->type('user_email', 'admin@mail.com')
                ->type('user_password', '')
                ->press('Login')
                ->visit('http://127.0.0.1:8001/drugs/classes')
                ->assertSee('Login');
        });
    }

    public function test_fail_create_classification()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8001/login')
                ->waitForLocation('/login')
                ->assertSee('Login')
                ->type('user_email', 'admin@mail.com')
                ->type('user_password', '')
                ->press('Login')
                ->visit('http://127.0.0.1:8001/drugs/classes')
                ->assertSee('Login');
        });
    }


    public function test_fail_edit_classification()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8001/login')
                ->waitForLocation('/login')
                ->assertSee('Login')
                ->type('user_email', 'admin@mail.com')
                ->type('user_password', '')
                ->press('Login')
                ->visit('http://127.0.0.1:8001/drugs/classes')
                ->assertSee('Login');
        });
    }

    public function test_fail_delete_classification()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8001/login')
                ->waitForLocation('/login')
                ->assertSee('Login')
                ->type('user_email', 'admin@mail.com')
                ->type('user_password', '')
                ->press('Login')
                ->visit('http://127.0.0.1:8001/drugs/classes')
                ->assertSee('Login');
        });
    }


    public function test_drug_classification_views()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8001/login')
                ->waitForLocation('/login')
                ->assertSee('Login')
                ->type('user_email', 'admin@mail.com')
                ->type('user_password', 'admin123')
                ->press('Login')
                ->visit('http://127.0.0.1:8001/drugs/classes')
                ->assertSee('Manajemen Klasifikasi Obat');
        });
    }

    public function test_create_drug_classification()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8001/drugs/classes')
                ->click('.medicine-add-btn')
                ->waitForLocation('/drugs/class/create-form')
                ->assertPathIs('/drugs/class/create-form')
                ->assertSee('Formulir Pembuatan Klasifikasi Obat')
                ->type('class_name', 'Cough & Cold Preparations')
                ->type('class_desc', 'Cough and cold preparations are a class of medications used to alleviate symptoms associated with the common cold, influenza, and other respiratory tract infections. These preparations can be available in various forms, including tablets, capsules, syrups, lozenges, nasal sprays, and inhalants.')
                ->press('submit')
                ->waitForLocation('/drugs/class/create-form')
                ->assertSee('Berhasil Dibuat');
        });
    }

    public function test_drug_classification_detail()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8001/drugs/classes')
                ->click('.detail-button:first-child')
                ->assertSee('Nama Klasifikasi Obat');
        });
    }

    public function test_update_drug_class()
    {
        $drug_classes = DrugClass::first();

        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8001/drugs/classes')
                ->click('.update-button.btn-success')
                ->assertSee('Formulir Perubahan Data Klasifikasi Obat')
                ->type('class_desc', 'change the a description')
                ->press('Edit')
                ->assertSee('Berhasil Di Update');
        });
    }

    public function test_delete_drug_class()
    {
        $this->browse(function (Browser $browser) {

            $browser->visit('http://127.0.0.1:8001/drugs/classes')
                ->waitForLocation('/drugs/classes')
                ->whenAvailable('.table.table-striped', function ($table) {
                    $table->within('tbody tr:nth-of-type(1)', function ($row) {
                        $row->press('Hapus');
                    });
                });
        });
    }
}
