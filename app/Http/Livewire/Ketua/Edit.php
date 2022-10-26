<?php

namespace App\Http\Livewire\Ketua;

use App\Models\ContactContact;
use App\Models\Ketua;
use Livewire\Component;

class Edit extends Component
{
    public Ketua $ketua;

    public array $listsForFields = [];

    public function mount(Ketua $ketua)
    {
        $this->ketua = $ketua;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.ketua.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->ketua->save();

        return redirect()->route('admin.ketuas.index');
    }

    protected function rules(): array
    {
        return [
            'ketua.ketua_id' => [
                'integer',
                'exists:contact_contacts,id',
                'nullable',
            ],
            'ketua.name' => [
                'string',
                'nullable',
            ],
            'ketua.periode' => [
                'string',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['ketua'] = ContactContact::pluck('contact_first_name', 'id')->toArray();
    }
}
