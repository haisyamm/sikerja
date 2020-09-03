        </div>
      </div>

      <footer class="m-grid__item		m-footer ">
        <div class="m-container m-container--fluid m-container--full-height m-page__container">
          <div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
            <div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last text-right">
              <span class="m-footer__copyright">
                2020 &copy; Attendance <a href="javascript:void(0);" class="m-link"><?=getInfoWeb('ss_web_name');?></a>
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>


    <div id="m_scroll_top" class="m-scroll-top"><i class="la la-arrow-up"></i></div>
    <script src="<?php echo base_url();?>assets/js/vendors.bundle.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/scripts.bundle.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/sweetalert2.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/vendors/datatables/datatables.bundle.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-notify.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/treeview.js" type="text/javascript"></script>
    <?php if(!empty($js) || $js != ''): echo $this->load->view('js/' . $js .'.php'); endif;?>
  </body>
</html>