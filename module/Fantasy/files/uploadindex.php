<?php
ini_set('display_errors', 1);
ini_set('memory_limit', '2024M');
$title = 'Get images from CSV file';
$csvDir = './csv/';
$count = 0;
$images = array();
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{


    $csvFile = filter_input(INPUT_POST, 'csv');
    $handle = fopen($csvDir . $csvFile, 'r');
    $fp = fopen('newCSV.csv', 'a');
    fputcsv($fp, array(
        'sku',
        'store_view_code',
        'attribute_set_code',
        'product_type',
        'categories',
        'product_websites',
        'name',
        'description',
        'short_description',
        'weight',
        //10
        'product_online',
        'tax_class_name',
        'visibility',
        'price',
        'special_price',
        'special_price_from_date',
        'special_price_to_date',
        'url_key',
        'meta_title',
        'meta_keywords',
        //22
        'meta_description',
        'base_image',
        'base_image_label',
        'small_image',
        'small_image_label',
        'thumbnail_image',
        'thumbnail_image_label',
        'swatch_image',
        'swatch_image_label',
        'created_at',
        //30
        'updated_at',
        'new_from_date',
        'new_to_date',
        'display_product_options_in',
        'map_price',
        'msrp_price',
        'map_enabled',
        'gift_message_available',
        'custom_design',
        'custom_design_from',
        //40
        'custom_design_to',
        'custom_layout_update',
        'page_layout',
        'product_options_container',
        'msrp_display_actual_price_type',
        'country_of_manufacture',
        'additional_attributes',
        'qty',
        'out_of_stock_qty',
        'use_config_min_qty',
        //50
        'is_qty_decimal',
        'allow_backorders',
        'use_config_backorders',
        'min_cart_qty',
        'use_config_min_sale_qty',
        'max_cart_qty',
        'use_config_max_sale_qty',
        'is_in_stock',
        'notify_on_stock_below',
        'use_config_notify_stock_qty',
        //60
        'manage_stock',
        'use_config_manage_stock',
        'use_config_qty_increments',
        'qty_increments',
        'use_config_enable_qty_inc',
        'enable_qty_increments',
        'is_decimal_divided',
        'website_id',
        'related_skus',
        'related_position',
        //70
        'crosssell_skus',
        'crosssell_position',
        'upsell_skus',
        'upsell_position',
        'additional_images',
        'additional_image_labels',
        'hide_from_product_page',
        'custom_options',
        'bundle_price_type',
        'bundle_sku_type',
        //80
        'bundle_price_view',
        'bundle_weight_type',
        'bundle_values',
        'bundle_shipment_type',
        'configurable_variations',
        'configurable_variation_labels',
        'associated_skus',
        //87
    ));
    while (($data = fgetcsv($handle) ) !== FALSE)
    {
        $slike = explode(",", $data[5]);
        print_r($slike);

        print_r($data);
        $newCsv = array(
            'grubin-' . $data[0],
            '',
            'Default',
            'simple',
            'Default Category/Kids Shoes/Slippers',
            'base',
            $data[1],
            $data[4],
            $data[4],
            '0.3',
            //10
            '1',
            'Taxable Goods',
            'Catalog, Search',
            '30',
            '',
            '',
            '',
            '',
            '',
            '',
            //20
            '',
            $slike[0],
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            //30
            '',
            '',
            '',
            'Block after Info Column',
            '',
            '',
            '',
            '',
            '',
            '',
            //40
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '100',
            '0',
            '1',
            //50
            '0',
            '0',
            '1',
            '1',
            '1',
            '100',
            '1',
            '1',
            '1',
            '1',
            //60
            '0',
            '1',
            '1',
            '1',
            '1',
            '0',
            '0',
            '1',
            '',
            '',
            //70
            '',
            '',
            '',
            '',
            $data[5],
            '',
            '',
            'sdfsdfd',
            '',
            '',
            //80
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            //87
        );
        fputcsv($fp, $newCsv);
    }


    fclose($fp);
}

function getCsvFiles($csvDir)
{
    $files = array_diff(scandir($csvDir), array('.', '..'));
    return $files;
    # print_r($files);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title><?php echo $title; ?></title>
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script> 
        <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
        <script>
            $("#create_category_attribute_form").validate();
        </script>
        <style type="text/css">
            body {
                font-family: Arial;
            }
            li {
                list-style: outside none none;
                margin: 0 15px 15px;
            }
            .medium {
                width: 200px;
            }
            .guidelines {
                font-size: 85%;
                margin: 0;
            }
        </style>
    </head>
    <body id="main_body" >
        <div id="form_container">
            <h1><?php echo $title; ?></h1>
            <form id="create_category_attribute_form" class="appnitro"  method="post" action="">					
                <ul>
                    <li>
                        <label class="description" for="csv">CSV file </label>
                        <div>
                            <select name="csv" id="csv" required>
                                <option value=""></option>
                                <?php
                                foreach (getCsvFiles($csvDir) as $value)
                                {
                                    echo '<option>' . $value . '</option>';
                                }
                                ?>
                            </select>
                        </div> 
                    </li>
                    <li class="buttons">
                        <input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
                    </li>
                </ul>
            </form>
        </div>
    </body>
</html>
<script type="text/javascript">
    var success = 0;
    var fail = 0;
    var current = 0;
    var checkRemoteImages = function (images) {
        if (1 > images.length) {
            return false;
        }
        var image = images.shift();
        var localPosting = jQuery.post("check.php", {'image': image});
        localPosting.done(function (data) {
            if (data.error === 0) {
                success++;
                jQuery("#success").html(success);
            } else if (data.error === 1) {
                jQuery("#ajax-result").append(data.message + "\n");
                fail++;
                jQuery("#fail").html(fail);
            } else {
                return false;
            }
            current = success + fail;
            var total = jQuery("#total").html();
            parseInt(total);
            var startTime = jQuery("#start-time").val();
            var difference = Date.now() - parseInt(startTime);
            var eta = Math.round((total - current) * difference / current / 1000 / 60);
            jQuery("#eta").html(eta + 'min');
            checkRemoteImages(images);
        });
    };

    var startAjax = function () {
        jQuery("#start-time").val(Date.now());
        var images = jQuery("#result").val().split("\n");
        checkRemoteImages(images);
    };

</script>