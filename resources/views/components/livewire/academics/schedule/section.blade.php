<section class="w-full flex flow-column gap-sm" style="overflow-x: auto" x-data="scheduleModal(false)">
  @if($isLoadApproved)
    <section
      :class="`mu-modal__overlay${open ? ' is-open' : ''}`"
      x-transition.opacity
      x-show="open"
      x-on:schedule-created="open = false"
    >
      <section class="mu-modal" @click.outside="toggle">
        <section class="w-full fill-surface-200 ink-surface-ink p-xl r-lg">
          <div class="flex flow-row jc-center ai-center mt-md mb-2xl gap-md">
            <h2 class="title" style="text-align: center">Add Schedule</h2>
          </div>
          <livewire:academics.schedule.form />
        </section>
      </section>
    </section>
    <section style="overflow-x: auto">
      <livewire:academics.schedule.table is-editable="true" />
    </section>
  @else
    <div class="w-full grid pi-center px-lg py-lg r-md ink-surface-600 mb-md" style="border: 1px solid var(--ms-theme-primary-600)">
      <p>Cannot edit schedule. Load request is still pending approval.</p>
    </div>
    <section style="overflow-x: auto">
      <livewire:academics.schedule.table />
    </section>
  @endif
</section>