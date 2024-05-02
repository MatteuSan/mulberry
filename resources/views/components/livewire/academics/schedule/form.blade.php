<form wire:submit="add" class="flex flow-column gap-md">
  @csrf
  <label class="ms-select-field">
    <span class="ms-select-field__label">Course Code</span>
    <select class="ms-select-field__input" name="course_code" wire:model.blur="courseId">
      @foreach($loads as $load)
        <option value="{{ $load->id }}">{{ $load->slug }}</option>
      @endforeach
    </select>
  </label>
  <div class="flex wrap-none jc-space-between ai-center gap-sm">
    <label class="ms-select-field">
      <span class="ms-select-field__label">Day</span>
      <select class="ms-select-field__input" name="day" wire:model.blur="day">
        @foreach($days as $nmDay)
          <option value="{{ $nmDay }}" @if($isColliding($nmDay, $timeframe)) disabled @endif>{{ str_replace($nmDay[0], strtoupper($nmDay[0]), $nmDay) }}</option>
        @endforeach
      </select>
    </label>
    <label class="ms-select-field">
      <span class="ms-select-field__label">Time</span>
      <select class="ms-select-field__input" name="timeframe" wire:model.blur="timeframe">
        @foreach($timeframes as $nmTimeframe)
          <option value="{{ $nmTimeframe }}" @if($isColliding($day, $nmTimeframe)) @endif>{{ $nmTimeframe }}</option>
        @endforeach
      </select>
    </label>
  </div>
  <div class="flex wrap-none jc-end ai-center gap-sm">
    <x-ms-button @click.prevent="open = false" type="outlined error">Cancel</x-ms-button>
    <x-ms-button native-type="submit" type="filled">Add</x-ms-button>
  </div>
</form>
