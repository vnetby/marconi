<?php
/*
	Plugin Name: Webpay Belarus For Woocommerce
	Description: Система оплаты WebPay для WooCommerce. Позволяет проводить оплату платежными картами в Беларуси
	Version: 1.0.1
	License:           GPL-2.0+
*/

if (!defined('ABSPATH'))
	exit;

add_action('plugins_loaded', 'essl_wc_interswitch_webpay_init', 0);

function essl_wc_interswitch_webpay_init()
{

	if (!class_exists('WC_Payment_Gateway')) return;

	/**
	 * Main Gateway class
	 */
	class WC_Essl_Webpay_Gateway extends WC_Payment_Gateway
	{

		public function __construct()
		{
			global $woocommerce;

			$this->id 					= 'essl_webpay_gateway';
			//$this->icon 				= apply_filters('woocommerce_webpay_icon', plugins_url( 'assets/images/isw.png' , __FILE__ ) );
			$this->has_fields 			= false;
			$this->testurl					= 'https://securesandbox.webpay.by/';
			$this->testurlcheck 			= 'https://sandbox.webpay.by';

			$this->liveurl 					= 'https://payment.webpay.by';
			$this->liveurlcheck 			= 'https://billing.webpay.by';




			$this->redirect_url        	= WC()->api_request_url('WC_Essl_Webpay_Gateway');
			$this->method_title     	= 'Webpay Belarus';
			$this->method_description  	= 'Webpay Belarus. Для приема платежных карт банков Беларуси';


			// Load the form fields.
			$this->init_form_fields();

			// Load the settings.
			$this->init_settings();

			// Define user set variables
			$this->title 					= $this->get_option('title');
			$this->description 				= $this->get_option('description');
			$this->testmode					= $this->get_option('testmode');
			$this->secret_key 				= $this->get_option('secret_key');
			$this->store_id 				= $this->get_option('store_id');
			$this->username					= $this->get_option('username');
			$this->password					= $this->get_option('password');
			$this->enable_for_methods = $this->get_option('enable_for_methods', array());



			//Actions
			add_action('woocommerce_receipt_essl_webpay_gateway', array($this, 'receipt_page'));
			add_action('woocommerce_update_options_payment_gateways_' . $this->id, array($this, 'process_admin_options'));

			// Payment listener/API hook
			add_action('woocommerce_api_wc_essl_webpay_gateway', array($this, 'check_webpay_response'));

			//Display Transaction Reference on checkout
			add_action('before_woocommerce_pay', array($this, 'display_transaction_id'));

			// Check if the gateway can be used
			if (!$this->is_valid_for_use()) {
				$this->enabled = false;
			}
		}







		public function is_valid_for_use()
		{
			if (is_admin()) return true;

			if (!in_array(get_woocommerce_currency(), array('BYN'))) {
				$this->msg = 'Неправильный формат валюты, измените на BYN';
				return false;
			}

			if (empty($this->enable_for_methods)) {
				return true;
			}

			$chosen_shipping_methods_session = WC()->session->get('chosen_shipping_methods');

			foreach ($this->enable_for_methods as $enable_method) {
				if (strpos($enable_method, ':') !== false) {
					if (in_array($enable_method, $chosen_shipping_methods_session)) {
						return true;
					}
				} else {
					foreach ($chosen_shipping_methods_session as $chosen_method) {
						$chosen_method = explode(':', $chosen_method);
						$chosen_method = trim($chosen_method[0]);
						if ($chosen_method === $enable_method) {
							return true;
						}
					}
				}
			}

			return false;
		}













		/**
		 * Admin Panel Options
		 **/
		public function admin_options()
		{
			echo '<h3>Webpay Belarus</h3>';
			echo '<p>Webpay Belarus. Для приема платежных карт банков Беларуси</p>';


			if ($this->is_valid_for_use()) {

				echo '<table class="form-table">';
				$this->generate_settings_html();
				echo '</table>';
			} else {	 ?>
				<div class="inline error">
					<p><strong>Способ оплаты WebPay отключен</strong>: <?php echo $this->msg ?></p>
				</div>

			<?php }
		}







		/**
		 * Initialise Gateway Settings Form Fields
		 **/
		function init_form_fields()
		{
			$this->form_fields = array(
				'enabled' => array(
					'title' 			=> 'Включить/Выключить',
					'type' 				=> 'checkbox',
					'label' 			=> 'Включить Webpay',
					'description' 		=> 'Enable or disable the gateway.',
					'desc_tip'      	=> true,
					'default' 			=> 'yes'
				),
				'title' => array(
					'title' 		=> 'Заголовок',
					'type' 			=> 'text',
					'description' 	=> 'Заголовок отображается на старнице заказа.',
					'desc_tip'      => false,
					'default' 		=> 'Webpay Belarus'
				),
				'description' => array(
					'title' 		=> 'Описание',
					'type' 			=> 'textarea',
					'description' 	=> 'Описание отображается на старнице заказа.',
					'default' 		=> 'Webpay Belarus поддерживает пластиковые платежные карты банков Беларуси'
				),
				'store_id' => array(
					'title' 		=> 'Идентификатор мерчанта',
					'type' 			=> 'text',
					'description' 	=> 'Необходим для отправки запроса',
					'desc_tip'      => false,
					'default' 		=> '123456789'
				),
				'secret_key' => array(
					'title' 		=> 'Секретный ключ',
					'type' 			=> 'text',
					'description' 	=> 'Необходим для проверки платежей',
					'desc_tip'      => false,
				),
				'username' => array(
					'title' 		=> 'Логин',
					'type' 			=> 'text',
					'description' 	=> 'Логин от кабинета WebPay',
					'desc_tip'      => false,
				),
				'password' => array(
					'title' 		=> 'Пароль',
					'type' 			=> 'text',
					'description' 	=> 'Пароль от кабинета WebPay',
					'desc_tip'      => false,
				),
				'testmode' => array(
					'title'       		=> 'Тестовый режим',
					'type'        		=> 'checkbox',
					'label'       		=> 'Включить тестовый режим',
					'default'     		=> 'no',
				),
				'enable_for_methods' => array(
					'title'             => __('Enable for shipping methods', 'woocommerce'),
					'type'              => 'multiselect',
					'class'             => 'wc-enhanced-select',
					'css'               => 'width: 400px;',
					'default'           => '',
					'description'       => __('If COD is only available for certain methods, set it up here. Leave blank to enable for all methods.', 'woocommerce'),
					'options'           => $this->load_shipping_method_options(),
					'desc_tip'          => true,
					'custom_attributes' => array(
						'data-placeholder' => __('Select shipping methods', 'woocommerce'),
					),
				),

			);
		}











		private function load_shipping_method_options()
		{

			$data_store = WC_Data_Store::load('shipping-zone');
			$raw_zones  = $data_store->get_zones();

			foreach ($raw_zones as $raw_zone) {
				$zones[] = new WC_Shipping_Zone($raw_zone);
			}

			$zones[] = new WC_Shipping_Zone(0);

			$options = array();
			foreach (WC()->shipping()->load_shipping_methods() as $method) {

				$options[$method->get_method_title()] = array();

				// Translators: %1$s shipping method name.
				$options[$method->get_method_title()][$method->id] = sprintf(__('Any &quot;%1$s&quot; method', 'woocommerce'), $method->get_method_title());

				foreach ($zones as $zone) {

					$shipping_method_instances = $zone->get_shipping_methods();

					foreach ($shipping_method_instances as $shipping_method_instance_id => $shipping_method_instance) {

						if ($shipping_method_instance->id !== $method->id) {
							continue;
						}

						$option_id = $shipping_method_instance->get_rate_id();

						// Translators: %1$s shipping method title, %2$s shipping method id.
						$option_instance_title = sprintf(__('%1$s (#%2$s)', 'woocommerce'), $shipping_method_instance->get_title(), $shipping_method_instance_id);

						// Translators: %1$s zone name, %2$s shipping method instance name.
						$option_title = sprintf(__('%1$s &ndash; %2$s', 'woocommerce'), $zone->get_id() ? $zone->get_zone_name() : __('Other locations', 'woocommerce'), $option_instance_title);

						$options[$method->get_method_title()][$option_id] = $option_title;
					}
				}
			}

			return $options;
		}













		/**
		 * Get Webpay Args
		 **/
		function get_webpay_args($order)
		{
			global $woocommerce;

			if ('yes' == $this->testmode) {
				$test = 1;
			} else {
				$test = 0;
			}


			$name = $order->get_billing_first_name() . " " . $order->get_billing_last_name();
			$email = $order->get_billing_email();
			//$domain = get_permalink();
			$store_id = $this->store_id; //test

			$seed = time();
			$order_num = $order->get_id();
			$curr_id = "BYN";
			$shipping_cost = $order->get_total_shipping();
			$shipping_name = $order->get_shipping_method();
			$wsb_total  = $order->get_total();
			$secret_key = $this->secret_key;
			$signature = $seed . $store_id . $order_num . $test . $curr_id . $wsb_total . $secret_key;
			$sha_signature = sha1($signature);
			$redirect_url 	= $this->redirect_url;
			$txn_ref 		= uniqid();
			// $txn_ref 		= $txn_ref . '_' . $order->id;
			$txn_ref 		= $txn_ref . '_' . $order->get_id();

			// webpay Args
			$webpay_args = array(
				'*scart' => '',
				'wsb_version' 			=> 2,
				'wsb_language_id' 		=> "russian",
				'wsb_customer_name' 	=> $name,
				'site_redirect_url' 	=> $redirect_url,
				'wsb_email' 			=> $email,
				'wsb_storeid' 			=> $store_id,
				'wsb_order_num' 		=> $order_num,
				'wsb_test'				=> $test,
				'wsb_currency_id'		=> $curr_id,
				'wsb_seed'				=> $seed,
				'wsb_total'				=> $wsb_total,
				'wsb_signature'			=> $sha_signature,
				'wsb_notify_url' 		=> $redirect_url,
				'wsb_return_url'		=> $redirect_url,
				'wsb_shipping_name'		=> $shipping_name,
				'wsb_shipping_price'	=> $shipping_cost,
			);


			WC()->session->set('essl_wc_webpay_txn_id', $txn_ref);

			$webpay_args = apply_filters('woocommerce_webpay_args', $webpay_args);

			return $webpay_args;
		}

		/**
		 * Generate the Webpay Payment button link
		 **/
		function generate_webpay_form($order_id)
		{
			global $woocommerce;

			$order = new WC_Order($order_id);


			if ('yes' == $this->testmode) {
				$webpay_adr = $this->testurl;
			} else {
				$webpay_adr = $this->liveurl;
			}

			$webpay_args = $this->get_webpay_args($order);

			// before payment hook
			do_action('essl_wc_webpay_before_payment', $webpay_args);

			$webpay_args_array = array();

			foreach ($webpay_args as $key => $value) {
				$webpay_args_array[] = '<input type="hidden" name="' . esc_attr($key) . '" value="' . esc_attr($value) . '" />';
			}


			foreach ($order->get_items() as $item) : ?>
				<!--	-->
			<?php
				//var_dump($item);
				$webpay_args_array[] =	'<input type="hidden" name="wsb_invoice_item_name[]" value="' . $item->get_name() . '">';
				$webpay_args_array[] =	'<input type="hidden" name="wsb_invoice_item_quantity[]" value="' . $item->get_quantity() . '">';
				$webpay_args_array[] =	'<input type="hidden" name="wsb_invoice_item_price[]" value="' . $item->get_total() / $item->get_quantity() . '">';
			endforeach;
			//var_dump($webpay_args_array);
			//			die();
			wc_enqueue_js('
				$.blockUI({
						message: "' . esc_js(__('Переадресация на защищенную страницу платежной системы. Спасибо', 'woocommerce')) . '",
						baseZ: 333333,
						overlayCSS:
						{
							background: "#fff",
							opacity: 0.6
						},
						css: {
							padding:        "20px",
							zindex:         "333333",
							textAlign:      "center",
							color:          "#00f",
							border:         "3px solid #000",
							backgroundColor:"#fff",
							cursor:         "wait",
							lineHeight:		"24px",
						}
					});
				jQuery("#submit_webpay_payment_form").click();
			');

			return '
			<form action="' . esc_url($webpay_adr) . '" method="post" id="webpay_payment_form" target="_top">
					' . implode('', $webpay_args_array) . '
					<!-- Button Fallback -->
					<div class="payment_buttons">
						<input type="submit" class="button alt" id="submit_webpay_payment_form" value="' . __('Платеж с помощью WebPay', 'woocommerce') . '" /> <a class="button cancel" href="' . esc_url($order->get_cancel_order_url()) . '">' . __('Cancel order &amp; restore cart', 'woocommerce') . '</a>
					</div>
					<script type="text/javascript">
						jQuery(".payment_buttons").hide();
					</script>
				</form>';
		}

		/**
		 * Process the payment and return the result
		 **/
		function process_payment($order_id)
		{
			$order 			= new WC_Order($order_id);

			return array(
				'result' => 'success',
				'redirect'	=> $order->get_checkout_payment_url(true)
			);
		}

		/**
		 * Output for the order received page.
		 **/
		function receipt_page($order)
		{
			echo '<p>' . __('Спасибо, ожидаем платеж. Вы будете перенаправлены на страницу WebPay для завершения платежа.', 'woocommerce') . '</p>';
			echo $this->generate_webpay_form($order);
		}

		/**
		 * Verify a successful Payment!
		 **/
		function check_webpay_response()
		{

			global $woocommerce;

			$secret_key = $this->secret_key;

			if (isset($_GET['wsb_tid'])) {
				$order_id 		= $_GET['wsb_order_num'];
				$order_id 		= (int) $order_id;
				$order 	= new WC_Order($order_id);


				$postdata = '*API=&API_XML_REQUEST=' . urlencode('<?xml version="1.0" encoding="ISO-8859-1" ?>
			<wsb_api_request>
				<command>get_transaction</command>
				<authorization>
					<username>' . $this->username . '</username>
					<password>' . md5($this->password) . '</password>
				</authorization>
				<fields>
					<transaction_id>' . $_GET['wsb_tid'] . '</transaction_id>
				</fields>
			</wsb_api_request>
			');

				if ('yes' == $this->testmode) {
					$url = $this->testurlcheck;
				} else {
					$url = $this->liveurlcheck;
				}

				$curl = curl_init($url);
				curl_setopt($curl, CURLOPT_HEADER, 0);
				curl_setopt($curl, CURLOPT_POST, 1);
				curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
				$response = curl_exec($curl);
				curl_close($curl);
				$response = new SimpleXMLElement($response);

				$hash = md5($response->fields->transaction_id .
					$response->fields->batch_timestamp . $response->fields->currency_id .
					$response->fields->amount . $response->fields->payment_method . $response->fields->payment_type .
					$response->fields->order_id . $response->fields->rrn . $secret_key);

				if ($hash == $response->fields->wsb_signature) {

					if (in_array($response->fields->payment_type[0], [1, 4, 10])) {


						if (!$response->fields->amount == $order->get_total()) {
							//Update the order status
							$order->update_status('on-hold', '');

							//Error Note
							$message = 'Спасибо за оплату.<br />Транзакция была успешной, но стоимость заказа не совпадает с оплатой.<br />Статус: на удержании.<br />Сохраните ссылку о совершении операции для дальнейшего решения проблемы.<br />';
							$message_type = 'notice';

							//Add Customer Order Note
							$order->add_order_note($message, 1);

							//Add Admin Order Note
							$order->add_order_note('Review order. <br />Заказ на удержании.<br />Причина: стоимость заказа не совпадает с оплатой.<br />Сумма оплаты &#8358; ' . $response->fields->amount . ', стоимость заказа &#8358; ' . $order->get_total());

							// Reduce stock levels
							$order->reduce_order_stock();

							// Empty cart
							$woocommerce->cart->empty_cart();
						} else {
							$order->update_status('processing');
							$woocommerce->cart->empty_cart();
							$message = 'Оплата прошла успешно.';
							$message_type = 'success';
							$order->reduce_order_stock();
						}
					} else {
						$order->update_status('failed');
						$message = 'Извините, возникла какая-то ошибка.';
						$message_type = 'error';
					}
				}
			}

			//echo $_REQUEST['a']+$_REQUEST['b'];
			if (isset($_REQUEST['transaction_id'])) {

				$order_id = $_REQUEST['site_order_id'];
				$order_id = (int) $order_id;
				$order = new WC_Order($order_id);


				$hash = md5($_POST['batch_timestamp'] . $_POST['currency_id'] . $_POST['amount'] .
					$_POST['payment_method'] . $_POST['order_id'] . $_POST['site_order_id'] .
					$_POST['transaction_id'] . $_POST['payment_type'] . $_POST['rrn'] . $secret_key);

				if ($hash == $_POST['wsb_signature']) {

					if (in_array($_POST['payment_type'], [1, 4])) {

						if (!$_POST['amount'] == $order->get_total()) {

							//Update the order status
							$order->update_status('on-hold', '');

							//Error Note
							$message = 'Спасибо за оплату.<br />Транзакция была успешной, но стоимость заказа не совпадает с оплатой.<br />Статус: на удержании.<br />Сохраните ссылку о совершении операции для дальнейшего решения проблемы.<br />';
							$message_type = 'notice';

							//Add Customer Order Note
							$order->add_order_note($message, 1);

							//Add Admin Order Note
							$order->add_order_note('Заказ на удержании.<br />Причина: стоимость заказа не совпадает с оплатой.<br />Сумма оплаты &#8358; ' . $_POST['amount'] . ', стоимость заказа &#8358; ' . $order->get_total() . '<br>');

							// Reduce stock levels
							$order->reduce_order_stock();

							// Empty cart
							$woocommerce->cart->empty_cart();
						} else {
							$order->update_status('processing');
							$woocommerce->cart->empty_cart();
							$order->reduce_order_stock();
							$message = 'Оплата прошла успешно.';
							$message_type = 'success';
						}
					} else {
						$order->update_status('failed');
						$message = 'Извините, возникла какая-то ошибка.';
						$message_type = 'error';
					}
				}
			}


			$notification_message = array(
				'message' => $message,
				'message_type' => $message_type
			);

			update_post_meta($order_id, '_essl_interswitch_wc_message', $notification_message);

			$redirect_url = esc_url($this->get_return_url($order));
			wp_redirect($redirect_url);
			exit;
		}

		/**
		 * Display the Transaction Reference on the payment confirmation page for all transactions.
		 **/
		function display_transaction_id()
		{
			$order_id = absint(get_query_var('order-pay'));
			$order = new WC_Order($order_id);

			$payment_method = $order->get_payment_method();
			// $payment_method = $order->payment_method;


			if (!isset($_GET['pay_for_order']) && ('essl_webpay_gateway' == $payment_method)) {
				$txn_ref = $order_id = WC()->session->get('essl_wc_webpay_txn_id');
				WC()->session->__unset('essl_wc_webpay_txn_id');
				echo '<h4>Transaction Reference: ' . $txn_ref . '</h4>';
			}
		}
	};


	function essl_wc_interswitch_message()
	{
		if (get_query_var('order-received')) {
			$order_id = absint(get_query_var('order-received'));
			$order = new WC_Order($order_id);
			$payment_method = $order->get_payment_method();
			// $payment_method = $order->payment_method;

			if (is_order_received_page() && ('essl_webpay_gateway' == $payment_method)) {

				$notification = get_post_meta($order_id, '_essl_interswitch_wc_message', true);
				$message = isset($notification['message']) ? $notification['message'] : '';
				$message_type = isset($notification['message_type']) ? $notification['message_type'] : '';

				delete_post_meta($order_id, '_essl_interswitch_wc_message');

				if (!empty($message)) {
					wc_add_notice($message, $message_type);
				}
			}
		}
	}
	//transactions log

	add_action('admin_menu', 'isw_tranactions_log');

	function isw_tranactions_log()
	{

		add_menu_page('Webpay Requery', 'Webpay Requery', 'administrator', 'isw_logs', 'webpay_logs');
	}

	function webpay_logs()
	{
		echo '
		<form action=" ' . WC()->api_request_url('WC_Essl_Webpay_Gateway') . '" method="post" id="webpay_requery_form" target="_top">
				<div class="form-group">
					<div class="input-icon right">
						<i class="fa fa-user"></i>
						<label for="txnref">Transaction Reference</label>
					</div>
					<input type="text" class="form-control" name="txnref" id="txnref" required="true">
				</div>
				<!-- Button Fallback -->
				<div class="payment_buttons">
					<input type="submit" class="button alt" id="submit_webpay_requery_form" value="Requery" />
				</div>
			</form>';
	}



	add_action('wp', 'essl_wc_interswitch_message', 0);


	/**
	 * Add Webpay Gateway to WC
	 **/
	function wc_add_iswebay_gateway($methods)
	{
		$methods[] = 'WC_Essl_Webpay_Gateway';
		return $methods;
	}

	add_filter('woocommerce_payment_gateways', 'wc_add_iswebay_gateway');


	/**
	 * only add the naira currency and symbol if WC versions is less than 2.1
	 */
	if (version_compare(WOOCOMMERCE_VERSION, "2.1") <= 0) {
		/** * Add NGN as a currency in WC **/ add_filter('woocommerce_currencies', 'essl_add_my_currency');
		if (!function_exists('essl_add_my_currency')) {
			function essl_add_my_currency($currencies)
			{
				$currencies['BYN'] = __('Белорусский рубль', 'woocommerce');
				return $currencies;
			}
		}
		/** * Enable the naira currency symbol in WC **/ add_filter('woocommerce_currency_symbol', 'essl_add_my_currency_symbol', 10, 2);
		if (!function_exists('essl_add_my_currency_symbol')) {
			function essl_add_my_currency_symbol($currency_symbol, $currency)
			{
				switch ($currency) {
					case 'BYN':
						$currency_symbol = 'Br';
						break;
				}
				return $currency_symbol;
			}
		}
	}
	/** * Add Settings link to the plugin entry in the plugins menu for WC below 2.1 **/ if (version_compare(WOOCOMMERCE_VERSION, "2.1") <= 0) {
		add_filter('plugin_action_links', 'essl_webpay_plugin_action_links', 10, 2);
		function essl_webpay_plugin_action_links($links, $file)
		{
			static $this_plugin;
			if (!$this_plugin) {
				$this_plugin = plugin_basename(__FILE__);
			}
			if ($file == $this_plugin) {
				$settings_link = '<a href="' . get_bloginfo('wpurl') . '/wp-admin/admin.php?page=woocommerce_settings&tab=payment_gateways&section=WC_Essl_Webpay_Gateway">Settings</a>';
				array_unshift($links, $settings_link);
			}
			return $links;
		}
	}
	/** * Add Settings link to the plugin entry in the plugins menu for WC 2.1 and above **/
	else {
		add_filter('plugin_action_links', 'essl_webpay_plugin_action_links', 10, 2);
		function essl_webpay_plugin_action_links($links, $file)
		{
			static $this_plugin;
			if (!$this_plugin) {
				$this_plugin = plugin_basename(__FILE__);
			}
			if ($file == $this_plugin) {
				$settings_link = '<a href="' . get_bloginfo('wpurl') . '/wp-admin/admin.php?page=wc-settings&tab=checkout&section=wc_essl_webpay_gateway">Settings</a>';
				array_unshift($links, $settings_link);
			}
			return $links;
		}
	}
	/** * Display the testmode notice **/ function essl_webpay_testmode_notice()
	{
		$essl_webpay_settings = get_option('woocommerce_essl_webpay_gateway_settings');
		$webpay_test_mode = $essl_webpay_settings['testmode'];
		if ('yes' == $webpay_test_mode) {
			?>
			<div class="update-nag">
				Тестовый режим WebPay включен, незабудьте его отключить, чтобы получать реальные платежи.
			</div>
<?php
		}
	}
	add_action('admin_notices', 'essl_webpay_testmode_notice');
}
?>