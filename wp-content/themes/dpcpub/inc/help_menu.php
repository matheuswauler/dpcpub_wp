<?php
if(!isset($use_menu) || !$use_menu){
	exit;
}
?>

<nav class="menu_help">
	<h1>AJUDA</h1>
	<a href="<?php echo get_site_url(); ?>/como-surgiu/" title="Como surgiu o DPCPub" class="<?php if(is_page('como-surgiu')) echo 'selected'; ?>">Como surgiu o DPCPub</a>
	<a href="<?php echo get_site_url(); ?>/tutorial/" title="Aprenda como utilizar a ferramenta" class="<?php if(is_page('tutorial')) echo 'selected'; ?>">Como usar o DPCPub</a>
	<a href="<?php echo get_site_url(); ?>/referencias-bibliograficas/" title="Referências Bibliográficas" class="<?php if(is_page('referencias-bibliograficas')) echo 'selected'; ?>">Referências Bibliográficas</a>
	<a href="<?php echo get_site_url(); ?>/contato/" title="Entre em contato e falaremos com você" class="<?php if(is_page('contato')) echo 'selected'; ?>">Fale Conosco</a>
</nav>