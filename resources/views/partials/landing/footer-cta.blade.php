{{-- Footer CTA Section --}}
<section id="footer-cta" class="py-16 sm:py-20 lg:py-24 px-4 sm:px-6">
    <div class="max-w-6xl mx-auto">
        <div class="bg-gradient-to-b from-amber-400/5 via-transparent to-transparent border border-amber-400/10 rounded-3xl p-10 sm:p-14 lg:p-20 text-center relative overflow-hidden">
            <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-6 max-w-2xl mx-auto">
                Pronto para resolver seu divórcio?
            </h2>
            <p class="text-blue-200/50 max-w-xl mx-auto mb-10 font-light">
                Responda nosso quiz gratuito e descubra em menos de 2 minutos se o seu caso é elegível.
            </p>
            <div class="decorative-line mb-10"></div>
            <button
                wire:click="start"
                class="inline-flex items-center gap-3 px-10 py-5 bg-gradient-to-b from-amber-500 to-amber-600 hover:from-amber-400 hover:to-amber-500 text-white font-medium rounded-xl shadow-lg shadow-amber-500/10 hover:shadow-amber-400/15 transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] text-lg tracking-wide"
            >
                Iniciar Quiz Gratuito
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                </svg>
            </button>
            <p class="mt-6 text-sm text-blue-200/30 font-light">
                Leva menos de 2 minutos. Sem compromisso.
            </p>
        </div>
    </div>
</section>
