<?php
ms::meta('theme', $theme);
$domain = etc::domain();
$priority = 10;
md::config_update();
jsGo('?module='.$module.'&action=config_theme');
