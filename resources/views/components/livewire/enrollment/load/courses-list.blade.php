<section class="flex flow-column wrap-none gap-md">
  <ul class="ms-list grid @medium:cols-2 gap-md" style="list-style:none;">
    @forelse($courses as $course)
      <li wire:key="{{ $course->id }}">
        <livewire:enrollment.load.course-card :id="$course->id" :title="$course->name" :description="$course->description" :units="$course->units" :key="$course->id" />
      </li>
    @empty
      <li class="start-1 end-2">
        <div class="w-full grid pi-center px-lg py-3xl r-md ink-surface-600" style="border: 1px solid var(--ms-theme-primary-600);">
          <p>No courses to load.</p>
        </div>
      </li>
    @endforelse
  </ul>
</section>