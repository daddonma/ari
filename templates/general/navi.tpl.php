<nav onclick="return true"><!-- return true um hover für Touchscreens aktivieren -->
   
    <ul>
        <li class="<?php if($controllerName === 'index' && $action === 'index'): ?>active<?php endif; ?>">
            <a href="<?= BASE_URL?>/?controller=index">Startseite</a>
        </li>
        
        <li class="<?php if($controllerName === 'index' && $action === 'aboutUs'): ?>active<?php endif; ?>">
            <a href="<?= BASE_URL?>/?controller=index&action=aboutUs">Über Uns</a>
        </li>
        
        <li class="<?php if($controllerName === 'reise'): ?>active<?php endif; ?>">
            <a href="<?= BASE_URL?>/?controller=reise">Aktuelle Reiseangebote</a>
        </li>
        
        <li class="<?php if($controllerName === 'index' && $action === 'kontakt'): ?>active<?php endif; ?>">
            <a href="<?= BASE_URL?>/?controller=index&action=kontakt">Kontakt</a>
        </li>
        
        <li class="<?php if($controllerName === 'index' && $action === 'impressum'): ?>active<?php endif; ?>">
            <a href="<?= BASE_URL?>/?controller=index&action=impressum">Impressum</a>
        </li>
    </ul>
</nav>