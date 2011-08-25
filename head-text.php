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

function renderHeadText($name, $plg, $isPro) {
  $value = $plg['value'];
  $desc = $plg['desc'] ;
  $toolTip = $plg['title'] ;
  $url = 'http://www.thulasidas.com/plugins/' . $name ;
  $link = '<b><a href="' . $url . '" target="_blank">' . $value . '</a> </b>' ;
  $text = $link . $desc ;
  $price = $plg['price'] ;
  $moreInfo =
    "&nbsp; <a href='http://buy.ads-ez.com/$name/$name.zip' title='Download the Lite version of $value'>Lite Version </a>" .
    "&nbsp; <a href='http://buy.ads-ez.com/$name' title='Buy the Pro version of $value for \$$price'>Pro Version</a>" ;
  $toolTip .= addslashes('<br />' . $moreInfo) ;
  $why = addslashes($plg['pro']) ;
  if ($isPro) $version = 'Pro' ;
  else $version = 'Lite' ;
  echo "<b>Get Pro Version!</b>
<a href='http://buy.ads-ez.com/$name' title='Pro version of the $name plugin'><img src='https://www.paypalobjects.com/en_GB/SG/i/btn/btn_buynowCC_LG.gif' border='0' alt='PayPal — The safer, easier way to pay online.' class='alignright'/></a>
<br />
You are using the $version version of $value, which is available in two versions:
<ul><li>
$moreInfo
<li>$why And it costs only \$$price</li>
</ul>" ;
}
function renderProText($name, $plg, $isPro) {
  $value = $plg['value'];
  $desc = $plg['desc'] ;
  $toolTip = $plg['title'] ;
  $price = $plg['price'] ;
  $moreInfo =
    "&nbsp; <a href='http://buy.ads-ez.com/$name/$name.zip' title='Download the Lite version of $value'>Lite Version </a>" .
    "&nbsp; <a href='http://buy.ads-ez.com/$name' title='Buy the Pro Lite version of $value for \$$price'>Pro Version</a>" ;
  $toolTip .= addslashes('<br />' . $moreInfo) ;
  $why = addslashes($plg['pro']) ;
  echo '<div style="background-color:#ffcccc;padding:5px;border: solid 1px">
<center>
<big style="color:#a48;font-variant: small-caps;text-decoration:underline" onmouseover="TagToTip(\'pro\', WIDTH, 230, TITLE, \'Buy the Pro Version\',STICKY, 1, CLOSEBTN, true, CLICKCLOSE, true, FIX, [this, 5, 5])"><b>The Pro Version</b></big>
</center>' ;

  if ($isPro) echo "You are using the \"Pro\" version. If you haven't paid your licensing fee, please go legal and <a href='http://buy.ads-ez.com/$name' title='Pro version of this plugin'>get a legal copy</a>. It's only \$" . $price ;
  else  echo "You are using the \"Lite\" version of $value. The \"Pro\" version gives you more options. Consider <a href='http://buy.ads-ez.com/$name' title='Pro version of this plugin'>buying it</a>. It's only \$" . $price ;

  if ($name == 'easy-adsense' || $name == 'adsense-now') {
    echo '</div>
<div id="share" style="padding:5px"> ';
    printf(__("Starting version %3.1f, <em>%s</em> has an ad space sharing option, if you would like to support its future development. It gives you an option to share a small fraction of your ad slots (default is 5%%) to show the author's ads. Use the option (in \"Support %s by Donating Ad Space\") below to change the value, or turn it off (by entering 0%%) [Pro feature].", 'easy-adsenser'), 2.5, $value,  $value) ;
    echo "</div>" ;
  }
  echo "<div id='pro'>" ;
  renderHeadText($name, $plg, $isPro) ;
  echo "</div>" ;
}

?>
<td width="30%">
<?php
  if (!$ezIsPro) $supportText = "<div style=\"background-color:#cff;padding:5px;border: solid 1px\" id=\"support\"><b><a href=\"http://buy.ads-ez.com/$plgName\" title=\"Pro version of this plugin\">Go Pro! </a>Or Support this Plugin!</b>" ;
  else $supportText .= "<div style=\"background-color:#cff;padding:5px;border: solid 1px\" id=\"support\"><b>Thank you for going Pro!</b>";
if ($plgName == 'easy-adsense'|| $plgName == 'adsense-now')
  $supportText .= "<br /><span style='text-decoration:underline' onmouseover=\"TagToTip('share', WIDTH, 230, TITLE, 'Ad Space Sharing',STICKY, 1, CLOSEBTN, true, CLICKCLOSE, true, FIX, [this, 5, 2])\" onmouseout=\"UnTip()\">Share a small fraction of your ad space</span>, " ;
else
  $supportText .= '<br />Give me some <a href="http://db.tt/qsogWB1" title="Sign up for Dropbox -- free 2GB online storage on the cloud!" target="_blank">space</a>!' ;
$supportText .= "<br />Check out my books <span style=\"text-decoration:underline\" onmouseover=\"TagToTip('unreal', WIDTH, 205, TITLE, 'Buy &lt;em&gt;The Unreal Universe&lt;/em&gt;',STICKY, 1, CLOSEBTN, true, CLICKCLOSE, true, FIX, [this, 5, 2])\"><b style=\"color:#a48;font-variant: small-caps;text-decoration:underline\">The Unreal Universe</b></span> or <span style=\"text-decoration:underline\" onmouseover=\"TagToTip('pqd', WIDTH, 205, TITLE, '&lt;em&gt;Principles of Quant. Devel.&lt;/em&gt;',STICKY, 1, CLOSEBTN, true, CLICKCLOSE, true, FIX, [this, 5, 2])\"><b style=\"color:#84a;font-variant: small-caps;text-decoration:underline\">Principles of Quantitative Development</b></span>.</div>" ;
echo $supportText ;
 ?>
</td>

<td width="30%">

<?php
  renderProText($plgName, $myPlugins[$plgName], $ezIsPro) ;
?>

<div id="unreal" style="margin-left:auto;margin-right:auto;width:200px;display:block;">
<div style="text-align:center;width:200px;padding:1px;background:#aad;margin:2px;">
<div style="text-align:center;width:192px;height:180px;padding:2px;border:solid 1px #000;background:#ccf;margin:1px;">
<a style="text-decoration:none;" href="http://www.amazon.com/exec/obidos/ASIN/9810575947/unrblo-20" title="Find out more about The Unreal Universe and buy it ($9.95 for Kindle, $15.95 for paperback). It will change the way you view life and reality!">
<big style="font-size:14px;font-family:arial;color:#a48;font-variant: small-caps;"><b>The Unreal Universe</b></big><br />
<small style="font-size:12px;font-family:arial;color:#000;">
A Book on Physics and Philosophy
</small>
</a>
<hr />
<table border="0" cellpadding="0" cellspacing="0" summary="" width="100%" align="center">
<tr><td width="65%">
<a style="text-decoration:none;" href="http://www.amazon.com/exec/obidos/ASIN/9810575947/unrblo-20" title="Find out more about The Unreal Universe and buy it ($9.95 for Kindle, $15.95 for paperback). It will change the way you view life and reality!">
<small style="font-size:10px;font-family:arial;color:#000;">
Pages: 292<br />
(282 in eBook)<br />
Trimsize: 6" x 9" <br />
Illustrations: 34<br />
(9 in color in eBook)<br />
Tables: 8 <br />
Bibliography: Yes<br />
Index: Yes<br />
ISBN:<br />9789810575946&nbsp;
</small>
</a>
</td>
<td>
<a style="text-decoration:none;" href="http://www.amazon.com/exec/obidos/ASIN/9810575947/unrblo-20" title="Find out more about The Unreal Universe and buy it ($9.95 for Kindle, $15.95 for paperback). It will change the way you view life and reality!">
<img class="alignright" src="http://dl.dropbox.com/u/15050446/unreal.gif" border="0px" alt="TheUnrealUniverse" title="Read more about The Unreal Universe" />
</a>
</td>
</tr>
</table>
</div>
</div>
</div>

<div id="pqd" style="margin-left:auto;margin-right:auto;width:200px;display:block;">
<div style="text-align:center;width:200px;padding:1px;background:#000;margin:2px;">
<div style="text-align:center;width:190px;height:185px;padding:2px;padding-top:1px;padding-left:4px;border:solid 1px #fff;background:#411;margin:1px;">
<a style="text-decoration:none;" href="http://www.amazon.com/exec/obidos/ASIN/0470745703/unrblo-20" title="Find out more about Principles of Quantitative Development and buy it from Amazon.com">
<big style="font-size:14px;font-family:arial;color:#fff;font-variant: small-caps;">A Remarkable Book from Wiley-Finance</big>
</a>
<hr />
<table border="0" cellpadding="2px" cellspacing="0" summary="" width="100%" align="center">
<tr><td style="padding:0px">
<div style="border:solid 1px #faa;height:126px;width:82px;">
<a style="text-decoration:none;" href="http://www.amazon.com/exec/obidos/ASIN/0470745703/unrblo-20" title="Find out more about Principles of Quantitative Development and buy it from Amazon.com">
<img src="http://dl.dropbox.com/u/15050446/pqd-82x126.gif" border="0px" alt="PQD" title="Principles of Quantitative Development from Amazon.com" />
</a>
</div>
</td>
<td style="padding:3px">
<a style="text-decoration:none;" href="http://www.amazon.com/exec/obidos/ASIN/0470745703/unrblo-20" title="Find out more about Principles of Quantitative Development and buy it from Amazon.com">
<em style="font-size:14px;font-family:arial;color:#fff;">"An excellent book!"</em><br />
<small style="font-size:13px;font-family:arial;color:#faa;">&nbsp;&nbsp;&#8212; Paul Wilmott</small>
<br />
<small style="font-size:11px;font-family:arial;color:#fff;">
Want to break into the lucrative world of trading and quantitative finance? You <b>need </b> this book!
</small>
</a>
</td>
</tr>
</table>
</div>
</div>
</div>
<?php echo '</td>' ; ?>
