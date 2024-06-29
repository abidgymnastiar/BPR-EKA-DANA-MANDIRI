<div class="px-4 pt-2">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        <div class="p-4 mb-4 text-sm text-white bg-gradient-to-br from-pink-500 to-voilet-500 rounded-lg"
                            role="alert">
                            <span class="font-medium">{{ $error }}</span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    @session('success')
        <div class="p-4 mb-4 text-sm text-white bg-gradient-to-br bg-blue-700 rounded-lg" role="alert">
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endsession
</div>