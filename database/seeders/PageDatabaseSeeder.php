<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $page = [
            ['home_widget_feature_1_image', ''],
            ['home_widget_feature_1_title', 'Integritas'],
            ['home_widget_feature_1_content', 'Keselarasan Antara Hati, Pikiran, Perkataan Dan Perbuatan Yang Baik Dan Benar.'],
            ['home_widget_feature_2_image', ''],
            ['home_widget_feature_2_title', 'Profesionalitas'],
            ['home_widget_feature_2_content', 'Bekerja Secara Disiplin, Kompeten Dan Tepat Waktu Guna Memberikan Hasil Terbaik.'],
            ['home_widget_feature_3_image', ''],
            ['home_widget_feature_3_title', 'Inovasi'],
            ['home_widget_feature_3_content', 'Menyempurnakan Yang Sudah Ada Dan Mengkreasi Hal Baru Guna Memberikan Yang Lebih Baik.'],
            ['home_widget_feature_4_image', ''],
            ['home_widget_feature_4_title', 'Tanggung Jawab'],
            ['home_widget_feature_4_content', 'Bekerja Secara Tuntas Dan Konsekuen Sesuai Pedoman Yang Telah Disepakati Bersama.'],
            ['home_widget_about_title', 'Pendiri <span>Kami</span>'],
            ['home_widget_about_content_first', 'KH. Sulaiman Tamam lahir pada tahun 1916 M di desa Menganti Kedung Jepara. Beliau merupakan putra pertama dari 3 bersaudara yakni KH. Abdurrahman Jondang dan Kyai Wardi Bugel, dari pasangan KH. Idris dan Nyai Salamah.'],
            ['home_widget_about_content_second', 'KH. Sulaiman Tamam merupakan salah satu tokoh masyarakat desa Menganti yang sangat terbuka pemikirannya pada ide-ide pembaharuan demi kesejahteraan masyarakat. Beliau bersama tokoh masyarakat lain bergotong royong untuk memberantas kemiskinan dan kebodohan masa itu melalui jalur pendidikan yang menekankan keseimbangan ilmu keduniaan dan ilmu akhirat sekaligus.'],
            ['home_widget_about_content_image', '#'],
            ['home_widget_about_content_link', '#'],
            ['home_widget_about_content_link_text', '#'],
            ['home_widget_about_content_video', '#'],
        ];
        for ($i=0;$i<count($page);$i++){
            DB::table('entity__pages')->insert([
                'page_name' => $page[$i][0],
                'page_value' => $page[$i][1]
            ]);
        }
    }
}
