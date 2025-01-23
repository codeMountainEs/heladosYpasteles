<?php

namespace App\Livewire;

use App\Models\Bakery;
use Livewire\Component;

class HomePage extends Component
{
    /*public $bakeries = [
        [
            'name' => 'Dulce Tentación',
            'image' => 'https://images.unsplash.com/photo-1555507036-ab1f4038808a',
            'description' => 'Especialistas en pasteles artesanales y postres gourmet',
            'location' => 'Calle Principal 123, Madrid',
            'rating' => 4.8
        ],
        // Aquí puedes agregar más pastelerías
    ];*/
    public $bakeries;


    public function mount()
    {
        //$this->bakeries = Bakery::all()->toArray();
        $this->bakeries = Bakery::with('images')->get()->toArray();

        //dd($this->bakeries);
    }

   

    public function render()
    {
        return view('livewire.home-page');
    }
}
