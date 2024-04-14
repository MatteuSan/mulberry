@php
  if (! isset($scrollTo)) {
      $scrollTo = 'body';
  }

  $scrollIntoViewJsSnippet = ($scrollTo !== false)
      ? <<<JS
         (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
      JS
      : '';
@endphp

<div>
  @if ($paginator->hasPages())
    <nav class="flex flow-row wrap-none gap-md ai-center" role="navigation" aria-label="Pagination Navigation">
      <span>
        @if ($paginator->onFirstPage())
          <button class="ms-button is-outlined is-small" disabled>
            <span class="ms-button__label">Previous</span>
          </button>
        @else
          <button class="ms-button is-outlined is-small" wire:click="previousPage" wire:loading.attr="disabled" rel="prev">
            <span class="ms-button__label">Previous</span>
          </button>
        @endif
      </span>
      @foreach ($elements as $element)
        @if (is_string($element))
          <span aria-disabled="true">
            <span>{{ $element }}</span>
          </span>
        @endif

        @if (is_array($element))
          @foreach ($element as $page => $url)
            <span wire:key="paginator-{{ $paginator->getPageName() }}-page{{ $page }}">
              @if ($page == $paginator->currentPage())
                <span aria-current="page">
                  <button class="ms-button is-small is-filled">
                    <span class="ms-button__label">{{ $page }}</span>
                  </button>
                </span>
              @else
                <button type="button" wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" class="ms-button is-small" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                  <span class="ms-button__label">{{ $page }}</span>
                </button>
              @endif
            </span>
          @endforeach
        @endif
      @endforeach
      <span>
        @if ($paginator->onLastPage())
          <button class="ms-button is-outlined is-small" disabled>
            <span class="ms-button__label">Next</span>
          </button>
        @else
          <button class="ms-button is-outlined is-small" wire:click="nextPage" wire:loading.attr="disabled" rel="next">
            <span class="ms-button__label">Next</span>
          </button>
        @endif
      </span>
    </nav>
    <div class="flex flow-row wrap-none jc-center ai-center mt-md">
      <p>Page {{ $paginator->currentPage() }} of {{ $paginator->total() }}</p>
    </div>
  @endif
</div>