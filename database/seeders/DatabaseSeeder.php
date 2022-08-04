<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'manage calls']);
        Permission::create(['name' => 'manage sms']);

        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo('edit users');
        $admin->givePermissionTo('manage calls');
        $admin->givePermissionTo('manage sms');
        
        $agent = Role::create(['name' => 'agent']);
        $agent->givePermissionTo('manage calls');
        $agent->givePermissionTo('manage sms');

        $user = \App\Models\User::factory()->create([
            'name' => 'Harshana Nishshanka',
            'email' => 'harshana@dayzsolutions.com',
            'password' => Hash::make('elakiri123')
        ]);
        $user->assignRole($admin);

        $agentUser = \App\Models\User::factory()->create([
            'name' => 'Agent User',
            'email' => 'agent@dayzsolutions.com',
            'password' => Hash::make('elakiri123')
        ]);
        $agentUser->assignRole($agent);
    }
}
