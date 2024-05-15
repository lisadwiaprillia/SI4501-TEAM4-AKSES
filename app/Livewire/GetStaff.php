<?php

namespace App\Livewire;
use App\Models\User;
use Livewire\Component;

class GetStaff extends Component
{
    public $search = 'diterima';
    public function render()
    {
        $staff = User::where('user_status', $this->search)->get();
        // dd($staff);
        return view('livewire.get-staff' , ['staff' => $staff]);
    }
}
