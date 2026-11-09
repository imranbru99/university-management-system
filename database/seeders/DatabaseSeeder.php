<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Invoice;
use App\Models\Lead;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\WorkOrder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $branch = Branch::query()->updateOrCreate(
            ['code' => 'HQ'],
            ['name' => 'University Management System HQ', 'city' => 'Dhaka', 'phone' => '+8801576918420', 'is_active' => true]
        );

        \Spatie\Permission\Models\Role::findOrCreate('super_admin');
        \App\Models\User::query()->updateOrCreate(
            ['email' => 'admin@demo.local'],
            [
                'name' => 'Super Admin',
                'password' => 'password',
                'user_type' => 'super_admin',
                'branch_id' => $branch->id,
                'is_active' => true,
            ]
        )->assignRole('super_admin');
        \Spatie\Permission\Models\Role::findOrCreate('owner');
        \App\Models\User::query()->updateOrCreate(
            ['email' => 'owner@demo.local'],
            [
                'name' => 'Business Owner',
                'password' => 'password',
                'user_type' => 'owner',
                'branch_id' => $branch->id,
                'is_active' => true,
            ]
        )->assignRole('owner');
        \Spatie\Permission\Models\Role::findOrCreate('manager');
        \App\Models\User::query()->updateOrCreate(
            ['email' => 'manager@demo.local'],
            [
                'name' => 'Operations Manager',
                'password' => 'password',
                'user_type' => 'manager',
                'branch_id' => $branch->id,
                'is_active' => true,
            ]
        )->assignRole('manager');
        \Spatie\Permission\Models\Role::findOrCreate('accountant');
        \App\Models\User::query()->updateOrCreate(
            ['email' => 'accounts@demo.local'],
            [
                'name' => 'Accountant',
                'password' => 'password',
                'user_type' => 'accountant',
                'branch_id' => $branch->id,
                'is_active' => true,
            ]
        )->assignRole('accountant');
        \Spatie\Permission\Models\Role::findOrCreate('hr');
        \App\Models\User::query()->updateOrCreate(
            ['email' => 'hr@demo.local'],
            [
                'name' => 'HR Officer',
                'password' => 'password',
                'user_type' => 'hr',
                'branch_id' => $branch->id,
                'is_active' => true,
            ]
        )->assignRole('hr');
        \Spatie\Permission\Models\Role::findOrCreate('staff');
        \App\Models\User::query()->updateOrCreate(
            ['email' => 'staff@demo.local'],
            [
                'name' => 'Floor / Counter Staff',
                'password' => 'password',
                'user_type' => 'staff',
                'branch_id' => $branch->id,
                'is_active' => true,
            ]
        )->assignRole('staff');
        \Spatie\Permission\Models\Role::findOrCreate('customer');
        \App\Models\User::query()->updateOrCreate(
            ['email' => 'customer@demo.local'],
            [
                'name' => 'Customer / Portal User',
                'password' => 'password',
                'user_type' => 'customer',
                'branch_id' => $branch->id,
                'is_active' => true,
            ]
        )->assignRole('customer');
        \Spatie\Permission\Models\Role::findOrCreate('teacher');
        \App\Models\User::query()->updateOrCreate(
            ['email' => 'teacher@demo.local'],
            [
                'name' => 'Teacher / Faculty',
                'password' => 'password',
                'user_type' => 'teacher',
                'branch_id' => $branch->id,
                'is_active' => true,
            ]
        )->assignRole('teacher');
        \Spatie\Permission\Models\Role::findOrCreate('parent');
        \App\Models\User::query()->updateOrCreate(
            ['email' => 'parent@demo.local'],
            [
                'name' => 'Parent',
                'password' => 'password',
                'user_type' => 'parent',
                'branch_id' => $branch->id,
                'is_active' => true,
            ]
        )->assignRole('parent');
        \Spatie\Permission\Models\Role::findOrCreate('student');
        \App\Models\User::query()->updateOrCreate(
            ['email' => 'student@demo.local'],
            [
                'name' => 'Student',
                'password' => 'password',
                'user_type' => 'student',
                'branch_id' => $branch->id,
                'is_active' => true,
            ]
        )->assignRole('student');

        Customer::query()->updateOrCreate(['code' => 'C-1001'], ['name' => 'Demo Customer', 'city' => 'Dhaka', 'balance' => 12500, 'is_active' => true]);
        Supplier::query()->updateOrCreate(['code' => 'S-1001'], ['name' => 'Demo Supplier', 'city' => 'Dhaka', 'is_active' => true]);
        Lead::query()->updateOrCreate(['code' => 'L-1001'], ['name' => 'Demo Lead', 'stage' => 'qualified', 'value' => 50000, 'is_active' => true]);
        Product::query()->updateOrCreate(['code' => 'SKU-1001'], ['name' => 'Demo SKU', 'sku' => 'SKU-1001', 'price' => 1500, 'cost' => 900, 'stock' => 42, 'reorder_level' => 10, 'is_active' => true]);
        Employee::query()->updateOrCreate(['code' => 'E-1001'], ['name' => 'Demo Employee', 'department' => 'Operations', 'designation' => 'Officer', 'salary' => 35000, 'is_active' => true]);
        Invoice::query()->updateOrCreate(['code' => 'INV-1001'], ['name' => 'Demo Invoice', 'total' => 1500, 'status' => 'paid', 'issued_at' => now(), 'branch_id' => $branch->id, 'is_active' => true]);
        WorkOrder::query()->updateOrCreate(['code' => 'WO-1001'], ['name' => 'Demo Work Order', 'status' => 'open', 'priority' => 'high', 'notes' => 'Education sample operation', 'is_active' => true]);
    }
}
