<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Collection;

class Wishlist extends Component
{
     public Collection $wishlist;
    public bool $showConfirmModal = false;
    public $deleteId;
     

    public function mount()
    {
        $this->wishlist = auth()->user()->wishlist; // حسب علاقة المفضلة
    }
     public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->showConfirmModal = true;
    }

    public function delete()
    {
        // امسح المنتج من المفضلة
        auth()->user()->wishlist()->detach($this->deleteId);

        // حدث القائمة
        $this->wishlist = auth()->user()->wishlist;

        $this->showConfirmModal = false;
$this->dispatch('wishlist-deleted')->toBrowser();

    }

    public function clearWishlist()
    {
        auth()->user()->wishlist()->detach();
        $this->wishlist = collect(); // empty
    }
    public function render()
    {
        return view('livewire.wishlist');
    }
}
