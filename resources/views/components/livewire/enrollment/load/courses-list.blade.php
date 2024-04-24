<section class="flex flow-column wrap-none gap-md">
  @if($courses->count() > 0)
    <section class="w-full" style="overflow-x: auto">
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
        @foreach($courses as $course)
          @if($doesCourseNotExist($course))
            <livewire:enrollment.load.course-row :course="$course" wire:key="{{ $course->id }}" :is-action-disabled="$isRequestOpen || $isRequestApproved" />
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
  <div class="w-full grid pi-center">
    {{ $courses->links('components.livewire.components.ms-pagination') }}
  </div>
</section>