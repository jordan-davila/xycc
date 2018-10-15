<?php require APP . 'views/layouts/portal/header.php'; ?>

<section id="content" class="flex_row">
      <section class="left_section_module">
          <section class="modules">
              <h1 class="module_heading">List of Users</h1>
              <?php flash('register_success'); ?>
              <?php flash('register_error'); ?>
              <div class="user_table" data-simplebar>
                  <table>
                      <tr>
                          <th width="50">ID</th>
                          <th>Name</th>
                          <th width="80">Gender</th>
                          <th width="130">Role</th>
                          <th width="80">Action</th>
                      </tr>

                      <?php foreach ($data['userList'] as $user) { ?>
                      <tr>
                          <td>
                              <?php echo $user[ 'id']; ?>
                          </td>
                          <td>
                              <div class="avatar_name_container">
                                  <div class="avatar" style="background-image: url('<?php echo $user['avatar']; ?>'); "></div>
                                  <div class="full_name">
                                      <?php echo ucwords($user[ 'first_name']) . " " . ucwords($user[ 'last_name']); ?>
                                  </div>
                              </div>
                          </td>
                          <td>
                              <?php echo ucwords($user[ 'gender']); ?>
                          </td>
                          <td>
                              <?php echo ucwords($user[ 'role']); ?>
                          </td>
                          <td><a href="<?php echo ROOT . 'users/edit/' . $user['id']; ?>" class="btn btn_green">Edit</a>
                          </td>
                      </tr>
                      <?php } ?>

                  </table>

              </div>
              <div class="pagination_container">
                <?php echo $data['paginationLinks']; ?>
              </div>
          </section>
      </section>
      <section class="right_section_module">
          <section class="modules user_stats_module">
              <h1 class="module_heading">User Stats</h1>
              <div class="stats_container">
                  <div class="half_field">
                  Total: <i><?php echo $data['totalUsers']; ?></i>
                  </div>
                  <div class="half_field">
                  Admins: <i><?php echo $data['userAdminCount']; ?></i>
                  </div>
                  <div class="half_field">
                  Teachers: <i><?php echo $data['userTeacherCount']; ?></i>
                  </div>
                  <div class="half_field">
                  Students: <i><?php echo $data['userStudentCount']; ?></i>
                  </div>
              </div>
          </section>
          <section class="modules new_user_module">
              <h1 class="module_heading">Add New User</h1>
              <form class="forms" action="<?php echo ROOT . 'users/create'; ?>" method="post">
                <div class="half_field">
                  <label for="first_name">First Name</label>
                  <input type="text" id="first_name" name="first_name" required>
                </div>
                <div class="half_field">
                  <label for="last_name">Last Name</label>
                  <input type="text" id="last_name" name="last_name" required>
                </div>
                <div class="half_field">
                  <label for="email">Email</label>
                  <input type="email" id="email" name="email" required>
                </div>
                <div class="half_field">
                  <label for="phone">Phone Number</label>
                  <input type="number" id="phone" name="phone" required>
                </div>
                <div class="half_field">
                  <label for="role">Role</label>
                  <select id="role" name="role" required>
                      <option value="student">Student</option>
                      <option value="teacher">Teacher</option>
                      <option value="admin">Admin</option>
                  </select>
                </div>
                <div class="half_field">
                  <label for="mojor">Major</label>
                  <select id="major" name="major">
                      <option value="0">None</option>
                      <option value="1">Computer Science</option>
                      <option value="2">Networking</option>
                      <option value="3">Web & Mobile App</option>
                      <option value="4">Math</option>
                      <option value="5">English</option>
                  </select>
                </div>
                <div class="half_field">
                  <label for="address">Address</label>
                  <input type="text" id="address" name="address" required>
                </div>
                <div class="half_field">
                  <label for="city">City</label>
                  <input type="text" id="city" name="city" required>
                </div>
                <div class="third_field">
                  <label for="state">State</label>
                  <select name="state" id="state">
                    <option value="">-</option>

                    <?php require_once APP . 'helpers/Data_Helper.php'; ?>
                    <?php foreach ($states as $state => $state_full) { echo '<option value="' .$state . '">' . $state_full . '</option>'; } ?>

                  </select>
                </div>
                <div class="third_field">
                  <label for="zip">Zip</label>
                  <input type="text" id="zip" name="zip" required>
                </div>
                <div class="third_field">
                  <label for="gender">Gender</label>
                  <select name="gender" id="gender">
                    <option value="U">Unknown</option>
                    <option value="M">M</option>
                    <option value="F">F</option>
                  </select>
                </div>
                <input type="submit" id="submit" name="submit" class="btn btn_green" value="Add User">
              </form>
          </section>
      </section>
</section>
<!-- #website -->

<?php require APP . 'views/layouts/portal/footer.php'; ?>
