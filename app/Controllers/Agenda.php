<?php

namespace App\Controllers;

use App\Models\ContactModel;

$session = \Config\Services::session();

class Agenda extends BaseController
{
  protected $model;
  protected $session;

  public function __construct()
  {
    $this->model = model(ContactModel::class);
  }

  public function view($userId = null)
  {
    $data = [
      'contacts' => $this->model->getAllContactsByUser($userId),
      'title' => 'Agenda'
    ];

    return view('templates/header', $data)
      . view('agenda/index', $data)
      . view('templates/footer');
  }

  public function create()
  {
    helper('form');

    if (!$this->request->is('post')) {
      return $this->view();
    }

    $post = $this->request->getPost(['name', 'surname1', 'surname2', 'tel', 'email']);
    $post['idUser'] = $_SESSION['idUser'];;

    // Validación de campos
    if (!$this->validateData($post, [
      'idUser' => 'required',
      'name' => 'required',
      'surname1' => 'required',
      'surname2' => '',
      'tel' => 'required',
      'email' => 'required',
    ])) {
      // Error en la validación
      return $this->view();
    }

    $this->model->save($post);

    return $this->view();
  }
}
