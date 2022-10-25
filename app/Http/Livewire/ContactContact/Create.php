<?php

namespace App\Http\Livewire\ContactContact;

use App\Models\ContactContact;
use Livewire\Component;

class Create extends Component
{
    public ContactContact $contactContact;

    public function mount(ContactContact $contactContact)
    {
        $this->contactContact = $contactContact;
    }

    public function render()
    {
        return view('livewire.contact-contact.create');
    }

    public function submit()
    {
        $this->validate();

        $this->contactContact->save();

        return redirect()->route('admin.contact-contacts.index');
    }

    protected function rules(): array
    {
        return [
            'contactContact.contact_first_name' => [
                'string',
                'nullable',
            ],
            'contactContact.contact_last_name' => [
                'string',
                'nullable',
            ],
            'contactContact.contact_phone_1' => [
                'string',
                'nullable',
            ],
            'contactContact.contact_phone_2' => [
                'string',
                'nullable',
            ],
            'contactContact.contact_email' => [
                'string',
                'nullable',
            ],
            'contactContact.contact_address' => [
                'string',
                'nullable',
            ],
        ];
    }
}
