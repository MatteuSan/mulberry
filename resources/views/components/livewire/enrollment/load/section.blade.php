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
      <table class="w-full mu-table">
        <thead class="fill-primary-800">
        <tr>
          <th class="py-md px-lg">Course Code</th>
          <th class="py-md px-lg">Course Title</th>
          <th class="py-md px-lg">Units</th>
          <th class="py-md px-lg">Section</th>
        </tr>
        </thead>
        <tbody>
        @foreach($load as $course)
          @if($doesCourseExistInLoad($course))
            <livewire:enrollment.load.course-row :course="$course" wire:key="{{ $course->id }}" is-loaded="true" :is-action-disabled="$isRequestOpen" :is-section-disabled="$isRequestOpen" is-section-visible="true" />
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
    @if(!$isRequestOpen)
      @if($totalLoad() > 0)
        <div class="flex flow-row wrap-none jc-end ai-center gap-sm">
          <x-ms-button type="filled" wire:click="openRequest">Finalize</x-ms-button>
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