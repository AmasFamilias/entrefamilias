@props(['label', 'description', 'model'])

<div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
    <div class="space-y-1">
        <h3 class="font-semibold text-gray-800">{{ $label }}</h3>
        <p class="text-sm text-gray-600">{{ $description }}</p>
    </div>
    <label class="relative inline-flex items-center cursor-pointer">
        <input type="checkbox" wire:model="{{ $model }}" class="sr-only peer">
        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-blue-300 rounded-full peer
                    peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] 
                    after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 
                    after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600">
        </div>
    </label>
</div>
