# Premium Timber Hub - Enquiry Email Delivery

## Local environment

The local WordPress installation has no deliverable mail transport. A locally submitted form may validate successfully but must not be treated as an email-delivery test.

## Production requirement

Before launch, configure one approved delivery route:

1. A WordPress SMTP/transactional-email integration authenticated for the sending domain; or
2. A server-level mail transport with an authenticated sender domain.

The approved sender and recipient must use valid SPF, DKIM and DMARC configuration.

## Recipient and routing

- Do not hard-code `sales@premiumtimberhub.eu` or another mailbox until the responsible contact and sales process are confirmed.
- Store the recipient as a production configuration value, not a theme-code constant.
- Keep website enquiries separate from internal notifications where possible.
- Preserve selected product, CTA intent, source page and UTM data in the delivered lead.

## Sales-assistant access

- The assistant should receive approved, least-privilege access to the sales mailbox or lead store.
- The assistant may classify, summarise and draft; it may not send mail or commercial commitments without human approval.
- Never expose mailbox credentials in WordPress, theme files or client-side JavaScript.

## Production verification

1. Submit a real enquiry on the public production domain.
2. Confirm receipt in the correct mailbox and inspect spam placement.
3. Confirm sender authentication passes.
4. Test attachment restrictions, validation errors, consent capture and spam protection.
5. Confirm the responsible person can act on the lead and the assistant receives only the intended data.
