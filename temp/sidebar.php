<div class="woopr-sidebar">
    <div class="woopr-summary">
        <div id="woopr-total_sales" class="woopr-summary_box">
            <div class="woopr-summary_header"><?php echo esc_attr__('فروش کل', 'woopr') ?></div>
            <div class="woopr-summary_result"></div>
        </div>
        <div id="woopr-net_sales" class="woopr-summary_box">
            <div class="woopr-summary_header"><?php echo esc_attr__('فروش خالص', 'woopr') ?></div>
            <div class="woopr-summary_result"></div>
        </div>
        <div id="woopr-average_sales" class="woopr-summary_box">
            <div class="woopr-summary_header"><?php echo esc_attr__('میانگین فروش', 'woopr') ?></div>
            <div class="woopr-summary_result"><?php echo esc_attr__('', 'woopr') ?></div>
        </div>
        <div id="woopr-total_tax" class="woopr-summary_box">
            <div class="woopr-summary_header"><?php echo esc_attr__('مالیات کل', 'woopr') ?></div>
            <div class="woopr-summary_result"></div>
        </div>
        <div id="woopr-total_discount" class="woopr-summary_box">
            <div class="woopr-summary_header"><?php echo esc_attr__('تخفیف‌ها', 'woopr') ?></div>
            <div class="woopr-summary_result"></div>
        </div>
        <div id="woopr-total_shipping" class="woopr-summary_box">
            <div class="woopr-summary_header"><?php echo esc_attr__('حمل و نقل', 'woopr') ?></div>
            <div class="woopr-summary_result"></div>
        </div>
        <div id="woopr-total_orders" class="woopr-summary_box">
            <div class="woopr-summary_header"><?php echo esc_attr__('تعداد سفارش', 'woopr') ?></div>
            <div class="woopr-summary_result"></div>
        </div>
        <div id="woopr-total_items" class="woopr-summary_box">
            <div class="woopr-summary_header"><?php echo esc_attr__('تعداد محصول', 'woopr') ?></div>
            <div class="woopr-summary_result"></div>
        </div>
        <div id="woopr-total_refunds" class="woopr-summary_box">
            <div class="woopr-summary_header"><?php echo esc_attr__('بازگشت وجه', 'woopr') ?></div>
            <div class="woopr-summary_result"></div>
        </div>
    </div>

    <form name="wooprForm" id="wooprForm">
        <label><?php echo esc_attr__('از تاریخ:', 'woopr') ?></label>
        <input type="text" class="wooprFrom" value="<?php echo date('Y-m-d', time() - 604800) ?>" />
        <input type="text" class="wooprFromAlt" hidden />
        <label><?php echo esc_attr__('تا تاریخ:', 'woopr') ?></label>
        <input type="text" class="wooprTo" value="<?php echo date('Y-m-d', time()) ?>" />
        <input type="text" class="wooprToAlt" hidden />
    </form>

    <div class="woopr-frames">
        <table>
            <tbody>
                <tr>
                    <td aria-unix="86400"><?php echo esc_attr__('یک روز قبل', 'woopr') ?></td>
                    <td aria-unix="604800"><?php echo esc_attr__('یک هفته قبل', 'woopr') ?></td>
                    <td aria-unix="2592000"><?php echo esc_attr__('30 روز قبل', 'woopr') ?></td>
                </tr>
                <tr>
                    <td aria-unix="5184000"><?php echo esc_attr__('60 روز قبل', 'woopr') ?></td>
                    <td aria-unix="7776000"><?php echo esc_attr__('90 روز قبل', 'woopr') ?></td>
                    <td aria-unix="10368000"><?php echo esc_attr__('120 روز قبل', 'woopr') ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <?php do_action('woopr_temp_sidebar'); ?>
</div>