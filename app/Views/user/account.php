<main>
    <?php if ($mode == "login") {
    } elseif ($mode == "signup") {
        if ($step == 1) { ?>
            <?= form_open('signup/step2') ?>
            <input type="text" name="" id="">
            <input type="submit" value="Submit">
            <?= form_close() ?>
        <?php } elseif ($step == 2) { ?>
            <?= form_open('signup/step3') ?>
            <input type="submit" value="Submit">
            <?= form_close() ?>
        <?php } elseif ($step == 3) { ?>
            <?= form_open('signup/finish') ?>
            <input type="submit" value="Submit">
            <?= form_close() ?>
    <?php }
    }
    ?>
</main>