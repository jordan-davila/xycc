<?php require APP . 'views/layouts/portal/header.php'; ?>

     <form id="content" action="<?php echo ROOT . 'users/update/' . $data['userInfo']['id']; ?>" method="post" class="flex_row">
          <section class="modules new_user_module">
               <?php flash('register_success'); ?>
               <?php flash('register_error'); ?>
               <section class="forms">
                     <div class="half_field">
                       <label for="first_name">First Name</label>
                       <input type="text" id="first_name" name="first_name" value="<?php echo ucwords($data['userInfo']['first_name']); ?>" required>
                     </div>
                     <div class="half_field">
                       <label for="last_name">Last Name</label>
                       <input type="text" id="last_name" name="last_name" value="<?php echo ucwords($data['userInfo']['last_name']); ?>" required>
                     </div>
                     <div class="half_field">
                       <label for="email">Email</label>
                       <input type="email" id="email" name="email" value="<?php echo $data['userInfo']['email']; ?>" required>
                     </div>
                     <div class="half_field">
                       <label for="phone">Phone Number</label>
                       <input type="number" id="phone" name="phone" value="<?php echo $data['userInfo']['phone']; ?>" required>
                     </div>
                     <div class="half_field">
                       <label for="role">Role</label>
                       <select id="role" name="role" required>
                           <option value="student" <?php echo $data['userInfo']['role'] == 'student' ? 'selected' : ''; ?>>Student</option>
                           <option value="teacher" <?php echo $data['userInfo']['role'] == 'teacher' ? 'selected' : ''; ?>>Teacher</option>
                           <option value="admin" <?php echo $data['userInfo']['role'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
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
                       <input type="text" id="address" name="address" value="<?php echo ucwords($data['userInfo']['address']); ?>" required>
                     </div>
                     <div class="half_field">
                       <label for="city">City</label>
                       <input type="text" id="city" name="city" value="<?php echo ucwords($data['userInfo']['city']); ?>" required>
                     </div>
                     <div class="third_field">
                       <label for="state">State</label>
                       <select name="state" id="state">
                         <option value="">-</option>

                         <?php require_once APP . 'helpers/Data_Helper.php'; ?>
                         <?php

                         foreach ($states as $state => $state_full) {
                             if ($state === strtoupper($data['userInfo']['state'])) {
                                 echo '<option value="' .$state . '" selected>' . $state_full . '</option>';
                             } else {
                                 echo '<option value="' .$state . '">' . $state_full . '</option>';
                             }
                         }

                         ?>

                       </select>
                     </div>
                     <div class="third_field">
                       <label for="zip">Zip</label>
                       <input type="text" id="zip" name="zip" value="<?php echo ucwords($data['userInfo']['zip']); ?>" required>
                     </div>
                     <div class="third_field">
                       <label for="gender">Gender</label>
                       <select name="gender" id="gender">
                         <option value="U" <?php echo $data['userInfo']['gender'] == 'U' ? 'selected' : ''; ?>>Unknown</option>
                         <option value="M" <?php echo $data['userInfo']['gender'] == 'M' ? 'selected' : ''; ?>>M</option>
                         <option value="F" <?php echo $data['userInfo']['gender'] == 'F' ? 'selected' : ''; ?>>F</option>
                       </select>
                     </div>
                </section>
          </section>

          <section class="modules edit_user_stats">

               <div class="profile_container">
                      <div class="profile_picture" style="background-image: url('<?php echo $data['userInfo']['avatar']; ?>');"></div>
                      <a href="#" class="name"><?php echo ucwords($data['userInfo']['first_name']) . ' ' . ucwords($data['userInfo']['last_name']); ?></a>
                      <div class="role">Role: <?php echo ucwords($data['userInfo']['role']); ?></div>
                      <div class="id">Id: <?php echo $data['userInfo']['id']; ?></div>
               </div>
               <div class="credit_container">
                      <div id="progress_circle"></div>
                      <div class="progressbar_container">
                        <div id="total_credits"></div>
                        <div id="total_credits_school"></div>
                      </div>
               </div>
               <div class="btn_container">
                    <input type="submit" id="submit" name="submit" class="btn btn_green" value="Edit User">
                    <a href="<?php echo ROOT . 'users/delete/' . $data['userInfo']['id']; ?>" class="btn btn_pink">Delete User</a>
                    <a href="<?php echo ROOT . 'users/'; ?>" class="btn btn_pink">Cancel</a>
               </div>
          </section>

       </form>
     </section>

<?php require APP . 'views/layouts/portal/footer.php'; ?>
