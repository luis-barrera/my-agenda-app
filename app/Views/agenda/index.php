<h2><?= esc($title) ?></h2>

<?= helper('form') ?>
<?= session()->getFlashdata('error') ?>
<?= session()->set('idUser', 1) ?>
<?= validation_list_errors() ?>

<form action="/agenda" method="post">
  <?= csrf_field() ?>

  <label for="name">Nombre (Nombres)</label>
  <input type="text" name="name" id="name" value="<?= set_value('name') ?>">
  <br>

  <label for="surname1">Apellido Paterno</label>
  <input type="text" name="surname1" id="surname1" value="<?= set_value('surname1') ?>">
  <br>

  <label for="surname2">Apellido Materno</label>
  <input type="text" name="surname2" id="surname2" value="<?= set_value('surname2') ?>">
  <br>

  <label for="tel">Número de Teléfono</label>
  <input type="tel" name="tel" id="tel" value="<?= set_value('tel') ?>">
  <br>

  <label for="email">Coreo electrónico</label>
  <input type="email" name="email" id="email" value="<?= set_value('email') ?>">
  <br>

  <button type="submit">Crear nuevo contacto</button>
</form>

<?php if (!empty($contacts) && is_array($contacts)) : ?>
  <?php foreach ($contacts as $contact_item) : ?>
    <h3><?= esc($contact_item['name']) ?></h3>

    <div class="main">
      <?= esc($contact_item['tel']) ?>
    </div>

  <?php endforeach ?>
<?php else : ?>
  <h3>Sin Contactos</h3>
  <p>Aún no tienes contactos guardados en tu agenda.</p>
<?php endif ?>