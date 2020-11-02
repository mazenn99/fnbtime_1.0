<?php echo '<?php' ?>

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Config;

class LaratrustSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return  void
     */
    public function run()
    {
        $this->truncateLaratrustTables();

        $config = config('laratrust_seeder.roles_structure');
        $mapPermission = collect(config('laratrust_seeder.permissions_map'));

        foreach ($config as $key => $modules) {

            // Create a new role
            $role = \<?php echo e($role); ?>::firstOrCreate([
                'name' => $key,
                'display_name' => ucwords(str_replace('_', ' ', $key)),
                'description' => ucwords(str_replace('_', ' ', $key))
            ]);
            $permissions = [];

            $this->command->info('Creating Role '. strtoupper($key));

            // Reading role permission modules
            foreach ($modules as $module => $value) {

                foreach (explode(',', $value) as $p => $perm) {

                    $permissionValue = $mapPermission->get($perm);

                    $permissions[] = \<?php echo e($permission); ?>::firstOrCreate([
                        'name' => $module . '-' . $permissionValue,
                        'display_name' => ucfirst($permissionValue) . ' ' . ucfirst($module),
                        'description' => ucfirst($permissionValue) . ' ' . ucfirst($module),
                    ])->id;

                    $this->command->info('Creating Permission to '.$permissionValue.' for '. $module);
                }
            }

            // Attach all permissions to the role
            $role->permissions()->sync($permissions);

            if(Config::get('laratrust_seeder.create_users')) {
                $this->command->info("Creating '{$key}' user");
                // Create default user for each role
                $user = \<?php echo e($user); ?>::create([
                    'name' => ucwords(str_replace('_', ' ', $key)),
                    'email' => $key.'@app.com',
                    'password' => bcrypt('password')
                ]);
                $user->attachRole($role);
            }

        }
    }

    /**
     * Truncates all the laratrust tables and the users table
     *
     * @return    void
     */
    public function truncateLaratrustTables()
    {
        $this->command->info('Truncating User, Role and Permission tables');
        Schema::disableForeignKeyConstraints();
<?php if(Config::get('database.default') == 'pgsql'): ?>
        DB::table('<?php echo e(config('laratrust.tables.permission_role')); ?>')->truncate();
        DB::table('<?php echo e(config('laratrust.tables.permission_user')); ?>')->truncate();
        DB::table('<?php echo e(config('laratrust.tables.role_user')); ?>')->truncate();
        $rolesTable = (new \<?php echo e($role); ?>)->getTable();
        $permissionsTable = (new \<?php echo e($permission); ?>)->getTable();
        if(Config::get('laratrust_seeder.truncate_tables')) {
            DB::statement("TRUNCATE TABLE {$permissionsTable} CASCADE");
            DB::statement("TRUNCATE TABLE {$rolesTable} CASCADE");
        }
        if(Config::get('laratrust_seeder.truncate_tables') && Config::get('laratrust_seeder.create_users')) {
            $usersTable = (new \<?php echo e($user); ?>)->getTable();
            DB::statement("TRUNCATE TABLE {$usersTable} CASCADE");
        }
<?php else: ?>
        DB::table('<?php echo e(config('laratrust.tables.permission_role')); ?>')->truncate();
        DB::table('<?php echo e(config('laratrust.tables.permission_user')); ?>')->truncate();
        DB::table('<?php echo e(config('laratrust.tables.role_user')); ?>')->truncate();
        if(Config::get('laratrust_seeder.truncate_tables')) {
            \<?php echo e($role); ?>::truncate();
            \<?php echo e($permission); ?>::truncate();
        }
        if(Config::get('laratrust_seeder.truncate_tables') && Config::get('laratrust_seeder.create_users')) {
            \<?php echo e($user); ?>::truncate();
        }
<?php endif; ?>
        Schema::enableForeignKeyConstraints();
    }
}
<?php /**PATH C:\laragon\www\fnbtime\fnbtime_1.0\vendor\santigarcor\laratrust\resources\views\seeder.blade.php ENDPATH**/ ?>