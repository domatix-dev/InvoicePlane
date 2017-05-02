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
	<body style="font-family:Open Sans;font-size: 12px;">
        <div id="header">
            <table>
                <tr>
                    <td id="company-name">
                        <?php echo invoice_logo_pdf(); ?>
                    </td>
					<td class="text_derecha">
				        <p style="line-height:20px;">
				        	<?php echo $quote->user_name; ?><br />
				            <?php if ($quote->user_address_1) { echo $quote->user_address_1 . '<br>'; } ?>
				            <?php if ($quote->user_address_2) { echo $quote->user_address_2 . '<br>'; } ?>
				            <?php if ($quote->user_city) { echo $quote->user_city . ' '; } ?>
				            <?php if ($quote->user_state) { echo $quote->user_state . ' '; } ?>
				            <?php if ($quote->user_zip) { echo $quote->user_zip . '<br>'; } ?>
				        	<?php if ($quote->user_vat_id) { echo $quote->user_vat_id . '<br>'; } ?>
				    	</p>
                    </td>
                </tr>
            </table>
        </div>
        <br />
        <div id="invoice-to">
            <table style="width: 100%;">
                <tr>
                    <td style="padding-left: 0px;">
                        <table>
                        	<tr>
	                        	<td><span  class="text_cliente"><?php echo lang('client'); ?>:</span></td><td style="text-align:left;"><?php echo $quote->client_name; ?></td>
	                        </tr>
	                        <tr>
                            	<td><span  class="text_cliente"><?php echo lang('street_address'); ?>:</span></td><td style="text-align:left;"><?php if ($quote->client_address_1) { echo $quote->client_address_1 . ''; } ?></td>
                            </tr>
	                        <tr>
                            	<td><span  class="text_cliente"><?php echo lang('city'); ?>:</span></td><td style="text-align:left;"><?php if ($quote->client_city) { echo $quote->client_city . ''; } ?></td>
                            </tr>
	                        <tr>
                            	<td><span  class="text_cliente"><?php echo lang('state'); ?>:</span></td><td style="text-align:left;"><?php if ($quote->client_state) { echo $quote->client_state . ''; } ?></td>
                            </tr>
	                        <tr>
                            	<td><span  class="text_cliente"><?php echo lang('zip_code'); ?>:</span></td><td style="text-align:left;"><?php if ($quote->client_zip) { echo $quote->client_zip . ''; } ?></td>
                            </tr>
	                        <tr>
                            	<td><span  class="text_cliente"><?php echo lang('vat_id'); ?>:</span></td><td style="text-align:left;"><?php if ($quote->client_vat_id) { echo $quote->client_vat_id  . ''; } ?></td>
                            </tr>
                        </table>
                    </td>
                    <td style="width:10%;"></td>
                    <td style="text-align: right;">
                        <table id="invoice-to-right-table">
                            <tbody>
                            	<tr>
                            		<td colspan="2" class="text_cliente" style="text-align:right;"><h1 style="text-transform: uppercase;"><?php echo lang('quote'); ?></h1></td>
                            	</tr>
                                <tr>
                                    <td><span  class="text_cliente">N&uacute;mero:</span> </td>
                                    <td><?php echo $quote->quote_number; ?></td>
                                </tr>
                                <tr>
                                    <!-- <td><span  class="text_cliente"><?php echo lang('due_date'); ?>:</span> </td> -->
                                    <td><span  class="text_cliente"><?php echo lang('quote_date'); ?>:</span> </td>
                                    <td><?php echo date_from_mysql($quote->quote_date_created, TRUE); ?></td>
                                </tr>
                                <tr>
                                    <td><span  class="text_cliente">Fecha Vencimiento:</span> </td>
                                    <td><?php echo date_from_mysql($quote->quote_date_expires, TRUE); ?></td>
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
                    <tr class="primer_elemento">
                    	<th class="text_cliente" style="text-align: center;width:10%;font-size:14px">Cant</th>
                        <th class="text_cliente" style="text-align: center;width:70%;font-size:14px">Descripci&oacute;n</th>
                        <!-- <th>Descripci&oacute;n</th> -->
                        <th class="text_cliente" style="text-align: center;width:10%;font-size:14px">Precio</th>
                        <th class="text_cliente" style="text-align: right;width:10%;font-size:14px">Total</th>
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
                                <td style="text-align: right;"><?php echo format_currency($quote->quote_item_subtotal); ?></td>
                            </tr>
                            <?php if ($quote->quote_item_tax_total > 0) { ?>
                            <tr>
                                <td style="text-align: right;"><?php echo lang('item_tax'); ?></td>
                                <td style="text-align: right;"><?php echo format_currency($quote->quote_item_tax_total); ?></td>
                            </tr>
                            <?php } ?>
                            <?php foreach ($quote_tax_rates as $quote_tax_rate) : ?>
                                <tr>
                                    <td style="text-align: right;"><?php echo $quote_tax_rate->quote_tax_rate_name . ' ' . $quote_tax_rate->quote_tax_rate_percent; ?>%</td>
                                    <td style="text-align: right;"><?php echo format_currency($quote_tax_rate->quote_tax_rate_amount); ?></td>
                                </tr>
                            <?php endforeach ?>
                            <tr>
                                <td style="text-align: right;"><?php echo lang('total'); ?>:</td>
                                <td style="text-align: right;"><?php echo format_currency($quote->quote_total); ?></td>
                            </tr>
                            <tr>
                            	<td colspan="2"><br /><br /><p class="text_cliente"><?php $CI = &get_instance();
                              echo $CI->db->select('t1.user_custom_fieldvalue')->from('ip_user_custom t1')->join('ip_custom_fields t2', 't1.user_custom_fieldid = t2.custom_field_id')->where('t1.user_id', $quote->user_id)->where('t2.custom_field_label', 'Bank Account')->get()->row()->user_custom_fieldvalue; ?></p><br /></td>
                            </tr>
                        </table>
                        <br /><br />
                    </td>
                </tr>
            </table>

            <?php if ($quote->notes) { ?>
            <div style="margin-top:-35px;margin-left:3.3%">
                <p style="color:#0c2c80;font-weight:bold;font-size:14px;">Notas</p>
                <p style="text-align:justify;font-family:Open Sans Light;color:#555555;">
                		<?php 	$parrafo=explode("\n", $quote->notes);
                    			foreach ($parrafo as $aux){
            						echo $aux."<br />";
            					}
            			?>
            	</p>
            </div>
            <?php } ?>

        </div>
        <div>
        </div>
        <footer style="width:99%; position: absolute; top: 95%;">
            <img src="http://portal.domatix.com/assets/default/img/footer_completo.png" alt="logo_footer" />
        </footer>
	</body>
</html>
