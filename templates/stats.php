<p class="main__tip">
    <?php if (!empty($startTime)): ?>
        <strong>Script Load Time:</strong> <?= round(microtime(true) - $startTime, 5) ?> Seconds<br>
    <?php endif; ?>
    <strong>Peak Memory Usage:</strong> <?= round(memory_get_peak_usage() / 1048576, 5) ?>MB
</p>
