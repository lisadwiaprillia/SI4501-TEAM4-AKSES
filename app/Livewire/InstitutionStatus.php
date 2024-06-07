<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Institution;

class InstitutionStatus extends Component
{
    public $search = 'Diterima';

    public function render()
    {
        $institutions = Institution::where('institution_status', $this->search)->get();
        return view('livewire.institution-status', ['institutions' => $institutions]);
    }
}
