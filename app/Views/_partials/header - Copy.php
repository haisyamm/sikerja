<?php 

// get data user
$user_data = json_decode($this->input->cookie('localhost'));?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php // echo getInfoWeb('ss_web_name') . ' - ' . $tittle; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=yes">

    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
      WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
    </script>

    <!-- date range picker -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <link href="<?php echo base_url('assets')?>/css/vendors.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets')?>/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets')?>/vendors/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />

  </head>
  <body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
    <div class="m-grid m-grid--hor m-grid--root m-page">
      <header id="m_header" class="m-grid__item m-header " m-minimize-offset="200" m-minimize-mobile-offset="200">
        <div class="m-container m-container--fluid m-container--full-height">
          <div class="m-stack m-stack--ver m-stack--desktop">
            <div class="m-stack__item m-brand  m-brand--skin-dark ">
              <div class="m-stack m-stack--ver m-stack--general">
                <div class="m-stack__item m-stack__item--middle m-brand__logo">
                  <a href="javascript:void(0)" style="color: #fff;text-decoration: none;font-size: 15px;line-height: 1.2;">
                    <?=getInfoWeb('ss_web_name');?>
                  </a>
                  <a href="javascript:void(0)" class="m-brand__logo-wrapper">
                    <!-- <img alt="" class="img-thumb-header" src="<?php echo base_url()?>assets/images/logo/logo.png" /> -->

                  </a>
                </div>
                <div class="m-stack__item m-stack__item--middle m-brand__tools">
                  <a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block  ">
                    <span></span>
                  </a>
                  <a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
                    <span></span>
                  </a>
                  <a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
                    <span></span>
                  </a>
                  <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                    <i class="flaticon-more"></i>
                  </a>
                </div>
              </div>
            </div>
            <!-- action -->
            <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
              <button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark " id="m_aside_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
              <div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark ">
                <ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
                  <li class="m-menu__item  m-menu__item--submenu m-menu__item--rel" m-menu-submenu-toggle="click" m-menu-link-redirect="1" aria-haspopup="true"><a href="javascript:;" class="m-menu__link m-menu__toggle" title="Non functional dummy link"><i
                       class="m-menu__link-icon flaticon-add"></i><span class="m-menu__link-text">Actions</span><i class="m-menu__hor-arrow la la-angle-down"></i><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left"><span class="m-menu__arrow m-menu__arrow--adjust"></span>
                      <ul class="m-menu__subnav">
                        <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
                          <a href="javascript:void(0);" class="m-menu__link ">
                            <i class="m-menu__link-icon flaticon-diagram"></i>
                            <span class="m-menu__link-title">
                              <span class="m-menu__link-wrap"><span class="m-menu__link-text">Generate Reports</span></span>
                            </span>
                          </a>
                        </li>
                        <li class="m-menu__item  m-menu__item--submenu" m-menu-submenu-toggle="hover" m-menu-link-redirect="1" aria-haspopup="true">
                          <a href="javascript:void(0);" class="m-menu__link m-menu__toggle">
                            <i class="m-menu__link-icon flaticon-chat-1"></i><span class="m-menu__link-text">Customer Feedbacks</span>
                            <i class="m-menu__hor-arrow la la-angle-right"></i>
                            <i class="m-menu__ver-arrow la la-angle-right"></i>
                          </a>
                          <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--right"><span class="m-menu__arrow "></span>
                            <ul class="m-menu__subnav">
                              <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true"><a href="javascript:void(0);" class="m-menu__link "><span class="m-menu__link-text">Customer Feedbacks</span></a></li>
                            </ul>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </li>
                </ul>
              </div>

              <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general m-stack--fluid">
                <div class="m-stack__item m-topbar__nav-wrapper">
                  <ul class="m-topbar__nav m-nav m-nav--inline">
                    <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light"
                     m-dropdown-toggle="click">
                      <a href="javascript:void(0);" class="m-nav__link m-dropdown__toggle">
                        <span class="m-topbar__userpic">
                          <img src="<?php echo base_url();?>assets/images/users/user.png" class="m--img-rounded m--marginless" alt="" />
                        </span>
                        <span class="m-topbar__username m--hide">Nick</span>
                      </a>
                      <div class="m-dropdown__wrapper">
                        <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                        <div class="m-dropdown__inner">
                          <div class="m-dropdown__header m--align-center" style="background: url(<?php echo base_url();?>assets/images/misc/user_profile_bg.jpg); background-size: cover;">
                            <div class="m-card-user m-card-user--skin-dark">
                              <div class="m-card-user__pic">
                                <img src="<?php echo base_url();?>assets/images/users/user.png" class="m--img-rounded m--marginless" alt="" />
                              </div>
                              <div class="m-card-user__details">
                                <span class="m-card-user__name m--font-weight-500"><?=$user_data->name;?></span>
                                <a href="" class="m-card-user__email m--font-weight-300 m-link"><?=$user_data->name;?>@test.com</a>
                              </div>
                            </div>
                          </div>
                          <div class="m-dropdown__body">
                            <div class="m-dropdown__content">
                              <ul class="m-nav m-nav--skin-light">
                                <li class="m-nav__section m--hide">
                                  <span class="m-nav__section-text">Section</span>
                                </li>
                                
                                <li class="m-nav__separator m-nav__separator--fit">
                                </li>
                                <li class="m-nav__separator m-nav__separator--fit">
                                </li>
                                <li class="m-nav__item">
                                  <a href="<?php echo base_url() . PATH;?>login/doLogout" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">Logout</a>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>

      <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
        <button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
        <i class="la la-close"></i></button>
        <div id="m_aside_left" class="m-grid__item m-aside-left  m-aside-left--skin-dark ">
          <div id="m_ver_menu" class="m-aside-menu m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
            <ul class="m-menu__nav m-menu__nav--dropdown-submenu-arrow ">
              <?php 
              $menu = getMenu();
              foreach($menu as $nav):?>

<!--               <?php
              if($nav['url'] == 'template'):?>
                <li class="m-menu__item  m-menu__item--submenu m--bg-navy>" aria-haspopup="true" m-menu-submenu-toggle="hover">
                  <a href="javascript:void(0)" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon <?php echo $nav['icon_menu'];?>"></i>
                      <span class="m-menu__link-text"><?php echo $nav['name'];?></span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                  </a>
                  <div class="m-menu__submenu ">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                      <li class="m-menu__item" aria-haspopup="true">
                        <a href="#" class="m-menu__link">
                        <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                        <span class="m-menu__link-text">Front Zipper</span></a>
                      </li>
                    </ul>
                  </div>
                </li>
              <?php endif;?> -->

              <?php
              if(count($nav['child']) == 0)
              {
                if($this->uri->segment(1) == $nav['url'])
                {
                  $active = "m-menu__item--active menuback";
                  $menu_active = "menuactive";
                }
                else
                {
                  $active = "";
                  $menu_active ="";
                }
                ?>
                <li class="m-menu__item <?php echo $active;?>" aria-haspopup="true">
                  <a href="<?php echo site_url(PATH . $nav['url']);?>" class="m-menu__link">
                    <i class="m-menu__link-icon <?php echo $nav['icon_menu'];?>"></i>
                    <span class="m-menu__link-title">
                      <span class="m-menu__link-wrap">
                        <span class="m-menu__link-text <?php echo $menu_active;?>"><?php echo $nav['name'];?></span>
                      </span>
                    </span>
                  </a>
                </li>
                <?php
              }
              else
              {
                if($this->uri->segment(1) == $nav['url'])
                {
                  $parent_active = "m-menu__item m-menu__item--submenu m-menu__item--expanded m-menu__item--open m--bg-navy";
                }
                else
                {
                  $parent_active = "m-menu__item  m-menu__item--submenu m--bg-navy";
                }
                  ?>
                <li class="<?php echo $parent_active;?>" aria-haspopup="true" m-menu-submenu-toggle="hover">
                  <a href="javascript:void(0)" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon <?php echo $nav['icon_menu'];?>"></i>
                      <span class="m-menu__link-text"><?php echo $nav['name'];?></span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                  </a>
                  <div class="m-menu__submenu ">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                    <?php foreach($nav['child'] as $child):
                    
                    if($this->uri->segment(1) == $nav['url'] && $this->uri->segment(2) == $child['url'])
                    {
                      $child_active  = "m-menu__item m-menu__item--active menuback";
                      $menu_active = "menuactive";
                    }
                    else
                    {
                      $child_active  = "m-menu__item";
                      $menu_active = "";
                    }?>
                      <li class="<?php echo $child_active; ?>" aria-haspopup="true">
                        <a href="<?php echo site_url(PATH . $nav['url'] . '/' . $child['url']);?>" class="m-menu__link">
                        <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                        <span class="m-menu__link-text <?php echo $menu_active; ?>"><?php echo $child['name'];?></span></a>
                      </li>
                    <?php endforeach;?>
                    </ul>
                  </div>
                </li>
              <?php  } ?>
              <?php endforeach;?>
            </ul>
          </div>
        </div>