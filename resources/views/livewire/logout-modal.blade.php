<div>
    @if ($showModal)
        <div id="logout-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-[0.65] z-[1000]">
            <div class="bg-gray-700 p-6 rounded-lg shadow-lg text-center text-white z-40">
                <h2 class="text-xl font-bold mb-4">Confirm Logout</h2>
                <p>Are you sure you want to logout?</p>
                <div class="mt-4 flex justify-center gap-4">
                    <button wire:click="logout" class="bg-emerald-700 border border-emerald-300 text-white px-5 py-2 rounded-md hover:bg-emerald-400 transition">Yes</button>
                    <button wire:click="closeModal" class="bg-red-700 border border-rose-300 px-5 py-2 rounded-md hover:bg-red-500 transition">No</button>
                </div>
            </div>
        </div>
    @endif
</div>