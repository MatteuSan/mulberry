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