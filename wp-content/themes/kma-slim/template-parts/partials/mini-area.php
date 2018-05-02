<?php
$area = (isset($area) ? $area : null);
?>
<div class="area column is-6-tablet is-4-desktop is-3-widescreen">
    <div class="image is-square">
        <a href="<?= $area['link']; ?>" class="area-link">
            <span class="area-border">
                <span class="area-label bebas"><?= $area['name']; ?></span>
            </span>
        </a>
        <img src="<?= $area['images']['thumbnail']; ?>" alt="<?= $area['name']; ?>">
    </div>
</div>