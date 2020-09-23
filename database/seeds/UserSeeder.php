<?php


use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run()
    {
         $data = [
            [
                'name' => 'admin',
                'username' => 'admin',
                'email' => 'admin@admin.com',
                'password' => password_hash("admin", PASSWORD_BCRYPT),
                'active' => true,
                'admin' => true
            ]
        ];

        $posts = $this->table('users');
        $posts->insert($data)
              ->save();
    }
}
