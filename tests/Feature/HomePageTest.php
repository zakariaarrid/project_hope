<?php

it('it can render the homepage',
   function() {
        $this
            ->get('/')
            ->assertSee('bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse');
   }
);
