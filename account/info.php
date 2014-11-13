<?php
/*

UserFrosting Version: 0.2.1 (beta)
By Alex Weissman
Copyright (c) 2014

Based on the UserCake user management system, v2.0.2.
Copyright (c) 2009-2012

UserFrosting, like UserCake, is 100% free and open-source.

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the 'Software'), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:
The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED 'AS IS', WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.

*/

require_once("../models/config.php");

if (!securePage(__FILE__)){
  // Forward to index page
  addAlert("danger", "Whoops, looks like you don't have permission to view that page.");
  header("Location: 404.php");
  exit();
}

setReferralPage(getAbsoluteDocumentPath(__FILE__));

?>

<!DOCTYPE html>
<html lang="en">
  <?php
      echo renderAccountPageHeader(array("#SITE_ROOT#" => SITE_ROOT, "#SITE_TITLE#" => SITE_TITLE, "#PAGE_TITLE#" => "Dashboard"));
  ?>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
        <?php
          echo renderMenu("dashboard");
        ?>  

      <div id="page-wrapper">
          <div class="row">
          <div id='display-alerts' class="col-lg-12">
          
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <h1>Site Information</h1>
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-bug"></i> Information Overview</li>
            </ol>
          </div>
        </div><!-- /.row -->

          <div class="row">
              <div class="col-lg-6">
                  <div class="panel panel-primary">
                      <div class="panel-heading">
                          <h3 class="panel-title"><i class="fa fa-bug"></i> Setting Arrays</h3>
                      </div>
                      <div class="panel-body">
                          <p>
                              <?php
                                echo '<pre>';
                                print_r($settings);
                                echo '</pre>';
                              ?>
                          </p>
                      </div>

                      <div class="panel-body">
                          <p>
                              <?php
                              echo '<pre>';
                              print_r($plugin_settings);
                              echo '</pre>';
                              ?>
                          </p>
                      </div>
                  </div>
              </div>

              <div class="col-lg-6">
                  <div class="panel panel-primary">
                      <div class="panel-heading">
                          <h3 class="panel-title"><i class="fa fa-bug"></i> Application Paths</h3>
                      </div>
                      <div class="panel-body">
                          <p>
                              <?php
                              echo 'Site Root path:<br /> '.SITE_ROOT;
                              echo '<br /><br />';
                              echo 'Account Root path:<br /> '.ACCOUNT_ROOT;
                              echo '<br /><br />';
                              echo 'Local Root path:<br /> '.LOCAL_ROOT;
                              echo '<br /><br />';
                              echo 'Menu templates path:<br /> '.MENU_TEMPLATES;
                              echo '<br /><br />';
                              echo 'Mail templates path:<br /> '. MAIL_TEMPLATES;
                              echo '<br /><br />';
                              echo 'Secure functions files path:<br />'. $files_secure_functions[0];
                              echo '<br /><br />';
                              echo 'Page inclued paths:<br />';
                              echo '<ul>';
                              foreach($page_include_paths as $p){
                                  echo '<li>'.SITE_ROOT . $p.'</li>';
                              }
                              echo '</ul>';
                              //echo '<pre>';
                              //
                              //echo '</pre>';
                              ?>
                          </p>
                      </div>
                  </div>
              </div>

          </div><!-- /.row -->

          <div class="row">
              <div class="col-lg-12">
                  <div class="panel panel-primary">
                      <div class="panel-heading">
                          <h3 class="panel-title"><i class="fa fa-bug"></i> $loggedInUser Array() based on currently logged in user.</h3>
                      </div>
                      <div class="panel-body">
                          <p>
                              <?php
                                echo '<pre>';
                                print_r($loggedInUser);
                                echo '</pre>';
                              ?>
                          </p>
                      </div>
                  </div>
              </div>
          </div>
      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <script>
        $(document).ready(function() {       
          alertWidget('display-alerts');
        });
    </script>
  </body>
</html>


