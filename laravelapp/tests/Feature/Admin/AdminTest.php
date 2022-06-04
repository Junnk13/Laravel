<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index()
    {
        $response = $this->get(route('admin.index'));

        $response->assertStatus(200);
    }

    public function test_category()
    {
        $response = $this->get(route('admin.category.index'));

        $response->assertStatus(200);
    }

    public function test_create_index()
    {
        $response = $this->get(route('admin.news.index'));

        $response->assertStatus(200);
    }

    public function test_create_store()
    {
        $data = [
            'title' => 'test title',
            'author' => 'test author',
            'newsText' => 'test desc',
            'status'=>'ACTIVE'
        ];
        $response = $this->post(route('admin.news.store'), $data);

        $response->assertJson($data)->assertStatus(201);
    }
}
