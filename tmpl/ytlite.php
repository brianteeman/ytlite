<?php
/**
 * Custom Fields - Video custom field
 *
 * @author brian@teeman.net
 * @copyright Copyright (c) 2022
 * @license GNU Public License v2
 * @link https://brian.teeman.net
 */

defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\Uri\Uri;

if (empty($field->value))
{
    return;
}

/** @var Joomla\CMS\WebAsset\WebAssetManager $wa */
$wa = $this->app->getDocument()->getWebAssetManager();
$wa->registerAndUseStyle('plg_fields_ytlite', 'plg_fields_ytlite/lite-yt-embed.css');
$wa->registerAndUseScript('plg_fields_ytlite', 'plg_fields_ytlite/lite-yt-embed.js', [], ['defer' => true]);

$url = $field->value;
$regex = '/(?:youtube(?:-nocookie)?\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/m';
preg_match($regex, $url, $matches);
$videoid= $matches[1] ?? '';
?>
<lite-youtube videoid="<?php echo $videoid; ?>" style="background-image: url('https://i.ytimg.com/vi/<?php echo $videoid; ?>/maxresdefault.jpg');">
    <a href="<?php echo $url; ?>" class="lyt-playbtn" title="<?php echo Text::_('PLG_FIELDS_YTLITE_PLAY'); ?>"></a>
</lite-youtube>

