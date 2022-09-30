<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = [
            ['institution_phone', '+62 852 1723 2610'],
            ['institution_email', 'info@darul-hikmah.sch.id'],
            ['institution_whatsapp', 'https://api.whatsapp.com/send?phone=6285217232610'],
            ['institution_instagram', 'https://www.instagram.com/yayasandarulhikmahmenganti/'],
            ['institution_youtube', 'https://www.youtube.com/channel/UCQpyO8uEWrOW3hGsltD54Hg'],
            ['site_logo', 'storage/images/logo.png'],
            ['site_favicon', 'storage/images/favicon.png'],
            ['site_name', 'Portal Resmi Yayasan Darul Hikmah Menganti'],
            ['meta_title', 'Portal Yayasan Darul Hikmah Menganti'],
            ['meta_desc', 'Portal Resmi Yayasan Darul Hikmah Menganti Kedung Jepara'],
            ['meta_keyword', 'portal, portal resmi, portal yayasan, portal yayasan darul hikmah, portal yayasan darul hikmah menganti'],
            ['meta_author', 'Yayasan Darul Hikmah Menganti'],
        ];

        for ($i=0;$i<count($setting);$i++){
            DB::table('entity__settings')->insert([
                'name' => $setting[$i][0],
                'value' => $setting[$i][1]
            ]);
        }
    }
}
