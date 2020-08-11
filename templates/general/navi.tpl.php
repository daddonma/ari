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
        
        <li>
            <a href="#">Kontakt</a>
        </li>
        
        <li>
            <a href="#">Impressum</a>
        </li>
    </ul>
</nav>