<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = New Admin();
        $admin->name = 'Admin';
        $admin->email = 'admin@mail.com';
        $admin->password = bcrypt('12345678');
        $admin->save();
    }
}
