<?php
/**
 * Template for displaying the footer
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

	</div><!-- #main -->

	<footer id="colophon" role="contentinfo">

<?php
if ( isset($_POST["email-name"]) and isset($_POST["email-phone"]) and isset($_POST["email-company"])) {
		$name = $_POST['email-name'];
		$phone = $_POST['email-phone'];
		$company = $_POST['email-company'];
		echo "1"
          require 'vendor/autoload.php';
          echo "2"
          $sendgrid = new SendGrid(getenv('SENDGRID_USERNAME'), getenv('SENDGRID_PASSWORD'));
          echo "3"
          $message = new SendGrid\Email();
          echo "4"
          $message->addTo(getenv('SENDGRID_EMAIL'))->
            addTo("akalinin.cr@gmail.com")->
            setFrom(getenv('SENDGRID_EMAIL'))->
            setSubject('d8ii')->
            setText($_POST["email-name"])->
            setHtml("<strong>{$_POST['email-phone']}. {$_POST['email-company']}</strong>");
            echo "5"
            $response = $sendgrid->send($message);
          echo "6"
          echo "Message sent success ".$response;
		// echo "{$_POST['email-company']}.{$_POST['email-phone']}.{$_POST['email-name']}";
		// echo "".$_POST['email-company'];
      } else {
          echo "Message sent error";
      }
?>

            <form action=""  id="contactForm" method="post">
            <div class="col-sm-4">
              <input style="width: 100%;" type="text" name="email-name" value="" size="40" class="d8ii-footer-input wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Name">
              <input style="width: 100%;" type="text" name="email-phone" value="" size="40" class="d8ii-footer-input wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Company">
            </div>
            <div class="col-sm-4">
              <input style="width: 100%;" type="text" name="email-company" value="" size="40" class="d8ii-footer-input wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Phone">
              <a  type="submit"  style="width: 100%;" class="sf-button standard grey sf-icon-reveal ml0" href="javascript:{}" onclick="document.getElementById('contactForm').submit();" target="_self"><i class="ss-chat"></i><span class="text">SEND</span></a>
            </div>
            </form>



			<?php
				/*
				 * A sidebar in the footer? Yep. You can can customize
				 * your footer with three columns of widgets.
				 */
				if ( ! is_404() )
					get_sidebar( 'footer' );
			?>

			<div id="site-generator">
				<?php do_action( 'twentyeleven_credits' ); ?>
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'twentyeleven' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'twentyeleven' ); ?>"><?php printf( __( 'Proudly powered by %s', 'twentyeleven' ), 'WordPress' ); ?></a>
			</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>