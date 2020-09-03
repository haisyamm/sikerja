<?php echo view('_partials/header'); ?>
<?php 
 //kalkulasi karyawan yang absen
 // $count_employee   = count($data_employee);
 // $count_attendance = count($data_attendance);

 // $percentage_attendance = intval($count_attendance / $count_employee * 100);

 // // kalkulasi menu / submenu aktif
 // $count_menu       = count($data_menu);
 // $count_menu_active= count($data_menu_active);

 // $percentage_menu  = intval($count_menu_active / $count_menu * 100);

?> 

<div class="col-md-12 col-sm-12 col-lg-12">
  <div class="m-content" style="width: 100%;">

      <div class="m-portlet ">
        <div class="m-portlet__body  m-portlet__body--no-padding">
          <div class="row m-row--no-padding m-row--col-separator-xl">
            <div class="col-md-12 col-lg-6 col-xl-3">

              <!--begin::Total Profit-->
              <div class="m-widget24">
                <div class="m-widget24__item">
                  <h4 class="m-widget24__title">
                    Absensi
                  </h4><br>
                  <span class="m-widget24__desc">
                    Semua Karyawan
                  </span>
                  <span class="m-widget24__stats m--font-brand">
                    <?=$count_attendance;?>
                  </span>
                  <div class="m--space-10"></div>
                  <div class="progress m-progress--sm">
                    <div class="progress-bar m--bg-brand" role="progressbar" style="width: <?=$percentage_attendance;?>%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <span class="m-widget24__change">
                    Karyawan Masuk
                  </span>
                  <span class="m-widget24__number">
                    <?=$percentage_attendance;?>%
                  </span>
                </div>
              </div>

              <!--end::Total Profit-->
            </div>
            <div class="col-md-12 col-lg-6 col-xl-3">

              <!--begin::New Feedbacks-->
              <div class="m-widget24">
                <div class="m-widget24__item">
                  <h4 class="m-widget24__title">
                    Total
                  </h4><br>
                  <span class="m-widget24__desc">
                    Semua Karyawan
                  </span>
                  <span class="m-widget24__stats m--font-info">
                    <?=count($data_employee);?>
                  </span>
                  <div class="m--space-10"></div>
                  <!-- <div class="progress m-progress--sm">
                    <div class="progress-bar m--bg-info" role="progressbar" style="width: 84%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                  </div> -->
                 <!--  <span class="m-widget24__change">
                    Change
                  </span>
                  <span class="m-widget24__number">
                    84%
                  </span> -->
                </div>
              </div>

              <!--end::New Feedbacks-->
            </div>
            <div class="col-md-12 col-lg-6 col-xl-3">

              <!--begin::New Orders-->
              <div class="m-widget24">
                <div class="m-widget24__item">
                  <h4 class="m-widget24__title">
                    User
                  </h4><br>
                  <span class="m-widget24__desc">
                    TOtal Pengguna
                  </span>
                  <span class="m-widget24__stats m--font-danger">
                    <?=count($data_users);?>
                  </span>
                  <div class="m--space-10"></div>
                  <!-- <div class="progress m-progress--sm">
                    <div class="progress-bar m--bg-danger" role="progressbar" style="width: 69%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <span class="m-widget24__change">
                    Change
                  </span>
                  <span class="m-widget24__number">
                    69%
                  </span> -->
                </div>
              </div>

              <!--end::New Orders-->
            </div>
            <div class="col-md-12 col-lg-6 col-xl-3">

              <!--begin::New Users-->
              <div class="m-widget24">
                <div class="m-widget24__item">
                  <h4 class="m-widget24__title">
                    Total
                  </h4><br>
                  <span class="m-widget24__desc">
                    Menu / Submenu
                  </span>
                  <span class="m-widget24__stats m--font-success">
                    <?=$count_menu;?>
                  </span>
                  <div class="m--space-10"></div>
                  <div class="progress m-progress--sm">
                    <div class="progress-bar m--bg-success" role="progressbar" style="width: <?=$percentage_menu;?>%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <span class="m-widget24__change">
                    Aktif
                  </span>
                  <span class="m-widget24__number">
                    <?=$percentage_menu;?>%
                  </span>
                </div>
              </div>

              <!--end::New Users-->
            </div>
          </div>
        </div>
      </div>

  </div>

  <div class="m-content" style="width: 100%; padding-top: 0px; margin-bottom: 30px;">

      <div class="row">
        <div class="col-sm-12 col-sm-12 col-lg-4">
          <!-- recent absen -->         
          <div class="m-portlet">
            <div class="m-portlet__head">
              <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                  <h3 class="m-portlet__head-text">
                    Terakhir Absen
                  </h3>
                </div>
              </div>
            </div>
            <div class="m-portlet__body">
              <div class="m-widget4">
                <!--begin::Widget 14 Item-->
                <div class="m-widget4__item">
                  <div class="m-widget4__img m-widget4__img--pic">
                    <img src="http://localhost/attendance/assets/images/users/user.png" alt="">
                  </div>
                  <?php if(count($data_attendance_last) < 1):?>
                    <div class="m-widget4__info">
                      <span class="m-widget4__title">
                        Tidak ada data
                      </span>
                    </div>
                  <?php endif;?>
                  <?php foreach($data_attendance_last as $dla):?>
                    <div class="m-widget4__info">
                      <span class="m-widget4__title">
                        <?=$dla['kw_full_name'];?>
                      </span><br>
                      <span class="m-widget4__sub">
                        Jam Masuk : <?=date_format(date_create($dla['at_start']), "H:i");?>
                      </span>
                    </div>
                  <?php endforeach;?>
                </div>
                <!--end::Widget 14 Item-->
              </div>
              <hr>
            </div>
          </div>
          <!-- end recent absen -->
        </div>

        <div class="col-sm-12 col-sm-12 col-lg-4">
          <!-- recent absen -->         
          <div class="m-portlet">
            <div class="m-portlet__head">
              <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                  <h3 class="m-portlet__head-text">
                    Terakhir Pulang
                  </h3>
                </div>
              </div>
            </div>
            <div class="m-portlet__body">
              <div class="m-widget4">
                <!--begin::Widget 14 Item-->
                <div class="m-widget4__item">

                  <?php if(count($data_attendance_last) < 1):?>
                    <div class="m-widget4__info">
                      <span class="m-widget4__title">
                        Tidak ada data
                      </span>
                    </div>
                  <?php endif;?>

                  <?php foreach($data_attendance_last as $dla):?>
                    <?php if($dla['at_end'] !== NULL):?>
                      <div class="m-widget4__img m-widget4__img--pic">
                        <img src="http://localhost/attendance/assets/images/users/user.png" alt="">
                      </div>
                      <div class="m-widget4__info">
                        <span class="m-widget4__title">
                          <?=$dla['kw_full_name'];?>
                        </span><br>
                        <span class="m-widget4__sub">
                          Jam Keluar : <?=date_format(date_create($dla['at_end']), "H:i");?>
                        </span>
                      </div>
                    <?php else:?>
                      <div class="m-widget4__info">
                        <span class="m-widget4__title">
                          Tidak ada data
                        </span>
                      </div>
                    <?php endif;?>
                  <?php endforeach;?>
                </div>
                <!--end::Widget 14 Item-->
              </div>
              <hr>
            </div>
          </div>
          <!-- end recent absen -->
        </div>

        <div class="col-sm-12 col-sm-12 col-lg-4">
          <!-- recent absen -->         
          <div class="m-portlet">
            <div class="m-portlet__head">
              <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                  <h3 class="m-portlet__head-text">
                    Karyawan Ditambahkan
                  </h3>
                </div>
              </div>
            </div>
            <div class="m-portlet__body">
              <div class="m-widget4">
                <?php if(count($data_employee_last) < 1):?>
                  <div class="m-widget4__info">
                    <span class="m-widget4__title">
                      Tidak ada data
                    </span>
                  </div>
                <?php endif;?>
                <!--begin::Widget 14 Item-->
                <?php foreach($data_employee_last as $del):?>
                  <div class="m-widget4__item">
                    <div class="m-widget4__img m-widget4__img--pic">
                      <img src="http://localhost/attendance/assets/images/users/user.png" alt="">
                    </div>
                    <div class="m-widget4__info">
                      <span class="m-widget4__title">
                        <?=$del['kw_full_name'];?>
                      </span><br>
                      <span class="m-widget4__sub">
                        NIP : <?=$del['kw_nip'];?>
                      </span>
                    </div>
                  </div>
                <?php endforeach;?>
                <!--end::Widget 14 Item-->
              </div>
              <hr>
            </div>
          </div>
          <!-- end recent absen -->
        </div>

      </div>

  </div>
</div>
<?php echo view('_partials/footer'); ?>