# Premium Timber Hub - MVP Website & Sales Assistant Specification

**Version:** 1.0  
**Date:** 2026-09-05  
**Status:** approved working specification  
**Purpose:** shared source of truth for the website-building agent and the sales-assistant work.

## 1. Objective

Build Premium Timber Hub as a credible European B2B specialist supplier of Abachi products for sauna manufacturing and interior professionals. The website must turn relevant visitors into qualified commercial enquiries. The sales assistant must help qualify and organise those enquiries, but never make unapproved commercial promises or send outreach without human approval.

This is an MVP. It must be useful, fast, clear and factually defensible - not a complete catalogue, e-commerce store or CRM.

## 2. Positioning

### Core audience

1. Sauna manufacturers.
2. Sauna installers and contractors.
3. Timber distributors.
4. Interior and wall-panel manufacturers.

The site is B2B only. It must not look like a shop for an individual buying materials for one home sauna.

### Core offer

Premium Timber Hub supplies Abachi for professional sauna and interior applications:

1. Natural Abachi products - only within confirmed available formats.
2. Thermo Abachi products - a separate premium product line.
3. Kiln-dried rough-sawn Abachi - for importers, manufacturers and profiling companies.

Raw timber is an important supply option, but it must not dominate the first screen or the overall site narrative.

### Approved positioning direction

Use clear, restrained language such as:

> Abachi for European Sauna Manufacturing.

> Natural and Thermo Abachi for sauna manufacturers, distributors and interior professionals across Europe.

> African Abachi. European Processing and Supply.

Do not present Premium Timber Hub primarily as a `trader` or a broad catalogue of African timber species.

### Claims that are prohibited until documented

Do not publish or use in assistant replies as established facts:

- `African Timber. European Standards.`
- `EU stock` / `European stock`.
- `Responsible sourcing`.
- `Controlled supply chain`.
- FSC claims or logos.
- exact MOQ, stock status, lead times or delivery promises;
- unconfirmed product dimensions, tolerances, profiles, grades or packaging;
- unverified statements about thermal-treatment performance;
- customer logos, testimonials or project claims without explicit permission.

When a fact is unknown, either omit it or use the approved safe wording in section 5.

## 3. MVP scope

### Required pages

1. **Home** (`/`) - positioning, three product paths, process evidence and primary enquiry CTA.
2. **Products** (`/products`) - concise overview of the three product directions.
3. **Natural Abachi** (`/products/natural-abachi`) - only confirmed formats; otherwise use availability-on-request wording.
4. **Thermo Abachi** (`/products/thermo-abachi`) - confirmed profile data and application context.
5. **Kiln-Dried Raw Abachi** (`/products/raw-abachi`) - raw-lumber offer for professional buyers.
6. **Contact / Request a Quote** (`/contact`) - the single, reliable enquiry entry point.

### Deferred from MVP

- separate `For Professionals`, `Supply & Quality`, `About Abachi` and `Insights` pages;
- multi-language versions;
- downloadable specification sheets;
- distributor programme;
- dynamic stock management;
- outdoor hardwood category;
- public pricing or e-commerce.

The homepage may contain short sections covering deferred topics where this helps comprehension, but do not create thin placeholder pages.

## 4. Homepage requirements

### Hero

**H1:** `Abachi for European Sauna Manufacturing`

**Supporting copy:** `Natural and Thermo Abachi cladding, bench boards and kiln-dried timber for professional B2B customers across Europe.`

Use a real finished sauna image if an approved one exists. If not, use the strongest truthful product/application image available. Do not imply an image depicts a Premium Timber Hub project unless it does.

**Primary CTA:** `Request a Quote`  
**Secondary CTA:** `View Products`

### Required sections

1. Three product cards: Natural Abachi, Thermo Abachi, Kiln-Dried Raw Abachi.
2. Why Premium Timber Hub: only evidence-led, generic-safe benefits such as `Specialised in Abachi`, `Graded and moisture-controlled`, `Processed for sauna applications`, `European B2B supply`.
3. From raw material to finished application: a simple process sequence. Steps that cannot be verified must be described neutrally or hidden.
4. Applications: sauna benches, wall and ceiling cladding, backrests, interior slat walls and custom profiles - only where product availability supports the statement.
5. B2B enquiry closing block.

## 5. Product facts and safe wording

### Confirmed facts

| Subject | Approved factual content |
|---|---|
| Thermo cladding | STS 3D profile; 20 mm thickness; 80 mm coverage width. |
| Thermo bench board | 80 x 20 mm. |
| Raw Abachi moisture content | Kiln-dried to 10-12%. |
| Raw grading | A: predominantly light / white appearance. AB: natural discolouration permitted. |
| Samples | A sample of several boards can be provided. |
| Pricing | Individual; depends on the order quantity. No public fixed price list. |
| Geography | European countries; English-language launch. |
| EU location | UAB ALFASIS, Pramonės g. 19, Parapijoniškės, Vilniaus r., LT-13241, Lithuania. |
| Thermal processing | Performed in Lithuania; exact published performance wording must follow process documentation. |
| Certification | FSC is not held. Specific documents may be named only after their copies and validity are checked. |

### Safe wording where the commercial detail is still open

| Topic | Approved wording |
|---|---|
| Product formats | `Available formats and dimensions are confirmed with your enquiry.` |
| Availability / lead time | `Contact us for current availability and lead time.` |
| Minimum quantity | `Order quantities are agreed individually.` |
| Pricing | `B2B pricing depends on product, dimensions, quantity and delivery location.` |
| Samples | `Request samples to assess the material and finish.` |
| EU fulfilment | `EU-based processing and order fulfilment.` |
| Thermo performance | `Thermally modified Abachi for sauna and interior applications.` |

### Product constraints

- Do not invent Natural Abachi profiles, sizes, grades, finishes, stock or lengths.
- Do not call Thermo Abachi an `AB grade made darker` or imply it is a use for lower-grade stock.
- Do not use `pure white` as an absolute grade guarantee.
- Do not mention permissible wormholes, defects or tolerances until the owner confirms the final grading specification.
- Do not imply thermal treatment makes wood waterproof or maintenance-free.

## 6. Enquiry and conversion design

Use only three user-facing commercial actions in the MVP:

1. `Request a Quote`
2. `Request Samples`
3. `Check Availability`

Do not add `Buy now`, public price list download, `Become a Distributor`, or a separate form for every CTA.

All commercial CTAs may open the same form with the relevant intent and source product preselected.

### Required form fields

- Name
- Company
- Business email
- Phone (optional)
- Country
- Customer type: Manufacturer / Installer / Distributor / Interior producer / Other
- Product: Natural Abachi / Thermo Abachi / Raw KD Abachi / Custom profile
- Dimensions or profile
- Estimated volume / quantity
- Required date
- Delivery postcode or city
- Message
- Optional file upload for drawings or specification
- Privacy consent

The form must preserve page source, selected product and UTM parameters. Show clear success and error states. Do not promise a response time until the responsible contact confirms one.

## 7. Sales assistant boundaries

The assistant works in parallel with the website. It is an opportunity-centred support tool, not an autonomous sales representative.

### The assistant may

- monitor the approved sales mailbox;
- classify incoming messages and website leads;
- extract lead data into an opportunity record;
- identify missing information;
- request a human decision or prepare a reply draft;
- summarise the conversation, product requested and next action;
- prepare a quote-request brief for the responsible person.

### The assistant must not

- send emails, quotes, outreach or commitments without human approval;
- promise stock, pricing, MOQ, delivery dates, certifications or technical performance that are not confirmed in this document or in the specific opportunity;
- expose internal documents, supplier data or customer data;
- treat an unverified website claim as a commercial fact.

### Required opportunity record

- company and contact;
- country and delivery location;
- customer type;
- requested product, profile/dimensions and quantity;
- required date;
- source page / UTM data;
- status: new / waiting for information / ready for quotation / quoted / won / lost;
- evidence links or source email;
- proposed next action and human owner.

One opportunity has one clearly defined offer in the MVP. Keep research, draft replies and decision context versioned and traceable.

## 8. Content, imagery, SEO and UX

- Launch in professional English only. Structure may later support `/en/` and `/de/`, but do not build translations now.
- Use Abachi as the main term; explain once that it is also known as Obeche or Ayous.
- Use real product, process and shipment images wherever possible. AI or stock images may illustrate an application, never impersonate a real project, factory or shipment.
- Do not use a jungle/exotic aesthetic. Use a clean European technical-premium tone: light background, dark green/graphite type and restrained warm wood accents.
- Optimise hero image for LCP; lazy-load images below the fold; do not autoplay video with sound.
- Meet basic accessibility: contrast, visible keyboard focus, form labels, text errors and meaningful alt text.
- Set one unique H1, title, meta description and social-share image per page. Add canonical URLs, sitemap.xml, robots.txt and functional redirects from replaced URLs.
- Use spam protection, secure upload handling, privacy policy and cookie consent before publishing analytics/marketing scripts.

## 9. CMS / implementation requirements

Make the following editable without changing templates:

- product name, short description and hero image;
- technical specification rows;
- approved product-gallery images;
- CTA labels and destination;
- SEO title, meta description and social image;
- enquiry routing destination;
- availability/lead-time safe wording.

Do not build a dynamic public stock system in the MVP.

## 10. Acceptance criteria

The website is ready when:

- the first screen states Abachi, sauna application, B2B audience and Europe;
- the three product routes are visible and Raw Abachi is not the primary offer;
- every CTA leads to a working, qualified enquiry flow;
- no unverified claim is stated as fact;
- all published imagery is approved and correctly contextualised;
- mobile has no horizontal scroll, obscured CTA or broken form;
- forms, email delivery, spam protection, metadata, sitemap, redirects and analytics events are tested;
- the sales mailbox/owner and a human approval route for the assistant are configured.

## 11. Decisions still required from Eimantas

The following are deliberately not blockers for building the MVP shell, but they must be resolved before publishing corresponding details or activating autonomous-looking sales flows:

1. Natural Abachi product formats, profiles, dimensions, lengths, finish and grades.
2. Thermo Abachi available lengths and dimensional tolerances.
3. Actual stock location, stock policy and feasible order formats.
4. Sample cost and shipping policy.
5. Base B2B price list versus fully individual quotation process.
6. Specific certificates, legality/origin and traceability documents that may be named publicly.
7. Exact responsibility for drying, thermal treatment, profiling and quality control.
8. Client/project photo, logo and testimonial permissions.
9. Enquiry mailbox, responsible person and realistic response-time commitment.
10. Legal seller and privacy-controller identity for Premium Timber Hub.

## 12. Work sequence for the building agent

1. Audit the current site and keep only reusable design/content assets that comply with this specification.
2. Implement the MVP page structure and reusable product/enquiry components.
3. Apply the approved copy, safe wording and claim restrictions.
4. Add confirmed product specifications only; show unknown details as enquiry-dependent.
5. Configure form handling, spam protection, privacy links and lead-source capture.
6. Optimise responsive layout, performance, metadata and technical SEO.
7. Test all acceptance criteria before publishing.

Do not expand scope without an explicit new decision. When requirements conflict, this document overrides earlier placeholder content and generic marketing copy.
