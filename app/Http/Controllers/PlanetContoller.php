<?php

namespace App\Http\Controllers;

use Illuminate\Htpp\Request;

class PlanetController extends Controller {
    private $planets = [
        [
            'name' => "Earth",
            'description' => "Dit is de aarde"
        ],
        [
            'name' => 'Jupiter',
            'description' => 'Jupiter is een grote planeet'
        ]
    ];

    public function index() {
        $planets = $this->planets;
        return view("planets.index", compact("planets"));
    }

    public function show($planet) {
        $planetDetail = collect($this->planets)->firstWhere('name', ucfirst(strtolower($planet)));
        if (!$planetDetail) {
            abort(404, "Planet not found");
        }
        return view("planets.show", compact("planetDetail"));
    }
}