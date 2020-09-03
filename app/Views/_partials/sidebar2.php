 <!-- BEGIN: Aside Menu -->
          <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="0" m-menu-dropdown-timeout="500">
            <ul class="m-menu__nav m-menu__nav--dropdown-submenu-arrow ">
              <?php 
              //$menu = getMenu();
              foreach($menu as $nav):?>

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
                    
                    if($this->uri->segment(1) == $nav['url'] && $uri->getSegment(2) == $child['url'])
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
          <!--  <ul class="m-menu__nav ">
              <li class="m-menu__section m-menu__section--first">
                <h4 class="m-menu__section-text">Departments</h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
              </li>

              <li class="m-menu__item  m-menu__item--active" aria-haspopup="true"><a href="index.html" class="m-menu__link "><span class="m-menu__item-here"></span><i class="m-menu__link-icon flaticon-line-graph"></i><span class="m-menu__link-text">Dashboard</span></a></li>

              <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><span class="m-menu__item-here"></span><i class="m-menu__link-icon flaticon-layers"></i><span
                   class="m-menu__link-text">Resources</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                  <ul class="m-menu__subnav">
                    <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"><span class="m-menu__link"><span class="m-menu__item-here"></span><span class="m-menu__link-text">Resources</span></span></li>
                    <li class="m-menu__item " aria-haspopup="true"><a href="inner.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Timesheet</span></a></li>
                    <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Payroll</span></a></li>
                    <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Contacts</span></a></li>
                  </ul>
                </div>
              </li>
              <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><span class="m-menu__item-here"></span><i class="m-menu__link-icon flaticon-suitcase"></i><span class="m-menu__link-text">Finance</span></a></li>
              <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover" m-menu-link-redirect="1"><a href="javascript:;" class="m-menu__link m-menu__toggle"><span class="m-menu__item-here"></span><i class="m-menu__link-icon flaticon-graphic-1"></i><span
                   class="m-menu__link-title"> <span class="m-menu__link-wrap"> <span class="m-menu__link-text">Support</span> <span class="m-menu__link-badge"><span class="m-badge m-badge--accent">3</span></span> </span></span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                  <ul class="m-menu__subnav">
                    <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" m-menu-link-redirect="1"><span class="m-menu__link"><span class="m-menu__item-here"></span><span class="m-menu__link-title"> <span class="m-menu__link-wrap"> <span class="m-menu__link-text">Support</span>
                            <span class="m-menu__link-badge"><span class="m-badge m-badge--accent">3</span></span> </span></span></span></li>
                    <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--line"><span></span></i><span class="m-menu__link-text">Reports</span></a></li>
                    <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover" m-menu-link-redirect="1"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--line"><span></span></i><span
                         class="m-menu__link-text">Cases</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                      <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                        <ul class="m-menu__subnav">
                          <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Pending</span></a></li>
                          <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Urgent</span></a></li>
                          <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Done</span></a></li>
                          <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Archive</span></a></li>
                        </ul>
                      </div>
                    </li>
                    <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--line"><span></span></i><span class="m-menu__link-text">Clients</span></a></li>
                    <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--line"><span></span></i><span class="m-menu__link-text">Audit</span></a></li>
                  </ul>
                </div>
              </li>
              <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><span class="m-menu__item-here"></span><i class="m-menu__link-icon flaticon-light"></i><span class="m-menu__link-text">Administration</span></a></li>
              <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><span class="m-menu__item-here"></span><i class="m-menu__link-icon flaticon-share"></i><span class="m-menu__link-text">Management</span></a></li>
              <li class="m-menu__section ">
                <h4 class="m-menu__section-text">Reports</h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
              </li>
              <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><span class="m-menu__item-here"></span><i class="m-menu__link-icon flaticon-graphic"></i><span class="m-menu__link-text">Accounting</span></a></li>
              <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><span class="m-menu__item-here"></span><i class="m-menu__link-icon flaticon-network"></i><span class="m-menu__link-text">Products</span></a></li>
              <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><span class="m-menu__item-here"></span><i class="m-menu__link-icon flaticon-network"></i><span class="m-menu__link-text">Sales</span></a></li>
              <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><span class="m-menu__item-here"></span><i class="m-menu__link-icon flaticon-alert"></i><span class="m-menu__link-title"> <span
                     class="m-menu__link-wrap"> <span class="m-menu__link-text">Bills</span> <span class="m-menu__link-badge"><span class="m-badge m-badge--danger">12</span></span> </span></span></a></li>
              <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><span class="m-menu__item-here"></span><i class="m-menu__link-icon flaticon-technology"></i><span class="m-menu__link-text">IPO</span></a></li>
              <li class="m-menu__section ">
                <h4 class="m-menu__section-text">System</h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
              </li>
              <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><span class="m-menu__item-here"></span><i class="m-menu__link-icon flaticon-clipboard"></i><span
                   class="m-menu__link-text">Applications</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                  <ul class="m-menu__subnav">
                    <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"><span class="m-menu__link"><span class="m-menu__item-here"></span><span class="m-menu__link-text">Applications</span></span></li>
                    <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Audit</span></a></li>
                    <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Notifications</span></a></li>
                    <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Messages</span></a></li>
                  </ul>
                </div>
              </li>
              <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><span class="m-menu__item-here"></span><i class="m-menu__link-icon flaticon-computer"></i><span
                   class="m-menu__link-text">Modules</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                  <ul class="m-menu__subnav">
                    <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"><span class="m-menu__link"><span class="m-menu__item-here"></span><span class="m-menu__link-text">Modules</span></span></li>
                    <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Logs</span></a></li>
                    <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Errors</span></a></li>
                    <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Configuration</span></a></li>
                  </ul>
                </div>
              </li>
              <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><span class="m-menu__item-here"></span><i class="m-menu__link-icon flaticon-cogwheel"></i><span class="m-menu__link-text">Files</span></a></li>
              <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><span class="m-menu__item-here"></span><i class="m-menu__link-icon flaticon-lifebuoy"></i><span class="m-menu__link-text">Security</span></a></li>
              <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="inner.html" class="m-menu__link "><span class="m-menu__item-here"></span><i class="m-menu__link-icon flaticon-settings"></i><span class="m-menu__link-text">Options</span></a></li>
            </ul> -->
          </div>

          <!-- END: Aside Menu -->