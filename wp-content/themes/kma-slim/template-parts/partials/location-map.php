<?php

use Includes\Modules\Locations\Locations;

/**
 * @package KMA
 * @subpackage kmaslim
 * @since 1.0
 * @version 1.2
 */

$locations = new Locations();
$offices = $locations->getLocations();

?>
<div class="location-map">
    <google-map :latitude="29.989549" :longitude="-85.414253" :zoom="10" name="locations" class="is-full-height" >
        <?php foreach($offices as $location){ ?>
            <pin :latitude="<?= $location['latitude']; ?>" :longitude="<?= $location['longitude']; ?>" title="<?= $location['name']; ?>">
                <p><strong><?= $location['name']; ?></strong></p>
                <p class="address"><?= nl2br($location['address']); ?></p>
                <p class="phone"><em>tel:</em> <a href="tel:<?= $location['phone']; ?>"><?= $location['phone']; ?></a></p>
                <p class="phone"><em>fax:</em> <a href="tel:<?= $location['fax']; ?>"><?= $location['fax']; ?></a></p>
                <p class="appt-button" style="margin-top:.5rem;"><a class="button is-info" href="https://www.google.com/maps/dir//<?= $location['latitude']; ?>,<?= $location['longitude']; ?>">Get Directions</a></p>
            </pin>
        <?php } ?>
    </google-map>
</div>
