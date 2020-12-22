<h1 class="header header--main"><?php print $data['title']; ?></h1>

<section class="table-box">
    <table class="table">
        <tr>
            <?php foreach ($data['headers'] as $header): ?>
                <th><?php print $header; ?></th>
            <?php endforeach; ?>
        </tr>
    </table>
</section>

<?php if (isset($data['form']['comment'])): ?>
    <?php print $data['form']['comment']; ?>

<?php endif; ?>
<?php if (isset($data['link'])): ?>
    <div class="register-redirect-box">
        <?php print $data['link']; ?>
    </div>
<?php endif; ?>
