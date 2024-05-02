<section class="mb-md" style="width: 100%; overflow-x: auto">
  <table class="w-full mu-table">
    <thead class="fill-primary-800">
    <tr>
      <th class="py-md px-lg">Course Code</th>
      <th class="py-md px-lg">Course Title</th>
      <th class="py-md px-lg">Units</th>
      <th class="py-md px-lg">Section</th>
      @if(!$isRequestOpen) <th class="py-md px-lg">Actions</th> @endif
    </tr>
    </thead>
    <tbody>
      @foreach($load as $course)
        @if($doesCourseExistInLoad($course))
          <livewire:enrollment.load.course-row :user-id="$id ?: null" :course="$course" wire:key="{{ $course->id }}" is-loaded="true" :is-action-disabled="$isRequestOpen" is-section-disabled="true" is-section-visible="true" />
        @endif
      @endforeach
    </tbody>
  </table>
</section>