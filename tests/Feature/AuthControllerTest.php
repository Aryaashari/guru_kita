<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->post('/registrasi',[
            "nama" => "",
            "email" => "arya@gmail.com",
            "password" => "12345678",
            "password_confirmation" => "12345678",
            "nip" => "12345",
            "tempatLahir" => "Abe",
            "tanggalLahir" => date("Y-m-d", time()),
            "noTelp" => "1234567890",
            "jenisKelamin" => "L"
        ]);
        // var_dump($response);
        $response->assertStatus(400);
    }
}
