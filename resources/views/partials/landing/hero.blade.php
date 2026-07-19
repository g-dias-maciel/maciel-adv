{{-- Hero Section --}}
<section id="hero" class="min-h-screen flex items-center justify-center pt-20 pb-16 px-4 sm:px-6">
    <div class="max-w-4xl mx-auto text-center">
        {{-- Trust badge --}}
        <div class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-amber-400/5 border border-amber-400/10 text-amber-300/90 text-sm mb-10">
            <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
            </svg>
            <span>Escritório registrado OAB</span>
        </div>

        {{-- Headline --}}
        <h1 class="font-serif text-4xl sm:text-5xl lg:text-display font-bold text-white leading-[1.1] tracking-tight mb-8 max-w-5xl mx-auto">
            Descubra se você pode dar entrada no seu
            <span class="italic text-transparent bg-clip-text bg-gradient-to-r from-amber-300 to-amber-500">divórcio</span>
            sem sair de casa
        </h1>

        {{-- Subheadline --}}
        <p class="text-base sm:text-lg text-blue-200/50 max-w-2xl mx-auto mb-12 leading-relaxed font-light">
            Somos especialistas em divórcio consensual e homologação de sentenças para brasileiros no exterior.
            <span class="text-amber-300/70 font-normal">Responda 5 perguntas e descubra se o seu caso se encaixa.</span>
        </p>

        {{-- Primary CTA --}}
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <button
                wire:click="start"
                class="group inline-flex items-center gap-3 px-10 py-5 bg-gradient-to-b from-amber-500 to-amber-600 hover:from-amber-400 hover:to-amber-500 text-white font-medium rounded-xl shadow-lg shadow-amber-500/10 animate-gold-pulse hover:shadow-amber-400/15 transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] text-lg tracking-wide"
            >
                Iniciar Quiz Gratuito
                <svg class="w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                </svg>
            </button>
        </div>

        {{-- Micro-copy --}}
        <p class="mt-6 text-blue-200/30 text-sm flex items-center justify-center gap-2 font-light">
            <svg class="w-4 h-4 text-blue-200/20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Leva menos de 2 minutos. Sem compromisso.
        </p>

        {{-- Stat row --}}
        <div class="mt-16 pt-12 border-t border-white/[0.04] grid grid-cols-2 md:grid-cols-4 gap-8 max-w-2xl mx-auto">
            <div class="text-center">
                <div class="font-serif text-3xl sm:text-4xl font-bold text-amber-300 tracking-tight">500+</div>
                <div class="text-xs text-blue-200/30 mt-2 tracking-wide uppercase">Casos atendidos</div>
            </div>
            <div class="text-center">
                <div class="font-serif text-3xl sm:text-4xl font-bold text-amber-300 tracking-tight">10+</div>
                <div class="text-xs text-blue-200/30 mt-2 tracking-wide uppercase">Anos de experiência</div>
            </div>
            <div class="text-center">
                <div class="font-serif text-3xl sm:text-4xl font-bold text-amber-300 tracking-tight">30+</div>
                <div class="text-xs text-blue-200/30 mt-2 tracking-wide uppercase">Países atendidos</div>
            </div>
            <div class="text-center">
                <div class="font-serif text-3xl sm:text-4xl font-bold text-amber-300 tracking-tight">98%</div>
                <div class="text-xs text-blue-200/30 mt-2 tracking-wide uppercase">Aprovação</div>
            </div>
        </div>
    </div>
</section>
