
REPLACE INTO `xcart_ccprocessors` (`module_name`, `type`, `processor`, `template`, `param01`, `param02`, `param03`, `param04`, `param05`, `param06`, `param07`, `param08`, `param09`, `disable_ccinfo`, `background`, `testmode`, `is_check`, `is_refund`, `c_template`, `paymentid`, `cmpi`, `use_preauth`, `preauth_expire`, `has_preauth`, `capture_min_limit`, `capture_max_limit`) VALUES
('Cardstream - Hosted', 'C', 'cc_cardstream.php', 'cc_cardstream.tpl', '100001', 'Circle4Take40Idea', '826', '826', '', '', '', '', '', 'Y', 'N', 'N', '', '', 'cc_cardstream.tpl', 0, '', '', 0, 'Y', '0%', '0%');

REPLACE INTO `xcart_languages` (`code`, `name`, `value`, `topic`) VALUES ('en', 'cc_cardstream_merchantID', 'Merchant ID', 'Labels');
REPLACE INTO `xcart_languages` (`code`, `name`, `value`, `topic`) VALUES ('en', 'cc_cardstream_shared_key', 'Preshared Signature Key', 'Labels');
REPLACE INTO `xcart_languages` (`code`, `name`, `value`, `topic`) VALUES ('en', 'cc_cardstream_countryCode', 'Country Code', 'Labels');
REPLACE INTO `xcart_languages` (`code`, `name`, `value`, `topic`) VALUES ('en', 'cc_cardstream_currencyCode', 'Currency Code', 'Labels');