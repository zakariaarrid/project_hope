<?php

it('adds a slug when a blog post is created', function() {

   $blogPost = BlogPost::factory()->create([
       'title' => 'My blogpost'
   ]);

   expect($blogPost->slug)->toEqual('my-blogpost');
});

it('can determine if a blogpost is published', function() {
  $publishedBlogPost = BlogPost::factory()->published()->create();
  expect($publishedBlogPost->isPublished())->toBeTrue();
});

it ('can accept suggestions', function() {
   $this->post(action(ExtrenalController::class), [
       'a'=>'test',
       'b'=>'zak',
   ])
   ->assertSessionHasErrors();
});
