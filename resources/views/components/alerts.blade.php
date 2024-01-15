@if (session()->has('success'))
	<div class="flex bg-green-100/50 rounded-lg p-4 m-2 mb-4 text-sm text-green-100 border border-green-100" role="alert">
        {{ session('success') }}
	</div>
@endif

@if (session()->has('warning'))
	<div class="flex bg-yellow-100/50 rounded-lg p-4 m-2 mb-4 text-sm text-yellow-100 border border-yellow-100" role="alert">
        {{ session('warning') }}
	</div>
@endif

@if (session()->has('error'))
    <div class="flex bg-red-100/50 rounded-lg p-4 m-2 mb-4 text-sm text-red-100 border border-red-100" role="alert">
        {{ session('error') }}
	</div>
@endif
