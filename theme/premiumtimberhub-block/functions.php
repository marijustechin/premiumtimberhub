<?php
/**
 * Premium Timber Hub theme functions.
 *
 * @package premiumtimberhub
 */

if ( ! defined( 'PTH_ENQUIRY_TO' ) ) {
	/**
	 * RFQ form recipient. Placeholder — replace with the confirmed inbox.
	 */
	define( 'PTH_ENQUIRY_TO', 'sales@premiumtimberhub.eu' );
}

if ( ! defined( 'PTH_PUBLIC_DOMAIN' ) ) {
	/**
	 * Public production domain. Used for canonical / Open Graph URLs so that
	 * the local `.local` address is never published in share or canonical links.
	 */
	define( 'PTH_PUBLIC_DOMAIN', 'https://premiumtimberhub.eu' );
}

/**
 * Enqueue the theme stylesheet.
 */
function pth_enqueue_styles() {
	$version = wp_get_theme()->get( 'Version' );
	wp_enqueue_style( 'pth-main-style', get_stylesheet_uri(), array(), $version );
}
add_action( 'wp_enqueue_scripts', 'pth_enqueue_styles' );

/**
 * Detect whether the site is running on a local development host.
 */
function pth_is_local() {
	$host = isset( $_SERVER['HTTP_HOST'] ) ? wp_unslash( $_SERVER['HTTP_HOST'] ) : '';
	return (bool) ( preg_match( '/\.local$/i', $host ) || 'localhost' === $host );
}

/**
 * Return a public (production) URL for the current request path.
 */
function pth_public_url( $path = '/' ) {
	return trailingslashit( PTH_PUBLIC_DOMAIN ) . ltrim( $path, '/' );
}

/**
 * Set the document title for the front page and legal pages.
 */
function pth_document_title( $title ) {
	$titles = array(
		'privacy-policy' => 'Privacy Policy | Premium Timber Hub',
		'terms-of-use'   => 'Terms of Use | Premium Timber Hub',
		'cookie-policy'  => 'Cookie Policy | Premium Timber Hub',
	);

	if ( is_front_page() ) {
		return 'West African Timber Export | Premium Timber Hub';
	}

	if ( is_page() ) {
		$slug = get_post_field( 'post_name', get_queried_object_id() );
		if ( isset( $titles[ $slug ] ) ) {
			return $titles[ $slug ];
		}
	}

	return $title;
}
add_filter( 'pre_get_document_title', 'pth_document_title' );

/**
 * Override canonical URL so it points at the production domain.
 */
function pth_canonical_url( $canonical ) {
	if ( pth_is_local() ) {
		if ( is_front_page() ) {
			return pth_public_url( '/' );
		}
		if ( is_singular() ) {
			return pth_public_url( wp_make_link_relative( get_permalink() ) );
		}
	}
	return $canonical;
}
add_filter( 'get_canonical_url', 'pth_canonical_url', 10 );

/**
 * Return a page-specific meta description.
 */
function pth_meta_description() {
	$descriptions = array(
		'privacy-policy' => 'How Premium Timber Hub collects, uses and protects the information you provide through its timber export enquiry form.',
		'terms-of-use'   => 'The terms that govern use of the Premium Timber Hub website and its request-for-quote service.',
		'cookie-policy'  => 'How Premium Timber Hub uses cookies on its website and how you can manage them.',
	);

	if ( is_front_page() ) {
		return 'Premium Timber Hub connects international B2B buyers with timber supply from West Africa and coordinates export shipments by sea container.';
	}

	if ( is_page() ) {
		$slug = get_post_field( 'post_name', get_queried_object_id() );
		if ( isset( $descriptions[ $slug ] ) ) {
			return $descriptions[ $slug ];
		}
	}

	return '';
}

/**
 * Output meta description + Open Graph tags in the head.
 */
function pth_head_meta() {
	$description = pth_meta_description();
	$share_image = get_option( 'pth_share_image', '' );

	if ( '' !== $description ) {
		echo '<meta name="description" content="' . esc_attr( $description ) . '" />' . "\n";
	}

	$og_title = 'West African Timber Export | Premium Timber Hub';
	$og_url   = pth_public_url( '/' );

	if ( is_page() && ! is_front_page() ) {
		$og_title = wp_get_document_title();
		$og_url   = pth_public_url( wp_make_link_relative( get_permalink() ) );
	}

	echo '<meta property="og:type" content="website" />' . "\n";
	echo '<meta property="og:site_name" content="Premium Timber Hub" />' . "\n";
	echo '<meta property="og:title" content="' . esc_attr( $og_title ) . '" />' . "\n";
	if ( '' !== $description ) {
		echo '<meta property="og:description" content="' . esc_attr( $description ) . '" />' . "\n";
	}
	echo '<meta property="og:url" content="' . esc_url( $og_url ) . '" />' . "\n";
	if ( $share_image ) {
		echo '<meta property="og:image" content="' . esc_url( $share_image ) . '" />' . "\n";
	}
	echo '<meta name="twitter:card" content="summary_large_image" />' . "\n";
}
add_action( 'wp_head', 'pth_head_meta', 1 );

/**
 * Add `noindex` on local development hosts.
 */
function pth_robots_noindex( array $robots ) {
	if ( pth_is_local() ) {
		$robots['noindex']  = true;
		$robots['nofollow'] = true;
	}
	return $robots;
}
add_filter( 'wp_robots', 'pth_robots_noindex' );

/**
 * Register pattern categories.
 */
function pth_register_pattern_categories() {
	register_block_pattern_category(
		'pth-sections',
		array( 'label' => __( 'Premium Timber Hub', 'premiumtimberhub' ) )
	);
}
add_action( 'init', 'pth_register_pattern_categories' );

/**
 * Dynamic year shortcode (auto-updating copyright).
 */
function pth_year_shortcode() {
	return gmdate( 'Y' );
}
add_shortcode( 'pth_year', 'pth_year_shortcode' );

/**
 * Print a scroll-to-top button near the closing body tag.
 *
 * Progressive enhancement: the button is hidden until JS enables it,
 * so nothing is broken when JavaScript is unavailable.
 */
function pth_to_top_button() {
	?>
	<button class="pth-to-top" type="button" aria-label="Back to top">
		<span aria-hidden="true">&uarr;</span>
	</button>
	<script>
		(function () {
			var button = document.querySelector(".pth-to-top");
			if (!button) {
				return;
			}
			button.hidden = false;

			function toggleButton() {
				button.classList.toggle("is-visible", window.scrollY > 400);
			}

			button.addEventListener("click", function () {
				window.scrollTo({ top: 0, behavior: "smooth" });
			});

			window.addEventListener("scroll", toggleButton, { passive: true });
			toggleButton();
		})();
	</script>
	<?php
}
add_action( 'wp_footer', 'pth_to_top_button' );

/**
 * RFQ / enquiry form shortcode.
 */
function pth_enquiry_form_shortcode() {
	ob_start();

	$errors    = array();
	$success   = false;
	$submitted = false;

	if (
		isset( $_SERVER['REQUEST_METHOD'] ) &&
		'POST' === $_SERVER['REQUEST_METHOD'] &&
		isset( $_POST['pth_enquiry_nonce'] )
	) {
		$submitted = true;

		if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['pth_enquiry_nonce'] ) ), 'pth_enquiry_form' ) ) {
			$errors[] = 'Security check failed. Please refresh the page and try again.';
		} else {
			// Honeypot — silently treat as success to avoid tipping off bots.
			if ( ! empty( $_POST['pth_website'] ) ) {
				$success = true;
			} else {
				$name             = isset( $_POST['contact_name'] ) ? sanitize_text_field( wp_unslash( $_POST['contact_name'] ) ) : '';
				$company          = isset( $_POST['company'] ) ? sanitize_text_field( wp_unslash( $_POST['company'] ) ) : '';
				$email_raw        = isset( $_POST['email'] ) ? trim( wp_unslash( $_POST['email'] ) ) : '';
				$email            = sanitize_email( $email_raw );
				$phone            = isset( $_POST['phone'] ) ? sanitize_text_field( wp_unslash( $_POST['phone'] ) ) : '';
				$country          = isset( $_POST['country'] ) ? sanitize_text_field( wp_unslash( $_POST['country'] ) ) : '';
				$destination_port = isset( $_POST['destination_port'] ) ? sanitize_text_field( wp_unslash( $_POST['destination_port'] ) ) : '';
				$species          = isset( $_POST['species'] ) ? sanitize_text_field( wp_unslash( $_POST['species'] ) ) : '';
				$dimensions       = isset( $_POST['dimensions'] ) ? sanitize_text_field( wp_unslash( $_POST['dimensions'] ) ) : '';
				$quantity         = isset( $_POST['quantity'] ) ? sanitize_text_field( wp_unslash( $_POST['quantity'] ) ) : '';
				$container_size   = isset( $_POST['container_size'] ) ? sanitize_text_field( wp_unslash( $_POST['container_size'] ) ) : '';
				$incoterms        = isset( $_POST['incoterms'] ) ? sanitize_text_field( wp_unslash( $_POST['incoterms'] ) ) : '';
				$message          = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';
				$consent          = isset( $_POST['consent'] ) ? sanitize_text_field( wp_unslash( $_POST['consent'] ) ) : '';

				if ( empty( $name ) ) {
					$errors[] = 'Please enter your full name.';
				}
				if ( empty( $company ) ) {
					$errors[] = 'Please enter your company name.';
				}
				if ( empty( $email_raw ) ) {
					$errors[] = 'Please enter your business email address.';
				} elseif ( ! is_email( $email_raw ) ) {
					$errors[] = 'Please enter a valid email address.';
				}
				if ( empty( $consent ) ) {
					$errors[] = 'Please confirm that you agree to the Privacy Policy.';
				}

				// Optional file upload.
				$attachment_path = '';
				if ( empty( $errors ) && ! empty( $_FILES['attachment']['name'] ) ) {
					$allowed = array(
						'pdf'  => 'application/pdf',
						'doc'  => 'application/msword',
						'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
						'xls'  => 'application/vnd.ms-excel',
						'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
						'jpg'  => 'image/jpeg',
						'jpeg' => 'image/jpeg',
						'png'  => 'image/png',
					);

					$file = $_FILES['attachment']; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput
					if ( UPLOAD_ERR_NO_FILE !== $file['error'] && UPLOAD_ERR_OK !== $file['error'] ) {
						$errors[] = 'There was a problem uploading your file. Please try again.';
					} elseif ( $file['size'] > 5 * MB_IN_BYTES ) {
						$errors[] = 'The file is too large. Maximum size is 5 MB.';
					} else {
						$check = wp_check_filetype_and_ext( $file['tmp_name'], $file['name'] );
						if ( ! $check['ext'] || ! isset( $allowed[ strtolower( $check['ext'] ) ] ) ) {
							$errors[] = 'That file type is not supported. Please upload a PDF, Word, Excel, JPG or PNG file.';
						} else {
							$upload_overrides = array(
								'test_form' => false,
								'test_type' => false,
							);
							$moved           = wp_handle_upload( $file, $upload_overrides );
							if ( isset( $moved['error'] ) ) {
								$errors[] = 'Your file could not be uploaded. Please email it to us directly instead.';
							} else {
								$attachment_path = $moved['file'];
							}
						}
					}
				}

				if ( empty( $errors ) ) {
					$to      = PTH_ENQUIRY_TO;
					$subject = 'New timber enquiry from ' . $name . ' (' . $company . ')';

					$body  = "A new request-for-quote enquiry was submitted.\n\n";
					$body .= 'Full name: ' . $name . "\n";
					$body .= 'Company: ' . $company . "\n";
					$body .= 'Email: ' . $email . "\n";
					if ( $phone ) {
						$body .= 'Phone / WhatsApp: ' . $phone . "\n";
					}
					if ( $country ) {
						$body .= 'Country: ' . $country . "\n";
					}
					if ( $destination_port ) {
						$body .= 'Destination port: ' . $destination_port . "\n";
					}
					if ( $species ) {
						$body .= 'Timber species / product: ' . $species . "\n";
					}
					if ( $dimensions ) {
						$body .= 'Required dimensions: ' . $dimensions . "\n";
					}
					if ( $quantity ) {
						$body .= 'Required quantity: ' . $quantity . "\n";
					}
					if ( $container_size ) {
						$body .= 'Container size: ' . $container_size . "\n";
					}
					if ( $incoterms ) {
						$body .= 'Incoterms: ' . $incoterms . "\n";
					}
					if ( $message ) {
						$body .= "\nAdditional requirements:\n" . $message . "\n";
					}

					$headers   = array(
						'Content-Type: text/plain; charset=UTF-8',
						'Reply-To: ' . $name . ' <' . $email . '>',
					);
					$attachments = $attachment_path ? array( $attachment_path ) : array();

					$sent = wp_mail( $to, $subject, $body, $headers, $attachments );

					if ( $sent ) {
						$success = true;
					} else {
						$errors[] = 'Sorry, your enquiry could not be sent. Please email us directly at ' . PTH_ENQUIRY_TO . '.';
					}
				}
			}
		}
	}

	if ( $success ) {
		?>
		<div class="pth-form-success">
			<h3>Thank you for your enquiry</h3>
			<p>Your message has been sent. We will review your requirements and reply shortly.</p>
		</div>
		<?php
		return ob_get_clean();
	}

	if ( ! empty( $errors ) ) {
		echo '<div class="pth-form-errors" role="alert">';
		foreach ( $errors as $error ) {
			echo '<p>' . esc_html( $error ) . '</p>';
		}
		echo '</div>';
	}

	$val = function ( $field ) use ( $submitted, $errors ) {
		if ( $submitted && empty( $errors ) ) {
			return '';
		}
		if ( isset( $_POST[ $field ] ) ) {
			return sanitize_text_field( wp_unslash( $_POST[ $field ] ) );
		}
		return '';
	};

	$privacy_url = get_permalink( get_page_by_path( 'privacy-policy' ) );
	?>
	<form method="post" class="pth-enquiry-form" enctype="multipart/form-data" novalidate>
		<?php wp_nonce_field( 'pth_enquiry_form', 'pth_enquiry_nonce' ); ?>

		<div class="pth-form-grid">
			<div class="pth-form-field">
				<label for="pth-contact-name">Full name <span class="required">*</span></label>
				<input type="text" id="pth-contact-name" name="contact_name" value="<?php echo esc_attr( $val( 'contact_name' ) ); ?>" required>
			</div>

			<div class="pth-form-field">
				<label for="pth-company">Company name <span class="required">*</span></label>
				<input type="text" id="pth-company" name="company" value="<?php echo esc_attr( $val( 'company' ) ); ?>" required>
			</div>

			<div class="pth-form-field">
				<label for="pth-email">Business email <span class="required">*</span></label>
				<input type="email" id="pth-email" name="email" value="<?php echo esc_attr( $val( 'email' ) ); ?>" required>
			</div>

			<div class="pth-form-field">
				<label for="pth-phone">Phone / WhatsApp</label>
				<input type="tel" id="pth-phone" name="phone" value="<?php echo esc_attr( $val( 'phone' ) ); ?>">
			</div>

			<div class="pth-form-field">
				<label for="pth-country">Country</label>
				<input type="text" id="pth-country" name="country" value="<?php echo esc_attr( $val( 'country' ) ); ?>">
			</div>

			<div class="pth-form-field">
				<label for="pth-destination-port">Destination port</label>
				<input type="text" id="pth-destination-port" name="destination_port" value="<?php echo esc_attr( $val( 'destination_port' ) ); ?>">
			</div>

			<div class="pth-form-field">
				<label for="pth-species">Timber species or product</label>
				<input type="text" id="pth-species" name="species" value="<?php echo esc_attr( $val( 'species' ) ); ?>">
			</div>

			<div class="pth-form-field">
				<label for="pth-dimensions">Required dimensions</label>
				<input type="text" id="pth-dimensions" name="dimensions" placeholder="e.g. 50mm × 150mm × 3m" value="<?php echo esc_attr( $val( 'dimensions' ) ); ?>">
			</div>

			<div class="pth-form-field">
				<label for="pth-quantity">Required quantity</label>
				<input type="text" id="pth-quantity" name="quantity" placeholder="e.g. 2 × 40 ft containers" value="<?php echo esc_attr( $val( 'quantity' ) ); ?>">
			</div>

			<div class="pth-form-field">
				<label for="pth-container-size">Preferred container size</label>
				<select id="pth-container-size" name="container_size">
					<option value="">— Select —</option>
					<option value="20 ft" <?php selected( $val( 'container_size' ), '20 ft' ); ?>>20 ft</option>
					<option value="40 ft" <?php selected( $val( 'container_size' ), '40 ft' ); ?>>40 ft</option>
					<option value="40 ft HC" <?php selected( $val( 'container_size' ), '40 ft HC' ); ?>>40 ft High Cube</option>
					<option value="Not sure / discuss" <?php selected( $val( 'container_size' ), 'Not sure / discuss' ); ?>>Not sure — please advise</option>
				</select>
			</div>

			<div class="pth-form-field">
				<label for="pth-incoterms">Target delivery terms / Incoterms</label>
				<select id="pth-incoterms" name="incoterms">
					<option value="">— Select —</option>
					<option value="EXW" <?php selected( $val( 'incoterms' ), 'EXW' ); ?>>EXW</option>
					<option value="FOB" <?php selected( $val( 'incoterms' ), 'FOB' ); ?>>FOB</option>
					<option value="CFR" <?php selected( $val( 'incoterms' ), 'CFR' ); ?>>CFR</option>
					<option value="CIF" <?php selected( $val( 'incoterms' ), 'CIF' ); ?>>CIF</option>
					<option value="DAP" <?php selected( $val( 'incoterms' ), 'DAP' ); ?>>DAP</option>
					<option value="Other / discuss" <?php selected( $val( 'incoterms' ), 'Other / discuss' ); ?>>Other — please discuss</option>
				</select>
			</div>

			<div class="pth-form-field pth-form-field--full">
				<label for="pth-message">Additional requirements</label>
				<textarea id="pth-message" name="message" rows="5"><?php echo esc_textarea( $val( 'message' ) ); ?></textarea>
			</div>

			<div class="pth-form-field pth-form-field--full">
				<label for="pth-attachment">Attachment <span class="pth-field-hint">(optional — PDF, Word, Excel, JPG or PNG, max 5 MB)</span></label>
				<input type="file" id="pth-attachment" name="attachment">
			</div>

			<div class="pth-form-field pth-form-field--full pth-form-consent">
				<input type="checkbox" id="pth-consent" name="consent" value="yes" <?php checked( $val( 'consent' ), 'yes' ); ?> required>
				<label for="pth-consent">I agree that Premium Timber Hub may use the information I provide to respond to my enquiry, as described in the <a href="<?php echo esc_url( $privacy_url ); ?>">Privacy Policy</a>. <span class="required">*</span></label>
			</div>
		</div>

		<div class="pth-form-field pth-form-hp" aria-hidden="true">
			<label for="pth-website">Leave this field empty</label>
			<input type="text" id="pth-website" name="pth_website" tabindex="-1" autocomplete="off">
		</div>

		<div class="pth-form-submit">
			<button type="submit" class="wp-block-button__link has-primary-background-color has-background wp-element-button">Send enquiry</button>
		</div>
	</form>
	<?php

	return ob_get_clean();
}
add_shortcode( 'pth_enquiry_form', 'pth_enquiry_form_shortcode' );
