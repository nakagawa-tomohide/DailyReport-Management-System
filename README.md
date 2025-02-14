# ROGRe （ログリ） 林業向け日報管理アプリ

## 概要
このシステムでは、主に林業の日報の管理を行うことができます。  
日報を登録、編集、削除できます。管理者は、日報をエクセルに出力できます。  
私が以前、林業に従事している時、日報提出をより簡単に、効率的にできる方法はないかと考えていました。  
プログラミング学習を進める中で、日報を管理するアプリがあれば解決できるのではないかと思い作成することにしました。  
これにより、日報を提出する従業員、処理する事務員、双方の作業が効率的に作業ができると思いました。

<br>

## システムの閲覧
[アプリケーションページへ](https://logre-193944e6f146.herokuapp.com/)

#### テストアカウント情報
通常ログインはログインリンクからできます。  
管理者ログインは管理者ログインリンクからできます。
```
通常ログイン
メールアドレス：suzuki@example.com
パスワード：suzukipassword

管理者ログイン
メールアドレス：admin1@example.com
パスワード：admin1password
```
##

<br>

## 主な機能

### 通常ログインユーザー
* ログイン・ログアウト機能
* ホーム画面
* 日報一覧画面
* 日報登録、編集、削除機能
* スケジュール画面
* スケジュール登録、削除機能
* マイページ画面
* ユーザー情報変更機能

### 管理者ログインユーザー
* ログイン・ログアウト機能
* ホーム画面
* 日報一覧画面
* 日報日付検索
* Excel出力
* スケジュール画面
* スケジュール登録、削除画面

<br>

## 開発環境
```
PHP 8.2
Laravel 10.13
MySQL 9.1
jQuery 3.3.1
Bootstrap 5.3
```
