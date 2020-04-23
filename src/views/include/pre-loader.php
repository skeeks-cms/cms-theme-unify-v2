<? if ($this->theme->is_show_loader) : ?>
    <?
    $this->registerCss(<<<CSS
.sx-preloader {
  display: table;
  background: #1e1e1e;
  z-index: 999999;
  position: fixed;
  height: 100%;
  width: 100%;
  left: 0;
  top: 0;
}
.sx-loader-image {
  display: table-cell;
  vertical-align: middle;
  overflow: hidden;
  text-align: center;
}
CSS
    );
    ?>
    <div class="sx-preloader">
        <div class="sx-loader-image"></div>
    </div>
<? endif; ?>