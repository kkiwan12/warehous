<?php
include 'includes/header.php';
//the authentication
eventControll();
?>
<?php if ($_SESSION['lang'] == 'en') : ?>
  <div class="">
    <div class="container py-4 px-4">
      <div class="row">


        <div class="col-8  ">
          <img class="rounded" src="assets/uploads/icons/kiwan.png" alt="" style="width: 100px; height:100px; ">
          <h1 style="color: #0f4e81;">Kiwan Taekwondo Center

          </h1>
        </div>
        <div class="col-4 text-end">
           <?php
                            if (isset($_SESSION['loggedIn'])) {
                              echo '<a href="ADMIN/index.php" style="color: #0f4e81; border-color:#0f4e81;" class="btn  btn-outline-whit mt-5 ">Dashbord</a>';
                            }
                            ?></div>

        <!-- slider  --->
        <div class="col-12 mb-4">
          <div id="carouselExampleCaptions" class="carousel slide">
            <?php
            $sliders = getAll('slider');
            if ($sliders && mysqli_num_rows($sliders) > 0) :
            ?>
              <div class="carousel-indicators">
                <?php for ($i = 0; $i < mysqli_num_rows($sliders); $i++) : ?>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?= $i ?>" <?= $i === 0 ? 'class="active" aria-current="true"' : '' ?> aria-label="Slide <?= $i + 1 ?>"></button>
                <?php endfor; ?>
              </div>
              <div class="carousel-inner rounded-3">
                <?php
                $firstSlide = true;
                while ($slide = mysqli_fetch_assoc($sliders)) :
                ?>
                  <div class="carousel-item <?= $firstSlide ? 'active' : '' ?>" style="height: 400px;">
                    <img src=".../<?= $slide['image'] ?>" class="img-fluid w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5 class="shadow-sm "><?= $slide['title'] ?></h5>
                      <p class="shadow-lg"><?= $slide['text'] ?></p>
                    </div>
                  </div>
                <?php
                  $firstSlide = false;
                endwhile;
                ?>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            <?php endif; ?>
          </div>
        </div>

      </div>







      <!--adout us  -->
      <div class="col-12">
        <!-- About 1 - Bootstrap Brain Component -->
        <section class="py-3 py-md-5" id="about">
          <div class="container">
            <div class="row gy-3 gy-md-4 gy-lg-0 align-items-lg-center">
              <div class="col-12 col-lg-6 col-xl-5">
                <img class="img-fluid rounded" loading="lazy" src="assets/uploads/icons/taekwondo.jpg" alt="About 1">
              </div>
              <div class="col-12 col-lg-6 col-xl-7">
                <div class="row justify-content-xl-center">
                  <div class="col-12 col-xl-11">
                    <h2 class="mb-3">Who Are We?</h2>
                    <p class="lead fs-4 text-secondary mb-3">We help people to build incredible brands and superior products. Our perspective is to furnish outstanding captivating services.</p>
                    <p class="mb-5">We are a fast-growing company, but we have never lost sight of our core values. We believe in collaboration, innovation, and customer satisfaction. We are always looking for new ways to improve our products and services.</p>
                    <div class="row gy-4 gy-md-0 gx-xxl-5X">
                      <div class="col-12 col-md-6">
                        <div class="d-flex">
                          <div class="me-4 text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                              <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                            </svg>
                          </div>
                          <div>
                            <h2 class="h4 mb-3">Versatile Brand</h2>
                            <p class="text-secondary mb-0">We are crafting a digital method that subsists life across all mediums.</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="d-flex">
                          <div class="me-4 text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-fire" viewBox="0 0 16 16">
                              <path d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16Zm0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15Z" />
                            </svg>
                          </div>
                          <div>
                            <h2 class="h4 mb-3">Digital Agency</h2>
                            <p class="text-secondary mb-0">We believe in innovation by merging primary with elaborate ideas.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

      </div>

      <div class="container py-4">
        <h2 class="text-warning mb-4 mt-5 text-center ">we offer</h2>
        <div class=" border-secondary-subtle   mb-4   " style="--bs-border-opacity: .5;">

          <div class="row mt-3 px-3">
            <div class="col-md-4">
              <div class="shadow p-3 mb-4  rounded-4">
                <div class="card-borderless text-center">
                  <div class="card-body">
                    <div class="card-title   mb-2"> <img class="img-fluid " loading="lazy" src="assets/uploads/icons/teakwondoIcon2.png" alt="About 1" style="height: 100px;"></div>
                    <p class="card-text ">taekwondo</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="shadow p-3 mb-4  rounded-4">
                <div class="card-borderless text-center">
                  <div class="card-body">
                    <h4 class="card-title   mb-2"> <img class="img-fluid " loading="lazy" src="assets/uploads/icons/footballIcon.png" alt="About 1" style="height: 100px;"></h4>
                    <p class="card-text ">football</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="shadow p-3 mb-4  rounded-4">
                <div class="card-borderless text-center" style="max-width: 18rem;">
                  <div class="card-body">
                    <h4 class="card-title  mb-2"><img class="img-fluid " loading="lazy" src="assets/uploads/icons/swimmingIcon.png" alt="About 1" style="height: 100px; "></h4>
                    <p class="card-text ">swimming</p>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

      <div class="col-12">

        <div class="card-borderless text-center">
          <div class="card-title text-Light mb-4 ">
            <h4 class="t"><span class="badge text-bg-danger" id="news">New</span> events</h4>
          </div>
          <div class="card-body">
            <table class="table  table-Light rounded ">

              <thead>
                <tr>
                  <th scope="col">name</th>
                  <th scope="col">info</th>
                  <th scope="col">fees</th>
                  <th scope="col">time</th>
                  <th scope="col">date (Y-M-D)</th>


                </tr>
              </thead>
              <tbody>
                <?php $events = getAll('events');
                if ($events) {
                  foreach ($events as $event) {
                ?>
                    <tr>
                      <th scope="row"><?= $event['name'] ?></th>
                      <td><?= $event['info'] ?></td>
                      <td><?= $event['fees'] ?> $</td>
                      <td><?= $event['time'] ?></td>
                      <td><?= $event['date'] ?></td>

                    </tr>
                  <?php
                  }
                } else { ?>
                  <th colspan="3">No events</th>
                <?php }
                ?>



                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- Contact 6 - Bootstrap Brain Component -->
  <section class="py-3 py-md-5 py-xl-8">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
          <h2 class="mb-4 display-5 text-center">Need Help?</h2>
          <p class="text-secondary mb-5 text-center lead fs-4">Our team is available to provide prompt and helpful responses to all inquiries. You can reach us via phone, email, or by filling out the contact form below.</p>
          <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
        </div>
      </div>
    </div>

    <div class="container" id="contact_us">
      <div class="row">
        <div class="col-12">
          <div class="card border rounded shadow-sm overflow-hidden">
            <div class="card-body p-0">
              <div class="row gy-3 gy-md-4 gy-lg-0">
                <div class="col-12 col-lg-6 bsb-overlay background-position-center background-size-cover" style="--bsb-overlay-opacity: 0.7; background-image: url('./assets/uploads/slides/teakwondoSlide2.jpg');">
                  <div class="row align-items-lg-center justify-content-center h-100">
                    <div class="col-11 col-xl-10">
                      <div class="contact-info-wrapper py-4 py-xl-5">
                        <h2 class="h1 mb-3 text-light">Get in touch</h2>
                        <p class="lead fs-4 text-light opacity-75 mb-4 mb-xxl-5">We're always on the lookout to work with new clients. If you're interested in working with us, please get in touch in one of the following ways.</p>
                        <div class="d-flex mb-4 mb-xxl-5">
                          <div class="me-4 text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-geo" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zM4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z" />
                            </svg>
                          </div>
                          <div>
                            <h4 class="mb-3 text-light">Address</h4>
                            <address class="mb-0 text-light opacity-75">8014 Edith Blvd NE, Albuquerque, New York, United States</address>
                          </div>
                        </div>
                        <div class="row mb-4 mb-xxl-5">
                          <div class="col-12 col-xxl-6">
                            <div class="d-flex mb-4 mb-xxl-0">
                              <div class="me-4 text-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-telephone-outbound" viewBox="0 0 16 16">
                                  <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zM11 .5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-4.146 4.147a.5.5 0 0 1-.708-.708L14.293 1H11.5a.5.5 0 0 1-.5-.5z" />
                                </svg>
                              </div>
                              <div>
                                <h4 class="mb-3 text-light">Phone</h4>
                                <p class="mb-0">
                                  <a class="link-light link-opacity-75 link-opacity-100-hover text-decoration-none" href="tel:+15057922430">(505) 792-2430</a>
                                </p>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-xxl-6">
                            <div class="d-flex mb-0">
                              <div class="me-4 text-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-envelope-at" viewBox="0 0 16 16">
                                  <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z" />
                                  <path d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648Zm-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z" />
                                </svg>
                              </div>
                              <div>
                                <h4 class="mb-3 text-light">E-Mail</h4>
                                <p class="mb-0">
                                  <a class="link-light link-opacity-75 link-opacity-100-hover text-decoration-none" href="mailto:demo@yourdomain.com">demo@yourdomain.com</a>
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="d-flex">
                          <div class="me-4 text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-alarm" viewBox="0 0 16 16">
                              <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5z" />
                              <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z" />
                            </svg>
                          </div>
                          <div>
                            <h4 class="mb-3 text-light">Opening Hours</h4>
                            <div class="d-flex mb-1">
                              <p class="text-light fw-bold mb-0 me-5">Mon - Fri</p>
                              <p class="text-light opacity-75 mb-0">9am - 5pm</p>
                            </div>
                            <div class="d-flex">
                              <p class="text-light fw-bold mb-0 me-5">Sat - Sun</p>
                              <p class="text-light opacity-75 mb-0">9am - 2pm</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-lg-6">
                  <div class="row align-items-lg-center h-100">
                    <div class="col-12">
                      <form action="#!">
                        <div class="row gy-4 gy-xl-5 p-4 p-xl-5">
                          <div class="col-12">
                            <label for="fullname" class="form-label">Full Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="fullname" name="fullname" value="" required>
                          </div>

                          <div class="col-12 col-md-12">
                            <label for="phone" class="form-label">Phone Number</label>
                            <div class="input-group">
                              <span class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                  <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                </svg>
                              </span>
                              <input type="tel" class="form-control" id="phone" name="phone" value="">
                            </div>
                          </div>

                          <div class="col-12">
                            <label for="message" class="form-label">Message <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                          </div>
                          <div class="col-12">
                            <div class="d-grid">
                              <button class="btn btn-primary btn-lg" type="submit">Send Message</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  </div>

  </div>



  <!------------------------------------------------------------------------------------------------------->







<?php else : ?>








  <!------------------------------------------------------------------------------------------------------->
  <div class="">
    <div class="container py-4 px-4">
      <div class="row">

        <div class="col-4">
          <?php
          if (isset($_SESSION['loggedIn'])) {
            echo '<a href="ADMIN/index.php" style="color: #0f4e81; border-color:#0f4e81;" class="btn  btn-outline-whit mt-5">مركز التحكم</a>';
          }
          ?>
        </div>
        <div class="col-8 text-end">
          <img class="rounded" src="assets/uploads/icons/kiwan.png" alt="" style="width: 100px; height:100px; ">
          <h1 style="color: #0f4e81;">مركز كيوان للتايكواندو

          </h1>

        </div>



        <!-- slider  --->
        <div class="col-12 mb-4">
          <div id="carouselExampleCaptions" class="carousel slide">
            <?php
            $sliders = getAll('slider');
            if ($sliders && mysqli_num_rows($sliders) > 0) :
            ?>
              <div class="carousel-indicators">
                <?php for ($i = 0; $i < mysqli_num_rows($sliders); $i++) : ?>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?= $i ?>" <?= $i === 0 ? 'class="active" aria-current="true"' : '' ?> aria-label="Slide <?= $i + 1 ?>"></button>
                <?php endfor; ?>
              </div>
              <div class="carousel-inner rounded-3">
                <?php
                $firstSlide = true;
                while ($slide = mysqli_fetch_assoc($sliders)) :
                ?>
                  <div class="carousel-item <?= $firstSlide ? 'active' : '' ?>" style="height: 400px;">
                    <img src=".../<?= $slide['image'] ?>" class="img-fluid w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5 class="shadow-sm "><?= $slide['title'] ?></h5>
                      <p class="shadow-lg"><?= $slide['text'] ?></p>
                    </div>
                  </div>
                <?php
                  $firstSlide = false;
                endwhile;
                ?>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            <?php endif; ?>
          </div>
        </div>

      </div>







      <!--adout us  -->
      <div class="col-12">
        <!-- About 1 - Bootstrap Brain Component -->
        <section class="py-3 py-md-5" id="about">
          <div class="container">
            <div class="row gy-3 gy-md-4 gy-lg-0 align-items-lg-center">
              <div class="col-12 col-lg-6 col-xl-5">
                <img class="img-fluid rounded" loading="lazy" src="assets/uploads/icons/taekwondo.jpg" alt="About 1">
              </div>
              <div class="col-12 col-lg-6 col-xl-7">
                <div class="row justify-content-xl-center">
                  <div class="col-12 col-xl-11">
                    <h2 class="mb-3">من نحن؟</h2>
                    <p class="lead fs-4 text-secondary mb-3">نحن نساعد الناس على بناء علامات تجارية مذهلة ومنتجات متفوقة. وجهة نظرنا هي تقديم خدمات آسرة متميزة.</p>
                    <p class="mb-5">نحن شركة سريعة النمو، لكننا لم نغفل أبدًا عن قيمنا الأساسية. نحن نؤمن بالتعاون والابتكار ورضا العملاء. نحن نبحث دائمًا عن طرق جديدة لتحسين منتجاتنا وخدماتنا.</p>
                    <div class="row gy-4 gy-md-0 gx-xxl-5X">
                      <div class="col-12 col-md-6">
                        <div class="d-flex">
                          <div class="me-4 text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                              <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                            </svg>
                          </div>
                          <div>
                            <h2 class="h4 mb-3">علامة تجارية متعددة الاستخدامات</h2>
                            <p class="text-secondary mb-0">نحن نصنع طريقة رقمية تدعم الحياة عبر جميع الوسائط.</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="d-flex">
                          <div class="me-4 text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-fire" viewBox="0 0 16 16">
                              <path d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16Zm0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15Z" />
                            </svg>
                          </div>
                          <div>
                            <h2 class="h4 mb-3">الوكالة الرقمية</h2>
                            <p class="text-secondary mb-0">نحن نؤمن بالابتكار من خلال دمج الأفكار الأولية مع الأفكار التفصيلية.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

      </div>

      <div class="container py-4">
        <h2 class="text-warning mb-4 mt-5 text-center ">نحن نقدم :</h2>
        <div class=" border-secondary-subtle   mb-4   " style="--bs-border-opacity: .5;">

          <div class="row mt-3 px-3">
            <div class="col-md-4">
              <div class="shadow p-3 mb-4  rounded-4">
                <div class="card-borderless text-center">
                  <div class="card-body">
                    <div class="card-title   mb-2"> <img class="img-fluid " loading="lazy" src="assets/uploads/icons/teakwondoIcon2.png" alt="About 1" style="height: 100px;"></div>
                    <p class="card-text ">تايكواندو</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="shadow p-3 mb-4  rounded-4">
                <div class="card-borderless text-center">
                  <div class="card-body">
                    <h4 class="card-title   mb-2"> <img class="img-fluid " loading="lazy" src="assets/uploads/icons/footballIcon.png" alt="About 1" style="height: 100px;"></h4>
                    <p class="card-text ">كرة قدم</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="shadow p-3 mb-4  rounded-4">
                <div class="card-borderless text-center" style="max-width: 18rem;">
                  <div class="card-body">
                    <h4 class="card-title  mb-2"><img class="img-fluid " loading="lazy" src="assets/uploads/icons/swimmingIcon.png" alt="About 1" style="height: 100px; "></h4>
                    <p class="card-text ">سباحه</p>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

      <div class="col-12">

        <div class="card-borderless text-center">
          <div class="card-title text-Light mb-4 ">
            <h4 class="t"><span class="badge text-bg-danger" id="news">الحديثه</span> النشاطات</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
            <table class="table  table-Light rounded ">


              <thead>
                <tr>
                  <th scope="col">الاسم</th>
                  <th scope="col">معلومات الحدث</th>
                  <th scope="col">الرسوم</th>
                  <th scope="col">الوقت</th>
                  <th scope="col">التاريخ (Y-M-D)</th>


                </tr>
              </thead>
              <tbody>
                <?php $events = getAll('events');
                if ($events) {
                  foreach ($events as $event) {
                ?>
                    <tr>
                      <th scope="row"><?= $event['name'] ?></th>
                      <td><?= $event['info'] ?></td>
                      <td><?= $event['fees'] ?> $</td>
                      <td><?= $event['time'] ?></td>
                      <td><?= $event['date'] ?></td>

                    </tr>
                  <?php
                  }
                } else { ?>
                  <th colspan="3">لا يوجد احداث قادمه</th>
                <?php }
                ?>



                </tr>
              </tbody>
            
            </table>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- Contact 6 - Bootstrap Brain Component -->
  <section class="py-3 py-md-5 py-xl-8">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
          <h2 class="mb-4 display-5 text-center ">تحتاج مساعدة؟</h2>
          <p class="text-secondary mb-5 text-center lead fs-4">فريقنا متاح لتقديم إجابات سريعة ومفيدة لجميع الاستفسارات. يمكنك التواصل معنا عبر الهاتف أو البريد الإلكتروني أو عن طريق ملء نموذج الاتصال أدناه.</p>
          <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
        </div>
      </div>
    </div>

    <div class="container" id="contact_us">
      <div class="row">
        <div class="col-12">
          <div class="card border rounded shadow-sm overflow-hidden">
            <div class="card-body p-0">
              <div class="row gy-3 gy-md-4 gy-lg-0">
                <div class="col-12 col-lg-6 bsb-overlay background-position-center background-size-cover" style="--bsb-overlay-opacity: 0.7; background-image: url('./assets/uploads/slides/teakwondoSlide2.jpg');">
                  <div class="row align-items-lg-center justify-content-center h-100">
                    <div class="col-11 col-xl-10">
                      <div class="contact-info-wrapper py-4 py-xl-5">
                        <h2 class="h1 mb-3 text-light">ابقى على تواصل</h2>
                        <p class="lead fs-4 text-light opacity-75 mb-4 mb-xxl-5">نحن نتطلع دائمًا للعمل مع عملاء جدد. إذا كنت مهتمًا بالعمل معنا، فيرجى التواصل معنا بإحدى الطرق التالية.</p>
                        <div class="d-flex mb-4 mb-xxl-5">
                          <div class="me-4 text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-geo" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zM4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z" />
                            </svg>
                          </div>
                          <div>
                            <h4 class="mb-3 text-light">العنوان</h4>
                            <address class="mb-0 text-light opacity-75">8014 Edith Blvd NE, Albuquerque, New York, United States</address>
                          </div>
                        </div>
                        <div class="row mb-4 mb-xxl-5">
                          <div class="col-12 col-xxl-6">
                            <div class="d-flex mb-4 mb-xxl-0">
                              <div class="me-4 text-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-telephone-outbound" viewBox="0 0 16 16">
                                  <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zM11 .5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-4.146 4.147a.5.5 0 0 1-.708-.708L14.293 1H11.5a.5.5 0 0 1-.5-.5z" />
                                </svg>
                              </div>
                              <div>
                                <h4 class="mb-3 text-light">رقم الهاتف</h4>
                                <p class="mb-0">
                                  <a class="link-light link-opacity-75 link-opacity-100-hover text-decoration-none" href="tel:+15057922430">(505) 792-2430</a>
                                </p>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-xxl-6">
                            <div class="d-flex mb-0">
                              <div class="me-4 text-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-envelope-at" viewBox="0 0 16 16">
                                  <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z" />
                                  <path d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648Zm-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z" />
                                </svg>
                              </div>
                              <div>
                                <h4 class="mb-3 text-light">البريد الالكتروني</h4>
                                <p class="mb-0">
                                  <a class="link-light link-opacity-75 link-opacity-100-hover text-decoration-none" href="mailto:demo@yourdomain.com">demo@yourdomain.com</a>
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="d-flex">
                          <div class="me-4 text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-alarm" viewBox="0 0 16 16">
                              <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5z" />
                              <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z" />
                            </svg>
                          </div>
                          <div>
                            <h4 class="mb-3 text-light">ساعات العمل</h4>
                            <div class="d-flex mb-1">
                              <p class="text-light fw-bold mb-0 me-5">Mon - Fri</p>
                              <p class="text-light opacity-75 mb-0">9am - 5pm</p>
                            </div>
                            <div class="d-flex">
                              <p class="text-light fw-bold mb-0 me-5">Sat - Sun</p>
                              <p class="text-light opacity-75 mb-0">9am - 2pm</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-lg-6">
                  <div class="row align-items-lg-center h-100">
                    <div class="col-12">
                      <form action="#!">
                        <div class="row gy-4 gy-xl-5 p-4 p-xl-5">
                          <div class="col-12">
                            <label for="fullname" class="form-label">الاسم الكامل <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="fullname" name="fullname" value="" required>
                          </div>

                          <div class="col-12 col-md-12">
                            <label for="phone" class="form-label">رقم الهاتف</label>
                            <div class="input-group">
                              <span class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                  <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                </svg>
                              </span>
                              <input type="tel" class="form-control" id="phone" name="phone" value="">
                            </div>
                          </div>

                          <div class="col-12">
                            <label for="message" class="form-label">الموضوع <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                          </div>
                          <div class="col-12">
                            <div class="d-grid">
                              <button class="btn btn-primary btn-lg" type="submit">ارسال</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  </div>

  </div>
<?php endif; ?>
<?php include 'includes/footer.php'; ?>