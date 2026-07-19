{{-- Footer --}}
<footer id="footer" class="border-t border-white/[0.04] py-10 px-4 sm:px-6">
    <div class="max-w-6xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
            {{-- Brand --}}
            <div>
                <span class="text-white font-bold text-lg">
                    <span class="font-serif italic text-amber-300">Maciel</span> Advocacia
                </span>
                <p class="text-sm text-blue-200/40 mt-2 max-w-[250px] font-light">
                    Especialistas em direito de família internacional para brasileiros no exterior.
                </p>
            </div>

            {{-- Quick links --}}
            <div>
                <h4 class="text-white font-medium text-sm mb-3">Navegação</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="#hero" class="text-blue-200/40 hover:text-amber-300/80 transition-colors duration-300">Início</a></li>
                    <li><a href="#diferenciais" class="text-blue-200/40 hover:text-amber-300/80 transition-colors duration-300">Diferenciais</a></li>
                    <li><a href="#como-funciona" class="text-blue-200/40 hover:text-amber-300/80 transition-colors duration-300">Como Funciona</a></li>
                    <li><a href="#faq" class="text-blue-200/40 hover:text-amber-300/80 transition-colors duration-300">FAQ</a></li>
                </ul>
            </div>

            {{-- Contact --}}
            <div>
                <h4 class="text-white font-medium text-sm mb-3">Contato</h4>
                <ul class="space-y-2 text-sm text-blue-200/40 font-light">
                    <li class="flex items-center gap-2">
                        <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                        </svg>
                        contato@macieladv.com.br
                    </li>
                </ul>
            </div>
        </div>

        {{-- Divider --}}
        <div class="border-t border-white/[0.04] pt-6 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-xs text-blue-200/20 text-center sm:text-left font-light">
                © {{ date('Y') }} Maciel Advocacia. Todos os direitos reservados.
            </p>
            <p class="text-xs text-blue-200/20 text-center max-w-lg font-light">
                Este site oferece informações gerais e não substitui consultoria jurídica personalizada.
                O envio de informações através do quiz não estabelece relação advogado-cliente.
            </p>
        </div>
    </div>
</footer>
