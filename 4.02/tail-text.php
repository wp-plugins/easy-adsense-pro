<?php
/*
Copyright (C) 2008 www.thulasidas.com

This file is part of the programs "Easy AdSense", "AdSense Now!",
"Theme Tweaker", "Easy LaTeX", "More Money" and "Easy Translator".

These programs are free software; you can redistribute them and/or
modify it under the terms of the GNU General Public License as
published by the Free Software Foundation; either version 3 of the
License, or (at your option) any later version.

These programs are distributed in the hope that they will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
General Public License for more details.

You should have received a copy of the GNU General Public License
along with the programs.  If not, see <http://www.gnu.org/licenses/>.
*/

function makeTextWithTooltip($text, $tip, $title='', $width='')
{
  if (!empty($title))
    $titleText = "TITLE, '$title',STICKY, 1, CLOSEBTN, true, CLICKCLOSE, true,";
  if (!empty($width))
    $widthText = "WIDTH, $width," ;
  $return = "<span style='text-decoration:none' " .
    "onmouseover=\"Tip('". htmlspecialchars($tip) . "', " .
    "$widthText $titleText FIX, [this, 5, 5])\" " .
    "onmouseout=\"UnTip()\">$text</span>" ;
  return $return ;
}

function renderPlg($name, $plg) {
  $value = $plg['value'];
  $desc = $plg['desc'] ;
  $toolTip = $plg['title'] ;
  $url = 'http://www.thulasidas.com/plugins/' . $name ;
  $link = '<b><a href="' . $url . '" target="_blank">' . $value . '</a> </b>' ;
  $text = $link . $desc ;
  $price = $plg['price'] ;
  $moreInfo =  " &nbsp;  &nbsp; <a href='http://www.thulasidas.com/plugins/$name' title='More info about $value'> More Info </a>" .
    "&nbsp; <a href='http://buy.ads-ez.com/$name/$name.zip' title='Download the Lite version of $value'>Get Lite Version </a>" .
    "&nbsp; <a href='http://buy.ads-ez.com/$name' title='Buy the Pro version of $value for \$$price. Instant download link.'>Buy Pro Version</a>" ;
  $toolTip .= addslashes('<br />' . $moreInfo) ;
  $why = addslashes($plg['pro']) ;
  echo "<li>" .  makeTextWithTooltip($text, $toolTip, $value, 350) .
    makeTextWithTooltip($moreInfo, $why, "Why go Pro?", 300) . "</li>\n" ;
}

?>

<table class="form-table" >
<tr>
<td>

<ul style="padding-left:10px;list-style-type:circle; list-style-position:inside;" >
<li><font color="red">Give me some <a href="http://db.tt/qsogWB1" title="Sign up for Dropbox -- free 2GB online storage on the cloud!" target="_blank">space</a>!</font></li>
<li>
<?php _e('Please report any problems. And share your thoughts and comments.', 'easy-adsenser') ; ?>&nbsp;<a href="http://wordpress.org/tags/<?php echo $plgName ; ?>" title="<?php _e('Post it in the WordPress forum', 'easy-adsenser') ; ?>" target="_blank"><?php _e("[WordPress Forum]", 'easy-adsenser') ?> </a>
<li>
  If you need support, please read more information about <a href="http://www.Thulasidas.com/plugins/<?php echo $plgName ; ?>-more#FAQ" target="_blank" title="<?php _e('Go to the plugin description page', 'easy-adsenser') ; ?>"><?php echo $myPlugins[$plgName]['value'] ; ?></a> first -- in particular, the FAQ section.
</li>
<li>
  <?php _e("Or, if you still need help, you can raise a support question.", 'easy-adsenser') ?> <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=<?php echo $myPlugins[$plgName]['support']  ; ?>" title="<?php _e('Ask a support question via PayPal @ $0.95', 'easy-adsenser') ; ?>"> <?php _e("[Request Paid Support]", 'easy-adsenser') ?></a>
</li>
<li>
<?php _e('Check out my other plugin efforts:', 'easy-adsenser') ; ?>

<ul style="margin-left:0px; padding-left:30px;list-style-type:square; list-style-position:inside;" >

<?php
  foreach ($myPlugins as $name => $plg) if ($name != $plgName) renderPlg($name, $plg) ;
?>

</ul>
</li>
</ul>
</td>
</tr>

<?php echo '</table>' ; ?>
