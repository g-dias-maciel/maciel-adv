<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app')]

class QuizQualifier extends Component
{
    public int $step = 0;

    public array $answers = [];

    public array $questions = [
        1 => [
            'id'       => 1,
            'pergunta' => 'Você é brasileiro(a) ou possui ascendência brasileira?',
            'opcoes'   => [
                'sim' => 'Sim, sou brasileiro(a)',
                'nao' => 'Não',
            ],
        ],
        2 => [
            'id'       => 2,
            'pergunta' => 'Você se casou no Brasil (cartório ou religioso com efeito civil)?',
            'opcoes'   => [
                'sim'      => 'Sim, casei no Brasil',
                'exterior' => 'Casei no exterior',
                'nao'      => 'Não sou/não fui casado(a)',
            ],
        ],
        3 => [
            'id'       => 3,
            'pergunta' => 'Você reside atualmente fora do Brasil?',
            'opcoes'   => [
                'sim' => 'Sim, moro fora',
                'nao' => 'Não, moro no Brasil',
            ],
        ],
        4 => [
            'id'       => 4,
            'pergunta' => 'Sobre o divórcio, como está a situação?',
            'opcoes'   => [
                'consensual' => 'É consensual (ambos concordam)',
                'litigioso'  => 'É litigioso (não há acordo)',
                'duvida'     => 'Ainda não sei / Tenho dúvidas',
            ],
        ],
        5 => [
            'id'       => 5,
            'pergunta' => 'Vocês têm filhos menores de idade ou bens a partilhar no Brasil?',
            'opcoes'   => [
                'sim'      => 'Sim, filhos e/ou bens',
                'bens'     => 'Apenas bens',
                'nenhum'   => 'Não temos filhos nem bens no Brasil',
            ],
        ],
    ];

    public function start(): void
    {
        $this->step = 1;
        $this->answers = [];
    }

    public function answer(int $questionId, string $value): void
    {
        $this->answers[$questionId] = $value;

        if ($questionId === 1 && $value === 'nao') {
            $this->step = 6; // desqualificado
            return;
        }

        if ($questionId === 4 && $value === 'litigioso') {
            $this->step = 6; // desqualificado
            return;
        }

        if ($questionId === 4 && $value === 'duvida') {
            $this->step = 6; // qualificado com dúvida — vamos capturar lead
            return;
        }

        if (isset($this->questions[$questionId + 1])) {
            $this->step = $questionId + 1;
        } else {
            $this->step = 6; // finalizou
        }
    }

    public function back(): void
    {
        if ($this->step > 1) {
            $prevStep = $this->step - 1;
            unset($this->answers[$prevStep]);
            $this->step = $prevStep;
        }
    }

    public function restart(): void
    {
        $this->step = 0;
        $this->answers = [];
    }

    public function getIsQualifiedProperty(): ?bool
    {
        if ($this->step !== 6) {
            return null;
        }

        $q1 = $this->answers[1] ?? null;
        $q4 = $this->answers[4] ?? null;

        if ($q1 === 'nao' || $q4 === 'litigioso') {
            return false;
        }

        return true;
    }

    public function getProgressPercentProperty(): int
    {
        $total = count($this->questions);
        $current = min($this->step, $total);
        return (int) round(($current / $total) * 100);
    }

    public function render()
    {
        $currentQuestion = $this->questions[$this->step] ?? null;

        return view('livewire.quiz-qualifier', [
            'currentQuestion' => $currentQuestion,
            'progressPercent' => $this->progressPercent,
            'isQualified'     => $this->isQualified,
        ]);
    }
}
