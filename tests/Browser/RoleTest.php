<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

use App\Models\Role;

class RoleTest extends DuskTestCase
{

    public function test_fail_role_views()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8001/login')
                ->waitForLocation('/login')
                ->assertSee('Login')
                ->type('user_email', 'admin@mail.com')
                ->type('user_password', '')
                ->press('Login')
                ->visit('http://127.0.0.1:8001/roles')
                ->assertSee('Login');
        });
    }

    public function test_fail_create_role_views()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8001/login')
                ->waitForLocation('/login')
                ->assertSee('Login')
                ->type('user_email', 'admin@mail.com')
                ->type('user_password', '')
                ->press('Login')
                ->visit('http://127.0.0.1:8001/roles')
                ->assertSee('Login');
        });
    }


    public function test_fail_edit_role_views()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8001/login')
                ->waitForLocation('/login')
                ->assertSee('Login')
                ->type('user_email', 'admin@mail.com')
                ->type('user_password', '')
                ->press('Login')
                ->visit('http://127.0.0.1:8001/roles')
                ->assertSee('Login');
        });
    }

    public function test_fail_delete_role_views()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8001/login')
                ->waitForLocation('/login')
                ->assertSee('Login')
                ->type('user_email', 'admin@mail.com')
                ->type('user_password', '')
                ->press('Login')
                ->visit('http://127.0.0.1:8001/roles')
                ->assertSee('Login');
        });
    }

    public function test_role_views()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8001/login')
                ->waitForLocation('/login')
                ->assertSee('Login')
                ->type('user_email', 'admin@mail.com')
                ->type('user_password', 'admin123')
                ->press('Login')
                ->visit('http://127.0.0.1:8001/roles');
        });
    }

    public function test_detail_role_views()
    {
        $this->browse(function (Browser $browser) {

            $first_record = Role::first();

            $browser->visit('http://127.0.0.1:8001/roles')
                ->click('.detail-button:first-child')
                ->waitForLocation('/roles/' . $first_record->role_id . '/details')
                ->assertSee('Nama Role')
                ->assertSee('Deskripsi Role');
        });
    }

    public function test_create_role()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8001/roles')
                ->waitForLocation('/roles')
                ->click('.create-role')
                ->waitForLocation('/create-roles-form')
                ->assertPathIs('/create-roles-form')
                ->assertSee('Formulir Pembuatan Role Baru')
                ->type('role_name', 'apoteker')
                ->type('role_desc', 'apoteker')
                ->click('.submit-button')
                ->assertSee('Berhasil Dibuat');
        });
    }

    public function test_update_role()
    {
        $this->browse(function (Browser $browser) {


            $browser->visit('http://127.0.0.1:8001/roles')
                ->waitForLocation('/roles')
                ->click('.update-button.btn-success')
                ->assertSee('Formulir Perubahan Data Role')
                ->type('role_desc', 'unknown changed value')
                ->press('Edit')
                ->assertSee('Berhasil Di Update');
        });
    }

    public function test_delete_role()
    {
        $this->browse(function (Browser $browser) {

            $browser->visit('http://127.0.0.1:8001/roles')
                ->waitForLocation('/roles')
                ->whenAvailable('.table.table-striped', function ($table) {
                    $table->within('tbody tr:nth-of-type(2)', function ($row) {
                        $row->press('Hapus');
                    });
                });
        });
    }
}
