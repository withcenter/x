<?php
ms::meta('theme', $theme);
$domain = etc::domain();
$theme = $in['theme'];
$priority = 10;
md::config_update();
jsGo('?module='.$module.'&action=config_theme');
