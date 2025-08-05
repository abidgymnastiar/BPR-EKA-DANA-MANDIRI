<!-- resources/views/modal.blade.php -->
<div id="modal-kegiatan" class="hidden fixed inset-0 z-50 overflow-y-auto">
    <div class="fixed inset-0 bg-gray-800 opacity-50"></div>
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white rounded-lg shadow-lg max-w-lg w-full mx-4 p-6 relative z-10">
            <h2 id="modal-title" class="text-xl font-bold mb-4"></h2>
            <img id="modal-image" src="" alt="" class="w-full h-auto rounded-lg mb-4" />
            <p id="modal-content" class="text-gray-700 text-sm"></p>
            <button id="close-modal"
                class="mt-6 inline-flex justify-center rounded-md bg-gray-100 px-4 py-2 text-sm font-medium text-gray-800 hover:bg-gray-200">
                Tutup
            </button>
        </div>
    </div>
</div>
