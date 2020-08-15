<nav onclick="return true"><!-- return true um hover für Touchscreens aktivieren -->
   
    <ul>
        <li class="<?php if($controllerName === 'index'): ?>active<?php endif; ?>">
            <a href="?controller=index">Startseite</a>
        </li>
        
        <li class="<?php if($controllerName === 'aboutUs'): ?>active<?php endif; ?>">
            <a href="?controller=aboutUs">Über Uns</a>
        </li>
        
        <li class="<?php if($controllerName === 'reise'): ?>active<?php endif; ?>">
            <a href="?controller=reise">Aktuelle Reiseangebote</a>
        </li>
        
        <li class="<?php if($controllerName === 'kontakt'): ?>active<?php endif; ?>">
            <a href="?controller=kontakt">Kontakt</a>
        </li>
        
        <li class="<?php if($controllerName === 'impressum'): ?>active<?php endif; ?>">
            <a href="?controller=impressum">Impressum</a>
        </li>
    </ul>
</nav>