<?php

namespace App\Http\Livewire;

use App\Models\Organization;
use Livewire\Component;

class AddOrganizationComponent extends Component
{
    public $organization_name,
        $organization_full_name,
        $organization_period;

    protected $rules = [
        'organization_name' => 'required|min:2',
        'organization_full_name' => 'nullable|min:3',
        'organization_period' => 'required|numeric',
    ];

    public function submit()
    {
        $this->validate();

        try {
            $data = new Organization();
            $data->organization_name = $this->organization_name;
            $data->organization_full_name = $this->organization_full_name;
            $data->organization_period = $this->organization_period;

            $data->save();
        } catch (\Throwable $e) {
            $this->addError('savingError', $e->getMessage());
        }

        $this->dispatchBrowserEvent('user-saved');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.add-organization-component');
    }
}
