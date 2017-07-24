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

            <?php if (in_array($quote->quote_status_id, array(2,3))) { ?>
            <a href="<?php echo site_url('guest/view/approve_quote/' . $quote->quote_url_key); ?>" class="btn btn-success"><i class="icon-white icon-check"></i> <?php echo lang('approve_this_quote'); ?></a>
            <a href="<?php echo site_url('guest/view/reject_quote/' . $quote->quote_url_key); ?>" class="btn btn-danger"><i class="icon-white icon-ban-circle"></i> <?php echo lang('reject_this_quote'); ?></a>
            <?php } elseif ($quote->quote_status_id == 4) { ?>
            <a href="#" class="btn btn-success"><?php echo lang('quote_approved'); ?></a>
            <?php } elseif ($quote->quote_status_id == 5) { ?>
            <a href="#" class="btn btn-danger"><?php echo lang('quote_rejected'); ?></a>
            <?php } ?>

            <div class="pull-right">
            <a href="<?php echo site_url('guest/view/generate_quote_pdf/' . $quote_url_key); ?>" class="btn btn-primary"><i class="icon-white icon-print"></i> <?php echo lang('download_pdf'); ?></a>
            </div>

            <?php if ($flash_message) { ?>
            <div class="alert flash-message">
                <?php echo $flash_message; ?>
            </div>
            <?php } ?>
        </div>

        <div id="invoice-container" style="margin-bottom:1%;">

            <div id="header">
                <table>
                    <tr>
                        <td id="company-name">
                            <?php echo invoice_logo(); ?>
                        </td>
                        <td class="alignr">
                            <p style="line-height:20px;">
                            	<?php echo $quote->user_name; ?><br />
                            	<?php if ($quote->user_address_1) { echo $quote->user_address_1 . '<br>'; } ?>
                                <?php if ($quote->user_address_2) { echo $quote->user_address_2 . '<br>'; } ?>
                                <?php if ($quote->user_city) { echo $quote->user_city . ' '; } ?>
                                <?php if ($quote->user_state) { echo $quote->user_state . ' '; } ?>
                                <?php if ($quote->user_zip) { echo $quote->user_zip . '<br>'; } ?>
                                <?php if ($quote->user_vat_id) { echo $quote->user_vat_id . '<br>'; } ?>
                                <!-- <?php if ($quote->user_phone) { ?><abbr>P:</abbr><?php echo $quote->user_phone; ?><br><?php } ?>
                                <?php if ($quote->user_fax) { ?><abbr>F:</abbr><?php echo $quote->user_fax; ?><?php } ?> -->
                            </p>
                        </td>
                        <td style="text-align: right;"><!-- <h2><?php echo lang('quote'); ?> <?php echo $quote->quote_number; ?></h2> --></td>
                    </tr>
                </table>
            </div>
            <div id="invoice-to">
                <table style="width: 100%;">
                    <tr>
                    	<td style="padding-left: 5px;">
	                        <table>
	                        	<tr>
		                        	<td style="width:30%;"><span  class="text_cliente"><?php echo lang('client'); ?>:</span></td><td style="text-align:left;width:65%;"><?php echo $quote->client_name; ?></td>
		                        </tr>
		                        <tr>
	                            	<td style="width:30%;"><span  class="text_cliente"><?php echo lang('street_address'); ?>:</span></td><td style="text-align:left;width:65%;"><?php if ($quote->client_address_1) { echo $quote->client_address_1 . '<br>'; } ?></td>
	                            </tr>
		                        <tr>
	                            	<td style="width:30%;"><span  class="text_cliente"><?php echo lang('city'); ?>:</span></td><td style="text-align:left;width:65%;"><?php if ($quote->client_city) { echo $quote->client_city . ' '; } ?></td>
	                            </tr>
		                        <tr>
	                            	<td style="width:30%;"><span  class="text_cliente"><?php echo lang('state'); ?>:</span></td><td style="text-align:left;width:65%;"><?php if ($quote->client_state) { echo $quote->client_state . ' '; } ?></td>
	                            </tr>
		                        <tr>
	                            	<td style="width:30%;"><span  class="text_cliente"><?php echo lang('zip_code'); ?>:</span></td><td style="text-align:left;width:65%;"><?php if ($quote->client_zip) { echo $quote->client_zip . '<br>'; } ?></td>
	                            </tr>
		                        <tr>
	                            	<td style="width:30%;"><span  class="text_cliente"><?php echo lang('vat_id'); ?>:</span></td><td style="text-align:left;width:65%;"><?php if ($quote->client_vat_id ) { echo $quote->client_vat_id  . ''; } ?></td>
	                            </tr>
	                        </table>
	                    </td>
                        <td style="width:10%;"></td>
                        <td style="text-align: right;">
	                        <table id="invoice-to-right-table">
	                            <tbody>
	                            	<tr>
	                            		<td colspan="2" class="text_cliente" style="text-align:right;"><h1 style="text-transform: uppercase; font-weight: bold;"><?php echo lang('quote'); ?></h1></td>
	                            	</tr>
	                                <tr>
	                                    <td style="text-align:right;width:70%;"><span class="text_cliente">N&uacute;mero:</span> </td>
	                                    <td style="text-align:right;width:30%;"><?php echo $quote->quote_number; ?></td>
	                                </tr>
	                                <tr>
	                                    <!-- <td><span  class="text_cliente"><?php echo lang('due_date'); ?>:</span> </td> -->
	                                    <td style="text-align:right;width:70%;"><span  class="text_cliente"><?php echo lang('quote_date'); ?>:</span> </td>
	                                    <td style="text-align:right;width:30%;"><?php echo date_from_mysql($quote->quote_date_created); ?></td>
	                                </tr>
	                                <tr>
	                                    <td style="text-align:right;width:70%;"><span  class="text_cliente">Fecha Vencimiento:</span> </td>
	                                    <td style="text-align:right;width:30%;"><?php echo date_from_mysql($quote->quote_date_expires); ?></td>
	                                </tr>
	                            </tbody>
	                        </table>
	                    </td>
                    </tr>
                </table>
            </div>
            <br /><br />
            <div id="invoice-items">
                <table id="reduce" class="table table-striped" style="width: 99%;">
                        <tr class="primer_elemento">
                            <th class="text_cliente" style="text-align: center;width:10%;font-size:14px;border-top: 0px;">Cant</th>
                            <th class="text_cliente" style="text-align: center;width:70%;font-size:14px;border-top: 0px;">Descripci&oacute;n</th>
	                        <!-- <th>Descripci&oacute;n</th> -->
	                        <th class="text_cliente" style="text-align: center;width:10%;font-size:14px;border-top: 0px;">Precio</th>
	                        <th class="text_cliente" style="text-align: right;width:10%;font-size:14px;border-top: 0px;">Total</th>
                        </tr>
                        <tr>
                    	</tr>
                        <?php foreach ($items as $item) { ?>
                            <tr style="border-bottom: 0px;">
                                <td style="text-align: center;width:10%;font-size:14px;padding-top:10px; border-top: 0px; border-bottom: 0px;"><?php echo format_amount($item->item_quantity); ?></td>
                                <td style="width:70%;font-size:14px;padding-top:10px; border-top: 0px; border-bottom: 0px;"><?php echo $item->item_name; ?></td>
                                <!-- <td><?php echo nl2br($item->item_description); ?></td> -->
                                <td style="text-align: center;width:10%;font-size:14px;padding-top:10px; border-top: 0px; border-bottom: 0px;"><?php echo format_currency($item->item_price); ?></td>
                                <td style="text-align: right;width:10%;font-size:14px;padding-top:10px; border-top: 0px; border-bottom: 0px;"><?php echo format_currency($item->item_subtotal); ?></td>
                            </tr>
                            <tr style="border-top: 0px;">
                            	<td style="border-top: 0px;"></td><td colspan="3" style="font-family:Open Sans Light;color:#555555; border-top: 0px;"><?php echo nl2br($item->item_description); ?></td>
                            </tr>
                         <?php } ?>
                       </table>
                       <br />
	            	   <table>
		            	   <tr>
		                    <td style="text-align: right;">
		                        <table class="amount-summary" style="width:35%;float:right;margin-right:5px;">
		                        	<tr class="primer_elemento">
		                        		<td colspan="2"></td>
		                        	</tr>
		                        	<tr>
		                            	<td colspan="2" style="height:8px; border-top: 0px;"></td>
		                            </tr>
		                            <tr>
		                                <td style="text-align: right;"><?php echo lang('subtotal'); ?>:</td>
		                                <td style="text-align: right;"><?php echo format_currency($quote->quote_item_subtotal); ?></td>
		                            </tr>
		                            <?php if ($quote->quote_item_tax_total > 0) { ?>
		                            <tr style="border-top: 0px;>
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
                <div style="position:relative;top:-35px;margin-left:3.3%">
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

	            <br />
                <div style="width:99%;">
		            <img style="max-width: 100%;" src="http://portal.domatix.com/assets/default/img/footer_completo.png" alt="logo_footer" />
				</div>
				<br />
				<br />
                <div class="seperator"></div>

            </div>
        </div>

    </body>
</html>
