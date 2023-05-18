<h2><?= esc($title) ?></h2>

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