xcart-hosted-module
===================

Installation Instructions
=========================

Step 1:

Copy the contents of the httpdocs directory into your root X-Cart directory.

Step 2:

Log in to the Admin area of X-cart, then mouseover Tools in the top menu, then click
Patch / Upgrade.
Next, scroll to the bottom and click “browse” under the “Apply SQL Patch” heading.
Then select the update.sql file provided and finally click Apply.

Step 3:

Next, mouseover content in the top menu, and then click languages. Then, scroll to
the bottom of the page to the “Add New Entry” field. Each of the following rows needs
to be copy and pasted as appropriate into the form, and then the form submitted - For
each row, the label stays as the default value (Label)
Variable: Value:
lbl_cc_cardstream_merchantid Merchant ID
lbl_cc_cardstream_currencycode Currency Code
lbl_cc_cardstream_countrycode Country Code

Step 4:

Next, mouseover Tools in the top menu, and then click maintenance. Then, scroll
down until you see “Clear templates/X-Cart cache” – Click the clear button below
this.

Step 5:

Next, mouseover Settings in the top menu, and then click Payment Methods. Scroll
to the bottom of the page to the Payment Gateways dropdown, then select
CharityClear from the list. Finally, click Add.
If this is a new instillation of X-Cart, you will need to choose “Accept credit cards”,
then click next, then choose CharityClear from the “All other payment solutions”
dropdown, then click add. Next, click the CharityClear checkbox and then click Next.
Finally, click finish.

Step 6:

From the Payment Methods list, make sure the checkbox directly to the left of the
CharityClear entry, then click Apply Changes if required.

Module Configuration
To access the configuration page mouseover Settings in the top menu and then click
Payment methods. Next, click the Configure link on the CharityClear entry in the
Payment Methods list.

| Config Option | Description |
| Merchant ID | Enter your merchant ID here, or 0000992 for test mode. |
| Currency Code | The 3 digit ISO currency code. Use 826 for Pounds Sterling. |
| Country Code | The 3 digit ISO country code for your location, Use 826 for the UK. |
