<?php
/**
 * Created by michaelwatts
 * Date: 28/05/2013
 * Time: 11:13
 */

require 'ScrapeTwo.php';

$sc = new ScrapeTwo();
$sc->setUrl('http://www.guardian.co.uk/profile/jeevanvasagar');
$sc->setScrapeStart('<ul id="auto-trail-block" class="auto-trail-block trailblock">');
$sc->setScrapeEnd('</ul>');
echo $sc->run();