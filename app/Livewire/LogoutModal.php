<?php
namespace App\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;

class LogoutModal extends Component
{
    public $showModal = true;

    #[On('show-logout-modal')]
    public function showLogoutModal() {
        $this->showModal = true;
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Logged out successfully.');
    }

    public function closeModal() {
        $this->showModal = false;
    }

    public function render() {
        return view('livewire.logout-modal');
    }
}