                    </section> <!-- Nav Content Wrap -->
               </section>
          </section>
     </section>
</section>
</main>


<!-- scripts -->
<!-- jquery -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://use.fontawesome.com/e6e86262b4.js"></script> <!-- Icons -->
<script type="text/javascript" src="<?php echo ROOT; ?>public/js/Chart.js"></script>

<?php if (isset($textEditor)): ?>

     <link rel="stylesheet" type="text/css" href="<?php echo ROOT; ?>public/js/simditor/simditor.css" />
     <link rel="stylesheet" type="text/css" href="<?php echo ROOT; ?>public/js/simditor/fullscreen.css" />
     <script type="text/javascript" src="<?php echo ROOT; ?>public/js/simditor/module.js"></script>
     <script type="text/javascript" src="<?php echo ROOT; ?>public/js/simditor/hotkeys.js"></script>
     <script type="text/javascript" src="<?php echo ROOT; ?>public/js/simditor/uploader.js"></script>
     <script type="text/javascript" src="<?php echo ROOT; ?>public/js/simditor/simditor.js"></script>
     <script type="text/javascript" src="<?php echo ROOT; ?>public/js/simditor/fullscreen.js"></script>

<?php endif; ?>

<link rel="stylesheet" href="https://unpkg.com/simplebar@latest/dist/simplebar.css"/>
<script src="https://unpkg.com/simplebar@latest/dist/simplebar.js"></script>
<script src="<?php echo ROOT; ?>public/js/particles.js"></script>
<script src="<?php echo ROOT; ?>public/js/progressbar.js"></script>
<script src="<?php echo ROOT; ?>public/js/portal.js"></script>
</body>

</html>
