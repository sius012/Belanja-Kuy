<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ["siswa", "admin","koperasi"];

        foreach($roles as $role){
            $writerRole = Spatie\Permission\Models\Role::create([
                'name'         => $role
            ]);
    
        }
      

    }
}
