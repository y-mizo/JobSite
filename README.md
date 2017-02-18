# JobSite

## 概要

![概要](https://raw.githubusercontent.com/y-mizo/JobSite/master/webroot/img/job_site.png)

求人サイト向けの雛形サイト。  
XAMPP環境、CakePHP2.8.* で作成。

* 求人管理は管理者以外の一般登録ユーザーも行えるものとする。
* 求人カテゴリの管理は管理者のみ可能とする。
* キーワードから仕事を検索、フォームからエントリーする。
  管理者と利用者の双方に自動連絡メールが送信される。

## 要件
* PHP 5.6 以上
* MySQL 5 以上

## インストール方法
```
$ git clone https://github.com/y-mizo/JobSite.git
$ cd JobSite
$ composer install
```

## tmpディレクトリの作成
tmpディレクトリを下記構成で作る。
```
tmp
├── cache
│   ├── models
│   └── persistent
└── logs
    ├── debug.log
    └── error.log
```

## データベースのセットアップ
※ 事前に MySQL 内に空のデータベースを作成しておく。
  文字コードは UTF8 。

▼ database.php ファイルを作成
```
$ cp Config/database.php.default Config/database.php
```

▼ database.php ファイルを編集
```
<?php
// Config/database.php

class DATABASE_CONFIG {

	public $default = array(
		'datasource'  => 'Database/Mysql',
		'persistent'  => false,
		'host'        => 'YOUR_HOSTNAME',
		'login'       => 'YOUR_USERID',
		'password'    => 'YOUR_PASSWORD',
		'database'    => 'YOUR_DATABASE',
		'prefix'      => '',
		'encoding'    => 'utf8',
        // XAMPP の場合は以下をアクティブにする。
        // 'unix_socket' => '/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock',
	);
        ... 
        ...
}
```

▼ データベースのテーブルを作成(マイグレーションの実行)
```
$ Console/cake Migrations.migration run all
```

## アプリケーションの起動
※ 事前に MySQL を起動しておく。
```
$ Console/cake server -p 8000
...
...
built-in server is running in http://YOUR_HOSTNAME:8000/
```



