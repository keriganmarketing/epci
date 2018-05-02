<?php
use Includes\Modules\Areas\Areas;

$areas = new Areas();
?>
<div class="container">
    <div class="content">
        <h2 class="has-text-centered">City Information</h2>
        <p class="has-text-centered">Click below for your city's contractor and homeowner information and forms.</p>
    </div>
    <div class="columns is-multiline is-gapless">
    <?php foreach($areas->getAreas() as $area){
        include(locate_template('template-parts/partials/mini-area.php'));
    } ?>
    </div>
</div>
