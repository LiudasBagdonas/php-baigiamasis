<!--<h1 class="header header--main">--><?php //print $data['title']; ?><!--</h1>-->

<table class="table">
    <tr>
        <?php foreach ($data['headers'] as $header): ?>
            <th><?php print $header; ?></th>
        <?php endforeach; ?>
    </tr>
</table>
<!-- Update Modal (Popup)-->
<?php if (isset($data['form']['comment'])): ?>
    <div id="update-modal" class="modal">
        <div class="wrapper">
<!--            <span class="close">&times;</span>-->
            <?php print $data['form']['comment']; ?>
        </div>
    </div>
<?php endif; ?>