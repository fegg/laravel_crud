<?php

class SentrySeeder extends Seeder {

  public function run()
  {
    DB::table('users')->delete();
    DB::table('groups')->delete();
    DB::table('users_groups')->delete();

    Sentry::getUserProvider()->create(array(
      'email'      => 'lulin@qq.com',
      'password'   => "123456",
      'first_name' => 'lu',
      'last_name'  => 'lin',
      'activated'  => 1,
    ));

    Sentry::getGroupProvider()->create(array(
      'name'        => 'Admin',
      'permissions' => ['admin' => 1],
    ));

    // 将用户加入用户组
    $adminUser  = Sentry::getUserProvider()->findByLogin('lulin@qq.com');
    $adminGroup = Sentry::getGroupProvider()->findByName('Admin');
    $adminUser->addGroup($adminGroup);
  }
}
