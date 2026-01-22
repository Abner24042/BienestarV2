</main>
    
    <!-- Scripts -->
    <script src="<?php echo asset('js/main.js'); ?>"></script>
    <?php if (isset($additionalJS)): ?>
        <?php foreach ($additionalJS as $js): ?>
            <script src="<?php echo asset("js/{$js}"); ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>