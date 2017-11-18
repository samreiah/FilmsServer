<?php

use Illuminate\Database\Seeder;

use App\Film;
use App\Repositories\FilmRepository;

class FilmsTableSeeder extends Seeder
{

    public function __construct(FilmRepository $film) {
        $this->film = $film;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('films')->insertGetId([
            'name'          => 'Wonder Women',
            'description'   => 'Wonder Women Film',
            'slug'          => $this->film->createSlug('Wonder Women'),
            'released_on'   => '2017-05-15',
            'rating'        => 3.5,
            'ticket_price'  => 15.00,
            'country'       => 'US',
            'photo'         => 'wonder_women.jpg',
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s')
        ]);

        DB::table('films')->insertGetId([
            'name'          => 'Titanic',
            'description'   => 'Titanic Film',
            'slug'          => $this->film->createSlug('Titanic'),
            'released_on'   => '2017-05-15',
            'rating'        => 3.5,
            'ticket_price'  => 15.00,
            'country'       => 'US',
            'photo'         => 'titanic.jpg',
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s')
        ]);

        DB::table('films')->insertGetId([
            'name'          => 'Seabiscuit',
            'description'   => 'Seabiscuit Film',
            'slug'          => $this->film->createSlug('Seabiscuit'),
            'released_on'   => '2003-07-13',
            'rating'        => 4,
            'ticket_price'  => 15.00,
            'country'       => 'US',
            'photo'         => 'seabiscut.jpg',
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s')
        ]);

        DB::table('films')->insertGetId([
            'name'          => 'Pirates of the Caribbean',
            'description'   => 'Pirates of the Caribbean Film',
            'slug'          => $this->film->createSlug('Pirates of the Caribbean'),
            'released_on'   => '2009-12-18',
            'rating'        => 4.5,
            'ticket_price'  => 15.00,
            'country'       => 'US',
            'photo'         => 'pirates_of_carrebean.jpg',
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s')
        ]);
    }

}
