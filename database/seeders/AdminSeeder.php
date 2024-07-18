<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $admin = new Admin();
        $admin->image = '/test';
        $admin->name = 'Super User';
        $admin->email = 'admin@gmail.com';  
        $admin->password = '$2y$12$qofTdb/3Sttrnk2mvzymhOYkks8kGPj5qoXlHSszIBq0DSutLvNpC';      
        $admin->status = 1;
        $admin->save();



    }
}
