{*
39dc2317e8d3ff16f34a37865c1be497158705f8, v8 (xcart_4_6_1), 2013-08-28 10:29:51, cc_authorizenet_sim.tpl, aim
vim: set ts=2 sw=2 sts=2 et:
*}
<h1>Cardstream Hosted Form</h1>
{$lng.txt_cc_configure_top_text}
<br /><br />
{capture name=dialog}
<a href="https://www.cardstream.com/signup/" target="_blank"><img src="{$ImagesDir}/cs-smaller-logo.png"  alt="" align='middle' /></a>
<a href="https://www.cardstream.com/signup/" class="simple-button" target="_blank">{$lng.cc_cardstream_signup}</a>
<br />
<form action="cc_processing.php?cc_processor={$smarty.get.cc_processor|escape:"url"}" method="post">

<table cellspacing="10">
<tr>
	<td>{$lng.cc_cardstream_merchantID}:</td>
	<td><input type="text" name="param01" size="24" value="{$module_data.param01|escape}" /></td>
</tr>
<tr>
	<td>{$lng.cc_cardstream_shared_key}:</td>
	<td><input type="text" name="param02" size="24" value="{$module_data.param02|escape}" /></td>
</tr>
<tr>
	<td>{$lng.cc_cardstream_countryCode}:</td>
	<td><input type="text" name="param03" size="6" maxlength="6" value="{$module_data.param03|default:"826"|escape}" /></td>
</tr>

<tr>
	<td>{$lng.cc_cardstream_currencyCode}:</td>
	<td><input type="text" name="param04" size="6" maxlength="6" value="{$module_data.param04|default:"826"|escape}" /></td>
</tr>

<tr>
	<td>{$lng.lbl_cc_testlive_mode}:</td>
	<td>
		<select name="testmode">
			<option value="Y"{if $module_data.testmode eq "Y"} selected="selected"{/if}>{$lng.lbl_cc_testlive_test}</option>
			<option value="N"{if $module_data.testmode eq "N"} selected="selected"{/if}>{$lng.lbl_cc_testlive_live}</option>
		</select>
	</td>
</tr>

<tr>
	<td>{$lng.lbl_use_preauth_method}:</td>
	<td>
		<select name="use_preauth">
			<option value="">{$lng.lbl_auth_and_capture_method}</option>
			<option value="Y"{if $module_data.use_preauth eq 'Y'} selected="selected"{/if}>{$lng.lbl_auth_method}</option>
		</select>
	</td>
</tr>

</table>
<br /><br />
<input type="submit" value="{$lng.lbl_update|strip_tags:false|escape}" />
</form>

{/capture}
{include file="dialog.tpl" title=$lng.lbl_cc_settings content=$smarty.capture.dialog extra='width="100%"'}
