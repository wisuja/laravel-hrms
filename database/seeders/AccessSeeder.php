<?php

namespace Database\Seeders;

use App\Models\Access;
use App\Models\Admin;
use App\Models\Menu;
use App\Models\Role;
use Illuminate\Database\Seeder;

class AccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = Menu::all();
        $adminId = Role::whereName('Administrator')->first()->id;
        $userId = Role::whereName('User')->first()->id;

        foreach($menus as $menu) {
            Access::factory()->create(['role_id' => $adminId, 'menu_id' => $menu->id]);
            Access::factory()->create(['role_id' => $userId, 'menu_id' => $menu->id]);
        }

        Admin::create(['role_id' => $adminId]);
    }
}
