<?php

namespace Tests\Feature;

use App\Models\Lesson;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LessonTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_to_create_lesson()
    {
        $lesson = Lesson::create([
            'user_id' => '1f5120fb-46a3-4295-99d8-308d1017be04',
            'project_location_id' => rand(1,25),
            'desc_category' => 'Test Category',
            'date_raised' => '2021-12-15',
            'event' => 'Test Event',
            'lesson_category' => 'positive',
            'warning_signs' => 'Test warning signs',
            'recommendations' => 'Test recommendations',
            'action' => 'Test actions',
            'owner' => 'Test owner',
            'wbs_id' => 'Test wbs id',
            'status' => 0,
            'images' => 'Test images',
            'comments' => 'Test comments',
        ]);
        $this->assertModelExists($lesson);
    }

    public function test_to_edit_created_lesson()
    {
        $lesson = Lesson::create([
            'user_id' => '1f5120fb-46a3-4295-99d8-308d1017be04',
            'project_location_id' => rand(1,25),
            'desc_category' => 'Test Category',
            'date_raised' => '2021-12-15',
            'event' => 'Test Event',
            'lesson_category' => 'positive',
            'warning_signs' => 'Test warning signs',
            'recommendations' => 'Test recommendations',
            'action' => 'Test actions',
            'owner' => 'Test owner',
            'wbs_id' => 'Test wbs id',
            'status' => 0,
            'images' => 'Test images',
            'comments' => 'Test comments',
        ]);
        $lesson->update(['desc_category' => 'Category ' .rand(1,9)]);
        $this->assertModelExists($lesson);
    }

    public function test_to_delete_created_lesson()
    {
        $lesson = Lesson::create([
            'user_id' => '1f5120fb-46a3-4295-99d8-308d1017be04',
            'project_location_id' => rand(1,25),
            'desc_category' => 'Test Category',
            'date_raised' => '2021-12-15',
            'event' => 'Test Event',
            'lesson_category' => 'negative',
            'warning_signs' => 'Test warning signs',
            'recommendations' => 'Test recommendations',
            'action' => 'Test actions',
            'owner' => 'Test owner',
            'wbs_id' => 'Test wbs id',
            'status' => 0,
            'images' => 'Test images',
            'comments' => 'Test comments',
        ]);
        $lesson->delete();
        $this->assertDeleted($lesson);
    }

}
