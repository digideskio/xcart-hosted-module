Compatibility
=========================

Compatible with Version 4. 

Installation Instructions
=========================

**Step 1:**

Copy the contents of the httpdocs directory into your root X-Cart directory.

**Step 2:**

Log in to the Admin area of X-cart, then mouseover Tools in the top menu, then click
Patch / Upgrade.
Next, scroll to the bottom and click “browse” under the “Apply SQL Patch” heading.
Then select the update.sql file provided and finally click Apply.

**Step 3:**

Next, mouseover Tools in the top menu, and then click maintenance. Then, scroll
down until you see “Clear templates/X-Cart cache” – Click the clear button below
this.

**Step 4:**

Next, mouseover Settings in the top menu, and then click Payment Methods. Switch to 
the Payment Gateways tab and select ‘Cardstream - Hosted’ from the Payment Gateways 
drop down. Finally, click Add.

The following is only applicable to older versions of X-cart.
If this is a fresh installation of X-Cart, you may need to choose “Accept credit cards”,
then click next, then choose Cardstream from the “All other payment solutions”
dropdown, then click add. Next, click the Cardstream checkbox and then click Next.
Finally, click finish.

**Step 5:**

From the Payment Methods list, make sure the checkbox directly to the left of the
Cardstream entry is checked, then click Apply Changes.

**Module Configuration**

![Xcart Config settings](/images/config-page.png)

To access the configuration page mouseover Settings in the top menu and then click
Payment methods. Next, click the Configure link on the Cardstream entry in the
Payment Methods list.

| Config Option | Description |
| :-------------|:------------|
| Merchant ID | Enter your merchant ID here, or 100001 for test mode. |
| Currency Code | The 3 digit ISO currency code. Use 826 for Pounds Sterling. |
| Country Code | The 3 digit ISO country code for your location, Use 826 for the UK. |
