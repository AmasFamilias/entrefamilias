<button {{ $attributes->merge(['type' => 'submit', 'class' => 'font-nexabold inline-flex items-center px-4 py-2 
    bg-amber-500 border border-transparent rounded-md font-bold text-xs text-white uppercase 
    tracking-widest hover:bg-slate-800 active:bg-gray-900 focus:outline-none focus:border-gray-900
    focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
    </button>
    