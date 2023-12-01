<?php

namespace App\Livewire\Frontend\Product;

use App\Models\Product;
use Livewire\Component;


class Index extends Component
{
    public $category;
    public $brandInputs = [], $priceInput;    
    public $products; 
  

    protected $queryString = [
        'brandInputs' => ['except' => '', 'as' => 'brand'],
        'priceInput' => ['except' => '', 'as' => 'price'],
    ];
    

    public function mount($category) {
       
         
        $this->category = $category;
    }

    public function render()
    {
        
        $this->products = Product::where('category_id', $this->category->id)
            ->when($this->brandInputs, function ($q) {
                $q->whereIn('brand', $this->brandInputs);
            })
            ->when($this->priceInput, function ($q2) {
                $q2->when($this->priceInput == 'high-to-low', function ($q2) {
                    $q2->orderBy('selling_price', 'DESC');
                })
                ->when($this->priceInput == 'low-to-high', function ($q2) {
                    $q2->orderBy('selling_price', 'ASC');
                });
            })
            ->where('status', '0')
            ->get();

           
            
    
        return view('livewire.frontend.product.index', [
            'products' => $this->products,
            'category' => $this->category
        ]);
    }

    public function applyFilter()
    {
        $this->products = Product::where('category_id', $this->category->id)
            ->when($this->brandInputs, function ($q) {
                $q->whereIn('brand', $this->brandInputs);
            })
            ->when($this->priceInput, function ($q2) {
                $q2->when($this->priceInput == 'high-to-low', function ($q2) {
                    $q2->orderBy('selling_price', 'DESC');
                })
                ->when($this->priceInput == 'low-to-high', function ($q2) {
                    $q2->orderBy('selling_price', 'ASC');
                });
            })
            ->where('status', '0')
            ->get();
    }


    


   
    
    
}
