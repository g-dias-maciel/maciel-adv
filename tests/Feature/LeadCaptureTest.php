<?php

namespace Tests\Feature;

use App\Livewire\LeadCapture;
use Livewire\Livewire;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class LeadCaptureTest extends TestCase
{
    #[Test]
    public function initial_state_has_empty_fields(): void
    {
        Livewire::test(LeadCapture::class)
            ->assertSet('name', '')
            ->assertSet('email', '')
            ->assertSet('phone', '')
            ->assertSet('country', '')
            ->assertSet('success', false);
    }

    #[Test]
    public function submit_with_empty_fields_fails_validation(): void
    {
        Livewire::test(LeadCapture::class)
            ->call('submit')
            ->assertHasErrors([
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'country' => 'required',
            ]);
    }

    #[Test]
    public function submit_with_invalid_email_fails_validation(): void
    {
        Livewire::test(LeadCapture::class)
            ->set('name', 'João Silva')
            ->set('email', 'email-invalido')
            ->set('phone', '+55 11 99999-9999')
            ->set('country', 'Estados Unidos')
            ->call('submit')
            ->assertHasErrors(['email' => 'email']);
    }

    #[Test]
    public function submit_with_name_too_short_fails_validation(): void
    {
        Livewire::test(LeadCapture::class)
            ->set('name', 'Jo')
            ->set('email', 'joao@email.com')
            ->set('phone', '+55 11 99999-9999')
            ->set('country', 'Estados Unidos')
            ->call('submit')
            ->assertHasErrors(['name' => 'min']);
    }

    #[Test]
    public function submit_with_valid_data_sets_success(): void
    {
        Livewire::test(LeadCapture::class)
            ->set('name', 'João Silva')
            ->set('email', 'joao@email.com')
            ->set('phone', '+55 11 99999-9999')
            ->set('country', 'Estados Unidos')
            ->call('submit')
            ->assertHasNoErrors()
            ->assertSet('success', true);
    }

    #[Test]
    public function submit_preserves_submitted_data(): void
    {
        Livewire::test(LeadCapture::class)
            ->set('name', 'Maria Oliveira')
            ->set('email', 'maria@exemplo.com')
            ->set('phone', '+1 555 123-4567')
            ->set('country', 'Canadá')
            ->call('submit')
            ->assertSet('name', 'Maria Oliveira')
            ->assertSet('email', 'maria@exemplo.com')
            ->assertSet('phone', '+1 555 123-4567')
            ->assertSet('country', 'Canadá');
    }

    #[Test]
    public function multiple_submissions_do_not_reset_success_state(): void
    {
        Livewire::test(LeadCapture::class)
            ->set('name', 'João Silva')
            ->set('email', 'joao@email.com')
            ->set('phone', '+55 11 99999-9999')
            ->set('country', 'Portugal')
            ->call('submit')
            ->assertSet('success', true);
    }

    #[Test]
    public function rendering_shows_form_when_not_submitted(): void
    {
        Livewire::test(LeadCapture::class)
            ->assertSeeHtml('Enviar')
            ->assertDontSeeHtml('Recebemos seus dados');
    }

    #[Test]
    public function rendering_shows_success_message_after_submit(): void
    {
        Livewire::test(LeadCapture::class)
            ->set('name', 'João Silva')
            ->set('email', 'joao@email.com')
            ->set('phone', '+55 11 99999-9999')
            ->set('country', 'Espanha')
            ->call('submit')
            ->assertSee('Recebemos seus dados')
            ->assertDontSeeHtml('wire:submit.prevent=');
    }

    #[Test]
    public function validation_messages_are_in_portuguese(): void
    {
        Livewire::test(LeadCapture::class)
            ->call('submit')
            ->assertSee('Informe seu nome.')
            ->assertSee('Informe seu e-mail.')
            ->assertSee('Informe seu telefone')
            ->assertSee('Informe o país');
    }
}
