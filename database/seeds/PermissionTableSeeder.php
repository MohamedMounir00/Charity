<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //


        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

            'user-list',
            'user-create',
            'user-edit',
            'user-delete',

            'donation-list',
            'donation-create',
            'donation-edit',
            'donation-delete',

            'beneficiary-list',
            'Beneficiary-create',
            'Beneficiary-edit',
            'Beneficiary-delete',

            'Catogrey-list',
            'Catogrey-create',
            'Catogrey-edit',
            'Catogrey-delete',

            'Delavary-list',
            'Delavary-create',
            'Delavary-edit',
            'Delavary-delete',

            'Office-list',
            'Office-create',
            'Office-edit',
            'Office-delete',

            'Order-list',
            'Order-create',
            'Order-edit',
            'Order-delete',

            'Resignation-list',
            'Resignation-create',
            'Resignation-edit',
            'Resignation-delete',

            'StudyLevel-list',
            'StudyLevel-create',
            'StudyLevel-edit',
            'StudyLevel-delete',

            'TypeDonation-list',
            'TypeDonation-create',
            'TypeDonation-edit',
            'TypeDonation-delete',

            'ArchiveDonation-list',
            'ArchiveDonation-delete',
        ];


        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
