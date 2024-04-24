<tr class="fill-surface-400">
  <td class="py-md px-lg align-center">{{ $course->slug }}</td>
  <td class="py-md px-lg">{{ $course->name }}</td>
  <td class="py-md px-lg align-center">{{ $course->units }}</td>
  @if(!$isActionDisabled)
    <td class="flex jc-center py-md px-lg">
      @if($isLoaded)
        <x-ms-button type="filled error small icon-only" wire:click="remove" title="Remove course" :is-disabled="$isActionDisabled">
          <x-slot:icon>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </x-slot:icon>
        </x-ms-button>
      @else
        <x-ms-button type="filled small icon-only" wire:click="add" title="Add course" :is-disabled="$isActionDisabled">
          <x-slot:icon>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
          </x-slot:icon>
        </x-ms-button>
      @endif
    </td>
  @endif
</tr>