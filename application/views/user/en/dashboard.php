<main>
  <!-- Header Template -->
  <?php include_once(TEMPLATE_PATH . '/partial/'.$this->_user_language.'/_top_menu.php')  ?>
  <section id="dashboard">
    <div class="container flex-margin py-3">
      <h2><?php echo $page_header ?></h2>
      <div class="row py-2">
        <div class="col-12 col-md-6 col-lg-5">
          <!-- Quote Requests -->
          <div class="card border-0">
            <div class="card-body table-responsive">
              <div>
                <h5 class="fw-bold">Latest Quote Requests 
                  <span class="float-end badge bg-info text-light rounded-pill align-text-bottom">
                    <?php echo $new_quotes_total ?>
                  </span>
                  </h5>
              </div>
              <div class="bg-light p-1 d-flex justify-content-end px-2"><a href="/quote/list"><i class="bi bi-eye"></i> View All </a></div>
              <?php //echo $todo;
                if (count($quotes) > 0){
              ?>
                  <table id="data_table" data-table-name="user" class="table table-hover">
                    <!-- <thead>
                      <tr>
                        <th width="1%">ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                      </tr>
                    </thead> -->
                    <tbody>
                      <?php 
                        foreach ($quotes as $row) {
                      ?>
                      <tr class="tr_table" data-query="<?php  echo $row['id'] ?>" data-action="view">
                        <td><?php  echo $row['name'] ?></td>
                        <td><?php  echo $row['city'] ?></td>
                        <td><?php  echo $row['state'] ?></td>
                        <td><?php  echo $row['quote_date'] ?></td>
                        <td><?php  echo '$' .$row['bill_amount'] ?></td>
                      </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>
                  <?php 
                    if (sizeof($quotes) > 5){
                  ?>
                    View All
                  <?php } ?>

                <?php }else{ ?>  
                  No results.
                <?php } ?>  
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-7">
          <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
              <div class="card bg-secondary mb-4 text-white">
                <div class="card-body">
                  <div class="d-flex row">
                    <div class="col-2 align-self-center text-center">
                      <i class="bi-envelope bi-2x"></i>
                    </div>
                    <div class="col-8 ml-auto align-self-center">
                      <div class="float-right">
                        <a href="/message/list" class="stretched-link"><h5 class="mt-0 round-inner"><?php echo $messages_total ?></h5></a>
                        <p class="mb-0">Unread Messages</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
              <a href="/post/list" >
                <div class="card bg-info mb-4 text-white">
                  <div class="card-body">
                    <div class="d-flex row">
                      <div class="col-2 align-self-center text-center">
                        <i class="bi-newspaper bi-2x"></i>
                      </div>
                      <div class="col-8 ml-auto align-self-center">
                        <div class="float-right">
                          <h5 class="mt-0 round-inner">0</h5>
                          <p class="mb-0">Post comments</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <!-- <div class="col-sm-12 col-md-6 col-lg-6">
              <div class="card bg-primary mb-4 text-white">
                <div class="card-body">
                  <div class="d-flex row">
                    <div class="col-2 align-self-center text-center">
                      <i class="bi-person-plus bi-2x"></i>
                    </div>
                    <div class="col-8 ml-auto align-self-center">
                      <div class="float-right">
                        <h5 class="mt-0 round-inner">0</h5>
                        <p class="mb-0">Join requests</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
              <div class="card bg-secondary mb-4 text-white">
                <div class="card-body">
                  <div class="d-flex row">
                    <div class="col-2 align-self-center text-center">
                      <i class="bi-eye bi-2x"></i>
                    </div>
                    <div class="col-8 ml-auto align-self-center">
                      <div class="float-right">
                        <h5 class="mt-0 round-inner">0</h5>
                        <p class="mb-0">Check insights</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
          </div>
        </div>
        
      </div>
    </div>
  </section>
</main>