<h1 class="header header--main"><?php print $data['title']; ?></h1>

<table class="table">
    <tr>
        <?php foreach ($data['headers'] as $header): ?>
            <th><?php print $header; ?></th>
        <?php endforeach; ?>
    </tr>
</table>
<?php if (isset($data['user'])): ?>
    <!-- Update Modal (Popup)-->
    <?php if (isset($data['form']['comment'])): ?>
<!--        <div class="comment-form-box">-->
                <?php print $data['form']['comment']; ?>
<!--        </div>-->
    <?php endif; ?>
<?php else: ?>
  <div class="register-redirect-box">
      <span><?php print 'Want to leave a comment? <a href="/register">Register!</a>';?></span>
<!--      <a href="/register">Register!</a>-->
  </div>
<?php endif; ?>
