<?php

namespace App\Livewire\Admin\Announcement;

use App\Models\Announcement;
use DateTime;
use Illuminate\Support\Carbon;
use Illuminate\View\View;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class Card extends Component
{
  public int $id;
  public string $title,
                $content,
                $author;
  public Carbon $created_at,
                $updated_at;

  public function placeholder(): View
  {
    return view('components.livewire.announcement.skeleton');
  }

  public function delete(): void
  {
    Announcement::destroy($this->id);
    $this->dispatch('announcements-admin-updated');
  }

  public function render(): View
  {
    return view('components.livewire.admin.announcement.card', [
      'timeAgo' => function (DateTime $time, $full = false): string {
        $now = new DateTime;
        $ago = new DateTime($time);

        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = [
          'y' => 'yr',
          'm' => 'mon',
          'w' => 'w',
          'd' => 'd',
          'h' => 'h',
          'i' => 'm',
          's' => 's',
        ];

        foreach ($string as $k => &$v) {
          if ($diff->$k) $v = $diff->$k . '' . $v . ($diff->$k > 1 ? '' : '');
          else unset($string[$k]);
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(',', $string) . ' ago' : 'Just now';
      }
    ]);
  }
}
