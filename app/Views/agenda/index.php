<h2 class="text-2xl text-center"><?= esc($title) ?></h2>

<?= helper('form') ?>
<?= session()->getFlashdata('error') ?>

<div class="flex justify-center">
  <form action="/agenda" method="post" class="w-full md:w-5/6 my-2">

    <div class="text-red-500 text-center">
      <?= validation_list_errors() ?>
    </div>

    <?= csrf_field() ?>

    <div class="grid grid-cols-2 gap-2 auto-rows-auto">
      <label for="name">Nombre (Nombres)</label>
      <input type="text" name="name" id="name" value="<?= set_value('name') ?>" required maxlength="100" class="border rounded invalid:border-red-500 px-1">

      <label for="surname1">Apellido Paterno</label>
      <input type="text" name="surname1" id="surname1" value="<?= set_value('surname1') ?>" required maxlength="50" class="border rounded invalid:border-red-500 px-1">

      <label for="surname2">Apellido Materno</label>
      <input type="text" name="surname2" id="surname2" value="<?= set_value('surname2') ?>" maxlength="50" class="border rounded invalid:border-red-500 px-1">

      <label for="tel">Número de Teléfono (10 dígitos)</label>
      <input type="tel" name="tel" id="tel" value="<?= set_value('tel') ?>" placeholder="Ex: 0123456789" required pattern="^[0-9]{10}$" class="border rounded invalid:border-red-500 px-1">

      <label for="email">Coreo electrónico</label>
      <input type="email" name="email" id="email" value="<?= set_value('email') ?>" placeholder="Ex: user@example.com" required pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" maxlength="120" class="border rounded invalid:border-red-500 px-1">
    </div>

    <div class="flex justify-center mt-2">
      <button type="submit" class="border rounded p-2">Crear nuevo contacto</button>
    </div>
  </form>
</div>

<?php if (!empty($contacts) && is_array($contacts)) : ?>
  <table class="table-auto min-w-full text-center">
    <tr class="border rounded">
      <th class="">Nombre</td>
      <th class="">Teléfono</td>
      <th class="">Correo</td>
    </tr>

    <?php foreach ($contacts as $contact_item) : ?>
      <tr class="border rounded even:bg-slate-200">
        <td>
          <?= esc($contact_item['name']) ?>
          <?= esc($contact_item['surname1']) ?>
          <?= esc($contact_item['surname2']) ?>
        </td>
        <td>
          <?= esc($contact_item['tel']) ?>
        </td>
        <td>
          <p> <?= esc($contact_item['email']) ?> </p>
        </td>
      </tr>
    <?php endforeach ?>
  </table>
<?php else : ?>
  <h3 class="text-xl">Sin Contactos</h3>
  <p>Aún no tienes contactos guardados en tu agenda.</p>
<?php endif ?>