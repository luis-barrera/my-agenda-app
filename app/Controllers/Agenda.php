<?php

namespace App\Controllers;

use App\Models\ContactModel;

class Agenda extends BaseController
{
  // TODO: pasar id de Usuario
  public function view($userId = 1)
  {
    $model = model(ContactModel::class);

    $data = [
      'contacts' => $model->getAllContactsByUser($userId),
      'title' => 'Agenda'
    ];

    return view('templates/header', $data)
      . view('agenda/index', $data)
      . view('templates/footer');
  }
}
