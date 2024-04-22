<div
  class="flex flow-row gap-sm fill-primary-600 p-md r-sm border-primary-400"
  style="border-width:1px;border-style:solid;"
>
  <div>
    <a wire:navigate href="{{ route('home') }}" role="link">
      <div class="flex flow-row wrap-none ai-center gap-sm">
        <h4 class="subtitle truncated-1">{{ $title }}</h4>
        <span style="width: fit-content" class="small py-xs px-sm r-xs fill-{{ $matchedClassFromUnits }}-400 ink-{{ $matchedClassFromUnits }}-ink inline-block truncated-1"><span class="weight-bold">Units:</span> {{ $units }}</span>
      </div>
      <p class="body truncated-1">{{ $description }}</p>
    </a>
  </div>
  <div>
    @if(!$isLoaded)
      <x-ms-button type="icon-only small" wire:click="add">
        <x-slot:icon>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
          </svg>
        </x-slot:icon>
      </x-ms-button>
    @else
      <x-ms-button type="icon-only small error" wire:click="remove">
        <x-slot:icon>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </x-slot:icon>
      </x-ms-button>
    @endif
  </div>
</div>