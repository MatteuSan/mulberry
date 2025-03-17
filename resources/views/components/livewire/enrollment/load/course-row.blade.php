<tr class="fill-primary-600 ink-primary-ink">
  <td class="py-md px-lg align-center">{{ $course->slug }}</td>
  <td class="py-md px-lg">{{ $course->name }}</td>
  <td class="py-md px-lg align-center">{{ $course->units }}</td>
  @if($isSectionVisible)
    <td class="py-md px-lg align-center">
      EA153
    </td>
  @endif
</tr>