<?php

namespace App\Controllers;

use App\Models\ContactModel;

$session = \Config\Services::session();
$validation = \Config\Services::validation();

// TODO: agregar login y signup
session()->set('idUser', 1);

class Agenda extends BaseController
{
  protected $model;
  protected $session;

  public function __construct()
  {
    $this->model = model(ContactModel::class);
  }

  public function view()
  {

    $userId = $_SESSION['idUser'];

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

    $rules = [
      'idUser' => 'required',
      'name' => 'required',
      'surname1' => 'required',
      'surname2' => 'max_length[50]',
      'tel' => 'required|is_unique[contact.tel]',
      'email' => 'required|is_unique[contact.email]',
    ];

    // Validación de campos
    if (!$this->validateData($post, $rules)) {
      // Error en la validación
      return $this->view();
    }

    $this->model->save($post);

    return $this->view();
  }
}
