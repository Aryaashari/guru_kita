<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Rfc4122\UuidV1;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $address = fake()->address();
        return [
            'id' => UuidV1::uuid4()->toString(),
            'classroom_id' => "7ba49ef3-d87e-4a0a-bebb-9338f61cd205",
            'nama' => fake()->name(),
            'nis' => fake()->numberBetween(1000, 9999),
            'nisn' => fake()->numberBetween(100000, 999999),
            'jenis_kelamin' => "L",
            'tempat_lahir' => fake()->city(),
            'tanggal_lahir' => fake()->date('Y-m-d', 2004-12-30),
            'alamat' => $address,
            'no_telp' => fake()->numerify('############'),
            'nama_ayah' => fake()->firstNameMale() . " " . fake()->lastName(),
            'pekerjaan_ayah' => fake()->jobTitle(),
            'alamat_ayah' => $address,
            'no_telp_ayah' => fake()->numerify('############'),
            'nama_ibu' => fake()->firstNameFemale() . " " . fake()->lastName(),
            'pekerjaan_ibu' => fake()->jobTitle(),
            'alamat_ibu' => $address,
            'no_telp_ibu' => fake()->numerify('############')
        ];
    }
}
