<?php

namespace App\Livewire\Admin\Enrollment\Manage;

use App\Models\LoadRequest;
use Illuminate\View\View;
use Livewire\Component;

class Form extends Component
{
  public $load;
  public int $id,
             $requestId;

  public function approve(): void
  {
    if ($this->requestId) {
      $this->load = LoadRequest::where('id', $this->requestId)->firstOrFail();
      $this->load->is_approved = true;
      $this->load->save();
      $this->redirect(route('enrollment'));
    }
  }

  public function unapprove(): void
  {
    if ($this->requestId) {
      $this->load = LoadRequest::where('id', $this->requestId)->firstOrFail();
      $this->load->is_approved = false;
      $this->load->save();
      $this->redirect(route('enrollment'));
    }
  }

  public function render(): View
  {
    return view('components.livewire.admin.enrollment.manage.form');
  }
}
