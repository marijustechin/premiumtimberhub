# Premium Timber Hub — Agent Guidelines

## 1. Purpose and authority

This repository contains the Premium Timber Hub WordPress block theme and the
documentation for its MVP website.

The primary product specification is [docs/MVP-SPECIFICATION.md](docs/MVP-SPECIFICATION.md).
It overrides older design assumptions or placeholder copy. Supporting documents
in `docs/` record the known company information, content constraints, visual
direction, sitemap, launch checks, email constraints and open tasks.

Marijus approves scope, public claims, deployments and acceptance. A task in
`docs/todo.md` is a plan, not authority to make a public or external change.

## 2. Current development environment

- Development environment: LocalWP on Windows, using Apache, PHP 8.4 and MySQL 8.4.
- The source theme is `theme/premiumtimberhub-block`.
- LocalWP's active theme directory is a Windows junction to this source theme.
- Production: `https://premiumtimberhub.eu` on Bacloud.
- LocalWP, production WordPress core, plugins, uploads, database and secrets are
  **not** repository source files.

Do not change production, deploy files, send emails, activate SMTP, or change
DNS/hosting unless a task explicitly authorizes the concrete target and action.

## 3. Working rules

Before a task:

1. Read this file and the relevant active files in `docs/`.
2. Inspect the existing theme and current Git state.
3. State a short plan for any non-trivial implementation task.

During a task:

- Work only in the approved scope.
- Preserve existing working code unless there is a documented reason to change it.
- Use native WordPress block-theme mechanisms; do not add a page builder.
- Avoid new plugins and dependencies. Explain and obtain approval before adding one.
- Keep JavaScript minimal; core site and enquiry flow must not depend on JavaScript.
- Run appropriate checks after edits, including `php -l` for changed PHP files.
- Inspect the rendered local site after meaningful visual changes.

## 4. Truth, claims and privacy

Never invent or publish claims about stock, availability, delivery times, MOQ,
pricing, production capacity, certifications, standards, sourcing, legality,
traceability, quality grades, technical dimensions, customers, testimonials or
business/legal identity.

Use only facts confirmed in the documentation or explicitly confirmed in the
current task. When information is missing, use neutral wording, hide the
corresponding detail, or mark it as an internal decision required — do not
create plausible marketing copy to fill the gap.

Do not expose uploaded drawings or enquiry attachments publicly. Do not commit
customer data, backups, database dumps, private images, credentials, API keys
or `.env` files.

## 5. MVP boundaries

The approved direction is a European B2B Abachi supplier for sauna
manufacturers and professional buyers. Natural and Thermo Abachi are presented
before raw kiln-dried Abachi.

The MVP is a six-page website:

- Home
- Products
- Natural Abachi
- Thermo Abachi
- Raw Abachi
- Contact

The public actions are limited to:

- Request a Quote
- Request Samples
- Check Availability

Do not add e-commerce, public stock, public price lists, distributor programme,
autonomous sales sending, outdoor-timber pages or unapproved legal promises.

## 6. Enquiries and sales assistant

The website may collect qualified B2B enquiries. Delivery configuration,
recipient addresses and SMTP are separate approval gates. Until explicitly
configured and tested, do not claim that a form sends successfully.

Any sales-assistant capability may classify enquiries and draft a proposed
response, but must never send a message, alter a price, promise stock/delivery
or commit a commercial action without human approval.

## 7. Git and review discipline

- Keep commits small and scoped.
- Inspect `git diff`, `git status` and secret exposure before committing.
- Do not commit generated site files, LocalWP files, backups, database exports,
  uploads or secrets.
- Do not push unless the task explicitly requests it.
- Report modified files, validation performed, unresolved issues and the commit
  hash when a task ends.

Human acceptance is separate from an agent's implementation report.

