<?php
/* vim: set ts=4 sw=4 sts=4 et: */
/*****************************************************************************\
+-----------------------------------------------------------------------------+
| X-Cart Software license agreement                                           |
| Copyright (c) 2001-2013 Qualiteam software Ltd <info@x-cart.com>            |
| All rights reserved.                                                        |
+-----------------------------------------------------------------------------+
| PLEASE READ  THE FULL TEXT OF SOFTWARE LICENSE AGREEMENT IN THE "COPYRIGHT" |
| FILE PROVIDED WITH THIS DISTRIBUTION. THE AGREEMENT TEXT IS ALSO AVAILABLE  |
| AT THE FOLLOWING URL: http://www.x-cart.com/license.php                     |
|                                                                             |
| THIS AGREEMENT EXPRESSES THE TERMS AND CONDITIONS ON WHICH YOU MAY USE THIS |
| SOFTWARE PROGRAM AND ASSOCIATED DOCUMENTATION THAT QUALITEAM SOFTWARE LTD   |
| (hereinafter referred to as "THE AUTHOR") OF REPUBLIC OF CYPRUS IS          |
| FURNISHING OR MAKING AVAILABLE TO YOU WITH THIS AGREEMENT (COLLECTIVELY,    |
| THE "SOFTWARE"). PLEASE REVIEW THE FOLLOWING TERMS AND CONDITIONS OF THIS   |
| LICENSE AGREEMENT CAREFULLY BEFORE INSTALLING OR USING THE SOFTWARE. BY     |
| INSTALLING, COPYING OR OTHERWISE USING THE SOFTWARE, YOU AND YOUR COMPANY   |
| (COLLECTIVELY, "YOU") ARE ACCEPTING AND AGREEING TO THE TERMS OF THIS       |
| LICENSE AGREEMENT. IF YOU ARE NOT WILLING TO BE BOUND BY THIS AGREEMENT, DO |
| NOT INSTALL OR USE THE SOFTWARE. VARIOUS COPYRIGHTS AND OTHER INTELLECTUAL  |
| PROPERTY RIGHTS PROTECT THE SOFTWARE. THIS AGREEMENT IS A LICENSE AGREEMENT |
| THAT GIVES YOU LIMITED RIGHTS TO USE THE SOFTWARE AND NOT AN AGREEMENT FOR  |
| SALE OR FOR TRANSFER OF TITLE. THE AUTHOR RETAINS ALL RIGHTS NOT EXPRESSLY  |
| GRANTED BY THIS AGREEMENT.                                                  |
+-----------------------------------------------------------------------------+
\*****************************************************************************/

/**
 * "X-Cart TEST" payment module (credit card processor)
 *
 * @category   X-Cart
 * @package    X-Cart
 * @subpackage Payment interface
 * @author     Paul Lashbrook <paul.lashbrook@cardstream.com>
 * @copyright  Copyright (c) 2001-2013 Cardstream Limited <support@cardstream.com>
 * @license    http://www.x-cart.com/license.php X-Cart license agreement
 * @see        ____file_see____
 */

	//die(var_dump($_POST));
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['responseCode']) && isset($_POST['state'])) {
    require './auth.php';

    if (!func_is_active_payment('cc_cardstream.php'))
        exit;

    $module_params = func_get_pm_params('cc_cardstream.php');
    $sessid = func_query_first_cell("SELECT sessid FROM $sql_tbl[cc_pp3_data] WHERE ref='".$_POST['transactionUnique']."'");

    srand();
    $txnid = md5(XC_TIME . rand(0, time()));

    $bill_output['code'] = intval($_POST['responseCode']);
    $bill_output['billmes'] = ($reason ? $reason : "Reason did not set") . ' (TransactionID: ' . $txnid.')';
    $bill_output['sessid'] = $sessid;

	if ($bill_output['code'] == 0){
		$bill_output['code'] = 1;
	}else{
		$bill_output['billmes'] = $_POST['responseMessage'];
	}

    if ($bill_output['code'] == 1) {
        if ($module_params['use_preauth'] == 'Y')
            $bill_output['is_preauth'] = true;

        $extra_order_data = array(
            'txnid' => $txnid,
            'capture_status' => $module_params['use_preauth'] == 'Y' ? 'A' : ''
        );

    }


//die(var_dump($bill_output,$oid,$_POST));
    require('payment_ccend.php');

} else {

    if (!defined('XCART_START')) { header("Location: ../"); die("Access denied"); }


	$pre_shared_key = $module_params['param02'];

    $_orderids = join("-", $secure_oid);
    if (!$duplicate)
        db_query("REPLACE INTO $sql_tbl[cc_pp3_data] (ref,sessid) VALUES ('".addslashes($_orderids)."','".$XCARTSESSID."')");


	$form_data = array(
		'customerName' => $bill_firstname.' '.$bill_lastname,
		'customerAddress' => $userinfo['b_address']."\n".$userinfo['b_city']."\n".$userinfo['b_state'],
		'customerPostcode' => $userinfo['b_zipcode'],
		'merchantID' => $module_params['param01'],
		'action' => $module_params['use_preauth'] == 'Y' ? 'PREAUTH' : 'SALE',
		'type' => '1',
		'amount' => $cart['total_cost']*100,
		'countryCode' => $module_params['param03'],
		'currencyCode' => $module_params['param04'],
		'transactionUnique' =>$_orderids,
		'redirectURL' => $current_location . '/payment/cc_cardstream.php',
		'merchantData' => 'xcart-4-1'
	);

	ksort($form_data);

	$sig_string = http_build_query($form_data).$pre_shared_key;
	$sig_string = preg_replace('/%0D%0A|%0A%0D|%0A|%0D/i', '%0A', $sig_string);
	$form_data['signature'] = hash('SHA512',$sig_string);

?>


	<form action="https://gateway.cardstream.com/hosted/" name="cardstreamform" method="post">
		<?php

			foreach($form_data as $k => $v){
				if($k == 'customerAddress'){
					echo "<textarea style='display:none;' name='$k'>$v</textarea>";
				}else{
					echo '<input type="hidden" name="'.$k.'" value="'.$v.'"/>';
				}
			}
		?>


	</form>

	<script type="text/javascript">
		document.cardstreamform.submit();
	</script>

<?php
}
exit;
?>
