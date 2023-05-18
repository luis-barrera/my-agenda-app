<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
  protected $table = 'contact';
  protected $primaryKey = 'idContact';
  protected $allowedFields = ['idUser', 'name', 'surname1', 'surname2', 'tel', 'email'];

  protected $validationRules = [
    'idUser' => 'required',
    'name' => 'required',
    'surname1' => 'required',
    'surname2' => 'max_length[50]',
    'tel' => 'required|is_unique[contact.tel]',
    'email' => 'required|is_unique[contact.email]',
  ];
  protected $validationMessages = [
    'tel' => [
      'is_unique' => 'Lo sentimos, este teléfono ya está asignado a otro contracto',
    ],
    'email' => [
      'is_unique' => 'Lo sentimos, este correo ya está asignado a otro contracto',
    ],
  ];

  public function getAllContactsByUser($userId)
  {
    // Verificar que se pase un id de usuario
    if ($userId) {
      // Obtener los contacto de cierto usuario
      return $this->where("idUser", $userId)->findAll();
    } else {
      return [];
    }
  }
}
