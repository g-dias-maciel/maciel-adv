{{-- Navigation Bar --}}
<nav class="fixed top-0 inset-x-0 z-50 bg-[#060b17]/80 backdrop-blur-xl border-b border-white/[0.06]">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="flex items-center justify-between h-[4.5rem]">
            {{-- Brand --}}
            <span class="text-white font-bold text-lg tracking-tight">
                <span class="font-serif italic text-amber-300">Maciel</span> Advocacia
            </span>

            {{-- Desktop nav links --}}
            <div class="hidden md:flex items-center gap-8 text-sm">
                <a href="#diferenciais" class="text-blue-200/40 hover:text-amber-300/80 transition-colors duration-300">Diferenciais</a>
                <a href="#como-funciona" class="text-blue-200/40 hover:text-amber-300/80 transition-colors duration-300">Como Funciona</a>
                <a href="#faq" class="text-blue-200/40 hover:text-amber-300/80 transition-colors duration-300">FAQ</a>
                <button
                    wire:click="start"
                    class="px-5 py-2.5 bg-amber-400/5 border border-amber-400/15 text-amber-300 rounded-lg hover:bg-amber-400/10 transition-all duration-300 text-sm font-medium"
                >
                    Iniciar Quiz
                </button>
            </div>

            {{-- Mobile menu button --}}
            <button
                x-data
                @click="$el.nextElementSibling.classList.toggle('hidden')"
                class="md:hidden text-blue-200/40 hover:text-white transition-colors duration-300"
                aria-label="Menu"
            >
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            {{-- Mobile menu --}}
            <div class="hidden md:hidden absolute top-[4.5rem] inset-x-0 bg-[#060b17]/95 backdrop-blur-xl border-b border-white/[0.06] p-4 space-y-3">
                <a href="#diferenciais" class="block text-blue-200/40 hover:text-amber-300/80 transition-colors duration-300">Diferenciais</a>
                <a href="#como-funciona" class="block text-blue-200/40 hover:text-amber-300/80 transition-colors duration-300">Como Funciona</a>
                <a href="#faq" class="block text-blue-200/40 hover:text-amber-300/80 transition-colors duration-300">FAQ</a>
                <button
                    wire:click="start"
                    class="w-full px-5 py-2.5 bg-amber-400/5 border border-amber-400/15 text-amber-300 rounded-lg hover:bg-amber-400/10 transition-all duration-300 text-sm font-medium"
                >
                    Iniciar Quiz
                </button>
            </div>
        </div>
    </div>
</nav>
