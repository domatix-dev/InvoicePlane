<!doctype html>

<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

    <head>

        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>Gesti&oacute;n Domatix</title>

        <meta name="viewport" content="width=device-width,initial-scale=1">

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/default/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/default/css/style_plantillas.css">

        <style>
            body {
                color: #000 !important;
				overflow-y: auto;
				/*line-height:10px;*/
            }
            table {
                width:100%;
            }
            #header table {
                width:100%;
                padding: 0px;
            }
            #header table td {
                /*vertical-align: text-top;*/
                vertical-align: top;
                padding: 5px;
            }
            #company-name{
                color:#000;
                font-size: 18px;
            }
            #invoice-to {
                /*                display: table;*/
                /*                content: "";*/
            }
            #invoice-to td {
                text-align: left
            }
            .seperator {
                height: 25px
            }
            .top-border {
                border-top: none;
            }
            .no-bottom-border {
                border:none !important;
                background-color: white !important;
            }
            .alignr {
                text-align: right;
            }
            #invoice-container {
                margin: auto;
                margin-top: 25px;
                width: 940px;
                padding: 20px;
                top:10px;
                background-color: white;
                box-shadow: 4px 4px 14px rgba(0, 0, 0, 0.8);
                overflow-y: hidden;
            }
            #menu-container {
                margin: auto;
                margin-top: 25px;
                width: 940px;
                top:10px;
                overflow-y: hidden;
            }
            .flash-message {
                font-size: 120%;
                font-weight: bold;
            }
            /*OTRO CSS*/
             * {
                margin:0px;
                padding:5px;
            }
            #invoice-to-right-table td {
                padding-right: 5px;
                padding-left: 5px;
                text-align: right;
            }
            /*anyadido*/
            .text_cliente{
				color:#0c2c80;
			    margin: -2%;
			    font-weight:bold;
			}
			#cabecera, #footer{
				margin-bottom:1%;
			}
			.text_derecha{
				text-align:right;
				width:55%;
			}
			table tr{
                border:none;
            }
			table tr.primer_elemento{
			    border-bottom:2px solid #0c2c80;
			}
			table tr td{
				padding-right: 5px;
                padding-left: 5px;
                /*vertical-align: top;*/
                border-top: none;
			}
			.table-striped tbody > tr:nth-child(odd) > td,
			.table-striped tbody > tr:nth-child(odd) > th{
				background-color: rgb(256, 256, 256);
			}
			#reduce tr td{
				padding:0px;
			}
img{ width:auto; height:auto; }

        </style>

    </head>

    <body style="font-family:Open Sans;font-size: 12px;">

        <div id="menu-container">

             <a href="<?php echo site_url('invoices/generate_pdf/' . $invoice->invoice_id);?>" class="btn btn-primary"><i class="icon-white icon-print"></i> <?php echo lang('download_pdf'); ?></a>
            <?php if ($this->mdl_settings->setting('merchant_enabled') == 1 and $invoice->invoice_balance > 0) { ?><a href="<?php echo site_url('guest/payment_handler/make_payment/' . $invoice_url_key); ?>" class="btn btn-success"><i class="icon-white icon-ok"></i> <?php echo lang('pay_now'); ?></a><?php } ?>

            <?php if ($flash_message) { ?>
            <div class="alert flash-message">
                <?php echo $flash_message; ?>
            </div>


<div id="menu-container">

            <a href="<?php echo site_url('guest/view/generate_invoice_pdf/' . $invoice_url_key); ?>" class="btn btn-primary"><i class="fa fa-print"></i> <?php echo lang('download_pdf'); ?></a>
            <?php if ($this->mdl_settings->setting('merchant_enabled') == 1 and $invoice->invoice_balance > 0) { ?><a href="<?php echo site_url('guest/payment_handler/make_payment/' . $invoice_url_key); ?>" class="btn btn-success"><i class="fa fa-credit-card"></i> <?php echo lang('pay_now'); ?></a><?php } ?>




            <?php } ?>
        </div>

        <div id="invoice-container" style="margin-bottom:1%;">

            <div id="header">
	            <table>
	                <tr>
	                    <td id="company-name">
	                        <?php echo invoice_logo(); ?>
	                    </td>
						<td class="text_derecha">
					        <p style="line-height:20px;">
					        	<?php echo $invoice->user_name; ?><br />
					            <?php if ($invoice->user_address_1) { echo $invoice->user_address_1 . '<br>'; } ?>
					            <?php if ($invoice->user_address_2) { echo $invoice->user_address_2 . '<br>'; } ?>
					            <?php if ($invoice->user_city) { echo $invoice->user_city . ' '; } ?>
					            <?php if ($invoice->user_state) { echo $invoice->user_state . ' '; } ?>
					            <?php if ($invoice->user_zip) { echo $invoice->user_zip . '<br>'; } ?>
					        	<?php if ($invoice->user_vat_id) { echo $invoice->user_vat_id . '<br>'; } ?>
					    	</p>
	                    </td>
	                    <td style="text-align: right;"><!-- <h2><?php echo lang('invoice'); ?> <?php echo $invoice->invoice_number; ?></h2> --></td>
	                </tr>
	            </table>
	        </div>
	        <div id="invoice-to">
	            <table style="width: 100%;">
	                <tr>
	                    <td style="padding-left: 5px;">
	                        <table>
	                        	<tr>
		                        	<td style="width:30%;"><span  class="text_cliente"><?php echo lang('client'); ?>:</span></td><td style="text-align:left; width:65%;"><?php echo $invoice->client_name; ?></td>
		                        </tr>
		                        <tr>
	                            	<td style="width:30%;"><span  class="text_cliente"><?php echo lang('street_address'); ?>:</span></td><td style="text-align:left; width:65%;"><?php if ($invoice->client_address_1) { echo $invoice->client_address_1 . ''; } ?></td>
	                            </tr>
		                        <tr>
	                            	<td style="width:30%;"><span  class="text_cliente"><?php echo lang('city'); ?>:</span></td><td style="text-align:left; width:65%;"><?php if ($invoice->client_city) { echo $invoice->client_city . ''; } ?></td>
	                            </tr>
		                        <tr>
	                            	<td style="width:30%;"><span  class="text_cliente"><?php echo lang('state'); ?>:</span></td><td style="text-align:left; width:65%;"><?php if ($invoice->client_state) { echo $invoice->client_state . ''; } ?></td>
	                            </tr>
		                        <tr>
	                            	<td style="width:30%;"><span  class="text_cliente"><?php echo lang('zip_code'); ?>:</span></td><td style="text-align:left; width:65%;"><?php if ($invoice->client_zip) { echo $invoice->client_zip . ''; } ?></td>
	                            </tr>
		                        <tr>
	                            	<td style="width:30%;"><span  class="text_cliente"><?php echo lang('vat_id'); ?>:</span></td><td style="text-align:left; width:65%;"><?php if ($invoice->client_vat_id ) { echo $invoice->client_vat_id  . ''; } ?></td>
	                            </tr>
	                        </table>
	                    </td>
	                    <td style="width:10%;"></td>
	                    <td style="text-align: right;">
	                        <table id="invoice-to-right-table">
	                            	<tr>
	                            		<td colspan="2" style="text-align:right;">
	                            			<h1 class="text_cliente" style="margin:0%;">FACTURA</h1>
	                            		</td>
	                            	</tr>
	                                <tr>
	                                    <td><span  class="text_cliente">N&uacute;mero:</span> </td>
	                                    <td><?php echo $invoice->invoice_number; ?></td>
	                                </tr>
	                                <tr>
	                                    <!-- <td><span  class="text_cliente"><?php echo lang('due_date'); ?>:</span> </td> -->
	                                    <td><span  class="text_cliente">Fecha Factura:</span> </td>
	                                    <td><?php echo date_from_mysql($invoice->invoice_date_created, TRUE); ?></td>
	                                </tr>
	                        </table>
	                    </td>
	                </tr>
	            </table>
	        </div>
	        <br /><br />
	        <div id="invoice-items">
	            <table id="reduce" class="table table-striped" style="width: 99%;">
	                    <tr class="primer_elemento">
	                    	<th class="text_cliente" style="text-align: center;width:10%;font-size:14px; border-top:none;">Cant</th>
	                        <th class="text_cliente" style="width:70%;text-align:center;font-size:14px; border-top:none;">Descripci&oacute;n</th>
	                        <!-- <th>Descripci&oacute;n</th> -->
	                        <th class="text_cliente" style="text-align: center;width:10%;font-size:14px; border-top:none;">Precio</th>
	                        <th class="text_cliente" style="text-align: right;width:10%;font-size:14px; border-top:none;">Total</th>
	                    </tr>
                    	<tr style="border-bottom: 2px solid #0C2C80;">
                    	</tr>
	                    <?php foreach ($items as $item) { ?>
	                        <tr>
	                        	<td style="text-align: center;width:10%;font-size:14px;padding-top:10px;border-top:none;"><?php echo format_amount($item->item_quantity); ?></td>
	                            <td style="width:70%;font-size:14px;padding-top:10px;border-top:none;"><?php echo $item->item_name; ?></td>
	                            <!-- <td><?php echo nl2br($item->item_description); ?></td> -->
	                            <td style="text-align: center;width:10%;font-size:14px;padding-top:10px;border-top:none;"><?php echo format_currency($item->item_price); ?></td>
	                            <td style="text-align: right;width:10%;font-size:14px;padding-top:10px;border-top:none;"><?php echo format_currency($item->item_subtotal); ?></td>
	                        </tr>
	                        <tr>
	                        	<td style="border-top:none;"></td><td colspan="3" style="font-family:Open Sans Light;color:#555555; border-top:none;"><?php echo nl2br($item->item_description); ?></td>
	                        </tr>
	                    <?php } ?>
	            </table>
	            <br />
	            <table>
	                <tr>
	                    <td style="text-align: right;">
	                        <table class="amount-summary" style="width:35%;float:right;margin-right: 5px;">
	                        	<tr class="primer_elemento">
	                        		<td colspan="2"></td>
	                        	</tr>
	                            <tr>
	                            	<td colspan="2" style="height:8px;"></td>
	                            </tr>
	                            <tr>
	                                <td style="text-align: right;"><?php echo lang('subtotal'); ?>:</td>
	                                <td style="text-align: right;"><?php echo format_currency($invoice->invoice_item_subtotal); ?></td>
	                            </tr>
	                            <?php if ($invoice->invoice_item_tax_total > 0) { ?>
	                            <tr>
	                                <td style="text-align: right;"><?php echo lang('item_tax'); ?></td>
	                                <td style="text-align: right;"><?php echo format_currency($invoice->invoice_item_tax_total); ?></td>
	                            </tr>
	                            <?php } ?>
	                            <?php foreach ($invoice_tax_rates as $invoice_tax_rate) : ?>
	                                <tr>
	                                    <td style="text-align: right;"><?php echo $invoice_tax_rate->invoice_tax_rate_name . ' ' . $invoice_tax_rate->invoice_tax_rate_percent; ?>%</td>
	                                    <td style="text-align: right;"><?php echo format_currency($invoice_tax_rate->invoice_tax_rate_amount); ?></td>
	                                </tr>
	                            <?php endforeach ?>
	                            <tr>
	                                <td style="text-align: right;"><?php echo lang('total'); ?>:</td>
	                                <td style="text-align: right;"><?php echo format_currency($invoice->invoice_total); ?></td>
	                            </tr>
	                            <tr>
	                            	<td colspan="2">
		                            	<p class="text_cliente">
		                            	<br /><br />
		                            	<?php echo lang('payment_form'); ?>:
			                            	<span style="color:#000000"><?php if ($invoice->payment_method ){
			                            		if ($invoice->payment_method == 1) echo "Transferencia";
												else if ($invoice->payment_method == 2) echo "Cheque";
			                            		else if ($invoice->payment_method == 3) echo "Metálico";
			                            		else if ($invoice->payment_method == 4) echo "Remesa";
			                            		else if ($invoice->payment_method == 5) echo "Paypal Express";
			                            		else if ($invoice->payment_method == 6)	echo "Ingreso";
			                            		}

			                            		else{ echo "Transferencia"; } ?></span>
		                            		</p>
		                             </td>
	                            </tr>
	                        </table>
	                    </td>
	                </tr>
	            </table>
	            <table>
	                <tr>
	                   <!-- <td style="text-align: left;" valign="bottom">
	            			<br /><p style="font-size:10px;"><?php echo $invoice->invoice_terms; ?></p>
	            		</td> -->
                        <br />
	            		<td style="text-align: right;">
	            			<p style="margin-right: 9px;" class="text_cliente">
                      <?php $CI = &get_instance();
                        echo $CI->db->select('t1.user_custom_fieldvalue')->from('ip_user_custom t1')->join('ip_custom_fields t2', 't1.user_custom_fieldid = t2.custom_field_id')->where('t1.user_id', $invoice->user_id)->where('t2.custom_field_label', 'Bank Account')->get()->row()->user_custom_fieldvalue; ?></p>
	            		</td>
	            	</tr>
	            </table>
				</div>

                <?php if ($invoice->invoice_terms) { ?>
	           <div style="position:relative;top:-35px;margin-left:3.3%">
                	<p style="color:#0c2c80;font-weight:bold;font-size:14px;"><?php echo lang('terms'); ?></p>
	            	<p style="text-align:justify;font-family:Open Sans Light;color:#555555;">
                    	<?php 	$parrafo=explode("\n", $invoice->invoice_terms);
                    			foreach ($parrafo as $aux){
            						echo $aux."<br />";
            					}
            			?>

	            	</p>
	            </div>
	            <?php } ?>

	            <p style="font-size:10px;">
                <?php $CI = &get_instance(); echo $CI->db->select('t1.user_custom_fieldvalue')->from('ip_user_custom t1')->join('ip_custom_fields t2', 't1.user_custom_fieldid = t2.custom_field_id')->where('t1.user_id', $invoice->user_id)->where('t2.custom_field_label', 'Notas')->get()->row()->user_custom_fieldvalue; ?></p>

				<div style="width:99%;">
		            <img src="http://portal.domatix.com/assets/default/img/footer_completo.png" alt="logo_footer" style="max-width: 100%;"/>
				</div>


        </div>

    </body>
</html>
