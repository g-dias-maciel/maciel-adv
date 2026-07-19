<?php

namespace Tests\Feature;

use App\Livewire\QuizQualifier;
use Livewire\Livewire;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class QuizQualifierTest extends TestCase
{
    #[Test]
    public function initial_state_is_at_landing_page(): void
    {
        Livewire::test(QuizQualifier::class)
            ->assertSet('step', 0)
            ->assertSet('answers', []);
    }

    #[Test]
    public function start_transitions_to_first_question(): void
    {
        Livewire::test(QuizQualifier::class)
            ->call('start')
            ->assertSet('step', 1)
            ->assertSet('answers', []);
    }

    #[Test]
    public function progress_percent_is_zero_on_landing(): void
    {
        Livewire::test(QuizQualifier::class)
            ->assertSet('progressPercent', 0);
    }

    #[Test]
    public function progress_percent_increments_with_step(): void
    {
        Livewire::test(QuizQualifier::class)
            ->call('start')
            ->assertSet('progressPercent', 20)
            ->call('answer', 1, 'sim')
            ->assertSet('progressPercent', 40)
            ->call('answer', 2, 'sim')
            ->assertSet('progressPercent', 60)
            ->call('answer', 3, 'sim')
            ->assertSet('progressPercent', 80)
            ->call('answer', 4, 'consensual')
            ->assertSet('progressPercent', 100);
    }

    #[Test]
    public function progress_percent_caps_at_one_hundred(): void
    {
        Livewire::test(QuizQualifier::class)
            ->call('start')
            ->call('answer', 1, 'nao')
            ->assertSet('progressPercent', 100);
    }

    #[Test]
    public function answering_first_question_moves_to_question_two(): void
    {
        Livewire::test(QuizQualifier::class)
            ->call('start')
            ->call('answer', 1, 'sim')
            ->assertSet('step', 2)
            ->assertSet('answers', [1 => 'sim']);
    }

    #[Test]
    public function answering_all_five_questions_leads_to_result(): void
    {
        Livewire::test(QuizQualifier::class)
            ->call('start')
            ->call('answer', 1, 'sim')
            ->call('answer', 2, 'sim')
            ->call('answer', 3, 'sim')
            ->call('answer', 4, 'consensual')
            ->call('answer', 5, 'nenhum')
            ->assertSet('step', 6);
    }

    #[Test]
    public function full_happy_flow_answers_are_recorded(): void
    {
        Livewire::test(QuizQualifier::class)
            ->call('start')
            ->call('answer', 1, 'sim')
            ->call('answer', 2, 'exterior')
            ->call('answer', 3, 'sim')
            ->call('answer', 4, 'consensual')
            ->call('answer', 5, 'bens')
            ->assertSet('answers', [
                1 => 'sim',
                2 => 'exterior',
                3 => 'sim',
                4 => 'consensual',
                5 => 'bens',
            ]);
    }

    #[Test]
    public function not_brazilian_disqualifies(): void
    {
        Livewire::test(QuizQualifier::class)
            ->call('start')
            ->call('answer', 1, 'nao')
            ->assertSet('step', 6)
            ->assertSet('answers', [1 => 'nao']);
    }

    #[Test]
    public function not_brazilian_returns_is_qualified_false(): void
    {
        Livewire::test(QuizQualifier::class)
            ->call('start')
            ->call('answer', 1, 'nao')
            ->assertSet('isQualified', false);
    }

    #[Test]
    public function litigious_divorce_disqualifies(): void
    {
        Livewire::test(QuizQualifier::class)
            ->call('start')
            ->call('answer', 1, 'sim')
            ->call('answer', 2, 'sim')
            ->call('answer', 3, 'sim')
            ->call('answer', 4, 'litigioso')
            ->assertSet('step', 6);
    }

    #[Test]
    public function litigious_divorce_returns_is_qualified_false(): void
    {
        Livewire::test(QuizQualifier::class)
            ->call('start')
            ->call('answer', 1, 'sim')
            ->call('answer', 2, 'sim')
            ->call('answer', 3, 'sim')
            ->call('answer', 4, 'litigioso')
            ->assertSet('isQualified', false);
    }

    #[Test]
    public function unsure_divorce_triggers_lead_capture(): void
    {
        Livewire::test(QuizQualifier::class)
            ->call('start')
            ->call('answer', 1, 'sim')
            ->call('answer', 2, 'sim')
            ->call('answer', 3, 'sim')
            ->call('answer', 4, 'duvida')
            ->assertSet('step', 6);
    }

    #[Test]
    public function unsure_divorce_returns_is_qualified_true(): void
    {
        Livewire::test(QuizQualifier::class)
            ->call('start')
            ->call('answer', 1, 'sim')
            ->call('answer', 2, 'sim')
            ->call('answer', 3, 'sim')
            ->call('answer', 4, 'duvida')
            ->assertSet('isQualified', true);
    }

    #[Test]
    public function is_qualified_is_null_before_finishing(): void
    {
        Livewire::test(QuizQualifier::class)
            ->call('start')
            ->assertSet('isQualified', null);
    }

    #[Test]
    public function qualified_result_returns_is_qualified_true(): void
    {
        Livewire::test(QuizQualifier::class)
            ->call('start')
            ->call('answer', 1, 'sim')
            ->call('answer', 2, 'sim')
            ->call('answer', 3, 'sim')
            ->call('answer', 4, 'consensual')
            ->call('answer', 5, 'nenhum')
            ->assertSet('isQualified', true);
    }

    #[Test]
    public function back_returns_to_previous_question(): void
    {
        Livewire::test(QuizQualifier::class)
            ->call('start')
            ->call('answer', 1, 'sim')
            ->assertSet('step', 2)
            ->call('back')
            ->assertSet('step', 1);
    }

    #[Test]
    public function back_removes_answer_for_last_question(): void
    {
        Livewire::test(QuizQualifier::class)
            ->call('start')
            ->call('answer', 1, 'sim')
            ->call('answer', 2, 'sim')
            ->call('back')
            ->assertSet('answers', [1 => 'sim']);
    }

    #[Test]
    public function back_does_nothing_on_first_question(): void
    {
        Livewire::test(QuizQualifier::class)
            ->call('start')
            ->call('back')
            ->assertSet('step', 1);
    }

    #[Test]
    public function restart_resets_to_landing_page(): void
    {
        Livewire::test(QuizQualifier::class)
            ->call('start')
            ->call('answer', 1, 'sim')
            ->call('answer', 2, 'sim')
            ->call('answer', 3, 'sim')
            ->call('answer', 4, 'consensual')
            ->call('answer', 5, 'nenhum')
            ->call('restart')
            ->assertSet('step', 0)
            ->assertSet('answers', []);
    }

    #[Test]
    public function result_page_shows_lead_capture_when_qualified(): void
    {
        Livewire::test(QuizQualifier::class)
            ->call('start')
            ->call('answer', 1, 'sim')
            ->call('answer', 2, 'sim')
            ->call('answer', 3, 'sim')
            ->call('answer', 4, 'consensual')
            ->call('answer', 5, 'nenhum')
            ->assertSeeHtml('wire:submit.prevent="submit"');
    }

    #[Test]
    public function result_page_shows_lead_capture_when_disqualified(): void
    {
        Livewire::test(QuizQualifier::class)
            ->call('start')
            ->call('answer', 1, 'nao')
            ->assertSeeHtml('wire:submit.prevent="submit"');
    }

    #[Test]
    public function questions_array_has_all_five_questions(): void
    {
        Livewire::test(QuizQualifier::class)
            ->assertSet('questions', function (array $questions) {
                return count($questions) === 5;
            });
    }

    #[Test]
    public function first_question_is_about_nationality(): void
    {
        Livewire::test(QuizQualifier::class)
            ->assertSet('questions', function (array $questions) {
                return str_contains($questions[1]['pergunta'], 'brasileiro');
            });
    }

    #[Test]
    public function every_question_has_at_least_two_options(): void
    {
        Livewire::test(QuizQualifier::class)
            ->assertSet('questions', function (array $questions) {
                foreach ($questions as $q) {
                    if (count($q['opcoes']) < 2) {
                        return false;
                    }
                }
                return true;
            });
    }

    #[Test]
    public function http_get_returns_successful_response(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    #[Test]
    public function http_get_contains_livewire_component(): void
    {
        $response = $this->get('/');
        $response->assertSee('wire:snapshot');
    }

    // =============================================
    // Landing Page Conversion Tests
    // =============================================

    #[Test]
    public function landing_page_renders_hero_section(): void
    {
        Livewire::test(QuizQualifier::class)
            ->assertSet('step', 0)
            ->assertSee('Descubra se você')
            ->assertSee('divórcio');
    }

    #[Test]
    public function landing_page_renders_diferenciais_section(): void
    {
        Livewire::test(QuizQualifier::class)
            ->assertSet('step', 0)
            ->assertSee('Diferenciais')
            ->assertSee('Atendimento')
            ->assertSee('Online');
    }

    #[Test]
    public function landing_page_renders_como_funciona_section(): void
    {
        Livewire::test(QuizQualifier::class)
            ->assertSet('step', 0)
            ->assertSee('Como Funciona')
            ->assertSee('Quiz')
            ->assertSee('Análise')
            ->assertSee('Orientação');
    }

    #[Test]
    public function landing_page_renders_faq_section(): void
    {
        Livewire::test(QuizQualifier::class)
            ->assertSet('step', 0)
            ->assertSee('Dúvidas')
            ->assertSee('Frequentes');
    }

    #[Test]
    public function landing_page_renders_footer_cta(): void
    {
        Livewire::test(QuizQualifier::class)
            ->assertSet('step', 0)
            ->assertSee('Pronto')
            ->assertSee('resolver')
            ->assertSee('Quiz Gratuito');
    }

    #[Test]
    public function landing_page_renders_footer_disclaimer(): void
    {
        Livewire::test(QuizQualifier::class)
            ->assertSet('step', 0)
            ->assertSee('©')
            ->assertSee('Maciel');
    }

    #[Test]
    public function hero_cta_triggers_start(): void
    {
        Livewire::test(QuizQualifier::class)
            ->assertSet('step', 0)
            ->assertSeeHtml('wire:click="start"')
            ->call('start')
            ->assertSet('step', 1);
    }

    #[Test]
    public function footer_cta_triggers_start(): void
    {
        Livewire::test(QuizQualifier::class)
            ->assertSet('step', 0)
            ->assertSeeHtml('Iniciar Quiz Gratuito')
            ->call('start')
            ->assertSet('step', 1);
    }

    #[Test]
    public function faq_has_alpine_accordion_markup(): void
    {
        Livewire::test(QuizQualifier::class)
            ->assertSet('step', 0)
            ->assertSee('x-data')
            ->assertSee('x-show')
            ->assertSee('@click');
    }

    #[Test]
    public function landing_page_uses_amber_accent_colors(): void
    {
        Livewire::test(QuizQualifier::class)
            ->assertSet('step', 0)
            ->assertSee('amber');
    }

    #[Test]
    public function landing_page_has_trust_badge(): void
    {
        Livewire::test(QuizQualifier::class)
            ->assertSet('step', 0)
            ->assertSee('OAB');
    }

    #[Test]
    public function landing_page_has_quem_somos_section(): void
    {
        Livewire::test(QuizQualifier::class)
            ->assertSet('step', 0)
            ->assertSee('Quem')
            ->assertSee('Somos')
            ->assertSee('advocacia')
            ->assertSee('brasileiro');
    }
}
