<?php

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
                
        <?php echo link_tag('statics/css/contenido.css'); ?>
        <?php echo link_tag('statics/css/main.css'); ?>
        <?php echo link_tag('statics/css/content.css'); ?>
        <?php echo link_tag('statics/css/jquery.confirm.css'); ?>
        <?php echo link_tag('statics/css/menu.css'); ?>
        <?php echo link_tag('statics/css/spaces.css'); ?>
        <?php echo link_tag('statics/css/font.css'); ?>
         <?php echo link_tag('statics/css/jquery.modal.css'); ?>
         <?php echo link_tag('statics/css/jquery.ptTimeSelect.css'); ?>
        <?php echo link_tag('statics/css/jquery-impromptu.css'); ?>
         <?php echo link_tag('statics/css/ui.switchbutton.css'); ?>
          <?php echo link_tag('statics/css/demo.css'); ?>
        <?php echo link_tag('statics/css/createcodigo.css'); ?>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
        
        <script type="text/javascript" src="<?php echo base_url().'statics/js/libraries/jquery.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'statics/js/libraries/confirm.jquery.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'statics/js/libraries/base_url.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'statics/js/libraries/jquery.textareaCounter.plugin.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'statics/js/libraries/jquery-ui-1.8.16.custom.min.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'statics/js/modules/menu.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'statics/js/libraries/jquery-impromptu.js'; ?>"></script>
         <script type="text/javascript" src="<?php echo base_url().'statics/js/libraries/jquery.ptTimeSelect.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'statics/js/libraries/jquery.tmpl.min.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'statics/js/libraries/jquery-ui-1.8.16.custom.min.js'; ?>"></script> 
        <script type="text/javascript" src="<?php echo base_url().'statics/js/libraries/jquery.switchbutton.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'statics/js/libraries/demo.js'; ?>"></script>
        <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
         
        <?php if(isset($included_js)): ?>
            <?php foreach($included_js as $files_js): ?>
                <script type="text/javascript" src="<?php echo base_url().$files_js; ?>"></script>
            <?php endforeach; ?>
        <?php endif; ?>
    </head>
    <body>
        <aside>
            <?php if(isset($aside)): ?>
                <?php echo $aside; ?>
            <?php endif; ?>
        </aside>
        <section>
            <?php if(isset($content)): ?>
                <?php echo $content; ?>
            <?php endif; ?>
        </section>
    </body>
</html>
