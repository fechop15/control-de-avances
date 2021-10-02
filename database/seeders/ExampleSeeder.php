<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Project;
use App\Models\Ticket;
use App\Models\User;
use App\Models\UserStory;
use Illuminate\Database\Seeder;

class ExampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $company1 = Company::create([
            'name' => 'Empresa 1',
            'nit' => '1234567890',
            'phone' => '3001234567',
            'address' => 'CRA 1 # 2-3',
            'email' => 'empresa1@email.com',
        ]);

        $company2 = Company::create([
            'name' => 'Empresa 2',
            'nit' => '2345678901',
            'phone' => '3001234567',
            'address' => 'CRA 2 # 2-3',
            'email' => 'empresa2@email.com',
        ]);
        $company3 = Company::create([
            'name' => 'Empresa 3',
            'nit' => '3456789012',
            'phone' => '3001234567',
            'address' => 'CRA 3 # 2-3',
            'email' => 'empresa3@email.com',
        ]);

        /**
         * Projects
         */
        $project1 = Project::create([

            'name' => 'Proyecto 1',
            'company_id' => $company1->id,

        ]);
        $project2 = Project::create([

            'name' => 'Proyecto 2',
            'company_id' => $company1->id,

        ]);
        $project3 = Project::create([

            'name' => 'Proyecto 3',
            'company_id' => $company2->id,

        ]);

        /**
         * historia de usuarios proyecto 1
         */
        $userStoryProject1_1 = UserStory::create([

            'name' => 'Tarea 1: Aaaaa a aaaaaa',
            'comment' => 'Esta tarea es necesaria para cumplir con la entrega',
            'project_id' => $project1->id,

        ]);
        $userStoryProject1_2 = UserStory::create([

            'name' => 'Tarea 2: Bbbbb b bbbbbb',
            'comment' => 'Esta tarea es necesaria para cumplir con la entrega',
            'project_id' => $project1->id,

        ]);
        $userStoryProject1_3 = UserStory::create([

            'name' => 'Tarea 3: Ccccc c cccccc',
            'comment' => 'Esta tarea es necesaria para cumplir con la entrega',
            'project_id' => $project1->id,

        ]);
        /**
         * historia de usuarios proyecto 2
         */
        $userStoryProject2_1 = UserStory::create([

            'name' => 'Tarea 1: Ddddd d ddddd',
            'comment' => 'Esta tarea es necesaria para cumplir con la entrega',
            'project_id' => $project2->id,

        ]);
        $userStoryProject2_2 = UserStory::create([

            'name' => 'Tarea 2: Eeeeee e eeeee',
            'comment' => 'Esta tarea es necesaria para cumplir con la entrega',
            'project_id' => $project2->id,

        ]);
        $userStoryProject2_3 = UserStory::create([

            'name' => 'Tarea 3: Fffff f ffffff',
            'comment' => 'Esta tarea es necesaria para cumplir con la entrega',
            'project_id' => $project2->id,

        ]);
        /**
         * historia de usuarios proyecto 3
         */
        $userStoryProject3_1 = UserStory::create([

            'name' => 'Tarea 1: Ggggg g gggggg',
            'comment' => 'Esta tarea es necesaria para cumplir con la entrega',
            'project_id' => $project3->id,

        ]);
        $userStoryProject3_2 = UserStory::create([

            'name' => 'Tarea 2: Hhhhhh h hhhhh',
            'comment' => 'Esta tarea es necesaria para cumplir con la entrega',
            'project_id' => $project3->id,

        ]);
        $userStoryProject3_3 = UserStory::create([

            'name' => 'Tarea 3: Iiiiii i iiiiii',
            'comment' => 'Esta tarea es necesaria para cumplir con la entrega',
            'project_id' => $project3->id,

        ]);

        /**
         * Tickets En Finalizado
         */
        Ticket::create([

            'name' => 'Actividad 2: xxxxxxxxxxxxxx',
            'state' => "Finalizado",
            'user_stories_id' => $userStoryProject1_1->id,

        ]);
        Ticket::create([

            'name' => 'Actividad 2: xxxxxxxxxxxxxx',
            'state' => "Finalizado",
            'user_stories_id' => $userStoryProject1_3->id,

        ]);
        Ticket::create([

            'name' => 'Actividad 2: xxxxxxxxxxxxxx',
            'state' => "Finalizado",
            'user_stories_id' => $userStoryProject2_1->id,

        ]);
        Ticket::create([

            'name' => 'Actividad 2: xxxxxxxxxxxxxx',
            'state' => "Finalizado",
            'user_stories_id' => $userStoryProject2_3->id,

        ]);
        Ticket::create([

            'name' => 'Actividad 2: xxxxxxxxxxxxxx',
            'state' => "Finalizado",
            'user_stories_id' => $userStoryProject3_1->id,

        ]);
        Ticket::create([

            'name' => 'Actividad 2: xxxxxxxxxxxxxx',
            'state' => "Finalizado",
            'user_stories_id' => $userStoryProject3_3->id,

        ]);
        /**
         * Tickets En Proceso
         */
        Ticket::create([

            'name' => 'Actividad 1: xxxxxxxxxxxxxx',
            'state' => "En proceso",
            'user_stories_id' => $userStoryProject1_1->id,

        ]);
        Ticket::create([

            'name' => 'Actividad 1: xxxxxxxxxxxxxx',
            'state' => "En proceso",
            'user_stories_id' => $userStoryProject1_2->id,

        ]);
        Ticket::create([

            'name' => 'Actividad 1: xxxxxxxxxxxxxx',
            'state' => "En proceso",
            'user_stories_id' => $userStoryProject2_1->id,

        ]);
        Ticket::create([

            'name' => 'Actividad 1: xxxxxxxxxxxxxx',
            'state' => "En proceso",
            'user_stories_id' => $userStoryProject2_2->id,

        ]);
        Ticket::create([

            'name' => 'Actividad 1: xxxxxxxxxxxxxx',
            'state' => "En proceso",
            'user_stories_id' => $userStoryProject3_1->id,

        ]);
        Ticket::create([

            'name' => 'Actividad 1: xxxxxxxxxxxxxx',
            'state' => "En proceso",
            'user_stories_id' => $userStoryProject3_2->id,
        ]);
        /**
         * Usuario
         */
        User::create([
            'name' => 'Fredy andres perez gomez',
            'email' => 'fredapg@gmail.com',
            'company_id' => $company1->id,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
    }
}
