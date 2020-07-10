<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ini nanti akan membuat data db
        App\Permission::create([
            'nama_permission' => 'view data' // id 1
     ]);
     App\Permission::create([
            'nama_permission' => 'create data' // id 2
     ]);
     App\Permission::create([
            'nama_permission' => 'edit data' // id 3
     ]);
     App\Permission::create([
            'nama_permission' => 'update data' // id 4
     ]);
     App\Permission::create([
            'nama_permission' => 'delete data' // id 5
     ]);

     // ini menghubungkan role dgn permission
     // sama menyimpan data juga ke db     
     $admin = App\Role::where('nama_role', 'admin')->first();
     $admin->permissions()->attach([1, 2, 3, 4, 5]);
     
     $staff = App\Role::where('nama_role', 'staff')->first();
     $staff->permissions()->attach([1, 2, 3, 4]);
     
     $ceo = App\Role::where('nama_role', 'ceo')->first();
     $ceo->permissions()->attach([1]);
    }
}
