<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = Admin::factory()->count(3)->create();

        $admins->each(function(Admin $admin) {
            $user = User::factory()->make();

            $user->userable()->associate($admin);
            $user->save();
        });

        $admins->first()->user->update([
            'email' => 'admin@example.com'
        ]);
    }
}
