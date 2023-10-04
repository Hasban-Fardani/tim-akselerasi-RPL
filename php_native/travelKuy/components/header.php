<header>
  <div class="navbar bg-primary text-white shadow-lg py-4">
    <div class="navbar-start">
      <div class="dropdown">
        <label tabindex="0" class="btn btn-ghost btn-circle">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
          </svg>
        </label>
        <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52 ">
          <li><a href="/" class="text-black">Homepage</a></li>
          <li><a href="/dashboard.php" class="text-black">Dashboard</a></li>
        </ul>
      </div>
    </div>
    <div class="navbar-center">
      <a class="btn btn-ghost normal-case text-xl">Travel Kuy</a>
    </div>
    <div class="navbar-end">
      <?php if ($name) {?>
        <div class="mr-2">
          <p><?php echo $name?></p>
        </div>
      <?php } else {?>
      <button class="btn bg-base-100 mr-4">
        <p>Hello!</p>
      </button>
      <?php }?>
    </div>
  </div>
</header>
