{{-- Como Funciona Section --}}
<section id="como-funciona" class="py-16 sm:py-20 lg:py-24 px-4 sm:px-6 relative">
    {{-- Subtle background separator --}}
    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-white/[0.02] to-transparent pointer-events-none"></div>

    <div class="max-w-6xl mx-auto relative">
        {{-- Section header --}}
        <div class="text-center mb-12 sm:mb-16">
            <span class="text-amber-300/70 font-serif text-xs tracking-[0.2em] uppercase">Passo a passo</span>
            <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-bold text-white mt-4">
                Como <span class="font-serif italic text-amber-300">Funciona</span>
            </h2>
            <p class="text-blue-200/50 mt-4 max-w-lg mx-auto font-light">
                Quatro passos simples para resolver seu divórcio sem sair de casa.
            </p>
        </div>

        {{-- Steps --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-6">
            {{-- Step 1 --}}
            <div class="relative flex flex-col items-center text-center group">
                {{-- Step number --}}
                <div class="w-[4.5rem] h-[4.5rem] rounded-2xl bg-gradient-to-b from-amber-400 to-amber-500 flex items-center justify-center mb-6 shadow-lg shadow-amber-400/10 group-hover:scale-105 transition-transform duration-500">
                    <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.455 2.456L21.75 6l-1.036.259a3.375 3.375 0 00-2.455 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z" />
                    </svg>
                </div>
                <span class="text-amber-300/80 font-serif text-xs tracking-[0.2em] uppercase mb-3">Passo 1</span>
                <h3 class="font-serif text-lg font-semibold text-white mb-2">Responda ao Quiz</h3>
                <p class="text-sm text-blue-200/50 leading-relaxed max-w-[220px] font-light">
                    5 perguntas rápidas para entendermos o seu caso.
                </p>
                {{-- Connector line (hidden on mobile, visible on lg) --}}
                <div class="hidden lg:block absolute top-[2.25rem] -right-4 w-8 h-px bg-gradient-to-r from-amber-400/30 to-transparent"></div>
            </div>

            {{-- Step 2 --}}
            <div class="relative flex flex-col items-center text-center group">
                <div class="w-[4.5rem] h-[4.5rem] rounded-2xl bg-gradient-to-b from-amber-400 to-amber-500 flex items-center justify-center mb-6 shadow-lg shadow-amber-400/10 group-hover:scale-105 transition-transform duration-500">
                    <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9zm3.75 11.625a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                    </svg>
                </div>
                <span class="text-amber-300/80 font-serif text-xs tracking-[0.2em] uppercase mb-3">Passo 2</span>
                <h3 class="font-serif text-lg font-semibold text-white mb-2">Análise Grátis</h3>
                <p class="text-sm text-blue-200/50 leading-relaxed max-w-[220px] font-light">
                    Nossa equipe avalia seu caso e entra em contato.
                </p>
                <div class="hidden lg:block absolute top-[2.25rem] -right-4 w-8 h-px bg-gradient-to-r from-amber-400/30 to-transparent"></div>
            </div>

            {{-- Step 3 --}}
            <div class="relative flex flex-col items-center text-center group">
                <div class="w-[4.5rem] h-[4.5rem] rounded-2xl bg-gradient-to-b from-amber-400 to-amber-500 flex items-center justify-center mb-6 shadow-lg shadow-amber-400/10 group-hover:scale-105 transition-transform duration-500">
                    <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>
                </div>
                <span class="text-amber-300/80 font-serif text-xs tracking-[0.2em] uppercase mb-3">Passo 3</span>
                <h3 class="font-serif text-lg font-semibold text-white mb-2">Orientação Jurídica</h3>
                <p class="text-sm text-blue-200/50 leading-relaxed max-w-[220px] font-light">
                    Receba orientação personalizada para o seu caso.
                </p>
                <div class="hidden lg:block absolute top-[2.25rem] -right-4 w-8 h-px bg-gradient-to-r from-amber-400/30 to-transparent"></div>
            </div>

            {{-- Step 4 --}}
            <div class="relative flex flex-col items-center text-center group">
                <div class="w-[4.5rem] h-[4.5rem] rounded-2xl bg-gradient-to-b from-amber-400 to-amber-500 flex items-center justify-center mb-6 shadow-lg shadow-amber-400/10 group-hover:scale-105 transition-transform duration-500">
                    <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <span class="text-amber-300/80 font-serif text-xs tracking-[0.2em] uppercase mb-3">Passo 4</span>
                <h3 class="font-serif text-lg font-semibold text-white mb-2">Inicie seu Divórcio</h3>
                <p class="text-sm text-blue-200/50 leading-relaxed max-w-[220px] font-light">
                    Dê entrada no processo e resolva tudo sem sair de casa.
                </p>
            </div>
        </div>

        {{-- Mid-section CTA --}}
        <div class="text-center mt-12">
            <button
                wire:click="start"
                class="inline-flex items-center gap-2 px-6 py-3 bg-amber-400/5 border border-amber-400/15 text-amber-300 rounded-xl hover:bg-amber-400/10 transition-all duration-300 font-medium"
            >
                Começar Quiz →
            </button>
        </div>
    </div>
</section>
