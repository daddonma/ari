<ul id="sidebar-right">
  <li><a href="<?= BASE_URL?>/admin/?controller=reise" class="<?php if($controllerName === 'reise'): ?> active<?php endif; ?>">Reiseverwaltung</a></li>
  <li><a href="<?= BASE_URL?>/admin/?controller=buchung" class="<?php if($controllerName === 'buchung'): ?> active<?php endif; ?>">Buchungen</a></li>
  <li><a href="<?= BASE_URL?>/?controller=user&action=logout">Ausloggen</a></li>
  <li><a href="<?= BASE_URL?>/?controller=index">Zurück zur Kundenansicht </a></li>
</ul>