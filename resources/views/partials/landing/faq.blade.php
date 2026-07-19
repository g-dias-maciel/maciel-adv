{{-- FAQ Section --}}
<section id="faq" class="py-16 sm:py-20 lg:py-24 px-4 sm:px-6">
    <div class="max-w-6xl mx-auto">
        {{-- Section header --}}
        <div class="text-center mb-12">
            <span class="text-amber-300/70 font-serif text-xs tracking-[0.2em] uppercase">Dúvidas</span>
            <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-bold text-white mt-4">
                Perguntas <span class="font-serif italic text-amber-300">Frequentes</span>
            </h2>
            <p class="text-blue-200/50 mt-4 max-w-lg mx-auto font-light">
                Tire suas principais dúvidas sobre divórcio consensual para brasileiros no exterior.
            </p>
        </div>

        {{-- FAQ accordion --}}
        <div x-data="{ openFaq: null }" class="max-w-3xl mx-auto space-y-3">
            @php
                $faqs = [
                    [
                        'question' => 'Posso me divorciar no Brasil mesmo morando no exterior?',
                        'answer' => 'Sim. A legislação brasileira permite que brasileiros residentes no exterior ingressem com ação de divórcio no Brasil. Você não precisa voltar ao país para dar entrada no processo — tudo pode ser feito digitalmente com procuração eletrônica.',
                    ],
                    [
                        'question' => 'Preciso voltar ao Brasil para dar entrada no divórcio?',
                        'answer' => 'Não. Todo o processo pode ser conduzido de forma remota. Você assina digitalmente os documentos necessários e nossa equipe cuida de todo o trâmite junto ao cartório ou varas de família brasileiras.',
                    ],
                    [
                        'question' => 'Quanto tempo leva um divórcio consensual?',
                        'answer' => 'Um divórcio consensual sem filhos menores ou bens complexos pode ser concluído em poucas semanas. Quando há partilha de bens ou filhos menores, o prazo pode se estender um pouco, mas ainda assim é significativamente mais rápido que um divórcio litigioso.',
                    ],
                    [
                        'question' => 'E se meu cônjuge não concordar com o divórcio?',
                        'answer' => 'Nesse caso, infelizmente seu caso pode não se encaixar no nosso serviço de divórcio consensual. Mas ainda podemos ajudar com orientação sobre os próximos passos e encaminhamento para um profissional especializado em divórcios litigiosos.',
                    ],
                    [
                        'question' => 'Quais documentos são necessários para começar?',
                        'answer' => 'Os documentos básicos incluem: certidão de casamento brasileira (ou estrangeira com tradução juramentada), documentos de identidade (RG ou passaporte), e documentos dos bens a partilhar (se houver). Após o quiz, nossa equipe fará uma análise personalizada e informará exatamente o que é necessário para o seu caso.',
                    ],
                    [
                        'question' => 'Quanto custa o divórcio consensual?',
                        'answer' => 'O valor varia conforme a complexidade do caso (existência de bens, filhos menores, etc.). Após responder ao quiz e nossa análise gratuita, apresentaremos um orçamento claro e sem surpresas. Trabalhamos com transparência total desde o primeiro contato.',
                    ],
                ];
            @endphp

            @foreach ($faqs as $index => $faq)
                <div
                    x-data="{ isOpen: false }"
                    class="bg-white/[0.02] border border-white/[0.04] rounded-xl overflow-hidden transition-all duration-300 hover:border-white/[0.10]"
                >
                    <button
                        @click="isOpen = !isOpen; if (isOpen) openFaq = {{ $index }};"
                        class="w-full flex items-center justify-between p-5 text-left gap-4"
                        :class="{ 'pb-3': isOpen }"
                    >
                        <span class="text-white font-medium text-sm sm:text-base leading-relaxed pr-4">{{ $faq['question'] }}</span>
                        <svg
                            class="w-5 h-5 text-amber-300 shrink-0 transition-transform duration-300"
                            :class="{ 'rotate-180': isOpen }"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                    <div
                        x-show="isOpen"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 -translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 -translate-y-2"
                        class="px-5 pb-5"
                    >
                        <p class="text-sm text-blue-200/50 leading-relaxed font-light">{{ $faq['answer'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
