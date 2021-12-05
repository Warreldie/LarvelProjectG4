<?php

namespace App\Http\Livewire;

use App\Models\Nft;
use Livewire\Component;

class NftFilter extends Component
{
    public $collections;
    public $nfts;
    public $collectionFilter;

    public function mount()
    {
        $this->nfts = Nft::all();
    }

    public function filter()
    {
        if ($this->collectionFilter == "all") {
            $this->nfts = Nft::all();
        } else {
            $this->nfts = Nft::where('collection_id', intval($this->collectionFilter))->get();
        }
    }

    public function render()
    {
        return view('livewire.nft-filter');
    }
}
