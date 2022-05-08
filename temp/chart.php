<div id="wooprChartsBody">
    <div class="woopr-loading">
        <p><?php echo esc_attr__('لطفا صبر کنید', 'woopr') ?></p>
    </div>
    <div id="wooprChartsSection">
        <?php do_action('woopr_temp_chart_before'); ?>
        <div id="wooprChartContainer">
            <canvas id="wooprChart"></canvas>
            <canvas id="wooprChartSecondary"></canvas>
        </div>
        <?php do_action('woopr_temp_chart_after'); ?>
    </div>
</div>