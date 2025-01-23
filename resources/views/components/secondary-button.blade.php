<button {{ $attributes->merge(['type' => 'button', 'class' => 'font-nexabold inline-flex items-center px-4 py-2 
    bg-slate-800 border text-white border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase 
    tracking-widest shadow-sm hover:bg-amber-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 
    focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
