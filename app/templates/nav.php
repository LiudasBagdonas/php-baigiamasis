<nav>
    <ul>
        <?php foreach ($data as $title => $link): ?>
            <?php if ($title == '/' || $title == '/about'): ?>
                <li><a href="<?php print $title; ?>"><?php print $link; ?></a></li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
    <ul>
        <?php foreach ($data as $title => $link): ?>
            <?php if ($title == '/login' || $title == '/register'): ?>
                <li><a href="<?php print $title; ?>"><?php print $link; ?></a></li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</nav>

