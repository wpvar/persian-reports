<div class="woopr-sidebar">
    <div class="woopr-summary">
        <div id="woopr-total_sales" class="woopr-summary_box">
            <div class="woopr-summary_header"><?php echo esc_attr__('فروش کل', 'persian-reports') ?></div>
            <div class="woopr-summary_result"></div>
        </div>
        <div id="woopr-net_sales" class="woopr-summary_box">
            <div class="woopr-summary_header"><?php echo esc_attr__('فروش خالص', 'persian-reports') ?></div>
            <div class="woopr-summary_result"></div>
        </div>
        <div id="woopr-average_sales" class="woopr-summary_box">
            <div class="woopr-summary_header"><?php echo esc_attr__('میانگین فروش', 'persian-reports') ?></div>
            <div class="woopr-summary_result"><?php echo esc_attr__('', 'persian-reports') ?></div>
        </div>
        <div id="woopr-total_tax" class="woopr-summary_box">
            <div class="woopr-summary_header"><?php echo esc_attr__('مالیات کل', 'persian-reports') ?></div>
            <div class="woopr-summary_result"></div>
        </div>
        <div id="woopr-total_discount" class="woopr-summary_box">
            <div class="woopr-summary_header"><?php echo esc_attr__('تخفیف‌ها', 'persian-reports') ?></div>
            <div class="woopr-summary_result"></div>
        </div>
        <div id="woopr-total_shipping" class="woopr-summary_box">
            <div class="woopr-summary_header"><?php echo esc_attr__('حمل و نقل', 'persian-reports') ?></div>
            <div class="woopr-summary_result"></div>
        </div>
        <div id="woopr-total_orders" class="woopr-summary_box">
            <div class="woopr-summary_header"><?php echo esc_attr__('تعداد سفارش', 'persian-reports') ?></div>
            <div class="woopr-summary_result"></div>
        </div>
        <div id="woopr-total_items" class="woopr-summary_box">
            <div class="woopr-summary_header"><?php echo esc_attr__('تعداد محصول', 'persian-reports') ?></div>
            <div class="woopr-summary_result"></div>
        </div>
        <div id="woopr-total_refunds" class="woopr-summary_box">
            <div class="woopr-summary_header"><?php echo esc_attr__('بازگشت وجه', 'persian-reports') ?></div>
            <div class="woopr-summary_result"></div>
        </div>
    </div>

    <form name="wooprForm" id="wooprForm">
        <label><?php echo esc_attr__('از تاریخ:', 'persian-reports') ?></label>
        <input type="text" class="wooprFrom" value="<?php echo esc_attr(date('Y-m-d', time() - 604800)) ?>" />
        <input type="text" class="wooprFromAlt" hidden />
        <label><?php echo esc_attr__('تا تاریخ:', 'persian-reports') ?></label>
        <input type="text" class="wooprTo" value="<?php echo esc_attr(date('Y-m-d', time())) ?>" />
        <input type="text" class="wooprToAlt" hidden />
    </form>

    <div class="woopr-frames">
        <table>
            <tbody>
                <tr>
                    <td aria-unix="86400"><?php echo esc_attr__('یک روز قبل', 'persian-reports') ?></td>
                    <td aria-unix="604800"><?php echo esc_attr__('یک هفته قبل', 'persian-reports') ?></td>
                    <td aria-unix="2592000"><?php echo esc_attr__('30 روز قبل', 'persian-reports') ?></td>
                </tr>
                <tr>
                    <td aria-unix="5184000"><?php echo esc_attr__('60 روز قبل', 'persian-reports') ?></td>
                    <td aria-unix="7776000"><?php echo esc_attr__('90 روز قبل', 'persian-reports') ?></td>
                    <td aria-unix="10368000"><?php echo esc_attr__('120 روز قبل', 'persian-reports') ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <?php do_action('woopr_temp_sidebar'); ?>
</div>