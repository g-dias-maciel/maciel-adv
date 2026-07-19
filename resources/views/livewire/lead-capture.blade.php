<div>
    @if ($success)
        {{-- Success message --}}
        <div class="bg-green-500/10 border border-green-400/30 rounded-xl p-6 text-center">
            <svg class="w-12 h-12 mx-auto text-green-400 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <h3 class="text-lg font-semibold text-white mb-2">Recebemos seus dados! ✅</h3>
            <p class="text-blue-200/70 text-sm">
                Nossa equipe entrará em contato em até 24 horas úteis.
            </p>
        </div>
    @else
        {{-- Form --}}
        <form wire:submit.prevent="submit" class="space-y-4 text-left">
            {{-- Name --}}
            <div>
                <label for="name" class="block text-sm font-medium text-blue-200/80 mb-1">
                    Nome completo <span class="text-red-400">*</span>
                </label>
                <input
                    wire:model.blur="name"
                    type="text"
                    id="name"
                    placeholder="Seu nome"
                    class="w-full px-4 py-3 rounded-xl bg-white/10 border border-white/20 text-white placeholder-gray-400 focus:border-blue-400 focus:ring-2 focus:ring-blue-400/30 focus:outline-none transition-all"
                />
                @error('name')
                    <p class="mt-1 text-red-400 text-xs">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div>
                <label for="email" class="block text-sm font-medium text-blue-200/80 mb-1">
                    E-mail <span class="text-red-400">*</span>
                </label>
                <input
                    wire:model.blur="email"
                    type="email"
                    id="email"
                    placeholder="seu@email.com"
                    class="w-full px-4 py-3 rounded-xl bg-white/10 border border-white/20 text-white placeholder-gray-400 focus:border-blue-400 focus:ring-2 focus:ring-blue-400/30 focus:outline-none transition-all"
                />
                @error('email')
                    <p class="mt-1 text-red-400 text-xs">{{ $message }}</p>
                @enderror
            </div>

            {{-- Phone --}}
            <div>
                <label for="phone" class="block text-sm font-medium text-blue-200/80 mb-1">
                    Telefone (com DDI) <span class="text-red-400">*</span>
                </label>
                <input
                    wire:model.blur="phone"
                    type="tel"
                    id="phone"
                    placeholder="+55 (11) 99999-9999"
                    class="w-full px-4 py-3 rounded-xl bg-white/10 border border-white/20 text-white placeholder-gray-400 focus:border-blue-400 focus:ring-2 focus:ring-blue-400/30 focus:outline-none transition-all"
                />
                @error('phone')
                    <p class="mt-1 text-red-400 text-xs">{{ $message }}</p>
                @enderror
            </div>

            {{-- Country --}}
            <div>
                <label for="country" class="block text-sm font-medium text-blue-200/80 mb-1">
                    País onde reside <span class="text-red-400">*</span>
                </label>
                <input
                    wire:model.blur="country"
                    type="text"
                    id="country"
                    placeholder="Ex: Estados Unidos, Portugal..."
                    class="w-full px-4 py-3 rounded-xl bg-white/10 border border-white/20 text-white placeholder-gray-400 focus:border-blue-400 focus:ring-2 focus:ring-blue-400/30 focus:outline-none transition-all"
                />
                @error('country')
                    <p class="mt-1 text-red-400 text-xs">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit --}}
            <button
                type="submit"
                class="w-full py-3.5 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-400 hover:to-blue-500 text-white font-semibold rounded-xl shadow-lg shadow-blue-500/30 transition-all duration-200 hover:scale-[1.02] active:scale-95"
            >
                Enviar
            </button>
        </form>
    @endif
</div>
