<?php

namespace App\Livewire;

use Livewire\Component;

class LeadCapture extends Component
{
    public string $name = '';

    public string $email = '';

    public string $phone = '';

    public string $country = '';

    public bool $success = false;

    protected array $rules = [
        'name'    => 'required|min:3|max:255',
        'email'   => 'required|email|max:255',
        'phone'   => 'required|max:20',
        'country' => 'required|max:100',
    ];

    protected array $messages = [
        'name.required'    => 'Informe seu nome.',
        'name.min'         => 'Nome deve ter pelo menos 3 caracteres.',
        'email.required'   => 'Informe seu e-mail.',
        'email.email'      => 'Informe um e-mail válido.',
        'phone.required'   => 'Informe seu telefone (com DDI).',
        'country.required' => 'Informe o país onde você reside.',
    ];

    public function submit(): void
    {
        $this->validate();

        // TODO: Fase 2 — salvar no banco de dados e disparar LeadQualifiedEvent
        // Exemplo:
        // $lead = Lead::create([...]);
        // LeadQualifiedEvent::dispatch($lead);

        $this->success = true;
    }

    public function render()
    {
        return view('livewire.lead-capture');
    }
}
