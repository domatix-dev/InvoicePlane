<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/default/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/default/css/style_plantillas.css">

        <style>
            * {
                margin:0px;
                padding:5px;
            }
            body {
                color: #000 !important;
                padding: 0px;
            }
            table {
                width:100%;
            }
            #header table {
                width:100%;
                padding: 0px;
            }
            #header table td, .amount-summary td {
                vertical-align: text-top;
                padding: 5px;
            }
            #company-name{
                color:#000;
                font-size: 18px;
            }
            #invoice-to td {
                text-align: left
            }
            #invoice-to {
                margin-bottom: 15px;
            }
            #invoice-to-right-table td {
                padding-right: 5px;
                padding-left: 5px;
                text-align: right;
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
			}
			#reduce tr td{
				padding:0px;
			}

   img{ width:auto; height:auto; }
        </style>

	</head>
	<body style="font-family:Open Sans;font-size: 12px; padding: 0px;">
        <div id="header">
            <table>
                <tr>
                    <td id="company-name">
                        <?php echo invoice_logo_pdf(); ?>
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
        <br />
        <div id="invoice-to">
            <table style="width: 100%;">
                <tr>
                    <td style="padding-left: 5px;">
                        <table>
                        	<tr>
	                        	<td><span  class="text_cliente"><?php echo lang('client'); ?>:</span></td><td style="text-align:left; "><?php echo $invoice->client_name; ?></td>
	                        </tr>
	                        <tr>
                            	<td><span  class="text_cliente"><?php echo lang('street_address'); ?>:</span></td><td style="text-align:left;"><?php if ($invoice->client_address_1) { echo $invoice->client_address_1 . ''; } ?></td>
                            </tr>
	                        <tr>
                            	<td><span  class="text_cliente"><?php echo lang('city'); ?>:</span></td><td style="text-align:left;"><?php if ($invoice->client_city) { echo $invoice->client_city . ''; } ?></td>
                            </tr>
	                        <tr>
                            	<td><span  class="text_cliente"><?php echo lang('state'); ?>:</span></td><td style="text-align:left;"><?php if ($invoice->client_state) { echo $invoice->client_state . ''; } ?></td>
                            </tr>
	                        <tr>
                            	<td><span  class="text_cliente"><?php echo lang('zip_code'); ?>:</span></td><td style="text-align:left;"><?php if ($invoice->client_zip) { echo $invoice->client_zip . ''; } ?></td>
                            </tr>
	                        <tr>
                            	<td><span  class="text_cliente"><?php echo lang('vat_id'); ?>:</span></td><td style="text-align:left;"><?php if ($invoice->client_vat_id ) { echo $invoice->client_vat_id  . ''; } ?></td>
                            </tr>
                        </table>
                    </td>
                    <td style="width:10%;"></td>
                    <td style="text-align: right;">
                        <table id="invoice-to-right-table">
                            <tbody>
                            	<tr>
                            		<td colspan="2" class="text_cliente" style="text-align:right;">
                            			<h1>FACTURA</h1>
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
                            </tbody>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
        <br /><br />
        <div id="invoice-items">
            <table id="reduce" class="table table-striped" style="width: 98%;">
                    <tr class="primer_elemento" style="width: 98%;">
                    	<th class="text_cliente" style="text-align: center;width:10%;font-size:14px;">Cant</th>
                        <th class="text_cliente" style="text-align: center;width:70%;font-size:14px;">Descripci&oacute;n</th>
                        <!-- <th>Descripci&oacute;n</th> -->
                        <th class="text_cliente" style="text-align: center;width:10%;font-size:14px;">Precio</th>
                        <th class="text_cliente" style="text-align: right;width:10%;font-size:14px;">Total</th>
                    </tr>
                    <tr>
                    </tr>
                    <?php foreach ($items as $item) { ?>
                        <tr>
                        	<td style="text-align: center;width:10%;font-size:14px;padding-top:10px;"><?php echo format_amount($item->item_quantity); ?></td>
                            <td style="width:63%;font-size:14px;padding-top:10px;"><?php echo $item->item_name; ?></td>
                            <!-- <td><?php echo nl2br($item->item_description); ?></td> -->
                            <td style="text-align: center;width:13,5%;font-size:14px;padding-top:10px;"><?php echo format_currency($item->item_price); ?></td>
                            <td style="text-align: right;width:13,5%;font-size:14px;padding-top:10px;"><?php echo format_currency($item->item_subtotal); ?></td>
                            <!--
                            <td style="text-align: center;width:10%;font-size:14px;padding-top:10px;"><?php echo format_amount($item->item_quantity); ?></td>
                            <td style="width:70%;font-size:14px;padding-top:10px;"><?php echo $item->item_name; ?></td>
                            <td style="text-align: center;width:10%;font-size:14px;padding-top:10px;"><?php echo format_currency($item->item_price); ?></td>
                            <td style="text-align: right;width:10%;font-size:14px;padding-top:10px;"><?php echo format_currency($item->item_subtotal); ?></td>
                            -->
                        </tr>
                        <tr>
                        	<td></td><td colspan="3" style="font-family:Open Sans Light;color:#555555;"><?php echo nl2br($item->item_description); ?></td>
                        </tr>
                    <?php } ?>
            </table>
            <br />
            <table style="margin-right:4px;">
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
                            	<td colspan="2" style="text-align: right;">
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
            <br /><br />
            <table style="width:98%;">
                <tr>
                    <!-- <td style="text-align: left;">
            			<p style="font-size:10px;margin-top: -1.25%;"><?php echo $invoice->invoice_terms; ?></p>
            		</td>  -->
            		<td style="text-align: right;" >
            			<p class="text_cliente"><?php $CI = &get_instance();
                    echo $CI->db->select('t1.user_custom_fieldvalue')->from('ip_user_custom t1')->join('ip_custom_fields t2', 't1.user_custom_fieldid = t2.custom_field_id')->where('t1.user_id', $invoice->user_id)->where('t2.custom_field_label', 'Bank Account')->get()->row()->user_custom_fieldvalue; ?></p>
            		</td>
            	</tr>
            </table>
			</div>

			<br />


			<?php if ($invoice->invoice_terms) { ?>
            <div style="margin-top:-35px;margin-left:3.3%">
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

           <!-- <div class="seperator"></div>
            <?php if ($invoice->invoice_terms) { ?>
            <!-- <h4><?php echo lang('terms'); ?></h4>
            <p><?php echo nl2br($invoice->invoice_terms); ?></p>
            <?php } ?>
        </div>   -->

        <footer style="width:99%; position: absolute; top: 95%;">
          <p style="font-size:10px;"><?php $CI = &get_instance(); echo $CI->db->select('t1.user_custom_fieldvalue')->from('ip_user_custom t1')->join('ip_custom_fields t2', 't1.user_custom_fieldid = t2.custom_field_id')->where('t1.user_id', $invoice->user_id)->where('t2.custom_field_label', 'Notas')->get()->row()->user_custom_fieldvalue; ?></p>
          <div >
              <img src="http://portal.domatix.com/assets/default/img/footer_completo.png" alt="logo_footer" />
          </div>
        </footer>
	</body>
</html>
