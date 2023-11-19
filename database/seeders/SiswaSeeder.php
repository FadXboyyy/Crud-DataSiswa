<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('siswas')->insert([
            'nama' => 'Fadly',
            'jeniskelamin' => 'cowok',
            'notelp' => '0882006004251',
            'tanggal_lahir'=>'23-03-2006',
            'email' => 'fadlyrizkimaulana65@gmail.com',
      
        ]);
    }
}
