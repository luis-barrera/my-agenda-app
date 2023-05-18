<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
  protected $table = 'contact';
  protected $primaryKey = 'idContact';
  protected $allowedFields = ['idUser', 'name', 'surname1', 'surname2', 'tel', 'email'];

  public function getAllContactsByUser($userId)
  {
    // Verificar que se pase un id de usuario
    if ($userId) {
      // Obtener los contacto de cierto usuario
      return $this->where("idUser", $userId)->findAll();
    }

    return [];
  }
}
