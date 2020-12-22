<nav>
    <?php if (!isset($_SESSION['email'])): ?>
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
    <?php else: ?>
        <ul>
            <?php foreach ($data as $title => $link): ?>
                <?php if ($title == '/' || $title == '/about'): ?>
                    <li><a href="<?php print $title; ?>"><?php print $link; ?></a></li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
        <ul>
            <?php foreach ($data as $title => $link): ?>
                <?php if ($title == '/logout'): ?>
                    <li><a href="<?php print $title; ?>"><?php print $link; ?></a></li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</nav>

