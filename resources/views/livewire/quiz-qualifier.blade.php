<div class="bg-gradient-to-b from-[#060b17] via-[#0a1124] to-[#060b17] bg-grain relative">
    {{-- Step 0: Full Landing Page --}}
    @if ($step === 0)
        @include('partials.landing.nav')
        @include('partials.landing.hero')
        @include('partials.landing.diferenciais')
        @include('partials.landing.como-funciona')
        @include('partials.landing.quem-somos')
        @include('partials.landing.faq')
        @include('partials.landing.footer-cta')
        @include('partials.landing.footer')

    {{-- Steps 1-5: Questions --}}
    @elseif ($step >= 1 && $step <= 5 && $currentQuestion)
        <div class="min-h-screen flex items-center justify-center p-4 sm:p-6">
            <div class="w-full max-w-2xl mx-auto">
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl shadow-2xl border border-white/20 p-8 sm:p-10">
                {{-- Progress bar --}}
                <div class="mb-6">
                    <div class="flex justify-between text-sm text-blue-200/70 mb-2">
                        <span>Pergunta {{ $step }} de {{ count($questions) }}</span>
                        <span>{{ $progressPercent }}%</span>
                    </div>
                    <div class="w-full bg-white/10 rounded-full h-2.5 overflow-hidden">
                        <div
                            class="h-full bg-gradient-to-r from-blue-400 to-blue-500 rounded-full transition-all duration-500 ease-out"
                            style="width: {{ $progressPercent }}%"
                        ></div>
                    </div>
                </div>

                {{-- Back button --}}
                @if ($step > 1)
                    <button
                        wire:click="back"
                        class="flex items-center gap-1 text-blue-300/70 hover:text-blue-200 transition-colors mb-6 text-sm"
                    >
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        Voltar
                    </button>
                @endif

                {{-- Question --}}
                <h2 class="text-xl sm:text-2xl font-semibold text-white mb-8">
                    {{ $currentQuestion['pergunta'] }}
                </h2>

                {{-- Options --}}
                <div class="space-y-3">
                    @foreach ($currentQuestion['opcoes'] as $value => $label)
                        <button
                            wire:click="answer({{ $currentQuestion['id'] }}, '{{ $value }}')"
                            class="w-full text-left p-4 sm:p-5 rounded-xl border border-white/20 bg-white/5 hover:bg-white/15 hover:border-blue-400/50 text-white transition-all duration-200 group flex items-center justify-between"
                        >
                            <span class="font-medium">{{ $label }}</span>
                            <svg class="w-5 h-5 text-blue-400/50 group-hover:text-blue-300 transition-colors shrink-0 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- Step 6: Result --}}
    @elseif ($step === 6)
        <div class="min-h-screen flex items-center justify-center p-4 sm:p-6">
            <div class="w-full max-w-2xl mx-auto">
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl shadow-2xl border border-white/20 p-8 sm:p-12 text-center">
                @if ($isQualified === true)
                    {{-- Qualified --}}
                    <div class="w-20 h-20 mx-auto mb-6 rounded-full bg-green-500/20 flex items-center justify-center">
                        <svg class="w-10 h-10 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h2 class="text-2xl sm:text-3xl font-bold text-white mb-4">
                        Seu caso tem potencial! 🎉
                    </h2>
                    <p class="text-blue-200/80 mb-8 max-w-md mx-auto">
                        Com base nas suas respostas, seu caso se encaixa nos nossos serviços
                        de divórcio consensual e homologação de sentenças. Deixe seus dados
                        para que nossa equipe entre em contato.
                    </p>

                    {{-- Lead capture form --}}
                    <livewire:lead-capture />

                @elseif ($isQualified === false)
                    {{-- Not qualified --}}
                    <div class="w-20 h-20 mx-auto mb-6 rounded-full bg-amber-500/20 flex items-center justify-center">
                        <svg class="w-10 h-10 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                        </svg>
                    </div>
                    <h2 class="text-2xl sm:text-3xl font-bold text-white mb-4">
                        Seu caso merece uma análise personalizada
                    </h2>
                    <p class="text-blue-200/80 mb-6 max-w-md mx-auto">
                        Seu caso pode não se encaixar exatamente no perfil do nosso quiz,
                        mas isso não significa que não possamos ajudar. Entre em contato
                        para uma avaliação gratuita.
                    </p>
                    <p class="text-gray-400 text-sm mb-8">
                        De todo modo, convidamos você a falar conosco. Teremos prazer em orientar.
                    </p>

                    <livewire:lead-capture />

                @endif

                {{-- Restart --}}
                <button
                    wire:click="restart"
                    class="mt-6 text-blue-300/60 hover:text-blue-200 transition-colors text-sm underline underline-offset-2"
                >
                    Refazer o quiz
                </button>
            </div>
        </div>
    </div>
    @endif
</div>
