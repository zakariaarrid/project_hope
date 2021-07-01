<div class="flex justify-center h-screen items-center bg-gray-200 bg-opacity-75 antialiased fixed z-10 inset-0 overflow-y-auto"
     
    x-data="{ isOpen: @entangle('display') } "    
    x-show="isOpen"
    @keydown.escape.window="isOpen:false"
    x-cloak  
>
    <div class="flex flex-col w-11/12 sm:w-5/6 lg:w-1/2 max-w-2xl mx-auto rounded-lg border border-gray-300 shadow-xl ">
      <div
        class="flex flex-row justify-between p-6 bg-white border-b border-gray-200 rounded-tl-lg rounded-tr-lg"
      >
        <p class="font-semibold text-gray-800">Détail du contact</p>
        <svg
          class="w-6 h-6"
          fill="none"
          stroke="currentColor"
          viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg"
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
          <!-- component -->
          <div class="w-2/3 mx-auto">
            <div class="bg-white shadow-md rounded my-6">
              <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                <tbody>
                  <tr class="hover:bg-grey-lighter">
                    <td class="py-4 px-6 border-b border-grey-light">Nom</td>
                    <td class="py-4 px-6 border-b border-grey-light">   
                      {{$nom}}                   
                    </td>
                  </tr>
                  <tr class="hover:bg-grey-lighter">
                    <td class="py-4 px-6 border-b border-grey-light">Prenom</td>
                    <td class="py-4 px-6 border-b border-grey-light"> 
                       {{$prenom}}                     
                    </td>
                  </tr>
                  <tr class="hover:bg-grey-lighter">
                    <td class="py-4 px-6 border-b border-grey-light">London</td>
                    <td class="py-4 px-6 border-b border-grey-light">                      
                    </td>
                  </tr>
                  <tr class="hover:bg-grey-lighter">
                    <td class="py-4 px-6 border-b border-grey-light">Oslo</td>
                    <td class="py-4 px-6 border-b border-grey-light">                      
                    </td>
                  </tr>
                  <tr class="hover:bg-grey-lighter">
                    <td class="py-4 px-6 border-b border-grey-light">Mexico City</td>
                    <td class="py-4 px-6 border-b border-grey-light">                      
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
    </div>
  </div>