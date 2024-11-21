@session('alert-success')
<div class="pt-4" x-transition:leave.duration.400ms x-data="{show: true}" x-cloak x-show="show"
    x-init="setTimeout(() => show = false, 5000)">
    <div class="flex flex-col mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="p-4 mt-2 text-sm text-white bg-teal-500 rounded-lg" role="alert">
            <span class="font-bold">{{ __('Success') }}</span>! {{ $value }}
        </div>
    </div>
</div>
@endsession

@session('alert-danger')
<div class="pt-4" x-transition:leave.duration.400ms x-data="{show: true}" x-cloak x-show="show"
    x-init="setTimeout(() => show = false, 5000)">
    <div class="flex flex-col mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="p-4 mt-2 text-sm text-white bg-red-500 rounded-lg" role="alert">
            <span class="font-bold">{{ __('Error') }}</span>! {{ $value }}
        </div>
    </div>
</div>
@endsession