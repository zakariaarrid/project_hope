<div class="flex justify-center h-screen items-center bg-gray-200 bg-opacity-75 antialiased fixed z-10 inset-0 overflow-y-auto"
    x-cloak   
    x-data="{ isOpen: @entangle('display') } "    
    x-show="isOpen"
    @keydown.escape.window=""
>
    <div class="flex flex-col w-11/12 sm:w-5/6 lg:w-1/2 max-w-2xl mx-auto rounded-lg border border-gray-300 shadow-xl ">
      <div
        class="flex flex-row justify-between p-6 bg-white border-b border-gray-200 rounded-tl-lg rounded-tr-lg"
      >
        <p class="font-semibold text-gray-800">Détail du contact</p>
        <svg
          class="w-6 h-6 cursor-pointer"
          fill="none"
          stroke="currentColor"
          viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg"
          wire:click="fermerPop"          
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M6 18L18 6M6 6l12 12"           
          ></path>
        </svg>
      </div>
      <div class="flex flex-col px-6 py-5 bg-gray-50">
        <form class="w-full max-w-lg" wire:submit.prevent="createContact">
              <div class="flex flex-wrap -mx-3 mb-1.5">
                <div class="w-full md:w-1/2 px-3 mb-1.5 md:mb-0">
                  <label class="block uppercase tracking-wide  text-xs font-bold " for="grid-first-name">
                    Prénom
                  </label>
                  <input wire:model.defer="prenom" class="appearance-none block w-full   border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Prénom" @if($typeSelection == 'show') disabled @endif>              
                  @error('prenom') <span class="text-red-800">{{ $message }}</span> @enderror
                </div>
                <div class="w-full md:w-1/2 px-3">
                  <label class="block uppercase tracking-wide  text-xs font-bold " >
                    Nom
                  </label>
                  <input wire:model.defer="nom" class="appearance-none block w-full   border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Nom" @if($typeSelection == 'show') disabled @endif>
                  @error('nom') <span class="text-red-800">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="flex flex-wrap -mx-3 mb-1.5">           
                <div class="w-full px-3">
                  <label class="block uppercase tracking-wide  text-xs font-bold " >
                    Email
                  </label>
                  <input wire:model.defer="e_mail" class="appearance-none block w-full   border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="email" placeholder="Email" @if($typeSelection == 'show') disabled @endif>
                  @error('e_mail') <span class="text-red-800">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="flex flex-wrap -mx-3 mb-1.5">           
                <div class="w-full px-3">
                  <label class="block uppercase tracking-wide  text-xs font-bold " >
                    Entreprise
                  </label>
                  <input wire:model.defer='nomEntreprise' class="appearance-none block w-full   border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Entreprise" @if($typeSelection == 'show') disabled @endif>
                  @error('nomEntreprise') <span class="text-red-800">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="flex flex-wrap -mx-3 mb-1.5">           
                <div class="w-full px-3">
                  <label class="block uppercase tracking-wide  text-xs font-bold " >
                    Adresse
                  </label>
                  <textarea wire:model.wire="adresse" class="resize-y w-full border rounded-md" @if($typeSelection == 'show') disabled @endif></textarea>              
                  @error('adresse') <span class="text-red-800">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="flex flex-wrap -mx-3 mb-1.5">
                <div class="w-full md:w-1/2 px-3 mb-1.5 md:mb-0">
                  <label class="block uppercase tracking-wide  text-xs font-bold " for="grid-first-name">
                    Code Postal
                  </label>
                  <input wire:model.defer="code_postal" class="appearance-none block w-full   border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="Code Postal" @if($typeSelection == 'show') disabled @endif>              
                  @error('code_postal') <span class="text-red-800">{{ $message }}</span> @enderror
                </div>
                <div class="w-full md:w-1/2 px-3">
                  <label class="block uppercase tracking-wide  text-xs font-bold " >
                    Ville
                  </label>
                  <input wire:model.defer="ville" class="appearance-none block w-full   border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  type="text" placeholder="Ville" @if($typeSelection == 'show') disabled @endif>
                </div>
              </div>
              <div class="flex flex-wrap -mx-3 ">            
                <div class="w-full md:w-1/3 px-3 mb-1.5 md:mb-0">
                  <label class="block uppercase tracking-wide  text-xs font-bold " for="grid-state">
                    State
                  </label>
                  <div class="relative">
                    <select wire:model.defer="statut" class="block appearance-none w-full  border border-gray-200  py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  id="grid-state" @if($typeSelection == 'show') disabled @endif>
                      <option value="lead">lead</option>
                      <option value="client">client</option>
                      <option value="prospect">prospect</option>
                      
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 ">
                      <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                  </div>
                </div>           
              </div>
                  
            </div>
            <div
              class="flex flex-row items-center justify-between p-5 bg-white border-t border-gray-200 rounded-bl-lg rounded-br-lg"
            >
            <p class="font-semibold text-gray-600 cursor-pointer" wire:click="fermerPop">Annuler</p>
            <button type="submit" class="px-4 py-2 text-white font-semibold bg-blue-500 rounded">
              Enregistrer
            </button>                    
          </div>
        </form>
    </div>
  </div>