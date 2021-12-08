<?php

namespace App\Http\Livewire;

use App\Models\Nft;
use Livewire\Component;

class NftFilter extends Component
{
    public $collections;
    public $nfts;
    public $minPrice;
    public $maxPrice;
    public $collectionFilter;
    public $priceWarning;

    public function mount()
    {
        $this->nfts = Nft::all();
        $this->minPrice = 1;
        $this->maxPrice = 10000;
        $this->priceWarning = false;
    }

    public function checkPrice()
    {
        if ($this->minPrice > $this->maxPrice) {
            $this->priceWarning = true;
        } else {
            $this->priceWarning = false;
        }
    }

    public function filter()
    {

        if ($this->minPrice > $this->maxPrice) {
            $this->priceWarning = true;
            return;
        } else if ($this->collectionFilter == "all") {
            $this->nfts = Nft::whereBetween('price', [$this->minPrice, $this->maxPrice])->get();
        } else {
            $this->nfts = Nft::where('collection_id', intval($this->collectionFilter))->whereBetween('price', [$this->minPrice, $this->maxPrice])->get();
        }
    }

    public function render()
    {
        return view('livewire.nft-filter');
    }
}
