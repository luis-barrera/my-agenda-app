<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;

class Pages extends BaseController
{
  public function view($page = 'home')
  {
    // Handler para saber que la página solicitada existe
    if (!is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
      // Exception de que la página no existe
      throw new PageNotFoundException($page);
    }

    // Pasar el título de la página
    $data['title'] = ucfirst($page);

    // Render del view: incluir el header, la page y el footer
    return view('templates/header', $data)
      . view('pages/' . $page)
      . view('templates/footer');
  }
}
