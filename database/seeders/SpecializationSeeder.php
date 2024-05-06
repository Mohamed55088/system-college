<?php

namespace Database\Seeders;

use App\Models\Specialization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('specializations')->delete();
        $subjects = [
            [
                'ar' => 'عربي',
                'en' => 'Arabic',
            ],
            [
                'ar' => 'رياضيات',
                'en' => 'Mathematics',
            ],
            [
                'ar' => 'علوم',
                'en' => 'Science',
            ],
            [
                'ar' => 'اجتماعيات',
                'en' => 'Social Studies',
            ],
            [
                'ar' => 'لغة إنجليزية',
                'en' => 'English Language',
            ],
            [
                'ar' => 'فيزياء',
                'en' => 'Physics',
            ],
            [
                'ar' => 'كيمياء',
                'en' => 'Chemistry',
            ],
            [
                'ar' => 'أحياء',
                'en' => 'Biology',
            ],
            [
                'ar' => 'جغرافيا',
                'en' => 'Geography',
            ],
            [
                'ar' => 'تاريخ',
                'en' => 'History',
            ],
            [
                'ar' => 'فلسفة',
                'en' => 'Philosophy',
            ],
            [
                'ar' => 'علوم الحاسوب',
                'en' => 'Computer Science',
            ],
            [
                'ar' => 'تربية الفنية',
                'en' => 'Art Education',
            ],
            [
                'ar' => 'التربية الموسيقية',
                'en' => 'Music Education',
            ],
            [
                'ar' => 'الرياضة والنشاط البدني',
                'en' => 'Physical Education and Sports',
            ],
            [
                'ar' => 'الاقتصاد المنزلي',
                'en' => 'Home Economics',
            ],
            [
                'ar' => 'الفنون التطبيقية',
                'en' => 'Applied Arts',
            ],
            [
                'ar' => 'التربية الدينية',
                'en' => 'Religious Studies',
            ],
        ];
        foreach ($subjects as $subject) {
            Specialization::create([
                'name' => $subject
            ]);

        }
    }
}