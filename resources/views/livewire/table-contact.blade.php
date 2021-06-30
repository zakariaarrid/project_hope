<div class="overflow-x-auto"> 

    <div class="min-w-screen min-h-screen bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">       
        <div class="w-full lg:w-5/6 flex-row">
            <div class="flex md:flex-row flex-col">
                <div>
                    <input wire:model="search" class="appearance-none block w-full   border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="Recherche ...">
                </div>
                <div>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        wire:click="AddContact"
                        type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Ajouter
                    </button>
                </div>
            </div>           
            <div class="bg-white shadow-md rounded my-6">
                <table class="min-w-max w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">
                                NOM DU CONTACT
                                <svg wire:click.prevent="sortBy('contactnom','desc')" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                                </svg>
                                <svg wire:click.prevent="sortBy('contactnom','asc')" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7l4-4m0 0l4 4m-4-4v18" />
                                </svg>

                            </th>
                            <th class="py-3 px-6 text-left">
                                SOCIÉtÉ
                                <svg wire:click.prevent="sortBy('nom','desc')" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                                </svg>
                                <svg wire:click.prevent="sortBy('nom','asc')" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7l4-4m0 0l4 4m-4-4v18" />
                                </svg>
                            </th>
                            <th class="py-3 px-6 text-center">
                                STATUS
                                <svg wire:click.prevent="sortBy('statut','desc')" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                                </svg>
                                <svg wire:click.prevent="sortBy('statut','asc')" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7l4-4m0 0l4 4m-4-4v18" />
                                </svg>
                            </th>   
                            <th></th>
                            <th></th>                         
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach ($entreprises as $entreprise)                                                                            
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">                                        
                                        <span class="font-medium">{{ $entreprise->nom ?? '--' }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">                                      
                                        <span>{{$entreprise->contactnom}}</span>
                                    </div>
                                </td>                        
                                <td class="py-3 px-6 text-center">
                                    <span class="{{\App\Models\Entreprise::getColor($entreprise->statut)}} py-1 px-3 rounded-full text-xs">{{$entreprise->statut}} </span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110"
                                        wire:click="editContact({{json_encode($entreprise)}},'show')"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110"
                                          wire:click="editContact({{json_encode($entreprise)}},'edit')"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110"
                                          wire:click="deleteEntreprise({{$entreprise->id}})"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                            
                        @endforeach                        
                    </tbody>
                </table>
                <div class="my-8 p-3">
                    {{-- {{ $ideas->links() }} --}}
                    {{ $entreprises->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
    <livewire:edit-contact />
    <livewire:view-contact />
    <livewire:delete-contact />
    <livewire:add-contact />
    <livewire:modal-doublant />
</div>
