<section class="flex flow-column wrap-none gap-sm mb-lg">
  @if($isRequestApproved === null)
    <p class="flex ai-center gap-sm">Status: <span class="fill-surface-400 ink-surface-ink px-sm py-xs r-sm small">Not yet-submitted</span></p>
  @else
    @if(!$isRequestApproved)
      <p class="flex ai-center gap-sm">Status: <span class="fill-accent-400 ink-accent-ink px-sm py-xs r-sm small">Awaiting-approval</span></p>
    @else
      <p class="flex ai-center gap-sm">Status: <span class="fill-success-400 ink-success-ink px-sm py-xs r-sm small">Approved</span></p>
    @endif
  @endif
  @if($totalLoad() > 0)
    <section class="w-full mb-md" style="overflow-x: auto">
      <table class="w-full fill-surface-200 ink-surface-ink">
        <thead class="fill-surface-600">
        <tr>
          <th class="py-md px-lg">Course Code</th>
          <th class="py-md px-lg">Course Title</th>
          <th class="py-md px-lg">Units</th>
          @if(!$isRequestOpen) <th class="py-md px-lg">Actions</th> @endif
        </tr>
        </thead>
        <tbody>
        @foreach($load as $course)
          @if($doesCourseExistInLoad($course))
            <livewire:enrollment.load.course-row :course="$course" wire:key="{{ $course->id }}" is-loaded="true" :is-action-disabled="$isRequestOpen" />
          @endif
        @endforeach
        </tbody>
      </table>
    </section>
  @else
    <div class="w-full grid pi-center px-lg py-3xl r-md ink-surface-600" style="border: 1px solid var(--ms-theme-primary-600);">
      <p>No courses to load.</p>
    </div>
  @endif
  <div class="flex flow-row wrap-none jc-end ai-center gap-lg">
    <p class="flex ai-center">
      @if($totalLoad() >= 19) <span class="fill-error-400 ink-error-ink px-sm py-sm small mr-sm r-sm"><b>OVERLOAD!</b></span> @endif
      <span>Total Load: <b>{{ $totalLoad() }} Units</b></span>
    </p>
    @if(!$isRequestOpen)
      @if($totalLoad() > 0)
        <div class="flex flow-row wrap-none jc-end ai-center gap-sm">
          <x-ms-button type="filled error" wire:click="clear">Clear</x-ms-button>
          @if ($totalLoad() >= 19)
            <x-ms-button type="filled" is-disabled>Submit</x-ms-button>
          @else
            <x-ms-button type="filled" wire:click="openRequest">Submit</x-ms-button>
          @endif
        </div>
      @endif
    @else
      @if(!$isRequestApproved)
        <div class="flex flow-row wrap-none jc-end ai-center gap-sm">
          <x-ms-button type="filled error" wire:click="closeRequest">Unfinalize</x-ms-button>
        </div>
      @endif
    @endif
  </div>
</section>