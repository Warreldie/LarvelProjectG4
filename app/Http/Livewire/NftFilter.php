<?php

namespace App\Http\Livewire;

use App\Models\Nft;
use App\Models\Category;
use Livewire\Component;

class NftFilter extends Component
{
    public $collections;
    public $categories;
    public $nfts;
    public $minPrice;
    public $maxPrice;
    public $collectionFilter;
    public $categoryFilter;
    public $priceWarning;
    public $search;

    public function mount()
    {
        $this->nfts = Nft::all();
        $this->categories = Category::all();
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
        } else if ($this->collectionFilter == "all" || $this->collectionFilter == null) {
            if ($this->categoryFilter == "all" || $this->categoryFilter == null) {
                $this->nfts = Nft::whereBetween('price', [$this->minPrice, $this->maxPrice])->get();
            } else {
                $this->nfts = Nft::where('category_id', intval($this->categoryFilter))->whereBetween('price', [$this->minPrice, $this->maxPrice])->get();
            }
        } else {
            if ($this->categoryFilter == "all" || $this->categoryFilter == null) {
                $this->nfts = Nft::where('collection_id', intval($this->collectionFilter))->whereBetween('price', [$this->minPrice, $this->maxPrice])->get();
            } else {
                $this->nfts = Nft::where('category_id', intval($this->categoryFilter))->where('collection_id', intval($this->collectionFilter))->whereBetween('price', [$this->minPrice, $this->maxPrice])->get();
            }
        }
    }
    public function search(){
        $this->nfts = Nft::where('name', 'LIKE', "%{$this->search}%")->get();
    }

    public function render()
    {
        return view('livewire.nft-filter');
    }
}
