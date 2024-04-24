<div>
  <livewire:enrollment.load.load-table :load="$load" :id="$id" :is-request-open="true" />
  <div class="flex jc-end ai-center gap-sm">
    @if(\App\Models\LoadRequest::where('id', $requestId)->firstOrFail()->is_approved)
      <x-ms-button type="filled error" wire:click="unapprove">Remove approval</x-ms-button>
    @else
      <x-ms-button type="filled" wire:click="approve">Approve</x-ms-button>
    @endif
  </div>
</div>